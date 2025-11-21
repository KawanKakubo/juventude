<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('photos')->orderBy('post_date', 'desc')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'post_date' => 'required|date',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'photos' => 'nullable|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'published' => 'nullable|boolean'
        ]);

        $validated['published'] = $request->has('published') ? true : false;

        // Upload cover image
        if ($request->hasFile('cover_image')) {
            $coverFile = $request->file('cover_image');
            $coverPath = $coverFile->store('posts/covers', 'public');
            $validated['cover_image'] = $coverPath;
        }

        $post = Post::create($validated);

        // Upload gallery photos
        if ($request->hasFile('photos')) {
            $photos = $request->file('photos');
            foreach ($photos as $index => $photo) {
                if ($photo->isValid()) {
                    $path = $photo->store('posts/gallery', 'public');
                    Photo::create([
                        'post_id' => $post->id,
                        'image_path' => $path,
                        'order' => $index,
                        'caption' => null
                    ]);
                }
            }
        }

        $photoCount = $request->hasFile('photos') ? count($request->file('photos')) : 0;
        return redirect()->route('admin.posts.index')->with('success', "Notícia criada com sucesso! {$photoCount} foto(s) adicionada(s).");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load('photos');
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $post->load('photos');
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'post_date' => 'required|date',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'photos' => 'nullable|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'published' => 'nullable|boolean'
        ]);

        $validated['published'] = $request->has('published') ? true : false;

        // Upload new cover image
        if ($request->hasFile('cover_image')) {
            // Delete old cover
            if ($post->cover_image) {
                Storage::disk('public')->delete($post->cover_image);
            }
            $coverFile = $request->file('cover_image');
            $coverPath = $coverFile->store('posts/covers', 'public');
            $validated['cover_image'] = $coverPath;
        }

        $post->update($validated);

        // Upload new gallery photos
        $photoCount = 0;
        if ($request->hasFile('photos')) {
            $currentCount = $post->photos()->count();
            $photos = $request->file('photos');
            
            foreach ($photos as $index => $photo) {
                if ($photo->isValid()) {
                    $path = $photo->store('posts/gallery', 'public');
                    Photo::create([
                        'post_id' => $post->id,
                        'image_path' => $path,
                        'order' => $currentCount + $index,
                        'caption' => null
                    ]);
                    $photoCount++;
                }
            }
        }

        $message = $photoCount > 0 
            ? "Notícia atualizada com sucesso! {$photoCount} foto(s) adicionada(s)."
            : 'Notícia atualizada com sucesso!';
            
        return redirect()->route('admin.posts.index')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Delete cover image
        if ($post->cover_image) {
            Storage::disk('public')->delete($post->cover_image);
        }

        // Delete gallery photos
        foreach ($post->photos as $photo) {
            Storage::disk('public')->delete($photo->image_path);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Notícia deletada com sucesso!');
    }

    /**
     * Delete a single photo from gallery
     */
    public function deletePhoto(Photo $photo)
    {
        try {
            // Delete the physical file
            if ($photo->image_path && Storage::disk('public')->exists($photo->image_path)) {
                Storage::disk('public')->delete($photo->image_path);
            }
            
            // Delete the database record
            $photo->delete();

            return back()->with('success', 'Foto deletada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao deletar foto: ' . $e->getMessage());
        }
    }

    /**
     * Show dashboard
     */
    public function dashboard()
    {
        $totalPosts = Post::count();
        $publishedPosts = Post::where('published', true)->count();
        $recentPosts = Post::orderBy('post_date', 'desc')->limit(5)->get();

        return view('admin.dashboard', compact('totalPosts', 'publishedPosts', 'recentPosts'));
    }
}

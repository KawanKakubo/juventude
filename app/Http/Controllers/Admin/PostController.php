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
            'video_urls' => 'nullable|array',
            'video_urls.*' => 'nullable|url',
            'published' => 'nullable|boolean'
        ]);

        $validated['published'] = $request->has('published');

        // Upload cover image
        if ($request->hasFile('cover_image')) {
            $coverFile = $request->file('cover_image');
            $coverPath = $coverFile->store('posts/covers', 'public');
            $validated['cover_image'] = $coverPath;
        }

        $post = Post::create($validated);

        // Salvar Fotos da Galeria
        if ($request->hasFile('photos')) {
            $photos = $request->file('photos');
            foreach ($photos as $index => $photo) {
                if ($photo->isValid()) {
                    $path = $photo->store('posts/gallery', 'public');
                    Photo::create([
                        'post_id' => $post->id,
                        'image_path' => $path,
                        'order' => $index,
                    ]);
                }
            }
        }

        // Salvar Vídeos do YouTube
        if ($request->has('video_urls')) {
            $currentCount = $post->photos()->count();
            foreach ($request->video_urls as $url) {
                if (!empty($url)) {
                    Photo::create([
                        'post_id' => $post->id,
                        'type' => 'video',
                        'video_url' => $url,
                        'image_path' => null,
                        'order' => $currentCount,
                    ]);
                    $currentCount++;
                }
            }
        }

        return redirect()->route('admin.posts.index')->with('success', "Notícia criada com sucesso!");
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
        // 1. Validação
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'post_date' => 'required|date',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'photos' => 'nullable|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'video_urls' => 'nullable|array',
            'video_urls.*' => 'nullable|url',
            'published' => 'nullable|boolean'
        ]);

        $validated['published'] = $request->has('published');

        // 2. Atualizar imagem de capa
        if ($request->hasFile('cover_image')) {
            // Deleta a antiga se existir
            if ($post->cover_image && Storage::disk('public')->exists($post->cover_image)) {
                Storage::disk('public')->delete($post->cover_image);
            }
            $coverFile = $request->file('cover_image');
            $coverPath = $coverFile->store('posts/covers', 'public');
            $validated['cover_image'] = $coverPath;
        } else {
            // Remove do array validado para não sobrescrever com null se não for enviada
            unset($validated['cover_image']);
        }

        // 3. Atualiza os dados do Post
        $post->update($validated);

        // 4. Adicionar novas fotos à galeria (Append)
        if ($request->hasFile('photos')) {
            $photos = $request->file('photos');
            // Pega a contagem atual para continuar a ordem
            $currentCount = $post->photos()->max('order') ?? 0; 
            
            foreach ($photos as $index => $photo) {
                if ($photo->isValid()) {
                    $path = $photo->store('posts/gallery', 'public');
                    Photo::create([
                        'post_id' => $post->id,
                        'image_path' => $path,
                        'order' => $currentCount + $index + 1,
                    ]);
                }
            }
        }

        // 5. Atualizar vídeos (Remove antigos e adiciona novos, ou apenas adiciona se for essa a lógica desejada)
        // A lógica abaixo remove APENAS se novos vídeos forem enviados, para evitar duplicação
        if ($request->has('video_urls')) {
            // Remove vídeos antigos (opcional: depende se você quer substituir ou adicionar)
            // Assumindo substituição baseada no código original:
            $post->photos()->where('type', 'video')->delete();

            $currentCount = $post->photos()->max('order') ?? 0;

            foreach ($request->video_urls as $url) {
                if (!empty($url)) {
                    $currentCount++;
                    Photo::create([
                        'post_id' => $post->id,
                        'type' => 'video',
                        'video_url' => $url,
                        'image_path' => null,
                        'order' => $currentCount,
                    ]);
                }
            }
        }

        return redirect()->route('admin.posts.index')->with('success', "Notícia atualizada com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Delete cover image
        if ($post->cover_image && Storage::disk('public')->exists($post->cover_image)) {
            Storage::disk('public')->delete($post->cover_image);
        }

        // Delete gallery photos (arquivos físicos)
        // Carrega as fotos antes de deletar o post para ter acesso aos caminhos
        foreach ($post->photos as $photo) {
            if ($photo->image_path && Storage::disk('public')->exists($photo->image_path)) {
                Storage::disk('public')->delete($photo->image_path);
            }
        }

        $post->delete(); // O delete cascade do banco deve apagar os registros das fotos/videos

        return redirect()->route('admin.posts.index')->with('success', 'Notícia deletada com sucesso!');
    }
    
    public function deletePhoto($id)
    {
        try {
            $photo = Photo::findOrFail($id);

            // Se for imagem, deleta o arquivo físico
            if ($photo->type === 'image' && $photo->image_path && Storage::disk('public')->exists($photo->image_path)) {
                Storage::disk('public')->delete($photo->image_path);
            }
            
            // Deleta o registro do banco (funciona para imagem e video)
            $photo->delete();

            return back()->with('success', 'Mídia removida com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao deletar mídia: ' . $e->getMessage());
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
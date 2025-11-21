<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('photos')
            ->where('published', true)
            ->orderBy('post_date', 'desc')
            ->get()
            ->map(function ($post) {
                $post->post_date_formatted = $post->post_date->format('d/m/Y');
                return $post;
            });

        return view('home', compact('posts'));
    }
}

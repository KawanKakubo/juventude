@extends('admin.layout')

@section('title', 'Visualizar Notícia')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">{{ $post->title }}</h1>
    <p class="text-gray-600 mt-2">{{ $post->post_date->format('d/m/Y') }}</p>
</div>

<div class="bg-white rounded-lg shadow-md p-6">
    @if($post->video_url && $post->photos->isEmpty() && !$post->cover_image)
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Vídeo</label>
            <div class="w-full aspect-video bg-black flex items-center justify-center">
                @php
                    $embedUrl = $post->video_url;
                    if (str_contains($embedUrl, 'youtube.com/watch?v=')) {
                        $embedUrl = preg_replace('/watch\?v=([\w-]+)/', 'embed/$1', $embedUrl);
                    } elseif (str_contains($embedUrl, 'youtu.be/')) {
                        $embedUrl = preg_replace('/youtu.be\/([\w-]+)/', 'youtube.com/embed/$1', $embedUrl);
                    }
                @endphp
                <iframe src="{{ $embedUrl }}" allowfullscreen class="w-full h-64 border-0 rounded-2xl"></iframe>
            </div>
        </div>
    @else
        @if($post->cover_image)
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Imagem de Capa</label>
                <img src="{{ asset('storage/' . $post->cover_image) }}" class="w-full max-w-lg rounded-lg shadow-md mb-4">
            </div>
        @endif
        @if($post->photos->isNotEmpty())
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Galeria de Fotos</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($post->photos as $photo)
                        <img src="{{ asset('storage/' . $photo->image_path) }}" class="w-full h-32 object-cover rounded-lg shadow-md">
                    @endforeach
                </div>
            </div>
        @endif
        @if($post->video_url)
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Link do Vídeo</label>
                <a href="{{ $post->video_url }}" target="_blank" class="text-blue-600 underline break-all">{{ $post->video_url }}</a>
            </div>
        @endif
    @endif
</div>
@endsection

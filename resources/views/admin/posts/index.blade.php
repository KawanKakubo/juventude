@extends('admin.layout')

@section('title', 'Gerenciar Notícias')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Notícias</h1>
        <p class="text-gray-600 mt-2">Gerencie o diário de viagem</p>
    </div>
    <a href="{{ route('admin.posts.create') }}" class="bg-[#ffc107] hover:bg-yellow-500 text-gray-800 font-bold py-3 px-6 rounded-lg">
        + Nova Notícia
    </a>
</div>

@if($posts->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($posts as $post)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                @if($post->cover_image)
                    <img src="{{ asset('storage/' . $post->cover_image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-300 flex items-center justify-center">
                        <span class="text-gray-500">Sem imagem</span>
                    </div>
                @endif
                
                <div class="p-4">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm text-gray-500">{{ $post->post_date->format('d/m/Y') }}</span>
                        @if($post->published)
                            <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Publicado</span>
                        @else
                            <span class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-100 rounded-full">Rascunho</span>
                        @endif
                    </div>
                    
                    <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $post->title }}</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ Str::limit($post->description, 100) }}</p>
                    
                    <div class="flex items-center justify-between text-sm">
                        @php
                            $videoCount = $post->photos->where('type', 'video')->count();
                            $photoCount = $post->photos->where('type', '!=', 'video')->count();
                        @endphp
                        <span class="text-gray-500">
                            {{ $photoCount }} foto{{ $photoCount == 1 ? '' : 's' }}
                            @if($videoCount > 0)
                                &bull; {{ $videoCount }} vídeo{{ $videoCount == 1 ? '' : 's' }}
                            @endif
                        </span>
                        <div class="flex gap-2">
                            <a href="{{ route('admin.posts.edit', $post) }}" class="text-blue-600 hover:text-blue-800">Editar</a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Excluir</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $posts->links() }}
    </div>
@else
    <div class="bg-white rounded-lg shadow-md p-12 text-center">
        <p class="text-gray-500 text-lg mb-4">Nenhuma notícia cadastrada ainda.</p>
        <a href="{{ route('admin.posts.create') }}" class="inline-block bg-[#ffc107] hover:bg-yellow-500 text-gray-800 font-bold py-3 px-6 rounded-lg">
            Criar Primeira Notícia
        </a>
    </div>
@endif
@endsection

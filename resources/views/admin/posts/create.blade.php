@extends('admin.layout')

@section('title', 'Nova Notícia')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Nova Notícia</h1>
    <p class="text-gray-600 mt-2">Adicione uma nova entrada ao diário de viagem</p>
</div>

<div class="bg-white rounded-lg shadow-md p-6">
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Título *</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[#1e3a5f] @error('title') border-red-500 @enderror">
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descrição *</label>
            <textarea name="description" id="description" rows="6" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[#1e3a5f] @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="post_date" class="block text-gray-700 text-sm font-bold mb-2">Data da Publicação *</label>
            <input type="date" name="post_date" id="post_date" value="{{ old('post_date', date('Y-m-d')) }}" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[#1e3a5f] @error('post_date') border-red-500 @enderror">
            @error('post_date')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="cover_image" class="block text-gray-700 text-sm font-bold mb-2">Imagem de Capa</label>
            <input type="file" name="cover_image" id="cover_image" accept="image/*"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[#1e3a5f] @error('cover_image') border-red-500 @enderror">
            <p class="text-gray-500 text-xs mt-1">Formatos aceitos: JPG, PNG, GIF (máx. 2MB)</p>
            @error('cover_image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <div id="cover_preview" class="mt-4"></div>
        </div>

        <div class="mb-6">
            <label for="photos" class="block text-gray-700 text-sm font-bold mb-2">Galeria de Fotos</label>
            <input type="file" name="photos[]" id="photos" accept="image/*" multiple
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[#1e3a5f] @error('photos.*') border-red-500 @enderror">
            <p class="text-gray-500 text-xs mt-1">
                <strong>💡 Dica:</strong> Você pode selecionar múltiplas imagens de uma vez! 
                (Segure Ctrl/Cmd para selecionar várias) - Máx: 10MB por foto
            </p>
            <div id="selected_count" class="text-sm text-blue-600 font-semibold mt-2"></div>
            @error('photos.*')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <div id="gallery_preview" class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4"></div>
        </div>

        <div class="mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="published" value="1" {{ old('published', true) ? 'checked' : '' }}
                    class="form-checkbox h-5 w-5 text-[#1e3a5f]">
                <span class="ml-2 text-gray-700">Publicar imediatamente</span>
            </label>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-[#1e3a5f] hover:bg-[#2d5a8f] text-white font-bold py-3 px-6 rounded-lg">
                Salvar Notícia
            </button>
            <a href="{{ route('admin.posts.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-lg">
                Cancelar
            </a>
        </div>
    </form>
</div>

@push('scripts')
<script>
    // Preview cover image
    document.getElementById('cover_image').addEventListener('change', function(e) {
        const preview = document.getElementById('cover_preview');
        preview.innerHTML = '';
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `<img src="${e.target.result}" class="max-w-md rounded-lg shadow-md">`;
            }
            reader.readAsDataURL(file);
        }
    });

    // Preview gallery images
    document.getElementById('photos').addEventListener('change', function(e) {
        const preview = document.getElementById('gallery_preview');
        const countDiv = document.getElementById('selected_count');
        preview.innerHTML = '';
        const files = Array.from(e.target.files);
        
        if (files.length > 0) {
            countDiv.innerHTML = `✅ ${files.length} foto(s) selecionada(s)`;
        } else {
            countDiv.innerHTML = '';
        }
        
        files.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const div = document.createElement('div');
                div.className = 'relative';
                div.innerHTML = `
                    <img src="${e.target.result}" class="w-full h-32 object-cover rounded-lg shadow-md">
                    <div class="absolute top-2 left-2 bg-blue-600 text-white text-xs px-2 py-1 rounded">#${index + 1}</div>
                `;
                preview.appendChild(div);
            }
            reader.readAsDataURL(file);
        });
    });
</script>
@endpush
@endsection

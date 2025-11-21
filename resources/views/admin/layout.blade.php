<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - De Assaí Pro Mundo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; }
        img { max-width: 100%; height: auto; }
    </style>
</head>
<body class="bg-gradient-to-br from-[#e3e9f7] to-[#f8fafc] min-h-screen">
    <!-- Header -->
    <header class="bg-[#1e3a5f] text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div class="flex items-center gap-3">
                    <img src="https://img.icons8.com/color/48/000000/globe--v2.png" alt="Logo" class="w-12 h-12 rounded-full shadow-lg border-4 border-[#ffc107]">
                    <div>
                        <h1 class="text-3xl font-extrabold tracking-tight">De Assaí Pro Mundo</h1>
                        <p class="text-sm text-gray-200 font-medium">Painel Administrativo</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 w-full sm:w-auto justify-between">
                    <span class="text-base font-semibold flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#ffc107]" fill="currentColor" viewBox="0 0 20 20"><path d="M10 10a4 4 0 100-8 4 4 0 000 8zm-7 8a7 7 0 1114 0H3z"/></svg>
                        {{ auth()->user()->name }}
                    </span>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="bg-[#ffc107] hover:bg-yellow-400 text-[#1e3a5f] font-bold px-4 py-2 rounded shadow transition">
                            Sair
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4">
            <ul class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-8 py-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}" 
                        class="flex items-center gap-2 py-2 px-3 rounded transition 
                        {{ request()->routeIs('admin.dashboard') ? 'bg-[#ffc107] text-[#1e3a5f] font-bold shadow' : 'text-gray-600 hover:bg-gray-100 hover:text-[#1e3a5f]' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6"></path></svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.posts.index') }}" 
                        class="flex items-center gap-2 py-2 px-3 rounded transition 
                        {{ request()->routeIs('admin.posts.*') ? 'bg-[#ffc107] text-[#1e3a5f] font-bold shadow' : 'text-gray-600 hover:bg-gray-100 hover:text-[#1e3a5f]' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 01-2-2V7a2 2 0 012-2h4l2-2h4a2 2 0 012 2v12a2 2 0 01-2 2z"></path></svg>
                        Notícias
                    </a>
                </li>
                <li>
                    <a href="/" target="_blank" class="flex items-center gap-2 py-2 px-3 rounded transition text-gray-600 hover:bg-gray-100 hover:text-[#1e3a5f]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 3h4a2 2 0 012 2v16a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h4"></path></svg>
                        Ver Site
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-10">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 shadow flex items-center gap-2">
                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"></path></svg>
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 shadow flex items-center gap-2">
                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"></path></svg>
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>

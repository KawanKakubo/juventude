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
    </style>
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-[#1e3a5f] text-white shadow-lg">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold">De Assaí Pro Mundo</h1>
                    <p class="text-sm text-gray-300">Painel Administrativo</p>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-sm">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded text-sm">
                            Sair
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4">
            <ul class="flex space-x-6">
                <li>
                    <a href="{{ route('admin.dashboard') }}" 
                        class="block py-4 px-2 border-b-2 {{ request()->routeIs('admin.dashboard') ? 'border-[#ffc107] text-[#1e3a5f]' : 'border-transparent text-gray-600 hover:text-[#1e3a5f]' }}">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.posts.index') }}" 
                        class="block py-4 px-2 border-b-2 {{ request()->routeIs('admin.posts.*') ? 'border-[#ffc107] text-[#1e3a5f]' : 'border-transparent text-gray-600 hover:text-[#1e3a5f]' }}">
                        Notícias
                    </a>
                </li>
                <li>
                    <a href="/" target="_blank" class="block py-4 px-2 border-b-2 border-transparent text-gray-600 hover:text-[#1e3a5f]">
                        Ver Site
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>

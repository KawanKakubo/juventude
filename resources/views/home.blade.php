<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio Assai Pro Mundo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Montserrat:wght@400;500;600;700;800;900&display=swap');

        * {
            scroll-behavior: smooth;
            font-family: 'Montserrat', 'Inter', -apple-system, system-ui, sans-serif;
        }

        /* ===== DESIGN SYSTEM COLORS ===== */
        :root {
            --primary-blue: #2563eb;
            --primary-blue-dark: #1d4ed8;
            --secondary-yellow: #ffc107;
            --secondary-yellow-dark: #f59e0b;
            --gradient-purple: #764ba2;
            --gradient-blue: #667eea;
        }

        /* ===== ANIMAÇÕES ===== */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .float-animation {
            animation: float 6s ease-in-out infinite;
        }

        .fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        /* ===== BOTÃO DE IDIOMA ATIVO ===== */
        .active-lang {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            color: white !important;
            font-weight: 700 !important;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4) !important;
        }

        /* ===== IMAGENS PRINCIPAIS ===== */
        #mainCityImage,
        #mainInstitutionImage {
            width: 100%;
            height: 100%;
            min-height: 480px;
            object-fit: cover;
            object-position: center;
            display: block;
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            transition: transform 0.5s ease;
        }

        #mainCityImage:hover,
        #mainInstitutionImage:hover {
            transform: scale(1.05);
        }

        img {
            display: block;
            vertical-align: middle;
        }

        /* ===== HERO SECTION ===== */
        #hero {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Desktop - imagem antiga do Unsplash com overlay */
        @media (min-width: 769px) {
            #hero {
                background-image: url('https://images.unsplash.com/photo-1436491865332-7a61a109cc05?q=80&w=2074');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

            #hero::before {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(135deg, rgba(102, 126, 234, 0.85) 0%, rgba(118, 75, 162, 0.75) 50%, rgba(20, 184, 166, 0.85) 100%);
                z-index: 1;
            }
        }

        /* ===== BOTÕES DE CIDADES E INSTITUIÇÕES ===== */
        .botao-cidade h4,
        .botao-instituicao h4,
        .instituicao-btn h4 {
            font-size: 0.95rem !important;
            line-height: 1.1 !important;
            font-weight: 700 !important;
            transition: all 0.3s ease;
        }

        .city-btn,
        .institution-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .city-btn::after,
        .institution-btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .city-btn:hover::after,
        .institution-btn:hover::after {
            left: 100%;
        }

        /* Estado ativo melhorado */
        .active-city {
            background: linear-gradient(135deg, #fef3c7 0%, #fde047 100%) !important;
            transform: translateX(-8px) scale(1.02);
            box-shadow: 0 8px 20px rgba(251, 191, 36, 0.3) !important;
        }

        .active-city::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 5px;
            background: linear-gradient(180deg, #fbbf24 0%, #f59e0b 100%);
            border-radius: 0 8px 8px 0;
            box-shadow: 0 0 15px rgba(251, 191, 36, 0.6);
        }

        .active-institution {
            background: linear-gradient(135deg, #fef3c7 0%, #fde047 100%) !important;
            transform: translateX(-8px) scale(1.02);
            box-shadow: 0 8px 20px rgba(251, 191, 36, 0.3) !important;
        }

        .active-institution::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 5px;
            background: linear-gradient(180deg, #fbbf24 0%, #f59e0b 100%);
            border-radius: 0 8px 8px 0;
            box-shadow: 0 0 15px rgba(251, 191, 36, 0.6);
        }

        /* Hover state para botões não ativos */
        .city-btn:not(.active-city):hover,
        .institution-btn:not(.active-institution):hover {
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            transform: translateX(-4px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Melhorias mobile */
        @media (max-width: 768px) {
            .botao-cidade h4 {
                font-size: 1rem !important;
                line-height: 1.2 !important;
            }

            /* Ajuste extra para o card do LabX em mobile */
            #mainInstitutionTitle[labx],
            .labx-title {
                font-size: 0.95rem !important;
            }

            #mainInstitutionDesc[labx],
            .labx-desc {
                font-size: 0.7rem !important;
            }

            /* Reduz textos sobrepostos nas imagens de cidades e instituições */
            #mainCityTitle,
            #mainInstitutionTitle {
                font-size: 1.1rem !important;
            }

            #mainCityDesc,
            #mainInstitutionDesc {
                font-size: 0.85rem !important;
            }

            #mainCityBadge,
            #mainInstitutionBadge {
                font-size: 0.7rem !important;
                padding: 0.15rem 0.5rem !important;
            }

            /* Ajusta padding do gradiente para não ocupar muito espaço */
            .p-4,
            .sm\:p-6,
            .md\:p-8 {
                padding: 0.7rem !important;
            }

            #mainCityImage,
            #mainInstitutionImage {
                height: 200px !important;
                min-height: 200px !important;
                width: 100% !important;
                object-fit: cover !important;
                object-position: center !important;
                border-radius: 1.5rem;
                box-shadow: 0 4px 24px 0 rgba(0, 0, 0, 0.10);
                background: #000;
                margin: 0 !important;
                padding: 0 !important;
                display: block;
            }

            /* Remove padding branco do card de instituição em mobile */
            .lg\:col-span-2.relative.rounded-2xl.overflow-hidden.shadow-xl.group.bg-white.mb-4.md\:mb-0 {
                padding-bottom: 0 !important;
                background: transparent !important;
            }

            .w-full.h-\[24rem\].sm\:h-\[30rem\].md\:h-\[38rem\] {
                height: 100% !important;
                min-height: 0 !important;
                background: #000 !important;
                padding-bottom: 0 !important;
                margin-bottom: 0 !important;
                display: block !important;
                border-radius: 1.5rem 1.5rem 0 0 !important;
            }

            /* Remove padding branco do card de instituição para desktop também */
            .lg\:col-span-2.relative.rounded-2xl.overflow-hidden.shadow-xl.group.bg-white.mb-4.md\:mb-0 {
                padding-bottom: 0 !important;
                background: transparent !important;
                margin-bottom: 0 !important;
            }

            /* Hero mobile - imagem nova (GUIA_Portugal) */
            #hero {
                min-height: 100vh !important;
                height: 100vh !important;
                width: 100vw !important;
                padding: 0 !important;
                margin: 0 !important;
                border-radius: 0 !important;
                box-shadow: none !important;
                background-image: url('{{ asset('images/GUIA_Portugal_Completo_Final.png') }}') !important;
                background-size: auto 100vh !important;
                background-position: center center !important;
                background-repeat: no-repeat !important;
                background-color: transparent !important;
            }

            /* Remove overlay no mobile */
            #hero::before {
                display: none !important;
            }

            .mobile-shadow {
                box-shadow: 0 2px 8px 0 rgba(0, 0, 0, 0.10);
            }

            .mobile-card {
                border-radius: 1.5rem;
                background: linear-gradient(135deg, #fff 60%, #f3f4f6 100%);
                box-shadow: 0 2px 16px 0 rgba(0, 0, 0, 0.08);
                margin-bottom: 1.5rem;
                padding: 1.2rem 1rem;
            }

            .mobile-title {
                font-size: 3.5rem !important;
            }

            .mobile-btn {
                font-size: 1.1rem;
                font-weight: 700;
                border-radius: 1.2rem;
                box-shadow: 0 2px 12px 0 rgba(248, 113, 113, 0.15);
                background: linear-gradient(90deg, #f87171 60%, #fbbf24 100%);
                border: none;
            }
        }

        @media (max-width: 480px) {

            h1,
            h2,
            h3,
            h4 {
                font-size: 1.2em !important;
            }

            .px-4 {
                padding-left: 0.5rem !important;
                padding-right: 0.5rem !important;
            }

            .py-4 {
                padding-top: 0.5rem !important;
                padding-bottom: 0.5rem !important;
            }

            .mobile-title {
                font-size: 2.2rem !important;
            }
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-50">

    <!-- Header -->
    <header class="fixed top-0 left-0 right-0 bg-[#1e3a5f] shadow-lg z-50">

        <!-- Main Navigation -->
        <nav class="px-4 py-3">
            <div class="container mx-auto flex items-center justify-between max-w-7xl">
                <div class="flex items-center gap-3">

                    <div class="flex items-center justify-center bg-white rounded-full shadow-lg h-20 w-20 border-4 border-[#ffc107]">
                        <img
                            src="{{ asset('images/logos/Brasao_Assai.png') }}"
                            alt="Desafio Assaí"
                            class="h-16 w-16 object-contain">
                    </div>
                    <span class="text-white font-bold text-base ml-3">Prefeitura Municipal de Assaí</span>
                </div>

                <ul class="hidden md:flex items-center space-x-6">
                    <li><a href="#locations" class="text-white hover:text-[#ffc107] font-medium transition uppercase text-sm">LOCAIS</a></li>
                    <li><a href="#participants" class="text-white hover:text-[#ffc107] font-medium transition uppercase text-sm">CARÔMETRO</a></li>
                </ul>

                <!-- Botão Tradutor -->
                <button data-key="btn_traduzir" id="btnTradutor" onclick="toggleTradutor()" class="hidden md:flex ml-2 px-3 py-1 bg-[#ffc107] text-gray-800 rounded font-semibold hover:bg-yellow-500 transition text-sm items-center gap-2" aria-label="Traduzir página">
                    <svg class="w-4 h-4 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                    </svg>
                    Traduzir
                </button>

                <!-- Mobile Menu Button -->
                <button class="md:hidden text-white focus:outline-none" onclick="toggleMenu()" aria-label="Abrir menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </nav>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-[#1e3a5f] border-t border-[#ffc107]">
            <div class="container mx-auto max-w-7xl">
                <ul class="flex flex-col space-y-2 px-4 py-4">
                    <li><a href="#locations" class="block py-2 text-white hover:text-[#ffc107] transition font-medium uppercase text-sm" data-tag>LOCAIS</a></li>
                    <li><a href="#participants" class="block py-2 text-white hover:text-[#ffc107] transition font-medium uppercase text-sm" data-tag>CARÔMETRO</a></li>
                    <li class="pt-2 border-t border-gray-600">
                        <button data-key="btn_traduzir" id="btnTradutorMobile" onclick="toggleTradutor()" class="w-full px-3 py-2 bg-[#ffc107] text-gray-800 rounded font-semibold hover:bg-yellow-500 transition text-sm flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                            </svg>
                            Traduzir
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Widget Tradutor -->
        <div id="tradutorWidget" class="hidden absolute left-1/2 -translate-x-1/2 mt-2 bg-white rounded shadow z-50 flex flex-row items-center gap-2 px-3 py-2" style="min-width:0;">
            <button data-key="btn_traduzir" onclick="toggleTradutor()" class="text-gray-300 hover:text-blue-500 text-base font-bold px-1 leading-none absolute -top-2 -right-2 bg-white rounded-full">&times;</button>
            <button id="btn-pt" onclick="setIdioma('pt')" data-lang="pt" class="lang-btn px-2 py-1 rounded bg-gray-100 hover:bg-blue-100 text-gray-700 text-xs font-semibold">Português (BR)</button>
            <button id="btn-pt_PT" onclick="setIdioma('pt_PT')" data-lang="pt_PT" class="lang-btn px-2 py-1 rounded bg-gray-100 hover:bg-blue-100 text-gray-700 text-xs font-semibold">Português (PT)</button>
            <button id="btn-en" onclick="setIdioma('en')" data-lang="en" class="lang-btn px-2 py-1 rounded bg-gray-100 hover:bg-blue-100 text-gray-700 text-xs font-semibold">Inglês</button>
            <button id="btn-es" onclick="setIdioma('es')" data-lang="es" class="lang-btn px-2 py-1 rounded bg-gray-100 hover:bg-blue-100 text-gray-700 text-xs font-semibold">Espanhol</button>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="hero">
        <!-- Logo visível apenas em desktop -->
        <div class="hidden md:flex container mx-auto max-w-4xl justify-center items-center relative z-10">
            <img src="{{ asset('images/logos/Logo_APM.png') }}"
                alt="Logo De Assaí Pro Mundo"
                class="w-96 lg:w-[500px] drop-shadow-2xl">
        </div>
    </section>

    <!-- Infográfico de Números -->
    <section class="py-12 sm:py-16 px-2 sm:px-4 bg-gradient-to-br from-[#1e3a5f] to-[#2d5a8f]">
        <div class="container mx-auto max-w-7xl">
            <h2 class="text-3xl sm:text-4xl font-bold text-center mb-12 text-white">
                A Jornada em <span class="text-[#ffc107]">Números</span>
            </h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 text-center hover:scale-105 transition-transform duration-300">
                    <div class="text-5xl md:text-6xl font-black text-[#ffc107] mb-2">6</div>
                    <div class="text-white font-semibold text-lg">Cidades</div>
                    <div class="text-white/80 text-sm mt-1">Visitadas</div>
                </div>

                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 text-center hover:scale-105 transition-transform duration-300">
                    <div class="text-5xl md:text-6xl font-black text-[#ffc107] mb-2">8</div>
                    <div class="text-white font-semibold text-lg">Instituições</div>
                    <div class="text-white/80 text-sm mt-1">de Inovação</div>
                </div>

                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 text-center hover:scale-105 transition-transform duration-300">
                    <div class="text-5xl md:text-6xl font-black text-[#ffc107] mb-2">5</div>
                    <div class="text-white font-semibold text-lg">Estudantes</div>
                    <div class="text-white/80 text-sm mt-1">Participantes</div>
                </div>

                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 text-center hover:scale-105 transition-transform duration-300">
                    <div class="text-5xl md:text-6xl font-black text-[#ffc107] mb-2">10</div>
                    <div class="text-white font-semibold text-lg">Dias</div>
                    <div class="text-white/80 text-sm mt-1">de Imersão</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Diário de Viagem -->
    @if($posts->count() > 0)
    <section id="diary" class="py-16 sm:py-20 px-2 sm:px-4 bg-white">
        <div class="container mx-auto max-w-7xl">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-center mb-4 text-gray-900 leading-tight">
                <span class="text-[#1e3a5f]">Diário de</span> <span class="text-[#ffc107]">Viagem</span>
            </h2>

            <p class="text-lg text-gray-600 text-center mb-12 max-w-3xl mx-auto">
                Acompanhe os momentos especiais da jornada dos nossos jovens em Portugal
            </p>

            <!-- Timeline de Notícias -->
            <div class="space-y-12">
                @foreach($posts as $index => $post)
                    <div class="flex flex-col md:flex-row gap-6 {{ $index % 2 == 0 ? '' : 'md:flex-row-reverse' }}">
                        <!-- Imagem -->
                        <div class="md:w-1/2">
                            <div class="relative rounded-2xl overflow-hidden shadow-xl group">
                                @if($post->cover_image)
                                    <img src="{{ asset('storage/' . $post->cover_image) }}" 
                                         alt="{{ $post->title }}" 
                                         class="w-full h-64 md:h-96 object-cover transition-transform duration-500 group-hover:scale-110">
                                @else
                                    <div class="w-full h-64 md:h-96 bg-gradient-to-br from-[#1e3a5f] to-[#2d5a8f] flex items-center justify-center">
                                        <span class="text-white text-xl">{{ $post->title }}</span>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                                
                                <!-- Badge de Data -->
                                <div class="absolute top-4 left-4">
                                    <div class="bg-[#ffc107] text-gray-800 px-4 py-2 rounded-full font-bold text-sm shadow-lg">
                                        📅 {{ $post->post_date->format('d/m/Y') }}
                                    </div>
                                </div>

                                <!-- Contador de Fotos -->
                                @if($post->photos->count() > 0)
                                    <div class="absolute bottom-4 right-4">
                                        <div class="bg-white/90 backdrop-blur-sm text-gray-800 px-3 py-2 rounded-full font-semibold text-sm shadow-lg flex items-center gap-2">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $post->photos->count() }} fotos
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Conteúdo -->
                        <div class="md:w-1/2 flex flex-col justify-center">
                            <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl p-6 md:p-8 shadow-lg">
                                <h3 class="text-2xl md:text-3xl font-bold text-[#1e3a5f] mb-4">
                                    {{ $post->title }}
                                </h3>
                                <p class="text-gray-700 text-base md:text-lg leading-relaxed mb-6">
                                    {{ $post->description }}
                                </p>

                                <!-- Galeria de Miniaturas -->
                                @if($post->photos->count() > 0)
                                    <div class="mb-4">
                                        <p class="text-sm font-semibold text-gray-600 mb-3">Galeria de Fotos:</p>
                                        <div class="grid grid-cols-4 gap-2">
                                            @foreach($post->photos->take(4) as $photo)
                                                <button onclick="openGalleryModal({{ $post->id }})" 
                                                        class="aspect-square rounded-lg overflow-hidden hover:ring-4 ring-[#ffc107] transition">
                                                    <img src="{{ asset('storage/' . $photo->image_path) }}" 
                                                         alt="Foto {{ $loop->iteration }}" 
                                                         class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                                                </button>
                                            @endforeach
                                        </div>
                                        @if($post->photos->count() > 4)
                                            <button onclick="openGalleryModal({{ $post->id }})" 
                                                    class="mt-3 text-[#1e3a5f] hover:text-[#ffc107] font-semibold text-sm transition">
                                                + Ver todas as {{ $post->photos->count() }} fotos
                                            </button>
                                        @endif
                                    </div>
                                @endif

                                <button onclick="openGalleryModal({{ $post->id }})" 
                                        class="bg-gradient-to-r from-[#1e3a5f] to-[#2d5a8f] hover:from-[#2d5a8f] hover:to-[#1e3a5f] text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl">
                                    Ver Galeria Completa →
                                </button>
                            </div>
                        </div>
                    </div>

                    @if(!$loop->last)
                        <div class="flex justify-center">
                            <div class="w-1 h-12 bg-gradient-to-b from-[#1e3a5f] to-[#ffc107] rounded-full"></div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- Modal para Galeria de Fotos -->
    <div id="galleryModal" class="hidden fixed inset-0 bg-black/90 z-50 flex items-center justify-center p-4" onclick="closeGalleryModal()">
        <div class="relative max-w-6xl w-full" onclick="event.stopPropagation()">
            <button onclick="closeGalleryModal()" class="absolute -top-12 right-0 text-white hover:text-[#ffc107] text-4xl font-bold transition">
                &times;
            </button>
            
            <div id="modalContent" class="bg-white rounded-2xl p-6 max-h-[90vh] overflow-y-auto">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </div>
    @endif

    <!-- Informações sobre os Locais -->
    <section id="locations" class="py-16 sm:py-20 px-2 sm:px-4 bg-white">
        <div class="container mx-auto max-w-7xl">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-center mb-4 text-gray-900 leading-tight">
                <span class="text-[#1e3a5f]">Informações sobre os</span> <span class="text-[#ffc107]">Locais</span>
            </h2>

            <p class="text-lg text-gray-600 text-center mb-12 max-w-3xl mx-auto">
                Conheça as cidades portuguesas visitadas e as instituições de inovação que nos receberam
            </p>

            <!-- Grid de Locais com Instituições -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

                <!-- Porto -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="h-48 bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center relative overflow-hidden">
                        <img src="{{ asset('images/cidades/Porto.png') }}" alt="Porto" class="w-full h-full object-cover absolute inset-0">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <h3 class="text-2xl font-bold text-white z-10 absolute bottom-4 left-4">🏛️ Porto</h3>
                    </div>
                    <div class="p-5">
                        <p class="text-sm text-gray-600 mb-3 italic">Cidade histórica e portuária</p>
                        <div class="space-y-2">
                            <div class="flex items-start gap-2">
                                <span class="text-[#ffc107] mt-1">📍</span>
                                <p class="text-sm text-gray-700 font-medium">Porto Innovation Hub</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Aveiro -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="h-48 bg-gradient-to-br from-teal-500 to-teal-700 flex items-center justify-center relative overflow-hidden">
                        <img src="{{ asset('images/cidades/Aveiro.png') }}" alt="Aveiro" class="w-full h-full object-cover absolute inset-0">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <h3 class="text-2xl font-bold text-white z-10 absolute bottom-4 left-4">🚣 Aveiro</h3>
                    </div>
                    <div class="p-5">
                        <p class="text-sm text-gray-600 mb-3 italic">A Veneza de Portugal</p>
                        <div class="space-y-2">
                            <div class="flex items-start gap-2">
                                <span class="text-[#ffc107] mt-1">📍</span>
                                <p class="text-sm text-gray-700 font-medium">PCI de Aveiro, Ílhavo</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Lisboa -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="h-48 bg-gradient-to-br from-yellow-500 to-orange-600 flex items-center justify-center relative overflow-hidden">
                        <img src="{{ asset('images/cidades/Lisboa.png') }}" alt="Lisboa" class="w-full h-full object-cover absolute inset-0">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <h3 class="text-2xl font-bold text-white z-10 absolute bottom-4 left-4">🌆 Lisboa</h3>
                    </div>
                    <div class="p-5">
                        <p class="text-sm text-gray-600 mb-3 italic">A capital vibrante de Portugal</p>
                        <div class="space-y-2">
                            <div class="flex items-start gap-2">
                                <span class="text-[#ffc107] mt-1">📍</span>
                                <p class="text-sm text-gray-700 font-medium">ART - LabX</p>
                            </div>
                            <div class="flex items-start gap-2">
                                <span class="text-[#ffc107] mt-1">📍</span>
                                <p class="text-sm text-gray-700 font-medium">Câmara Municipal de Lisboa</p>
                            </div>
                            <div class="flex items-start gap-2">
                                <span class="text-[#ffc107] mt-1">📍</span>
                                <p class="text-sm text-gray-700 font-medium">Ciência Viva</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Beato -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="h-48 bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center relative overflow-hidden">
                        <img src="{{ asset('images/cidades/Beato.png') }}" alt="Beato" class="w-full h-full object-cover absolute inset-0">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <h3 class="text-2xl font-bold text-white z-10 absolute bottom-4 left-4">🚀 Beato</h3>
                    </div>
                    <div class="p-5">
                        <p class="text-sm text-gray-600 mb-3 italic">Bairro inovador e tecnológico</p>
                        <div class="space-y-2">
                            <div class="flex items-start gap-2">
                                <span class="text-[#ffc107] mt-1">📍</span>
                                <p class="text-sm text-gray-700 font-medium">Hub de Inovação de Beato</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Oeiras -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="h-48 bg-gradient-to-br from-green-500 to-green-700 flex items-center justify-center relative overflow-hidden">
                        <img src="{{ asset('images/cidades/Oeiras.png') }}" alt="Oeiras" class="w-full h-full object-cover absolute inset-0">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <h3 class="text-2xl font-bold text-white z-10 absolute bottom-4 left-4">🔬 Oeiras</h3>
                    </div>
                    <div class="p-5">
                        <p class="text-sm text-gray-600 mb-3 italic">Polo de inovação e qualidade de vida</p>
                        <div class="space-y-2">
                            <div class="flex items-start gap-2">
                                <span class="text-[#ffc107] mt-1">📍</span>
                                <p class="text-sm text-gray-700 font-medium">Taguspark</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cascais -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="h-48 bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center relative overflow-hidden">
                        <img src="{{ asset('images/cidades/Cascais.png') }}" alt="Cascais" class="w-full h-full object-cover absolute inset-0">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <h3 class="text-2xl font-bold text-white z-10 absolute bottom-4 left-4">🏖️ Cascais</h3>
                    </div>
                    <div class="p-5">
                        <p class="text-sm text-gray-600 mb-3 italic">Destino turístico sofisticado</p>
                        <div class="space-y-2">
                            <div class="flex items-start gap-2">
                                <span class="text-[#ffc107] mt-1">📍</span>
                                <p class="text-sm text-gray-700 font-medium">Câmara Municipal de Cascais</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Carômetro -->
    <section id="participants" class="py-16 sm:py-20 px-2 sm:px-4 bg-gradient-to-br from-gray-50 via-white to-gray-50">
        <div class="container mx-auto max-w-7xl">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-center mb-6 text-gray-900 leading-tight">
                <span class="text-[#1e3a5f]">Nosso</span> <span class="text-[#ffc107]">Carômetro</span>
            </h2>

            <p class="text-lg text-gray-600 text-center mb-12 max-w-2xl mx-auto">
                Conheça os estudantes protagonistas desta jornada transformadora
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">

                <!-- Kawã Leite -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="p-6">
                        <p class="text-xs font-semibold text-blue-600 uppercase mb-2">CEEP Maria Lydia Cescato Bomtempo</p>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Kawã Leite</h3>
                        <div class="mb-4">
                            <img src="{{ asset('images/alunos/Kawa.png') }}" alt="Kawã Daniel da Silva Leite" class="w-full h-56 object-contain rounded-lg bg-gray-50">
                        </div>
                        <a href="https://www.youtube.com/watch?v=bo4p8751uLA" target="_blank" class="block w-full text-center px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">Ver Vídeo</a>
                    </div>
                </div>

                <!-- Ana Julia Oliveira -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="p-6">
                        <p class="text-xs font-semibold text-blue-600 uppercase mb-2">Colégio Estadual Conselheiro Carrão</p>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Ana Julia Oliveira</h3>
                        <div class="mb-4">
                            <img src="{{ asset('images/alunos/Ana.png') }}" alt="Ana Julia" class="w-full h-56 object-contain rounded-lg bg-gray-50">
                        </div>
                        <a href="https://www.youtube.com/watch?v=r-DTmGSEfvo" target="_blank" class="block w-full text-center px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">Ver Vídeo</a>
                    </div>
                </div>

                <!-- Lívia Vargas -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="p-6">
                        <p class="text-xs font-semibold text-blue-600 uppercase mb-2">Colégio Estadual Conselheiro Carrão</p>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Lívia Vargas</h3>
                        <div class="mb-4">
                            <img src="{{ asset('images/alunos/Livia.png') }}" alt="Lívia Vargas" class="w-full h-56 object-contain rounded-lg bg-gray-50">
                        </div>
                        <a href="https://www.youtube.com/watch?v=QzkFhk-_Kwc" target="_blank" class="block w-full text-center px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">Ver Vídeo</a>
                    </div>
                </div>

                <!-- Carlos Figueiredo -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="p-6">
                        <p class="text-xs font-semibold text-blue-600 uppercase mb-2">Colégio Estadual Barão do Rio Branco</p>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Carlos Figueiredo</h3>
                        <div class="mb-4">
                            <img src="{{ asset('images/alunos/Carlos.png') }}" alt="Carlos Eduardo" class="w-full h-56 object-contain rounded-lg bg-gray-50">
                        </div>
                        <a href="https://www.youtube.com/watch?v=vjk2pCgsuIc" target="_blank" class="block w-full text-center px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">Ver Vídeo</a>
                    </div>
                </div>

                <!-- Luiz Guilherme -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="p-6">
                        <p class="text-xs font-semibold text-blue-600 uppercase mb-2">Escola Estadual Prof. Walerian Wrosz</p>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Luiz Guilherme</h3>
                        <div class="mb-4">
                            <img src="{{ asset('images/alunos/Luiz.png') }}" alt="Luiz Guilherme" class="w-full h-56 object-contain rounded-lg bg-gray-50">
                        </div>
                        <a href="https://www.youtube.com/watch?v=iM5ydP574hY" target="_blank" class="block w-full text-center px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">Ver Vídeo</a>
                    </div>
                </div>
    </section>



    <!-- Footer -->

    <!-- Powered by -->
    <div class="w-full flex justify-center items-center py-4 bg-transparent">
        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-gray-200 shadow text-base font-normal">
            <span class="text-gray-400">Powered by</span>
            <img src="{{ asset('images/logos/Logo_VDS.png') }}" alt="Vale do Sol" class="h-12 w-auto ml-1" style="display:inline;vertical-align:middle;">
        </span>
    </div>

    <footer class="bg-[#1e3a5f] text-white py-8 px-2 sm:px-4 mobile-card">
        <div class="container mx-auto max-w-7xl text-center">
            <p data-key="footer_p">&copy; 2025 Desafio Assai Pro Mundo. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script>


        function toggleMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        function untoggleMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.add('hidden');
        }

        document.querySelectorAll('[data-tag]').forEach(el => {
            el.addEventListener('click', untoggleMenu);
        });



        // Tradutor customizado
        function toggleTradutor() {
            const tradutor = document.getElementById('tradutorWidget');
            tradutor.classList.toggle('hidden');
        }

        function setIdioma(idioma) {
            const dicionario = traducoes[idioma];
            if (!dicionario) return; // Idioma não encontrado

            // Loop por todos os elementos que têm a 'data-key'
            document.querySelectorAll('[data-key]').forEach(element => {
                const key = element.dataset.key;
                const traducao = dicionario[key];

                if (traducao) {
                    // Usamos innerHTML para permitir tags como <strong>
                    element.innerHTML = traducao;
                }
            });

            // Atualiza o estilo do botão ativo
            document.querySelectorAll('.lang-btn').forEach(btn => {
                btn.classList.remove('active-lang');
                if (btn.dataset.lang === idioma) {
                    btn.classList.add('active-lang');
                }
            });

            // Esconde o widget após selecionar
            toggleTradutor();
        }



        const traducoes = {
            'pt': {
                'header_title': 'De Assaí Pro Mundo',
                'nav_desafio': 'DESAFIO',
                'nav_cidades': 'CIDADES',
                'nav_instituicoes': 'INSTITUIÇÕES',
                'nav_participantes': 'PARTICIPANTES',
                'btn_traduzir': 'Traduzir',
                'nav_desafio_m': 'DESAFIO',
                'nav_cidades_m': 'CIDADES',
                'nav_instituicoes_m': 'INSTITUIÇÕES',
                'nav_participantes_m': 'PARTICIPANTES',
                'btn_traduzir_m': 'Traduzir',
                'hero_badge': '🌟 Uma Jornada Global',
                'hero_p': 'Inovação em Portugal: Uma Jornada para Transformar o Futuro.',
                'hero_btn': 'Saiba Mais',
                'about_title_1': 'O que é o',
                'about_title_2': 'Desafio?',
                'about_p1': 'O Programa “De Assaí pro Mundo” transforma a Jornada dos Desafios ODS em oportunidades práticas, incentivando jovens a desenvolver soluções alinhadas aos Objetivos de Desenvolvimento Sustentável e promovendo a internacionalização dessas iniciativas.',
                'about_p2': 'Com projeção internacional ampliada, o programa seleciona estudantes para uma missão técnica em Portugal , uma imersão formativa em centros de inovação , para formar cidadãos globais capazes de aplicar o conhecimento e transformar a realidade local.',
                'about_item1_h': 'Missão Técnica',
                'about_item1_p': 'Uma jornada de aprendizado e inovação em Portugal.',
                'about_item2_h': 'Foco em Inovação',
                'about_item2_p': 'Imersão em centros de tecnologia e hubs de inovação.',
                'about_item3_h': 'Impacto Local',
                'about_item3_p': 'Aplicar o conhecimento global para transformar Assaí.',
                'loc_title_1': 'Cidades',
                'loc_title_2': ' Visitadas',
                'loc_title_3': 'Instituições',
                'loc_p': 'Uma viagem imersiva por Portugal, onde cada região se destaca por seus desafios, patrimônios e narrativas que enriquecem a trajetória nacional.',
                'loc_destaques': '<strong>Destaques:</strong>',
                'inst_title_1': 'Instituições',
                'inst_title_2': ' Visitadas',
                'inst_p': 'Uma viagem imersiva por Portugal, onde cada instituição se destaca por seus desafios, patrimônios e narrativas que enriquecem a trajetória nacional.',
                'inst_destaques': '<strong>Destaques:</strong>',
                'part_title_1': 'Nossos',
                'part_title_2': ' Participantes',
                'part_p': 'Conheça as pessoas extraordinárias que estão levando este desafio ao próximo nível',
                'part_card_p': 'Conheça a jornada e os desafios enfrentados durante esta experiência única.',
                'part_card_btn': 'Ver Vídeo Completo',
                'footer_p': '© 2025 Desafio Assai Pro Mundo. Todos os direitos reservados.'
            },
            'pt_PT': {
                'header_title': 'De Assaí Para o Mundo',
                'nav_desafio': 'DESAFIO',
                'nav_cidades': 'CIDADES',
                'nav_instituicoes': 'INSTITUIÇÕES',
                'nav_participantes': 'PARTICIPANTES',
                'btn_traduzir': 'Traduzir',
                'nav_desafio_m': 'DESAFIO',
                'nav_cidades_m': 'CIDADES',
                'nav_instituicoes_m': 'INSTITUIÇÕES',
                'nav_participantes_m': 'PARTICIPANTES',
                'btn_traduzir_m': 'Traduzir',
                'hero_badge': '🌟 Uma Jornada Global',
                'hero_p': 'Inovação em Portugal: Uma Jornada para Transformar o Futuro.',
                'hero_btn': 'Saiba Mais',
                'about_title_1': 'O que é o',
                'about_title_2': 'Desafio?',
                'about_p1': 'O Programa “De Assaí Para o Mundo” transforma a Jornada dos Desafios ODS em oportunidades práticas, incentivando jovens a desenvolver soluções alinhadas aos Objetivos de Desenvolvimento Sustentável e promovendo a internacionalização dessas iniciativas.',
                'about_p2': 'Com projeção internacional ampliada, o programa seleciona estudantes para uma missão técnica em Portugal, uma imersão formativa em centros de inovação, para formar cidadãos globais capazes de aplicar o conhecimento e transformar a realidade local.',
                'about_item1_h': 'Missão Técnica',
                'about_item1_p': 'Uma jornada de aprendizagem e inovação em Portugal.',
                'about_item2_h': 'Foco em Inovação',
                'about_item2_p': 'Imersão em centros de tecnologia e hubs de inovação.',
                'about_item3_h': 'Impacto Local',
                'about_item3_p': 'Aplicar o conhecimento global para transformar Assaí.',
                'loc_title_1': 'Cidades',
                'loc_title_2': ' Visitadas',
                'loc_title_3': 'Instituições',
                'loc_p': 'Uma viagem imersiva por Portugal, onde cada região se destaca pelos seus desafios, patrimónios e narrativas que enriquecem a trajetória nacional.',
                'loc_destaques': '<strong>Destaques:</strong>',
                'inst_title_1': 'Instituições',
                'inst_title_2': ' Visitadas',
                'inst_p': 'Uma viagem imersiva por Portugal, onde cada instituição se destaca pelos seus desafios, patrimónios e narrativas que enriquecem a trajetória nacional.',
                'inst_destaques': '<strong>Destaques:</strong>',
                'part_title_1': 'Nossos',
                'part_title_2': ' Participantes',
                'part_p': 'Conheça as pessoas extraordinárias que estão a levar este desafio ao próximo nível',
                'part_card_p': 'Conheça a jornada e os desafios enfrentados durante esta experiência única.',
                'part_card_btn': 'Ver Vídeo Completo',
                'footer_p': '© 2025 Desafio Assai Para o Mundo. Todos os direitos reservados.'
            },
            'en': {
                'header_title': 'From Assaí to the World',
                'nav_desafio': 'CHALLENGE',
                'nav_cidades': 'CITIES',
                'nav_instituicoes': 'INSTITUTIONS',
                'nav_participantes': 'PARTICIPANTS',
                'btn_traduzir': 'Translate',
                'nav_desafio_m': 'CHALLENGE',
                'nav_cidades_m': 'CITIES',
                'nav_instituicoes_m': 'INSTITUTIONS',
                'nav_participantes_m': 'PARTICIPANTS',
                'btn_traduzir_m': 'Translate',
                'hero_badge': '🌟 A Global Journey',
                'hero_p': 'Innovation in Portugal: A Journey to Transform the Future.',
                'hero_btn': 'Learn More',
                'about_title_1': 'What is the',
                'about_title_2': 'Challenge?',
                'about_p1': 'The "From Assaí to the World" Program transforms the SDG Challenges Journey into practical opportunities, encouraging youth to develop solutions aligned with the Sustainable Development Goals and promoting the internationalization of these initiatives.',
                'about_p2': 'With expanded international projection, the program selects students for a technical mission to Portugal, a formative immersion in innovation centers, to train global citizens capable of applying knowledge and transforming local reality.',
                'about_item1_h': 'Technical Mission',
                'about_item1_p': 'A journey of learning and innovation in Portugal.',
                'about_item2_h': 'Focus on Innovation',
                'about_item2_p': 'Immersion in technology centers and innovation hubs.',
                'about_item3_h': 'Local Impact',
                'about_item3_p': 'Apply global knowledge to transform Assaí.',
                'loc_title_1': 'Visited',
                'loc_title_2': ' Cities',
                'loc_title_3': ' Institutions',
                'loc_p': 'An immersive journey through Portugal, where each region stands out for its challenges, heritage, and narratives that enrich the national trajectory.',
                'loc_destaques': '<strong>Highlights:</strong>',
                'inst_title_1': 'Visited',
                'inst_title_2': ' Institutions',
                'inst_p': 'An immersive journey through Portugal, where each institution stands out for its challenges, heritage, and narratives that enrich the national trajectory.',
                'inst_destaques': '<strong>Highlights:</strong>',
                'part_title_1': 'Our',
                'part_title_2': ' Participants',
                'part_p': 'Meet the extraordinary people who are taking this challenge to the next level.',
                'part_card_p': 'Learn about the journey and challenges faced during this unique experience.',
                'part_card_btn': 'Watch Full Video',
                'footer_p': '© 2025 Assaí Pro Mundo Challenge. All rights reserved.'
            },
            'es': {
                'header_title': 'De Assaí para el Mundo',
                'nav_desafio': 'DESAFÍO',
                'nav_cidades': 'CIUDADES',
                'nav_instituicoes': 'INSTITUCIONES',
                'nav_participantes': 'PARTICIPANTES',
                'btn_traduzir': 'Traducir',
                'nav_desafio_m': 'DESAFÍO',
                'nav_cidades_m': 'CIUDADES',
                'nav_instituicoes_m': 'INSTITUCIONES',
                'nav_participantes_m': 'PARTICIPANTES',
                'btn_traduzir_m': 'Traducir',
                'hero_badge': '🌟 Una Jornada Global',
                'hero_p': 'Innovación en Portugal: Un Viaje para Transformar el Futuro.',
                'hero_btn': 'Saber Más',
                'about_title_1': '¿Qué es el',
                'about_title_2': 'Desafío?',
                'about_p1': 'El Programa “De Assaí para el Mundo” transforma la Jornada de los Desafíos ODS en oportunidades prácticas, incentivando a los jóvenes a desarrollar soluciones alineadas con los Objetivos de Desarrollo Sostenible y promoviendo la internacionalización de estas iniciativas.',
                'about_p2': 'Con una proyección internacional ampliada, el programa selecciona estudiantes para una misión técnica en Portugal, una inmersión formativa en centros de innovación, para formar ciudadanos globales capaces de aplicar el conocimiento y transformar la realidad local.',
                'about_item1_h': 'Misión Técnica',
                'about_item1_p': 'Un viaje de aprendizaje e innovación en Portugal.',
                'about_item2_h': 'Enfoque en Innovación',
                'about_item2_p': 'Inmersión en centros de tecnología y hubs de innovación.',
                'about_item3_h': 'Impacto Local',
                'about_item3_p': 'Aplicar el conocimiento global para transformar Assaí.',
                'loc_title_1': 'Ciudades',
                'loc_title_2': ' Visitadas',
                'loc_title_3': 'Instituciones',
                'loc_p': 'Un viaje inmersivo por Portugal, donde cada región destaca por sus desafíos, patrimonios y narrativas que enriquecen la trayectoria nacional.',
                'loc_destaques': '<strong>Destacados:</strong>',
                'inst_title_1': 'Instituciones',
                'inst_title_2': ' Visitadas',
                'inst_p': 'Un viaje inmersivo por Portugal, donde cada institución destaca por sus desafíos, patrimonios y narrativas que enriquecen la trayectoria nacional.',
                'inst_destaques': '<strong>Destacados:</strong>',
                'part_title_1': 'Nuestros',
                'part_title_2': ' Participantes',
                'part_p': 'Conoce a las personas extraordinarias que están llevando este desafío al siguiente nivel.',
                'part_card_p': 'Conoce la jornada y los desafíos enfrentados durante esta experiencia única.',
                'part_card_btn': 'Ver Video Completo',
                'footer_p': '© 2025 Desafío Assai Pro Mundo. Todos los derechos reservados.'
            }
        };

        // Gallery Modal Functions
        const postsData = @json($posts);

        function openGalleryModal(postId) {
            const post = postsData.find(p => p.id === postId);
            if (!post) return;

            const modal = document.getElementById('galleryModal');
            const content = document.getElementById('modalContent');

            let photosHTML = '';
            if (post.photos && post.photos.length > 0) {
                photosHTML = '<div class="grid grid-cols-1 md:grid-cols-2 gap-4">';
                post.photos.forEach((photo, index) => {
                    photosHTML += `
                        <div class="relative group">
                            <img src="/storage/${photo.image_path}" 
                                 alt="Foto ${index + 1}" 
                                 class="w-full h-64 object-cover rounded-lg shadow-lg">
                            ${photo.caption ? `<p class="text-sm text-gray-600 mt-2">${photo.caption}</p>` : ''}
                        </div>
                    `;
                });
                photosHTML += '</div>';
            } else {
                photosHTML = '<p class="text-gray-500 text-center py-8">Nenhuma foto disponível</p>';
            }

            content.innerHTML = `
                <div class="mb-6">
                    <h2 class="text-3xl font-bold text-[#1e3a5f] mb-2">${post.title}</h2>
                    <p class="text-gray-600">${post.post_date_formatted}</p>
                </div>
                <div class="mb-6">
                    <p class="text-gray-700 text-lg">${post.description}</p>
                </div>
                ${photosHTML}
            `;

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeGalleryModal() {
            const modal = document.getElementById('galleryModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeGalleryModal();
            }
        });
    </script>

</body>

</html>

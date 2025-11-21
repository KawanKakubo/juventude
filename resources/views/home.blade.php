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

        /* ===== CORES & VARIÁVEIS ===== */
        :root {
            --primary-blue: #1e3a5f;
            --secondary-yellow: #ffc107;
        }

        /* ===== ANIMAÇÕES ===== */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }
        .float-animation { animation: float 6s ease-in-out infinite; }

        /* ===== BOTÃO DE IDIOMA ATIVO ===== */
        .active-lang {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            color: white !important;
            font-weight: 700 !important;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4) !important;
        }

        /* ===== HERO SECTION ===== */
        #hero {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #1e3a5f; /* Fallback */
        }

        /* Desktop Background */
        @media (min-width: 769px) {
            #hero {
                background-image: url('{{ asset('images/bg-desktop.jpg') }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }
        }

        /* Mobile Background & Adjustments */
        @media (max-width: 768px) {
            #hero {
                min-height: 100vh !important;
                background-image: url('{{ asset('images/GUIA_Portugal_Completo_Final.png') }}') !important;
                background-size: auto 100vh !important;
                background-position: center center !important;
                background-repeat: no-repeat !important;
            }
            .mobile-card {
                border-radius: 1.5rem;
                background: linear-gradient(135deg, #fff 60%, #f3f4f6 100%);
                padding: 1.2rem 1rem;
            }
        }

        /* ===== TIMELINE / DIÁRIO DE VIAGEM ===== */
        .timeline-line {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            top: 3rem;
            bottom: 3rem;
            width: 4px;
            border-radius: 999px;
            background: linear-gradient(180deg, rgba(30, 58, 95, 0.95), rgba(118, 75, 162, 0.95), rgba(255, 193, 7, 0.95));
            box-shadow: 0 6px 30px rgba(30, 58, 95, 0.12);
        }

        .timeline-badge {
            background: linear-gradient(90deg, #1e3a5f 0%, #2d5a8f 60%, #ffc107 100%);
            color: #fff;
            font-weight: 700;
            padding: 0.25rem 0.9rem;
            border-radius: 999px;
            box-shadow: 0 8px 30px rgba(30, 58, 95, 0.14);
            border: 1px solid rgba(255,255,255,0.12);
        }

        .timeline-connector {
            width: 2px;
            height: 1.5rem;
            background: linear-gradient(180deg, rgba(118,75,162,0.9), rgba(255,193,7,0.9));
            margin: 0 auto;
        }

        .timeline-card-left {
            background: linear-gradient(180deg, rgba(245,248,255,0.95), rgba(255,255,255,0.9));
            border-left: 6px solid #1e3a5f;
        }
        .timeline-card-right {
            background: linear-gradient(180deg, rgba(255,253,240,0.95), rgba(255,255,255,0.9));
            border-right: 6px solid #ffc107;
        }

        .timeline-card-left:hover, .timeline-card-right:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 50px rgba(30, 58, 95, 0.12);
        }

        @media (max-width: 767px) {
            .timeline-line, .timeline-badge, .timeline-connector { display: none; }
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-50">

    <header class="fixed top-0 left-0 right-0 bg-[#1e3a5f] shadow-lg z-50">
        <nav class="px-4 py-3">
            <div class="container mx-auto flex items-center justify-between max-w-7xl">
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center bg-white rounded-full shadow-lg h-16 w-16 md:h-20 md:w-20 border-4 border-[#ffc107]">
                        <img src="{{ asset('images/logos/Brasao_Assai.png') }}" alt="Desafio Assaí" class="h-10 w-10 md:h-16 md:w-16 object-contain">
                    </div>
                    <span class="text-white font-bold text-sm md:text-base ml-2" data-key="header_title">Prefeitura Municipal de Assaí</span>
                </div>

                <ul class="hidden md:flex items-center space-x-6">
                    <li><a href="#locations" class="text-white hover:text-[#ffc107] font-medium transition uppercase text-sm" data-key="nav_cidades">LOCAIS</a></li>
                    <li><a href="#participants" class="text-white hover:text-[#ffc107] font-medium transition uppercase text-sm" data-key="nav_participantes">CARÔMETRO</a></li>
                </ul>

                <button data-key="btn_traduzir" id="btnTradutor" onclick="toggleTradutor()" class="hidden md:flex ml-2 px-3 py-1 bg-[#ffc107] text-gray-800 rounded font-semibold hover:bg-yellow-500 transition text-sm items-center gap-2">
                    <svg class="w-4 h-4 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path></svg>
                    Traduzir
                </button>

                <button class="md:hidden text-white focus:outline-none" onclick="toggleMenu()" aria-label="Abrir menu">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </nav>

        <div id="mobileMenu" class="hidden md:hidden bg-[#1e3a5f] border-t border-[#ffc107]">
            <div class="container mx-auto max-w-7xl">
                <ul class="flex flex-col space-y-2 px-4 py-4">
                    <li><a href="#locations" class="block py-2 text-white hover:text-[#ffc107] transition font-medium uppercase text-sm" data-tag data-key="nav_cidades_m">LOCAIS</a></li>
                    <li><a href="#participants" class="block py-2 text-white hover:text-[#ffc107] transition font-medium uppercase text-sm" data-tag data-key="nav_participantes_m">CARÔMETRO</a></li>
                    <li class="pt-2 border-t border-gray-600">
                        <button data-key="btn_traduzir" onclick="toggleTradutor()" class="w-full px-3 py-2 bg-[#ffc107] text-gray-800 rounded font-semibold hover:bg-yellow-500 transition text-sm flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path></svg>
                            Traduzir
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <div id="tradutorWidget" class="hidden absolute left-1/2 -translate-x-1/2 mt-2 bg-white rounded shadow-xl z-50 flex flex-row items-center gap-2 px-3 py-2 border border-gray-200" style="min-width:0;">
            <button onclick="toggleTradutor()" class="text-gray-400 hover:text-red-500 text-lg font-bold px-1 absolute -top-2 -right-2 bg-white rounded-full shadow border">&times;</button>
            <button onclick="setIdioma('pt')" data-lang="pt" class="lang-btn px-2 py-1 rounded bg-gray-100 hover:bg-blue-100 text-gray-700 text-xs font-bold active-lang">PT-BR</button>
            <button onclick="setIdioma('pt_PT')" data-lang="pt_PT" class="lang-btn px-2 py-1 rounded bg-gray-100 hover:bg-blue-100 text-gray-700 text-xs font-bold">PT-PT</button>
            <button onclick="setIdioma('en')" data-lang="en" class="lang-btn px-2 py-1 rounded bg-gray-100 hover:bg-blue-100 text-gray-700 text-xs font-bold">EN</button>
            <button onclick="setIdioma('es')" data-lang="es" class="lang-btn px-2 py-1 rounded bg-gray-100 hover:bg-blue-100 text-gray-700 text-xs font-bold">ES</button>
        </div>
    </header>

    <section id="hero">
        <div class="hidden md:flex container mx-auto max-w-4xl justify-center items-center relative z-10">
            </div>
    </section>

    <section class="py-12 sm:py-16 px-2 sm:px-4 bg-gradient-to-br from-[#1e3a5f] to-[#2d5a8f]">
        <div class="container mx-auto max-w-7xl">
            <h2 class="text-3xl sm:text-4xl font-bold text-center mb-12 text-white">
                <span data-key="numbers_title">A Jornada em</span> <span class="text-[#ffc107]" data-key="numbers_highlight">Números</span>
            </h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 text-center hover:scale-105 transition-transform duration-300">
                    <div class="text-5xl md:text-6xl font-black text-[#ffc107] mb-2">6</div>
                    <div class="text-white font-semibold text-lg" data-key="num_cities">Cidades</div>
                    <div class="text-white/80 text-sm mt-1" data-key="num_visited">Visitadas</div>
                </div>
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 text-center hover:scale-105 transition-transform duration-300">
                    <div class="text-5xl md:text-6xl font-black text-[#ffc107] mb-2">8</div>
                    <div class="text-white font-semibold text-lg" data-key="num_institutions">Instituições</div>
                    <div class="text-white/80 text-sm mt-1" data-key="num_innovation">de Inovação</div>
                </div>
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 text-center hover:scale-105 transition-transform duration-300">
                    <div class="text-5xl md:text-6xl font-black text-[#ffc107] mb-2">5</div>
                    <div class="text-white font-semibold text-lg" data-key="num_students">Estudantes</div>
                    <div class="text-white/80 text-sm mt-1" data-key="num_participants">Participantes</div>
                </div>
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 text-center hover:scale-105 transition-transform duration-300">
                    <div class="text-5xl md:text-6xl font-black text-[#ffc107] mb-2">10</div>
                    <div class="text-white font-semibold text-lg" data-key="num_days">Dias</div>
                    <div class="text-white/80 text-sm mt-1" data-key="num_immersion">de Imersão</div>
                </div>
            </div>
        </div>
    </section>

    @if($posts->count() > 0)
    <section id="diary" class="py-16 sm:py-20 px-2 sm:px-4 bg-gradient-to-b from-white to-gray-50">
        <div class="container mx-auto max-w-7xl">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-center mb-4 text-gray-900 leading-tight">
                <span class="text-[#1e3a5f]" data-key="diary_title_1">Diário de</span> <span class="text-[#ffc107]" data-key="diary_title_2">Viagem</span>
            </h2>

            <p class="text-lg text-gray-600 text-center mb-12 max-w-3xl mx-auto" data-key="diary_subtitle">
                Acompanhe os momentos especiais da jornada dos nossos jovens em Portugal
            </p>

            <div class="relative">
                <div class="hidden md:block timeline-line"></div>

                <div class="space-y-12 relative z-10">
                    @foreach($posts as $index => $post)
                        <div class="flex flex-col md:flex-row gap-6 items-center {{ $index % 2 == 0 ? '' : 'md:flex-row-reverse' }}">
                            
                            <div class="md:w-1/2 w-full">
                                <div class="relative rounded-2xl overflow-hidden shadow-xl group hover:shadow-2xl transition-all duration-300 bg-black h-64 md:h-80 lg:h-96">
                                    @php
                                        $firstMedia = $post->photos->first();
                                    @endphp

                                    @if($firstMedia && $firstMedia->type == 'video')
                                        <iframe src="{{ str_replace('watch?v=', 'embed/', $firstMedia->video_url) }}" 
                                                class="w-full h-full object-cover" 
                                                frameborder="0" allowfullscreen></iframe>
                                    @elseif($post->cover_image)
                                        <img src="{{ asset('storage/' . $post->cover_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                                        <div class="absolute top-4 left-4">
                                            <div class="bg-[#ffc107] text-gray-800 px-4 py-2 rounded-full font-bold text-sm shadow-lg">
                                                📅 {{ $post->post_date->format('d/m/Y') }}
                                            </div>
                                        </div>
                                        <div class="absolute bottom-4 left-4 max-w-[90%]">
                                            <h4 class="translate-dynamic text-white font-bold text-lg md:text-xl drop-shadow line-clamp-1" 
                                                data-original="{{ $post->title }}">
                                                {{ $post->title }}
                                            </h4>
                                        </div>
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-[#1e3a5f] to-[#2d5a8f] flex items-center justify-center">
                                            <span class="translate-dynamic text-white text-xl font-bold p-4 text-center" 
                                                  data-original="{{ $post->title }}">
                                                {{ $post->title }}
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="md:w-1/2 flex flex-col justify-center w-full">
                                <article class="{{ $index % 2 == 0 ? 'timeline-card-left' : 'timeline-card-right' }} rounded-2xl p-6 md:p-8 shadow-lg transition-transform duration-300">
                                    
                                    <h3 class="translate-dynamic text-2xl md:text-3xl font-extrabold text-[#1e3a5f] mb-3" 
                                        data-original="{{ $post->title }}">
                                        {{ $post->title }}
                                    </h3>

                                    <p class="translate-dynamic text-gray-700 text-base md:text-lg leading-relaxed mb-4" 
                                       data-original="{{ \Illuminate\Support\Str::limit($post->description, 220) }}">
                                        {{ \Illuminate\Support\Str::limit($post->description, 220) }}
                                    </p>

                                    @if($post->photos->count() > 0)
                                        <div class="mb-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-3" data-key="gallery_label">Galeria:</p>
                                            <div class="grid grid-cols-4 gap-2">
                                                @foreach($post->photos->take(4) as $photo)
                                                    <button onclick="openGalleryModal({{ $post->id }})" 
                                                            class="aspect-square rounded-lg overflow-hidden relative group focus:outline-none hover:ring-2 ring-[#ffc107] transition">
                                                        @if($photo->type == 'video')
                                                            @if($photo->youtube_thumb)
                                                                <img src="{{ $photo->youtube_thumb }}" class="w-full h-full object-cover opacity-80 group-hover:opacity-100">
                                                            @else
                                                                <div class="w-full h-full bg-gray-900"></div>
                                                            @endif
                                                            <div class="absolute inset-0 flex items-center justify-center">
                                                                <div class="bg-black/50 rounded-full p-1">
                                                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <img src="{{ asset('storage/' . $photo->image_path) }}" class="w-full h-full object-cover group-hover:scale-110 transition">
                                                        @endif
                                                    </button>
                                                @endforeach
                                            </div>
                                            
                                            @if($post->photos->count() > 4)
                                                <button onclick="openGalleryModal({{ $post->id }})" class="mt-2 text-[#1e3a5f] hover:text-[#ffc107] font-semibold text-xs flex items-center gap-1">
                                                    <span data-key="view_all_media">+ Ver todas as mídias</span>
                                                </button>
                                            @endif
                                        </div>
                                    @endif

                                    <button onclick="openGalleryModal({{ $post->id }})" 
                                            class="w-full sm:w-auto bg-gradient-to-r from-[#1e3a5f] to-[#2d5a8f] hover:from-[#2d5a8f] hover:to-[#1e3a5f] text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 shadow mt-2"
                                            data-key="btn_view_gallery">
                                        Ver Galeria Completa →
                                    </button>
                                </article>
                            </div>
                        </div>

                        @if(!$loop->last)
                            <div class="hidden md:flex justify-center relative my-4">
                                <div class="absolute top-[-20px] z-20 timeline-badge text-sm">
                                    {{ $post->post_date->format('d/m/Y') }}
                                </div>
                                <div class="timeline-connector"></div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <div id="galleryModal" class="hidden fixed inset-0 bg-black/95 z-[60] flex items-center justify-center p-4" onclick="closeGalleryModal()">
        <div class="relative max-w-5xl w-full max-h-[95vh] flex flex-col" onclick="event.stopPropagation()">
            <button onclick="closeGalleryModal()" class="absolute -top-10 right-0 text-white hover:text-[#ffc107] text-3xl font-bold transition z-50">
                &times;
            </button>
            
            <div id="modalContent" class="bg-white rounded-2xl p-6 overflow-y-auto custom-scrollbar shadow-2xl">
                </div>
        </div>
    </div>
    @endif

    <section id="locations" class="py-16 sm:py-20 px-2 sm:px-4 bg-white">
        <div class="container mx-auto max-w-7xl">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-center mb-4 text-gray-900 leading-tight">
                <span class="text-[#1e3a5f]" data-key="loc_title_1">Informações sobre os</span> <span class="text-[#ffc107]" data-key="loc_title_2">Locais</span>
            </h2>
            <p class="text-lg text-gray-600 text-center mb-12 max-w-3xl mx-auto" data-key="loc_subtitle">
                Conheça as cidades portuguesas visitadas e as instituições de inovação que nos receberam
            </p>

             <!-- Grid de Locais com Instituições -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="h-48 bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center relative overflow-hidden">
                    <img src="{{ asset('images/cidades/Porto.png') }}" alt="Porto" class="w-full h-full object-cover absolute inset-0">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <h3 class="text-2xl font-bold text-white z-10 absolute bottom-4 left-4">🏛️ Porto</h3>
                </div>
                <div class="p-5">
                    <p class="text-sm text-gray-600 mb-3 italic" data-key="loc_desc_porto">Cidade histórica e portuária</p>
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <span class="text-[#ffc107] mt-1">📍</span>
                            <p class="text-sm text-gray-700 font-medium" data-key="loc_place_porto">Porto Innovation Hub</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="h-48 bg-gradient-to-br from-teal-500 to-teal-700 flex items-center justify-center relative overflow-hidden">
                    <img src="{{ asset('images/cidades/Aveiro.png') }}" alt="Aveiro" class="w-full h-full object-cover absolute inset-0">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <h3 class="text-2xl font-bold text-white z-10 absolute bottom-4 left-4">🚣 Aveiro</h3>
                </div>
                <div class="p-5">
                    <p class="text-sm text-gray-600 mb-3 italic" data-key="loc_desc_aveiro">A Veneza de Portugal</p>
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <span class="text-[#ffc107] mt-1">📍</span>
                            <p class="text-sm text-gray-700 font-medium" data-key="loc_place_aveiro">PCI de Aveiro, Ílhavo</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="h-48 bg-gradient-to-br from-yellow-500 to-orange-600 flex items-center justify-center relative overflow-hidden">
                    <img src="{{ asset('images/cidades/Lisboa.png') }}" alt="Lisboa" class="w-full h-full object-cover absolute inset-0">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <h3 class="text-2xl font-bold text-white z-10 absolute bottom-4 left-4">🌆 Lisboa</h3>
                </div>
                <div class="p-5">
                    <p class="text-sm text-gray-600 mb-3 italic" data-key="loc_desc_lisboa">A capital vibrante de Portugal</p>
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <span class="text-[#ffc107] mt-1">📍</span>
                            <p class="text-sm text-gray-700 font-medium" data-key="loc_place_lisboa_1">ART - LabX</p>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-[#ffc107] mt-1">📍</span>
                            <p class="text-sm text-gray-700 font-medium" data-key="loc_place_lisboa_2">Câmara Municipal de Lisboa</p>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-[#ffc107] mt-1">📍</span>
                            <p class="text-sm text-gray-700 font-medium" data-key="loc_place_lisboa_3">Ciência Viva</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="h-48 bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center relative overflow-hidden">
                    <img src="{{ asset('images/cidades/Beato.png') }}" alt="Beato" class="w-full h-full object-cover absolute inset-0">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <h3 class="text-2xl font-bold text-white z-10 absolute bottom-4 left-4">🚀 Beato</h3>
                </div>
                <div class="p-5">
                    <p class="text-sm text-gray-600 mb-3 italic" data-key="loc_desc_beato">Bairro inovador e tecnológico</p>
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <span class="text-[#ffc107] mt-1">📍</span>
                            <p class="text-sm text-gray-700 font-medium" data-key="loc_place_beato">Hub de Inovação de Beato</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="h-48 bg-gradient-to-br from-green-500 to-green-700 flex items-center justify-center relative overflow-hidden">
                    <img src="{{ asset('images/cidades/Oeiras.png') }}" alt="Oeiras" class="w-full h-full object-cover absolute inset-0">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <h3 class="text-2xl font-bold text-white z-10 absolute bottom-4 left-4">🔬 Oeiras</h3>
                </div>
                <div class="p-5">
                    <p class="text-sm text-gray-600 mb-3 italic" data-key="loc_desc_oeiras">Polo de inovação e qualidade de vida</p>
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <span class="text-[#ffc107] mt-1">📍</span>
                            <p class="text-sm text-gray-700 font-medium" data-key="loc_place_oeiras">Taguspark</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="h-48 bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center relative overflow-hidden">
                    <img src="{{ asset('images/cidades/Cascais.png') }}" alt="Cascais" class="w-full h-full object-cover absolute inset-0">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <h3 class="text-2xl font-bold text-white z-10 absolute bottom-4 left-4">🏖️ Cascais</h3>
                </div>
                <div class="p-5">
                    <p class="text-sm text-gray-600 mb-3 italic" data-key="loc_desc_cascais">Destino turístico sofisticado</p>
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <span class="text-[#ffc107] mt-1">📍</span>
                            <p class="text-sm text-gray-700 font-medium" data-key="loc_place_cascais">Câmara Municipal de Cascais</p>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </section>   


    <section id="participants" class="py-16 sm:py-20 px-2 sm:px-4 bg-gradient-to-br from-gray-50 via-white to-gray-50">
        <div class="container mx-auto max-w-7xl">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-center mb-6 text-gray-900 leading-tight">
                <span class="text-[#1e3a5f]" data-key="carometro_title_1">Nosso</span> <span class="text-[#ffc107]" data-key="carometro_title_2">Carômetro</span>
            </h2>
            <p class="text-lg text-gray-600 text-center mb-12 max-w-2xl mx-auto" data-key="carometro_subtitle">
                Conheça os estudantes protagonistas desta jornada transformadora
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="p-6">
                        <p class="text-xs font-semibold text-blue-600 uppercase mb-2">CEEP Maria Lydia Cescato Bomtempo</p>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Kawã Leite</h3>
                        <div class="mb-4">
                            <img src="{{ asset('images/alunos/Kawa.png') }}" alt="Kawã" class="w-full h-56 object-contain rounded-lg bg-gray-50">
                        </div>
                        <a href="https://www.youtube.com/watch?v=bo4p8751uLA" target="_blank" class="block w-full text-center px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition" data-key="btn_watch_video">Ver Vídeo</a>
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
                        <a href="https://www.youtube.com/watch?v=r-DTmGSEfvo" target="_blank" class="block w-full text-center px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition" data-key="btn_watch_video">Ver Vídeo</a>
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
                        <a href="https://www.youtube.com/watch?v=QzkFhk-_Kwc" target="_blank" class="block w-full text-center px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition" data-key="btn_watch_video">Ver Vídeo</a>
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
                        <a href="https://www.youtube.com/watch?v=vjk2pCgsuIc" target="_blank" class="block w-full text-center px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition" data-key="btn_watch_video">Ver Vídeo</a>
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
                        <a href="https://www.youtube.com/watch?v=iM5ydP574hY" target="_blank" class="block w-full text-center px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition" data-key="btn_watch_video">Ver Vídeo</a>
                    </div>
                </div>
            </div>
    </section>

    <div class="w-full flex justify-center items-center py-4 bg-transparent">
        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-gray-200 shadow text-base font-normal">
            <span class="text-gray-400">Powered by</span>
            <img src="{{ asset('images/logos/Logo_VDS.png') }}" alt="Vale do Sol" class="h-12 w-auto ml-1" style="display:inline;vertical-align:middle;">
        </span>
    </div>

    <footer class="bg-[#1e3a5f] text-white py-8 px-2 sm:px-4">
        <div class="container mx-auto max-w-7xl text-center">
            <p data-key="footer_p">&copy; 2025 Desafio Assai Pro Mundo. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script>
        // --- DADOS E VARIÁVEIS ---
        let currentLang = 'pt';
        const postsData = @json($posts);

        // --- DICIONÁRIO DE TRADUÇÃO ---
        const traducoes = {
            'pt': {
                'header_title': 'Prefeitura Municipal de Assaí',
                'btn_traduzir': 'Traduzir',
                'nav_cidades': 'LOCAIS',
                'nav_participantes': 'CARÔMETRO',
                'nav_cidades_m': 'LOCAIS',
                'nav_participantes_m': 'CARÔMETRO',
                'numbers_title': 'A Jornada em',
                'numbers_highlight': 'Números',
                'num_cities': 'Cidades',
                'num_visited': 'Visitadas',
                'num_institutions': 'Instituições',
                'num_innovation': 'de Inovação',
                'num_students': 'Estudantes',
                'num_participants': 'Participantes',
                'num_days': 'Dias',
                'num_immersion': 'de Imersão',
                'diary_title_1': 'Diário de',
                'diary_title_2': 'Viagem',
                'diary_subtitle': 'Acompanhe os momentos especiais da jornada dos nossos jovens em Portugal',
                'gallery_label': 'Galeria:',
                'view_all_media': 'Ver todas as mídias',
                'btn_view_gallery': 'Ver Galeria Completa →',
                'loc_title_1': 'Informações sobre os',
                'loc_title_2': 'Locais',
                'loc_subtitle': 'Conheça as cidades portuguesas visitadas e as instituições de inovação que nos receberam',
                'carometro_title_1': 'Nosso',
                'carometro_title_2': 'Carômetro',
                'carometro_subtitle': 'Conheça os estudantes protagonistas desta jornada transformadora',
                'btn_watch_video': 'Ver Vídeo',
                'footer_p': '© 2025 Desafio Assai Pro Mundo. Todos os direitos reservados.',
                'modal_gallery_title': 'Galeria de Mídia',
                'modal_no_media': 'Nenhuma mídia disponível.',
                'yt_video_label': 'Vídeo do YouTube',
                'loc_desc_porto': 'Cidade histórica e portuária',
                'loc_place_porto': 'Porto Innovation Hub',
                'loc_desc_aveiro': 'A Veneza de Portugal',
                'loc_place_aveiro': 'PCI de Aveiro, Ílhavo',
                'loc_desc_lisboa': 'A capital vibrante de Portugal',
                'loc_place_lisboa_1': 'ART - LabX',
                'loc_place_lisboa_2': 'Câmara Municipal de Lisboa',
                'loc_place_lisboa_3': 'Ciência Viva',
                'loc_desc_beato': 'Bairro inovador e tecnológico',
                'loc_place_beato': 'Hub de Inovação de Beato',
                'loc_desc_oeiras': 'Polo de inovação e qualidade de vida',
                'loc_place_oeiras': 'Taguspark',
                'loc_desc_cascais': 'Destino turístico sofisticado',
                'loc_place_cascais': 'Câmara Municipal de Cascais'
            },
            'pt_PT': {
                'header_title': 'Câmara Municipal de Assaí',
                'btn_traduzir': 'Traduzir',
                'nav_cidades': 'LOCAIS',
                'nav_participantes': 'CARÔMETRO',
                'nav_cidades_m': 'LOCAIS',
                'nav_participantes_m': 'CARÔMETRO',
                'numbers_title': 'A Jornada em',
                'numbers_highlight': 'Números',
                'num_cities': 'Cidades',
                'num_visited': 'Visitadas',
                'num_institutions': 'Instituições',
                'num_innovation': 'de Inovação',
                'num_students': 'Estudantes',
                'num_participants': 'Participantes',
                'num_days': 'Dias',
                'num_immersion': 'de Imersão',
                'diary_title_1': 'Diário de',
                'diary_title_2': 'Viagem',
                'diary_subtitle': 'Acompanhe os momentos especiais da jornada dos nossos jovens em Portugal',
                'gallery_label': 'Galeria:',
                'view_all_media': 'Ver toda a multimédia',
                'btn_view_gallery': 'Ver Galeria Completa →',
                'loc_title_1': 'Informações sobre os',
                'loc_title_2': 'Locais',
                'loc_subtitle': 'Conheça as cidades portuguesas visitadas e as instituições de inovação que nos receberam',
                'carometro_title_1': 'O Nosso',
                'carometro_title_2': 'Carômetro',
                'carometro_subtitle': 'Conheça os estudantes protagonistas desta jornada transformadora',
                'btn_watch_video': 'Ver Vídeo',
                'footer_p': '© 2025 Desafio Assai Para o Mundo. Todos os direitos reservados.',
                'modal_gallery_title': 'Galeria Multimédia',
                'modal_no_media': 'Nenhuma mídia disponível.',
                'yt_video_label': 'Vídeo do YouTube',
                'loc_desc_porto': 'Cidade histórica e portuária',
                'loc_place_porto': 'Porto Innovation Hub',
                'loc_desc_aveiro': 'A Veneza de Portugal',
                'loc_place_aveiro': 'PCI de Aveiro, Ílhavo',
                'loc_desc_lisboa': 'A capital vibrante de Portugal',
                'loc_place_lisboa_1': 'ART - LabX',
                'loc_place_lisboa_2': 'Câmara Municipal de Lisboa',
                'loc_place_lisboa_3': 'Ciência Viva',
                'loc_desc_beato': 'Bairro inovador e tecnológico',
                'loc_place_beato': 'Hub de Inovação de Beato',
                'loc_desc_oeiras': 'Polo de inovação e qualidade de vida',
                'loc_place_oeiras': 'Taguspark',
                'loc_desc_cascais': 'Destino turístico sofisticado',
                'loc_place_cascais': 'Câmara Municipal de Cascais'
            },
            'en': {
                'header_title': 'City Hall of Assaí',
                'btn_traduzir': 'Translate',
                'nav_cidades': 'LOCATIONS',
                'nav_participantes': 'PARTICIPANTS',
                'nav_cidades_m': 'LOCATIONS',
                'nav_participantes_m': 'PARTICIPANTS',
                'numbers_title': 'The Journey in',
                'numbers_highlight': 'Numbers',
                'num_cities': 'Cities',
                'num_visited': 'Visited',
                'num_institutions': 'Institutions',
                'num_innovation': 'of Innovation',
                'num_students': 'Students',
                'num_participants': 'Participants',
                'num_days': 'Days',
                'num_immersion': 'of Immersion',
                'diary_title_1': 'Travel',
                'diary_title_2': 'Diary',
                'diary_subtitle': 'Follow the special moments of our youths\' journey in Portugal',
                'gallery_label': 'Gallery:',
                'view_all_media': 'View all media',
                'btn_view_gallery': 'View Full Gallery →',
                'loc_title_1': 'Information about',
                'loc_title_2': 'Locations',
                'loc_subtitle': 'Discover the Portuguese cities visited and the innovation institutions that welcomed us',
                'carometro_title_1': 'Our',
                'carometro_title_2': 'Participants',
                'carometro_subtitle': 'Meet the extraordinary students leading this transformative journey',
                'btn_watch_video': 'Watch Video',
                'footer_p': '© 2025 Assaí Pro Mundo Challenge. All rights reserved.',
                'modal_gallery_title': 'Media Gallery',
                'modal_no_media': 'No media available.',
                'yt_video_label': 'YouTube Video',
                'loc_desc_porto': 'Historic and port city',
                'loc_place_porto': 'Porto Innovation Hub',
                'loc_desc_aveiro': 'The Venice of Portugal',
                'loc_place_aveiro': 'PCI of Aveiro, Ílhavo',
                'loc_desc_lisboa': 'The vibrant capital of Portugal',
                'loc_place_lisboa_1': 'ART - LabX',
                'loc_place_lisboa_2': 'Lisbon City Hall',
                'loc_place_lisboa_3': 'Ciência Viva',
                'loc_desc_beato': 'Innovative and technological district',
                'loc_place_beato': 'Beato Innovation Hub',
                'loc_desc_oeiras': 'Hub of innovation and quality of life',
                'loc_place_oeiras': 'Taguspark',
                'loc_desc_cascais': 'Sophisticated tourist destination',
                'loc_place_cascais': 'Cascais City Hall'
            },
            'es': {
                'header_title': 'Ayuntamiento de Assaí',
                'btn_traduzir': 'Traducir',
                'nav_cidades': 'LUGARES',
                'nav_participantes': 'PARTICIPANTES',
                'nav_cidades_m': 'LUGARES',
                'nav_participantes_m': 'PARTICIPANTES',
                'numbers_title': 'La Jornada en',
                'numbers_highlight': 'Números',
                'num_cities': 'Ciudades',
                'num_visited': 'Visitadas',
                'num_institutions': 'Instituciones',
                'num_innovation': 'de Innovación',
                'num_students': 'Estudiantes',
                'num_participants': 'Participantes',
                'num_days': 'Días',
                'num_immersion': 'de Inmersión',
                'diary_title_1': 'Diario de',
                'diary_title_2': 'Viaje',
                'diary_subtitle': 'Sigue los momentos especiales del viaje de nuestros jóvenes en Portugal',
                'gallery_label': 'Galería:',
                'view_all_media': 'Ver todos los medios',
                'btn_view_gallery': 'Ver Galería Completa →',
                'loc_title_1': 'Información sobre',
                'loc_title_2': 'Lugares',
                'loc_subtitle': 'Conoce las ciudades portuguesas visitadas y las instituciones de innovación que nos recibieron',
                'carometro_title_1': 'Nuestros',
                'carometro_title_2': 'Participantes',
                'carometro_subtitle': 'Conoce a los estudiantes protagonistas de esta jornada transformadora',
                'btn_watch_video': 'Ver Video',
                'footer_p': '© 2025 Desafío Assai Pro Mundo. Todos los derechos reservados.',
                'modal_gallery_title': 'Galería de Medios',
                'modal_no_media': 'No hay medios disponibles.',
                'yt_video_label': 'Video de YouTube',
                'loc_desc_porto': 'Ciudad histórica y portuaria',
                'loc_place_porto': 'Porto Innovation Hub',
                'loc_desc_aveiro': 'La Venecia de Portugal',
                'loc_place_aveiro': 'PCI de Aveiro, Ílhavo',
                'loc_desc_lisboa': 'La capital vibrante de Portugal',
                'loc_place_lisboa_1': 'ART - LabX',
                'loc_place_lisboa_2': 'Ayuntamiento de Lisboa',
                'loc_place_lisboa_3': 'Ciência Viva',
                'loc_desc_beato': 'Barrio innovador y tecnológico',
                'loc_place_beato': 'Hub de Innovación de Beato',
                'loc_desc_oeiras': 'Polo de innovación y calidad de vida',
                'loc_place_oeiras': 'Taguspark',
                'loc_desc_cascais': 'Destino turístico sofisticado',
                'loc_place_cascais': 'Ayuntamiento de Cascais'
            }
        };

        // Cache para não gastar cota da API repetindo a mesma tradução
    const translationCache = {};

    async function translateDynamicText(targetLang) {
        const elements = document.querySelectorAll('.translate-dynamic');
        
        // Mapeamento de códigos de idioma para a API (MyMemory usa 2 letras)
        const apiLang = targetLang === 'pt_PT' ? 'pt' : targetLang;

        elements.forEach(async (el) => {
            const originalText = el.getAttribute('data-original');
            
            // Se for PT, volta para o original imediatamente
            if (apiLang === 'pt') {
                el.innerText = originalText;
                return;
            }

            // Cria uma chave única para o cache
            const cacheKey = `${apiLang}_${originalText}`;

            // 1. Verifica se já temos essa tradução salva na memória
            if (translationCache[cacheKey]) {
                el.innerText = translationCache[cacheKey];
                // Efeito visual simples
                el.style.opacity = 1;
                return;
            }

            // 2. Se não tem, avisa o usuário que está carregando (opcional)
            el.style.opacity = 0.5; // Deixa o texto meio transparente enquanto carrega

            try {
                // Chama a API gratuita (MyMemory)
                const response = await fetch(`https://api.mymemory.translated.net/get?q=${encodeURIComponent(originalText)}&langpair=pt|${apiLang}`);
                const data = await response.json();

                if (data.responseData && data.responseData.translatedText) {
                    const translatedText = data.responseData.translatedText;
                    
                    // Salva no cache e aplica
                    translationCache[cacheKey] = translatedText;
                    el.innerText = translatedText;
                }
            } catch (error) {
                console.error('Erro ao traduzir:', error);
                // Em caso de erro, mantem o original
                el.innerText = originalText;
            } finally {
                el.style.opacity = 1; // Volta a opacidade ao normal
            }
        });
    }
        // --- FUNÇÕES AUXILIARES ---
        function t(key) {
            return traducoes[currentLang][key] || key;
        }

        function getEmbedUrl(url) {
            if (!url) return '';
            const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
            const match = url.match(regExp);
            const id = (match && match[2].length === 11) ? match[2] : null;
            return id ? `https://www.youtube.com/embed/${id}` : url;
        }

        // --- INTERFACE ---
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

        function toggleTradutor() {
            const tradutor = document.getElementById('tradutorWidget');
            tradutor.classList.toggle('hidden');
        }

        function setIdioma(idioma) {
            currentLang = idioma;
            const dicionario = traducoes[idioma];
            if (!dicionario) return;

            // 1. Atualiza elementos com data-key
            document.querySelectorAll('[data-key]').forEach(element => {
                const key = element.dataset.key;
                if(dicionario[key]) element.innerHTML = dicionario[key];
            });

            // 2. Atualiza elementos gerados sem data-key (ex: botões da timeline já renderizados)
            document.querySelectorAll('button').forEach(btn => {
                if(btn.innerText.includes('Ver Galeria Completa') || btn.innerText.includes('View Full Gallery')) {
                    btn.innerHTML = dicionario['btn_view_gallery'];
                }
            });

            // 3. Atualiza botões do Carômetro
            document.querySelectorAll('a[href*="youtube"]').forEach(link => {
                if(link.innerText.includes('Ver Vídeo') || link.innerText.includes('Watch')) {
                    link.innerText = dicionario['btn_watch_video'];
                }
            });

            translateDynamicText(idioma);

            // 4. Atualiza estilo dos botões do tradutor
            document.querySelectorAll('.lang-btn').forEach(btn => {
                btn.classList.remove('active-lang');
                if (btn.dataset.lang === idioma) {
                    btn.classList.add('active-lang');
                }
            });

            toggleTradutor();
        }

        // --- MODAL ---
        function openGalleryModal(postId) {
            const post = postsData.find(p => p.id === postId);
            if (!post) return;

            const modal = document.getElementById('galleryModal');
            const content = document.getElementById('modalContent');

            let mediaHTML = '';
            
            if (post.photos && post.photos.length > 0) {
                mediaHTML = '<div class="grid grid-cols-1 md:grid-cols-2 gap-6">';
                
                post.photos.forEach((photo, index) => {
                    if (photo.type === 'video') {
                        const embedUrl = getEmbedUrl(photo.video_url);
                        mediaHTML += `
                            <div class="flex flex-col gap-2">
                                <div class="w-full aspect-video bg-black rounded-lg overflow-hidden shadow-lg ring-1 ring-gray-200">
                                    <iframe src="${embedUrl}" 
                                            title="YouTube video player" 
                                            frameborder="0" 
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                            allowfullscreen
                                            class="w-full h-full">
                                    </iframe>
                                </div>
                                <p class="text-xs text-gray-500 font-semibold flex items-center gap-1">
                                    <span class="text-red-600">▶</span> ${t('yt_video_label')}
                                </p>
                            </div>
                        `;
                    } else {
                        mediaHTML += `
                            <div class="relative group flex flex-col gap-2">
                                <img src="/storage/${photo.image_path}" 
                                     alt="Mídia ${index + 1}" 
                                     class="w-full h-64 object-cover rounded-lg shadow-lg hover:opacity-95 transition">
                                ${photo.caption ? `<p class="text-sm text-gray-600 italic">${photo.caption}</p>` : ''}
                            </div>
                        `;
                    }
                });
                mediaHTML += '</div>';
            } else {
                mediaHTML = `<p class="text-gray-500 text-center py-8">${t('modal_no_media')}</p>`;
            }

            content.innerHTML = `
                <div class="mb-6 border-b border-gray-100 pb-4">
                    <h2 class="text-2xl md:text-3xl font-bold text-[#1e3a5f] mb-2">${post.title}</h2>
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                        <span>📅 ${new Date(post.post_date).toLocaleDateString('pt-BR')}</span>
                    </div>
                </div>
                
                <div class="mb-8 bg-blue-50/50 p-4 rounded-xl border border-blue-100">
                    <p class="text-gray-700 text-lg leading-relaxed">${post.description}</p>
                </div>

                <h3 class="text-xl font-bold text-gray-800 mb-4 pl-2 border-l-4 border-[#ffc107]">${t('modal_gallery_title')}</h3>
                ${mediaHTML}
            `;

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeGalleryModal() {
            const modal = document.getElementById('galleryModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeGalleryModal();
            }
        });
    </script>
</body>
</html>
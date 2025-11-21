<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movimento Juventude</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tipografia -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ===== DESIGN SYSTEM JUVENTUDE ASSAÍ ===== */

        :root {
            --primary-blue: #2563eb;
            --primary-blue-dark: #1d4ed8;
            --secondary-teal: #14b8a6;
            --secondary-teal-dark: #0d9488;
            --accent-yellow: #ffc107;
            --accent-yellow-dark: #f59e0b;
            --gradient-start: #667eea;
            --gradient-end: #764ba2;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            overflow-x: hidden;
        }

        /* ===== ANIMAÇÕES MODERNAS ===== */

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse-glow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(37, 99, 235, 0.4);
            }
            50% {
                box-shadow: 0 0 40px rgba(37, 99, 235, 0.8);
            }
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        /* ===== GRADIENTES DINÂMICOS ===== */

        .gradient-bg-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            background-size: 200% 200%;
            animation: gradientMove 8s ease infinite;
        }

        .gradient-bg-secondary {
            background: linear-gradient(135deg, #14b8a6 0%, #2563eb 50%, #667eea 100%);
            background-size: 200% 200%;
            animation: gradientMove 8s ease infinite;
        }

        /* ===== EFEITOS DE CARTÕES ===== */

        .card-3d {
            transform-style: preserve-3d;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .card-3d:hover {
            transform: translateY(-15px) rotateX(5deg);
            box-shadow:
                0 25px 50px -12px rgba(0, 0, 0, 0.25),
                0 0 60px rgba(102, 126, 234, 0.4);
        }

        .card-shine {
            position: relative;
            overflow: hidden;
        }

        .card-shine::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 50%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            animation: shimmer 3s infinite;
        }

        /* ===== BOTÕES MODERNOS ===== */

        .btn-modern {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .btn-modern::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-modern:hover::before {
            width: 300px;
            height: 300px;
        }

        /* ===== TEXTO COM GRADIENTE ===== */

        .text-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .text-gradient-yellow {
            background: linear-gradient(135deg, #ffc107 0%, #f59e0b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ===== GLASS MORPHISM ===== */

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* ===== FLOATING ANIMATIONS ===== */

        .float-slow {
            animation: float 6s ease-in-out infinite;
        }

        .fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .slide-in-right {
            animation: slideInRight 0.8s ease-out forwards;
        }

        /* ===== RESPONSIVE TWEAKS ===== */

        @media (max-width: 768px) {
            .card-3d:hover {
                transform: translateY(-10px);
            }

            /* Ensure images are responsive */
            img {
                max-width: 100%;
                height: auto;
            }
        }

        /* Prevent horizontal scroll */
        html, body {
            max-width: 100%;
            overflow-x: hidden;
        }

        /* Ensure all images are responsive */
        img {
            max-width: 100%;
            height: auto;
        }

        /* ===== ACCESSIBILITY ===== */

        .focus-ring:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.5);
        }

        /* ===== SCROLLBAR CUSTOM ===== */

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #667eea, #764ba2);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #764ba2, #667eea);
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-50">

    <!-- HERO MOBILE EXCLUSIVO -->
    <section class="gradient-bg-secondary text-white min-h-screen flex flex-col items-center justify-center px-4 pt-20 pb-10 relative overflow-hidden md:hidden">
        <!-- Partículas decorativas animadas -->
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <div class="w-72 h-72 bg-purple-400/30 rounded-full blur-3xl absolute -top-20 -left-20 float-slow"></div>
            <div class="w-56 h-56 bg-yellow-400/20 rounded-full blur-3xl absolute top-40 -right-10 float-slow" style="animation-delay: 1s;"></div>
            <div class="w-64 h-64 bg-blue-400/20 rounded-full blur-3xl absolute -bottom-10 left-10 float-slow" style="animation-delay: 2s;"></div>
        </div>

        <div class="w-full flex flex-col items-center text-center z-10 fade-in-up">
            <!-- Imagem com efeito moderno -->
            <div class="relative mb-4 w-full max-w-[90%] sm:max-w-md">
                <div class="absolute inset-0 bg-gradient-to-br from-yellow-400 to-purple-600 rounded-3xl blur-lg opacity-50 animate-pulse"></div>
                <img src="/images/alunos.png" alt="Movimento Juventude" class="relative w-full h-auto aspect-[4/3] object-cover rounded-3xl shadow-2xl border-4 border-white/30 backdrop-blur-sm">
            </div>

            <!-- Badge informativo -->
            <div class="glass-effect rounded-2xl px-4 py-2 mb-4 inline-block max-w-[95%] sm:max-w-[90%]">
                <p class="text-xs sm:text-sm font-bold text-white flex items-center justify-center gap-2 text-center leading-relaxed">
                    <span class="inline-block w-2 h-2 bg-yellow-400 rounded-full animate-pulse flex-shrink-0"></span>
                    <span class="inline-block">Alunos selecionados para o programa <strong class="text-yellow-300">De Assaí pro Mundo</strong></span>
                </p>
            </div>

            <!-- Título principal -->
            <h1 class="text-3xl sm:text-5xl font-black drop-shadow-2xl mb-3 tracking-tight leading-tight px-2">
                <span class="block mb-3 text-white" data-key="HERO_TIT1">A Juventude que</span>
                <span class="inline-block px-4 py-2 bg-yellow-400 text-gray-900 rounded-2xl font-black shadow-xl text-2xl sm:text-5xl border-2 border-yellow-300" data-key="HERO_TIT2">Move a Cidade</span>
            </h1>

            <!-- Descrição -->
            <p class="mt-6 text-sm sm:text-base text-white/90 leading-relaxed font-medium max-w-md px-4">
                <span data-key="HERO_DESC">Um movimento que transforma <span class="font-bold text-yellow-300">sonhos</span> em projetos, canaliza <span class="font-bold text-yellow-300">energia</span> em impacto real e faz da <span class="font-bold text-yellow-300">juventude</span> a protagonista das mudanças que queremos ver na cidade.</span>
            </p>

            <!-- Call-to-Actions modernos -->
            <div class="mt-8 flex flex-col gap-3 w-full max-w-sm px-4">
                <a href="#sobre" class="btn-modern px-6 py-4 rounded-2xl bg-white text-blue-700 font-black shadow-2xl hover:shadow-3xl hover:scale-105 transition-all duration-300 text-sm sm:text-base flex items-center justify-center gap-2 group focus-ring">
                    <span data-key="CONHECA">Conheça o Movimento</span>
                    <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
                <a href="/home" class="btn-modern px-4 py-4 rounded-2xl bg-gradient-to-r from-yellow-400 via-yellow-500 to-amber-500 text-gray-900 font-black shadow-2xl hover:shadow-3xl hover:scale-105 transition-all duration-300 text-xs sm:text-sm flex items-center justify-center gap-2 group border-2 border-yellow-300 focus-ring">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="font-black leading-tight">Programa<br class="hidden xs:inline"/> De Assaí pro Mundo</span>
                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>


    <div id="tradutorBar" class="hidden fixed z-50 left-1/2 -translate-x-1/2 mt-2 top-[60px] sm:top-[70px] md:top-[80px] flex flex-row items-center bg-white rounded-xl shadow-2xl border-2 border-[#ffc107] px-2 py-2 gap-1 animate-fade-in" style="min-width:0; max-width:95vw;">
        <button id="btn-pt" onclick="setIdioma('pt')" data-lang="pt" class="lang-btn px-2 sm:px-3 py-2 rounded bg-gray-100 hover:bg-blue-100 text-gray-700 text-xs font-semibold whitespace-nowrap">Português (BR)</button>
        <button id="btn-pt_PT" onclick="setIdioma('pt_PT')" data-lang="pt_PT" class="lang-btn px-2 sm:px-3 py-2 rounded bg-gray-100 hover:bg-blue-100 text-gray-700 text-xs font-semibold whitespace-nowrap">Português (PT)</button>
        <button id="btn-en" onclick="setIdioma('en')" data-lang="en" class="lang-btn px-2 sm:px-3 py-2 rounded bg-gray-100 hover:bg-blue-100 text-gray-700 text-xs font-semibold whitespace-nowrap">Inglês</button>
        <button id="btn-es" onclick="setIdioma('es')" data-lang="es" class="lang-btn px-2 sm:px-3 py-2 rounded bg-gray-100 hover:bg-blue-100 text-gray-700 text-xs font-semibold whitespace-nowrap">Espanhol</button>
        <button onclick="toggleTradutor()" class="ml-1 text-gray-400 hover:text-blue-500 text-lg font-bold px-2 py-1 bg-white rounded-full flex-shrink-0">&times;</button>
    </div>

    <script>
        // Tradutor customizado
        function toggleTradutor() {
            const bar = document.getElementById('tradutorBar');
            const btnMobile = document.getElementById('btnTradutorMobile');
            let top = 98;
            let left = window.innerWidth / 2;
            let translate = '-50%';
            if (window.innerWidth < 768 && btnMobile) {
                const rect = btnMobile.getBoundingClientRect();
                top = rect.bottom + window.scrollY + 8;
                // Centraliza o tradutor em relação ao botão Traduzir
                setTimeout(() => {
                    const barRect = bar.getBoundingClientRect();
                    const btnCenter = rect.left + rect.width / 2 + window.scrollX;
                    const barLeft = btnCenter - barRect.width / 2;
                    bar.style.left = barLeft + 'px';
                    bar.style.transform = 'none';
                }, 0);
                bar.style.minWidth = '';
                bar.style.maxWidth = '95vw';
                bar.style.width = 'auto';
            } else {
                bar.style.minWidth = '340px';
                bar.style.maxWidth = '';
                bar.style.width = '';
                left = window.innerWidth / 2;
                translate = '-50%';
                bar.style.left = left + 'px';
                bar.style.transform = `translateX(${translate})`;
            }
            bar.style.position = 'fixed';
            bar.style.top = top + 'px';
            bar.classList.toggle('hidden');
        }


        function setIdioma(idioma) {
            const dicionario = traducoes[idioma];
            if (!dicionario) return;

            document.querySelectorAll('[data-key]').forEach(element => {
                const key = element.dataset.key;
                const traducao = dicionario[key];
                if (traducao) {
                    element.innerHTML = traducao;
                }
            });

            document.querySelectorAll('.lang-btn').forEach(btn => {
                btn.classList.remove('active-lang');
                if (btn.dataset.lang === idioma) {
                    btn.classList.add('active-lang');
                }
            });

            // Esconde a barra após selecionar
            document.getElementById('tradutorBar').classList.add('hidden');
        }

        // Dicionário de traduções completo
        const traducoes = {
            'pt': {
                'btn_traduzir': 'Traduzir',
                'PREFEITURA': 'Prefeitura Municipal de Assaí',
                'DESAFIO': 'Desafio',
                'QUEM_SOMOS': 'Quem Somos',
                'CIDADES': 'Cidades',
                'INSTITUIÇÕES': 'Instituições',
                'PARTICIPANTES': 'Participantes',
                'CONHECA': 'Conheça o Movimento',
                'IR_DESAFIO_BTN': 'Ir para o Desafio',
                'IR_DESAFIO_SUB': 'de Assaí para o Mundo',
                'IR_DESAFIO': 'Ir para o Desafio',
                'ASSAI_MUNDO': 'de Assaí para o Mundo',
                'O_QUE_E': 'O que é o <span class="text-[#ffc107]">Desafio?</span>',
                'HERO_DESC': 'Um movimento que transforma <span class="font-bold text-[#ffc107]">sonhos</span> em projetos, canaliza <span class="font-bold text-white">energia</span> em impacto real e faz da <span class="font-bold text-[#ffc107]">juventude</span> a protagonista das mudanças que queremos ver na cidade.',
                'APM_DESC1': 'O Programa <strong class="text-blue-800">“De Assaí pro Mundo”</strong> transforma a Jornada dos Desafios ODS em oportunidades práticas, incentivando jovens a desenvolver soluções alinhadas aos Objetivos de Desenvolvimento Sustentável e promovendo a internacionalização dessas iniciativas.',
                'APM_DESC2': 'Clique abaixo e saiba mais',
                'QUEM_SOMOS_TIT': 'Quem Somos',
                'QUEM_SOMOS_DESC1': 'O Movimento Juventude conecta jovens de diferentes origens para idealizar e realizar projetos que geram impacto positivo em toda a cidade.',
                'QUEM_SOMOS_DESC2': 'Inovação, cultura, esporte, educação e tecnologia',
                'QUEM_SOMOS_DESC3': 'abrem portas, criam oportunidades e transformam realidades, tornando a juventude protagonista de um novo futuro.',
                'POWERED': 'Powered by',
                'footer_p': '&copy; 2025 Prefeitura Municipal de Assaí',
            },
            'en': {
                'btn_traduzir': 'Translate',
                'PREFEITURA': 'Assaí City Hall',
                'DESAFIO': 'Challenge',
                'QUEM_SOMOS': 'About Us',
                'CIDADES': 'Cities',
                'INSTITUIÇÕES': 'Institutions',
                'PARTICIPANTES': 'Participants',
                'CONHECA': 'Learn About the Movement',
                'IR_DESAFIO_BTN': 'Go to the Challenge',
                'IR_DESAFIO_SUB': 'from Assaí to the World',
                'IR_DESAFIO': 'Go to the Challenge',
                'ASSAI_MUNDO': 'from Assaí to the World',
                'O_QUE_E': 'What is the <span class="text-[#ffc107]">Challenge?</span>',
                'HERO_DESC': 'A movement that turns <span class="font-bold text-[#ffc107]">dreams</span> into projects, channels <span class="font-bold text-white">energy</span> into real impact, and makes <span class="font-bold text-[#ffc107]">youth</span> the protagonist of the changes we want to see in the city.',
                'APM_DESC1': 'The <strong class="text-blue-800">“From Assaí to the World”</strong> program transforms the ODS Challenge Journey into practical opportunities, encouraging young people to develop solutions aligned with the Sustainable Development Goals and promoting the internationalization of these initiatives.',
                'APM_DESC2': 'Click below and learn more',
                'QUEM_SOMOS_TIT': 'About Us',
                'QUEM_SOMOS_DESC1': 'The Youth Movement connects young people from different backgrounds to design and carry out projects that generate a positive impact throughout the city.',
                'QUEM_SOMOS_DESC2': 'Innovation, culture, sports, education and technology',
                'QUEM_SOMOS_DESC3': 'open doors, create opportunities and transform realities, making youth the protagonist of a new future.',
                'POWERED': 'Powered by',
                'footer_p': '&copy; 2025 Assaí City Hall',
            },
            'es': {
                'btn_traduzir': 'Traducir',
                'PREFEITURA': 'Municipalidad de Assaí',
                'DESAFIO': 'Desafío',
                'QUEM_SOMOS': 'Quiénes Somos',
                'CIDADES': 'Ciudades',
                'INSTITUIÇÕES': 'Instituciones',
                'PARTICIPANTES': 'Participantes',
                'CONHECA': 'Conoce el Movimiento',
                'IR_DESAFIO_BTN': 'Ir al Desafío',
                'IR_DESAFIO_SUB': 'de Assaí para el Mundo',
                'IR_DESAFIO_BTN': 'Ir para o Desafio',
                'IR_DESAFIO_SUB': 'de Assaí para o Mundo',
                'IR_DESAFIO': 'Ir al Desafío',
                'ASSAI_MUNDO': 'de Assaí para el Mundo',
                'O_QUE_E': '¿Qué es el <span class="text-[#ffc107]">Desafío?</span>',
                'HERO_DESC': 'Un movimiento que transforma <span class="font-bold text-[#ffc107]">sueños</span> en proyectos, canaliza <span class="font-bold text-white">energía</span> en impacto real y hace de la <span class="font-bold text-[#ffc107]">juventud</span> la protagonista de los cambios que queremos ver en la ciudad.',
                'APM_DESC1': 'El programa <strong class="text-blue-800">“De Assaí para el Mundo”</strong> transforma el recorrido de los Desafíos ODS en oportunidades prácticas, incentivando a los jóvenes a desarrollar soluciones alineadas con los Objetivos de Desarrollo Sostenible e promovendo la internacionalización de estas iniciativas.',
                'APM_DESC2': 'Haz clic abajo y conoce más',
                'QUEM_SOMOS_TIT': 'Quiénes Somos',
                'QUEM_SOMOS_DESC1': 'El Movimiento Juventud conecta a jóvenes de diferentes orígenes para idear y realizar proyectos que generan un impacto positivo en toda la ciudad.',
                'QUEM_SOMOS_DESC2': 'Innovación, cultura, deporte, educación y tecnología',
                'QUEM_SOMOS_DESC3': 'abren puertas, crean oportunidades y transforman realidades, haciendo de la juventud la protagonista de un nuevo futuro.',
                'POWERED': 'Powered by',
                'footer_p': '&copy; 2025 Municipalidad de Assaí',
            },
            'pt_PT': {
                'btn_traduzir': 'Traduzir',
                'PREFEITURA': 'Câmara Municipal de Assaí',
                'DESAFIO': 'Desafio',
                'QUEM_SOMOS': 'Quem Somos',
                'CIDADES': 'Cidades',
                'INSTITUIÇÕES': 'Instituições',
                'PARTICIPANTES': 'Participantes',
                'CONHECA': 'Conheça o Movimento',
                'IR_DESAFIO': 'Ir para o Desafio',
                'ASSAI_MUNDO': 'de Assaí para o Mundo',
                'O_QUE_E': 'O que é o <span class="text-[#ffc107]">Desafio?</span>',
                'HERO_DESC': 'Um movimento que transforma <span class="font-bold text-[#ffc107]">sonhos</span> em projetos, canaliza <span class="font-bold text-white">energia</span> em impacto real e faz da <span class="font-bold text-[#ffc107]">juventude</span> a protagonista das mudanças que queremos ver na cidade.',
                'APM_DESC1': 'O Programa <strong class="text-blue-800">“De Assaí pro Mundo”</strong> transforma a Jornada dos Desafios ODS em oportunidades práticas, incentivando jovens a desenvolver soluções alinhadas aos Objetivos de Desenvolvimento Sustentável e promovendo a internacionalização dessas iniciativas.',
                'APM_DESC2': 'Clique abaixo e saiba mais',
                'QUEM_SOMOS_TIT': 'Quem Somos',
                'QUEM_SOMOS_DESC1': 'O Movimento Juventude conecta jovens de diferentes origens para idealizar e realizar projetos que geram impacto positivo em toda a cidade.',
                'QUEM_SOMOS_DESC2': 'Inovação, cultura, esporte, educação e tecnologia',
                'QUEM_SOMOS_DESC3': 'abrem portas, criam oportunidades e transformam realidades, tornando a juventude protagonista de um novo futuro.',
                'POWERED': 'Powered by',
                'footer_p': '&copy; 2025 Câmara Municipal de Assaí',
            }
        };
    </script>

</body>

<script>
    // Toggle simples para menu mobile
    function toggleMenu() {
        const nav = document.getElementById('mobileMenu');
        nav.classList.toggle('hidden');
    }
</script>
</style>
</head>
<!-- Header -->
<header class="fixed top-0 left-0 right-0 bg-[#1e3a5f] shadow-lg z-50">

    <!-- Main Navigation -->
    <nav class="px-4 py-2">
        <div class="container mx-auto flex items-center justify-between max-w-7xl">
            <div class="flex items-center gap-2 sm:gap-3">
                <div class="flex items-center justify-center bg-white rounded-full shadow-lg h-12 w-12 sm:h-14 sm:w-14 md:h-16 md:w-16 border-2 sm:border-3 md:border-4 border-[#ffc107]">
                    <img src="/images/logos/Brasao_Assai.png" alt="Desafio Assaí" class="h-12 w-12 sm:h-14 sm:w-14 md:h-16 md:w-16 object-contain">
                </div>
                <span class="text-white font-bold text-sm sm:text-base md:text-lg" data-key="PREFEITURA">Prefeitura de Assaí</span>
            </div>

            <ul class="hidden md:flex items-center space-x-6">
                <li><a href="#sobre-apm" class="px-3 py-2 rounded-md text-sm font-medium text-white hover:text-white hover:bg-blue-600 transition" data-key="DESAFIO">Desafio</a></li>
                <li><a href="#sobre" class="px-3 py-2 rounded-md text-sm font-medium text-white hover:text-white hover:bg-blue-600 transition" data-key="QUEM_SOMOS">Quem Somos</a></li>
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
    <style>
        /* quick-link removido, usar classes Tailwind diretamente nos elementos */
    </style>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden bg-[#1e3a5f] border-t border-[#ffc107]">
        <div class="container mx-auto max-w-7xl py-4">
            <ul class="flex flex-col gap-2 mt-2">
                <li><a href="#sobre-apm" class="block py-3 px-4 rounded-lg text-base font-semibold text-white hover:bg-[#ffc107] hover:text-blue-900 transition" data-key="DESAFIO">Desafio</a></li>
                <li><a href="#sobre" class="block py-3 px-4 rounded-lg text-base font-semibold text-white hover:bg-[#ffc107] hover:text-blue-900 transition" data-key="QUEM_SOMOS">Quem Somos</a></li>
            </ul>
        </div>
        <!-- Botão Tradutor Mobile fixo na base do menu -->
        <div class="md:hidden w-full px-0 pb-2 pt-2 flex justify-center bg-[#1e3a5f] border-t border-[#ffc107]">
            <button data-key="btn_traduzir" id="btnTradutorMobile" onclick="toggleTradutor()" class="w-[95%] mx-auto flex justify-center items-center px-0 py-3 bg-[#ffc107] text-blue-900 rounded-lg font-bold shadow hover:bg-yellow-400 transition text-base gap-2" aria-label="Traduzir página">
                <svg class="w-5 h-5 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                </svg>
                <span>Traduzir</span>
            </button>
        </div>
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

<body class="bg-gray-50 text-gray-800">
    <!-- HERO DESKTOP -->
    <section class="gradient-bg-secondary text-white min-h-screen flex items-center justify-center px-6 pt-20 relative overflow-hidden hidden md:flex">
        <!-- Partículas decorativas animadas -->
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <div class="w-[500px] h-[500px] bg-purple-500/20 rounded-full blur-3xl absolute -top-40 -left-40 float-slow"></div>
            <div class="w-[400px] h-[400px] bg-yellow-400/20 rounded-full blur-3xl absolute top-20 right-20 float-slow" style="animation-delay: 1.5s;"></div>
            <div class="w-[450px] h-[450px] bg-blue-400/20 rounded-full blur-3xl absolute -bottom-20 left-1/3 float-slow" style="animation-delay: 3s;"></div>
        </div>

        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-16 items-center relative z-10">

            <!-- TEXTO HERO -->
            <div class="text-left fade-in-up">
                <!-- Badge superior -->
                <div class="glass-effect rounded-full px-5 py-2 mb-6 inline-flex items-center gap-2">
                    <span class="inline-block w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></span>
                    <span class="text-sm font-bold text-white">Programas para a Juventude de Assaí</span>
                </div>

                <!-- Título impactante -->
                <h1 class="text-5xl lg:text-7xl font-black drop-shadow-2xl mb-6 tracking-tight leading-tight">
                    <span class="block text-white mb-3" data-key="HERO_TIT1">A Juventude que</span>
                    <span class="inline-block text-gradient-yellow bg-white/10 backdrop-blur-sm px-6 py-3 rounded-3xl border-2 border-white/30 shadow-2xl" data-key="HERO_TIT2">Move a Cidade</span>
                </h1>

                <!-- Descrição -->
                <p class="mt-6 text-lg lg:text-xl text-white/90 leading-relaxed font-medium max-w-xl">
                    <span data-key="HERO_DESC">Um movimento que transforma <span class="font-bold text-yellow-300">sonhos</span> em projetos, canaliza <span class="font-bold text-yellow-300">energia</span> em impacto real e faz da <span class="font-bold text-yellow-300">juventude</span> a protagonista das mudanças que queremos ver na cidade.</span>
                </p>

                <!-- BOTÕES MODERNOS -->
                <div class="mt-10 flex flex-col sm:flex-row gap-4 sm:gap-5">
                    <!-- Botão Programa Principal -->
                    <a href="/home"
                        class="btn-modern px-8 py-5 rounded-2xl bg-gradient-to-r from-yellow-400 via-yellow-500 to-amber-500 text-gray-900 font-black shadow-2xl hover:shadow-yellow-500/50 hover:scale-105 transition-all text-base flex items-center justify-center gap-3 group border-2 border-yellow-300 focus-ring">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-base" data-key="IR_DESAFIO_BTN">De Assaí pro Mundo</span>
                        <svg class="w-5 h-5 transform group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>

                    <!-- Botão Secundário -->
                    <a href="#sobre"
                        class="btn-modern px-8 py-5 rounded-2xl bg-white/95 text-blue-700 font-black shadow-2xl hover:shadow-blue-500/30 hover:scale-105 transition-all text-base flex items-center justify-center gap-3 group border-2 border-white/50 focus-ring">
                        <span data-key="CONHECA">Conheça o Movimento</span>
                        <svg class="w-5 h-5 transform group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- IMAGEM HERO COM EFEITO -->
            <div class="flex flex-col items-center slide-in-right">
                <!-- Container com efeito glow -->
                <div class="relative">
                    <!-- Efeito de brilho ao fundo -->
                    <div class="absolute inset-0 bg-gradient-to-br from-yellow-400 via-purple-500 to-blue-500 rounded-[3rem] blur-2xl opacity-40 animate-pulse"></div>

                    <!-- Imagem principal -->
                    <img
                        src="/images/alunos.png"
                        alt="Movimento Juventude"
                        class="relative w-[450px] lg:w-[550px] rounded-[3rem] shadow-2xl border-4 border-white/40 backdrop-blur-sm float-slow">
                </div>

                <!-- Badge informativo -->
                <div class="glass-effect rounded-2xl px-6 py-3 mt-6 shadow-xl">
                    <p class="text-sm font-bold text-white text-center flex items-center gap-2">
                        Selecionados para o programa <strong class="text-yellow-300">De Assaí pro Mundo</strong>
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- De Assaí para o Mundo - Descritivo -->
    <section id="sobre-apm" class="py-12 sm:py-16 md:py-20 bg-gradient-to-br from-blue-50 via-white to-purple-50 relative overflow-hidden">
        <!-- Elementos decorativos de fundo -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-blue-400/10 to-purple-400/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-gradient-to-tr from-yellow-400/10 to-blue-400/10 rounded-full blur-3xl"></div>

        <div class="container mx-auto max-w-5xl px-4 sm:px-6 relative z-10">
            <!-- Título com destaque -->
            <div class="text-center mb-8 sm:mb-10 md:mb-12 fade-in-up px-2">
                <div class="inline-block glass-effect rounded-full px-4 sm:px-6 py-2 mb-3 sm:mb-4">
                    <span class="text-xs sm:text-sm font-bold text-blue-600 flex items-center gap-2">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                        </svg>
                        <span>Programa Internacional</span>
                    </span>
                </div>
                <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black text-gray-900 mb-3 sm:mb-4 px-2">
                    <span data-key="O_QUE_E">O que é o <span class="text-gradient">Programa?</span></span>
                </h2>
                <div class="w-20 sm:w-24 h-1 bg-gradient-to-r from-blue-500 via-purple-500 to-yellow-500 mx-auto rounded-full"></div>
            </div>

            <!-- Card principal -->
            <div class="card-3d card-shine bg-white rounded-2xl sm:rounded-3xl shadow-2xl border border-gray-100 p-6 sm:p-8 md:p-12 lg:p-16">
                <!-- Ícone decorativo -->
                <div class="flex justify-center mb-6 sm:mb-8">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl blur-xl opacity-50"></div>
                        <div class="relative bg-gradient-to-br from-blue-500 to-purple-600 p-4 sm:p-5 md:p-6 rounded-2xl shadow-xl">
                            <svg class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Descrição -->
                <p class="text-sm sm:text-base md:text-lg lg:text-xl text-gray-700 leading-relaxed mb-6 text-center max-w-3xl mx-auto">
                    <span data-key="APM_DESC1">O Programa <strong class="text-blue-600 font-black">"De Assaí pro Mundo"</strong> transforma a Jornada dos Desafios ODS em oportunidades práticas, incentivando jovens a desenvolver soluções alinhadas aos Objetivos de Desenvolvimento Sustentável e promovendo a internacionalização dessas iniciativas.</span>
                </p>

                <!-- Features em destaque -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6 mb-8 sm:mb-10">
                    <div class="text-center p-4 sm:p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl sm:rounded-2xl">
                        <div class="text-3xl sm:text-4xl mb-2 sm:mb-3">🌍</div>
                        <h3 class="font-bold text-gray-900 mb-1 sm:mb-2 text-sm sm:text-base">Internacional</h3>
                        <p class="text-xs sm:text-sm text-gray-600">Experiência em Portugal</p>
                    </div>
                    <div class="text-center p-4 sm:p-6 bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl sm:rounded-2xl">
                        <div class="text-3xl sm:text-4xl mb-2 sm:mb-3">💡</div>
                        <h3 class="font-bold text-gray-900 mb-1 sm:mb-2 text-sm sm:text-base">Inovação</h3>
                        <p class="text-xs sm:text-sm text-gray-600">Centros de tecnologia</p>
                    </div>
                    <div class="text-center p-4 sm:p-6 bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-xl sm:rounded-2xl">
                        <div class="text-3xl sm:text-4xl mb-2 sm:mb-3">🎯</div>
                        <h3 class="font-bold text-gray-900 mb-1 sm:mb-2 text-sm sm:text-base">ODS</h3>
                        <p class="text-xs sm:text-sm text-gray-600">Desenvolvimento sustentável</p>
                    </div>
                </div>

                <p class="text-sm sm:text-base text-gray-600 text-center mb-6 sm:mb-8" data-key="APM_DESC2">Clique abaixo e saiba mais</p>

                <!-- CTA Button -->
                <div class="flex justify-center px-2">
                    <a href="/home" class="btn-modern px-6 sm:px-8 md:px-10 py-4 sm:py-5 rounded-2xl bg-gradient-to-r from-blue-600 via-purple-600 to-blue-700 text-white font-black shadow-2xl hover:shadow-blue-500/50 hover:scale-105 transition-all text-sm sm:text-base md:text-lg flex items-center gap-2 sm:gap-3 group focus-ring w-full sm:w-auto justify-center">
                        <span data-key="IR_DESAFIO_BTN">Ir para o Programa</span>
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 transform group-hover:translate-x-2 group-hover:scale-110 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>



    <!-- QUEM SOMOS -->
    <section id="sobre" class="py-12 sm:py-16 md:py-20 lg:py-28 bg-gradient-to-b from-white via-purple-50 to-blue-50 relative overflow-hidden">
        <!-- Elementos decorativos -->
        <div class="absolute top-1/4 left-0 w-64 h-64 bg-purple-300/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-0 w-80 h-80 bg-blue-300/20 rounded-full blur-3xl"></div>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 relative z-10">
            <!-- Título da seção -->
            <div class="text-center mb-8 sm:mb-12 md:mb-16 fade-in-up">
                <div class="inline-block glass-effect rounded-full px-4 sm:px-6 py-2 mb-3 sm:mb-4">
                    <span class="text-xs sm:text-sm font-bold text-purple-600 flex items-center gap-2">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                        </svg>
                        <span>Sobre Nós</span>
                    </span>
                </div>
                <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black text-gray-900 mb-3 sm:mb-4 px-2">
                    <span data-key="QUEM_SOMOS_TIT" class="text-gradient">Quem Somos</span>
                </h2>
                <div class="w-20 sm:w-24 h-1 bg-gradient-to-r from-purple-500 via-blue-500 to-teal-500 mx-auto rounded-full"></div>
            </div>

            <!-- Card principal com descrição -->
            <div class="card-3d bg-white/90 backdrop-blur-sm shadow-2xl rounded-2xl sm:rounded-3xl p-6 sm:p-8 md:p-12 lg:p-16 border border-white/50 mb-8 sm:mb-12 md:mb-16">
                <div class="max-w-4xl mx-auto">
                    <!-- Ícone principal -->
                    <div class="flex justify-center mb-6 sm:mb-8">
                        <div class="bg-gradient-to-br from-purple-500 to-blue-600 p-4 sm:p-5 rounded-2xl shadow-xl">
                            <svg class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                    </div>

                    <p class="text-sm sm:text-base md:text-lg lg:text-xl text-gray-700 leading-relaxed text-center mb-4 sm:mb-6">
                        A <strong class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-600 text-base sm:text-lg md:text-xl lg:text-2xl">Juventude de Assaí</strong> é um movimento que promove o desenvolvimento dos jovens por meio de oportunidades de aprendizado, capacitação e participação ativa. Destaque para o <strong class="text-blue-600">Fórum Jovem</strong> e o cursinho pré-vestibular gratuito, que conectam estudantes a cursos, apoio e preparação para o futuro.
                    </p>

                    <p class="text-sm sm:text-base md:text-lg lg:text-xl text-gray-700 leading-relaxed text-center">
                        O protagonismo jovem também se destaca no <strong class="text-purple-600">Jornal Asahi</strong>, veículo administrado por estudantes do ensino fundamental e médio, que leva informação, cultura e cobertura de eventos para toda a comunidade. O jornal divulga conquistas da cidade, fortalecendo a participação ativa e o orgulho dos jovens de Assaí.
                    </p>
                </div>
            </div>

            <!-- Título de Programas -->
            <div class="text-center mb-8 sm:mb-10 md:mb-12 px-2">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 mb-3 sm:mb-4">
                    Nossos <span class="text-gradient">Programas</span>
                </h2>
                <p class="text-base sm:text-lg text-gray-600">Iniciativas que transformam futuros</p>
            </div>

            <!-- Cards de Programas Modernos -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                <!-- Card 1 - Cursinho -->
                <a href="https://valedosol.assai.pr.gov.br/forum-jovem/cursinho" target="_blank"
                    class="card-3d card-shine group bg-white rounded-2xl sm:rounded-3xl shadow-lg hover:shadow-2xl border-2 border-transparent hover:border-blue-500 p-6 sm:p-8 transition-all duration-300 focus-ring">
                    <div class="flex flex-col items-center text-center">
                        <!-- Ícone com gradiente -->
                        <div class="relative mb-4 sm:mb-6">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl blur-lg opacity-50 group-hover:opacity-75 transition-opacity"></div>
                            <div class="relative w-16 h-16 sm:w-20 sm:h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-xl transform group-hover:scale-110 group-hover:rotate-3 transition-all">
                                <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-black mb-2 sm:mb-3 text-gray-900 group-hover:text-blue-600 transition-colors">Cursinho Pré-vestibular</h3>
                        <p class="text-gray-600 text-sm sm:text-base leading-relaxed mb-3 sm:mb-4">
                            Curso gratuito que prepara jovens para o ingresso no ensino superior.
                        </p>
                        <div class="mt-auto flex items-center text-blue-600 font-bold group-hover:gap-3 gap-2 transition-all text-sm sm:text-base">
                            <span>Saiba mais</span>
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 transform group-hover:translate-x-2 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Card 2 - Jornal -->
                <a href="https://www.jornalasahi.com.br/" target="_blank"
                    class="card-3d card-shine group bg-white rounded-2xl sm:rounded-3xl shadow-lg hover:shadow-2xl border-2 border-transparent hover:border-purple-500 p-6 sm:p-8 transition-all duration-300 focus-ring">
                    <div class="flex flex-col items-center text-center">
                        <div class="relative mb-4 sm:mb-6">
                            <div class="absolute inset-0 bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl blur-lg opacity-50 group-hover:opacity-75 transition-opacity"></div>
                            <div class="relative w-16 h-16 sm:w-20 sm:h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-xl transform group-hover:scale-110 group-hover:rotate-3 transition-all">
                                <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-black mb-2 sm:mb-3 text-gray-900 group-hover:text-purple-600 transition-colors">Jornal Asahi</h3>
                        <p class="text-gray-600 text-sm sm:text-base leading-relaxed mb-3 sm:mb-4">
                            Reportagens desenvolvidas com a participação ativa de jovens estudantes.
                        </p>
                        <div class="mt-auto flex items-center text-purple-600 font-bold group-hover:gap-3 gap-2 transition-all text-sm sm:text-base">
                            <span>Saiba mais</span>
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 transform group-hover:translate-x-2 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Card 3 - Fórum -->
                <a href="https://valedosol.assai.pr.gov.br/forum-jovem" target="_blank"
                    class="card-3d card-shine group bg-white rounded-2xl sm:rounded-3xl shadow-lg hover:shadow-2xl border-2 border-transparent hover:border-teal-500 p-6 sm:p-8 transition-all duration-300 focus-ring">
                    <div class="flex flex-col items-center text-center">
                        <div class="relative mb-4 sm:mb-6">
                            <div class="absolute inset-0 bg-gradient-to-br from-teal-400 to-teal-600 rounded-2xl blur-lg opacity-50 group-hover:opacity-75 transition-opacity"></div>
                            <div class="relative w-16 h-16 sm:w-20 sm:h-20 bg-gradient-to-br from-teal-500 to-teal-600 rounded-2xl flex items-center justify-center shadow-xl transform group-hover:scale-110 group-hover:rotate-3 transition-all">
                                <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-black mb-2 sm:mb-3 text-gray-900 group-hover:text-teal-600 transition-colors">Fórum Jovem</h3>
                        <p class="text-gray-600 text-sm sm:text-base leading-relaxed mb-3 sm:mb-4">
                            Programa que oferece cursos e apoio educacional para estudantes.
                        </p>
                        <div class="mt-auto flex items-center text-teal-600 font-bold group-hover:gap-3 gap-2 transition-all text-sm sm:text-base">
                            <span>Saiba mais</span>
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 transform group-hover:translate-x-2 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>



    <!-- Powered by -->
    <div class="w-full flex justify-center items-center py-4 sm:py-6 bg-transparent px-4">
        <span class="inline-flex items-center gap-2 px-3 sm:px-4 py-2 rounded-full bg-white border border-gray-200 shadow text-sm sm:text-base font-normal">
            <span class="text-gray-400" data-key="POWERED">Powered by</span>
            <img src="/images/logos/Logo_VDS.png" alt="Vale do Sol" class="h-8 sm:h-10 md:h-12 w-auto ml-1" style="display:inline;vertical-align:middle;">
        </span>
    </div>

    <footer class="bg-[#1e3a5f] text-white py-6 sm:py-8 px-4 sm:px-6 mobile-card">
        <div class="container mx-auto max-w-7xl text-center">
            <p class="text-sm sm:text-base" data-key="footer_p">&copy; 2025 Prefeitura Municipal de Assaí</p>
        </div>
    </footer>

    <!-- Widget Tradutor -->
    <div id="tradutorWidget" class="hidden absolute left-1/2 -translate-x-1/2 mt-2 bg-white rounded shadow z-50 flex flex-row items-center gap-2 px-3 py-2" style="min-width:0;">
        <button data-key="btn_traduzir" onclick="toggleTradutor()" class="text-gray-300 hover:text-blue-500 text-base font-bold px-1 leading-none absolute -top-2 -right-2 bg-white rounded-full">&times;</button>
        <button id="btn-pt" onclick="setIdioma('pt')" data-lang="pt" class="lang-btn px-2 py-1 rounded bg-gray-100 hover:bg-blue-100 text-gray-700 text-xs font-semibold">Português (BR)</button>
        <button id="btn-pt_PT" onclick="setIdioma('pt_PT')" data-lang="pt_PT" class="lang-btn px-2 py-1 rounded bg-gray-100 hover:bg-blue-100 text-gray-700 text-xs font-semibold">Português (PT)</button>
        <button id="btn-en" onclick="setIdioma('en')" data-lang="en" class="lang-btn px-2 py-1 rounded bg-gray-100 hover:bg-blue-100 text-gray-700 text-xs font-semibold">Inglês</button>
        <button id="btn-es" onclick="setIdioma('es')" data-lang="es" class="lang-btn px-2 py-1 rounded bg-gray-100 hover:bg-blue-100 text-gray-700 text-xs font-semibold">Espanhol</button>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- SEO Meta Tags -->
    <title>RealTalk Daby: Inglês Corporativo para Alta Performance - Desbloqueie sua Fluência Global</title>
    <meta name="description" content="RealTalk Daby oferece treinamento de inglês corporativo focado em comunicação estratégica, persuasão e liderança para profissionais brasileiros em ambientes globais. Transforme sua fluência com nossa metodologia exclusiva e AI.">
    <meta name="keywords" content="inglês corporativo, fluência, comunicação global, treinamento de inglês, daby, realtalk, business english, liderança, apresentações, negociações, profissionais brasileiros">
    <meta name="author" content="RealTalk Daby">
    <meta name="robots" content="index, follow"> <!-- Indica aos motores de busca para indexar e seguir links -->
    <link rel="canonical" href="https://seusite.com.br/"> <!-- Substitua pelo URL real do seu site -->

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom Fonts: Inter (main), Patrick Hand (for handwriting style) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <!-- FontAwesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        /* Base Styling & Font */
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: #0C0C1D; /* Base dark blue-purple */
            color: #E0E0E0; 
            overflow-x: hidden; 
            scroll-behavior: smooth; 
        }
        .font-patrick-hand { font-family: 'Patrick Hand', cursive; }

        /* Custom Dark Mode Gradient Backgrounds */
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .main-gradient-bg {
            background: linear-gradient(-45deg, #0C0C1D, #1A1A3A, #2A154D, #1A1A3A, #0C0C1D); /* Deeper, richer gradients */
            background-size: 400% 400%;
            animation: gradientShift 20s ease infinite;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #1a1a2e; }
        ::-webkit-scrollbar-thumb { background: #6a0dad; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #8a2be2; }

        /* Navbar active link (if JS fails, will not show, but good to have) */
        .nav-link.active { border-bottom: 2px solid #00F0FF; } /* Cyan active link */

        /* Hide mobile menu content by default for JS fallback */
        #mobile-menu-content { display: none; }

        /* General Card Styling (for voce, methodology, features, habilidades, curriculum) */
        .general-card {
            background-color: rgba(25, 25, 50, 0.7); /* Deep dark background */
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(80, 50, 150, 0.3); /* Subtle purple border */
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }
        .general-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
            border-color: #A366FF; /* Purple hover border */
        }
        .general-card strong {
            color: #FF69B4; /* Hot Pink for strong text */
        }

        /* Icon Circle for 'Plataforma' section */
        .icon-circle {
            width: 80px; /* Adjust size for mobile */
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem; /* Adjust emoji size */
            color: white; /* Emoji color */
            border: 3px solid; /* Border will use passed color */
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }
        .icon-circle.border-cyan { border-color: #8BE9FD; background-color: rgba(139, 233, 253, 0.2); }
        .icon-circle.border-pink { border-color: #FF79C6; background-color: rgba(255, 121, 198, 0.2); }
        .icon-circle.border-purple { border-color: #BD93F9; background-color: rgba(189, 147, 249, 0.2); }

        /* Section Specific Background Adjustments for richer dark mode */
        /* Applying the new distinct dark colors */
        .section-bg-1 { background-color: #0C0C1D; } /* Deepest dark blue-purple */
        .section-bg-2 { background-color: #1A1A3A; } /* Slightly lighter blue-purple for contrast */
        .section-bg-3 { background-color: #2A154D; } /* Even lighter, more purple for another layer */

        #hero { 
            background-image: linear-gradient(rgba(12,12,29,0.85), rgba(26,21,77,0.85)), url('https://images.unsplash.com/photo-1510519138122-ec90209e742c?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); /* Abstract bg for Hero */
            background-size: cover;
            background-position: center;
            background-attachment: fixed; /* Parallax effect */
        }

        /* Timeline specific styles */
        .timeline-container {
            position: relative;
            padding-bottom: 2rem;
        }
        .timeline-line {
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 4px;
            background-color: #3A414F; /* Dark gray line */
            transform: translateX(-50%);
            z-index: 0;
        }
        /* Mobile adjustment for timeline */
        @media (max-width: 767px) {
            .timeline-line {
                left: 20px; /* Align to left for mobile */
                transform: translateX(0);
            }
            .general-card.timeline-item {
                margin-left: 20px; /* Push items to the right of the line */
            }
            .timeline-dot-1, .timeline-dot-2, .timeline-dot-3, .timeline-dot-4 {
                left: -20px !important; /* Move dots to align with mobile line */
                top: 50% !important; /* Keep vertically centered */
                transform: translateY(-50%) !important;
            }
            /* Ensure text for timeline items also aligns correctly for mobile */
            .general-card.flex-col.md\:flex-row {
                flex-direction: column !important;
                align-items: flex-start !important;
            }
            .general-card > div:first-child { /* The dot */
                /* Adjust dot position if specific layout is needed */
            }
            .general-card > div:last-child { /* The text content */
                margin-left: 0 !important; /* Reset margin from md:ml-8 */
                padding-left: 2rem; /* Add padding to align with dot content */
            }
        }
    </style>
</head>
<body class="bg-[#0C0C1D] text-[#E0E0E0]">
    <header class="navbar fixed top-0 left-0 w-full z-50 bg-[#0A0A15] shadow-lg py-4 px-6 md:px-12">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-3xl font-extrabold text-[#00F0FF] tracking-tight">Daby</a>
            <nav class="hidden md:flex space-x-8" id="desktop-navbar-links">
                <a href="#about" class="nav-link text-lg font-medium text-gray-200 hover:text-[#00F0FF] transition duration-300">Sobre</a>
                <a href="#voce" class="nav-link text-lg font-medium text-gray-200 hover:text-[#00F0FF] transition duration-300">O Desafio</a>
                <a href="#methodology" class="nav-link text-lg font-medium text-gray-200 hover:text-[#00F0FF] transition duration-300">Metodologia</a>
                <a href="#features" class="nav-link text-lg font-medium text-gray-200 hover:text-[#00F0FF] transition duration-300">Plataforma</a>
                <a href="#habilidades" class="nav-link text-lg font-medium text-gray-200 hover:text-[#00F0FF] transition duration-300">Habilidades</a>
                <a href="#curriculum" class="nav-link text-lg font-medium text-gray-200 hover:text-[#00F0FF] transition duration-300">Jornada</a>
                <a href="#contact" class="nav-link text-lg font-medium text-gray-200 hover:text-[#00F0FF] transition duration-300">Contato</a>
            </nav>
            <button id="mobile-menu-button" class="md:hidden text-gray-200 hover:text-[#00F0FF] focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
        <!-- Mobile Menu Content -->
        <nav id="mobile-menu-content" class="md:hidden bg-[#0A0A15] px-6 py-4 mt-4 rounded-lg shadow-md">
            <a href="#about" class="block text-lg font-medium text-gray-200 hover:text-[#00F0FF] py-2">Sobre</a>
            <a href="#voce" class="block text-lg font-medium text-gray-200 hover:text-[#00F0FF] py-2">O Desafio</a>
            <a href="#methodology" class="block text-lg font-medium text-gray-200 hover:text-[#00F0FF] py-2">Metodologia</a>
            <a href="#features" class="block text-lg font-medium text-gray-200 hover:text-[#00F0FF] py-2">Plataforma</a>
            <a href="#habilidades" class="block text-lg font-medium text-gray-200 hover:text-[#00F0FF] py-2">Habilidades</a>
            <a href="#curriculum" class="block text-lg font-medium text-gray-200 hover:text-[#00F0FF] py-2">Jornada</a>
            <a href="#contact" class="block text-lg font-medium text-gray-200 hover:text-[#00F0FF] py-2">Contato</a>
        </nav>
    </header>

    <main>
    <!-- About Section (Intro) -->
    <section id="about" class="main-gradient-bg py-24 md:py-32 px-6 flex items-center justify-center min-h-screen-1/2">
        <div class="container mx-auto text-center relative z-10 pt-16 md:pt-24">
            <p class="text-base md:text-lg font-medium text-[#FFD700] mb-3 md:mb-4 uppercase tracking-wider">ACELERE A PERFORMANCE GLOBAL BY DABY</p>
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight text-white drop-shadow-lg sr-only">RealTalk Daby: Inglês Corporativo para Alta Performance</h1>
            <h2 class="text-3xl md:text-5xl font-extrabold leading-tight text-[#00F0FF] drop-shadow-lg">RealTalk Daby</h2>
            <p class="mt-4 text-xl md:text-2xl font-light text-[#BD93F9]">Fluência como Reflexo, não como Barreira.</p>
        </div>
    </section>

    <!-- Hero Section -->
    <section id="hero" class="section-bg-2 py-20 md:py-32 text-center relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <p class="text-base md:text-lg font-bold text-[#FF79C6] mb-4 uppercase tracking-widest">RealTalk Daby</p>
            <h2 class="text-4xl md:text-6xl font-extrabold leading-tight mb-4 text-white">Comunicação que Decola.</h2>
            <h3 class="text-2xl md:text-3xl font-semibold mb-6 text-[#8BE9FD]">Inglês específico para profissionais Brasileiros</h3>
            <p class="text-lg md:text-xl font-light max-w-3xl mx-auto text-gray-300 mb-10">Transforme seu Inglês Corporativo em seu maior ativo. Sem esforço. Com impacto.</p>
            <a href="#contact" class="inline-block bg-[#BD93F9] text-[#121212] font-bold py-3 px-8 rounded-full shadow-lg hover:bg-[#FF79C6] transform hover:scale-105 transition duration-300 ease-in-out uppercase text-lg tracking-wide">Comece Sua Transformação Agora!</a>
        </div>
        <!-- Abstract shapes can be added here with absolute positioning and low opacity if desired -->
    </section>

    <!-- Seção 'Você' - Reestruturada com Cards -->
    <section id="voce" class="section-bg-1 py-20 px-6">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-[#FFD700] mb-12">Você Sabe o Desafio. Nós Temos a Solução.</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Card 1 -->
                <div class="general-card flex flex-col items-center p-6">
                    <svg class="w-10 h-10 text-[#00F0FF] mb-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                    <p class="text-gray-200 text-lg">Você é um profissional fera e tem ambição global. Seu inglês, porém, está "travado" ou não reflete seu potencial.</p>
                </div>
                <!-- Card 2 -->
                <div class="general-card flex flex-col items-center p-6">
                    <svg class="w-10 h-10 text-[#FF69B4] mb-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zm3 8a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1z"></path><path fill-rule="evenodd" d="M3 5a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V5zm1.5 8.5a1.5 1.5 0 110-3 1.5 1.5 0 010 3z" clip-rule="evenodd"></path></svg>
                    <p class="text-gray-200 text-lg">Reuniões, apresentações, e-mails... Você se sente inseguro(a) e precisa de mais agilidade e sem ruídos. ✨</p>
                </div>
                 <!-- Card 3 -->
                 <div class="general-card flex flex-col items-center p-6">
                    <svg class="w-10 h-10 text-[#BD93F9] mb-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17.555 1.75C16.92 1.074 15.938.868 15 1.25S13.439 2.508 14.156 3.25L14.47 3.565 10 8l-4-4L1.75 8.25C1.07 8.924.868 9.92 1.25 10s2.008 1.439 2.75 2.156L3.565 14.47 8 19l4-4 4.25-4.25c.674-.67 1.66-.868 2.05-1.25s.743-1.438.25-2.156L17.555 1.75z"></path></svg>
                    <p class="text-gray-200 text-lg">O RealTalk Daby te dá a chance de alavancar para um inglês que seja um reflexo da sua alta performance.</p>
                </div>
                <!-- Card 4 -->
                <div class="general-card flex flex-col items-center p-6">
                    <svg class="w-10 h-10 text-[#FFD700] mb-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd"></path></svg>
                    <p class="text-gray-200 text-lg">Prepare-se para uma fluência com agilidade, liberdade e sem ruídos.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção 'Seu Desafio' -->
    <section id="challenge" class="section-bg-2 py-20 px-6 text-center">
        <div class="container mx-auto">
            <h2 class="text-3xl md:text-4xl font-extrabold text-[#BD93F9] mb-6">INGLÊS NUNCA FOI FÁCIL. 😩</h2>
            <p class="text-xl md:text-2xl font-light text-gray-300 max-w-4xl mx-auto">
                Prepare-se para alavancar seu inglês com a IA e metodologias que realmente funcionam para o mercado corporativo.
            </p>
        </div>
    </section>

    <!-- Seção 'Metodologia' -->
    <section id="methodology" class="section-bg-1 py-20 px-6">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-[#FFD700] mb-12">🧠 O SHIFT REAL TALK DABY: Da Teoria à Competência Instantânea.</h2>
            <p class="text-lg text-gray-300 max-w-4xl mx-auto mb-12">
                O RealTalk Daby te tira da teoria: aqui, o foco é na ação, na comunicação imediata, natural e estratégica, para resultados que você vê e sente no dia a dia. Chega de "achismo" ou foco na memorização. Identifica *exatamente* onde o profissional trava (vocabulário, estrutura, confiança).
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <!-- Card 1 -->
                <div class="general-card p-8">
                    <h3 class="text-2xl font-semibold text-[#FFD700] mb-4">Meu compromisso: Capacidades dos Produtos</h3>
                    <ul class="text-gray-300 text-left space-y-2 pl-5 list-disc">
                        <li>Construção de repertório de fala e escuta ativa.</li>
                        <li>Assertividade e persuasão (apresentações e reuniões).</li>
                        <li>Comunicação em situações de alta complexidade.</li>
                        <li>Gerenciamento de conflitos e negociações (Diplomacy Skills).</li>
                        <li>Liderança (apresentação de ideias com confiança e carisma).</li>
                    </ul>
                </div>
                <!-- Card 2 -->
                <div class="general-card p-8">
                    <h3 class="text-2xl font-semibold text-[#8BE9FD] mb-4">Simulador de Cenários Dinâmicos e Reais</h3>
                    <ul class="text-gray-300 text-left space-y-2 pl-5 list-disc">
                        <li>Aprenda a performar em situações profissionais críticas.</li>
                        <li>Sinta a pressão e o ritmo de reuniões globais antes que elas aconteçam.</li>
                        <li>Respostas rápidas e claras sob demanda.</li>
                    </ul>
                </div>
                <!-- Card 3 -->
                <div class="general-card p-8">
                    <h3 class="text-2xl font-semibold text-[#FF69B4] mb-4">Análise Preditiva de Gaps</h3>
                    <ul class="text-gray-300 text-left space-y-2 pl-5 list-disc">
                        <li>Nossa IA identifica pontos fracos no seu inglês (vocabulário, gramática, pronúncia).</li>
                        <li>Foco cirúrgico naquilo que realmente limita sua performance.</li>
                        <li>Correção imediata e acompanhamento do progresso.</li>
                    </ul>
                </div>
                <!-- Card 4 -->
                <div class="general-card p-8">
                    <h3 class="text-2xl font-semibold text-[#BD93F9] mb-4">Modo Simulador de Voo</h3>
                    <ul class="text-gray-300 text-left space-y-2 pl-5 list-disc">
                        <li>Treinamento em **stress elevado** (negociações críticas, gestão de crise).</li>
                        <li>Inglês automático em situações de alta pressão.</li>
                        <li>Desenvolva resiliência e tomada de decisão sob pressão.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção 'Plataforma RealTalk Daby' - Com Emojis -->
    <section id="features" class="section-bg-2 py-20 px-6">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-[#FFD700] mb-12">Plataforma RealTalk Daby: Seu Ambiente de Alta Performance.</h2>
            <p class="text-lg text-gray-300 max-w-4xl mx-auto mb-12">Construída para profissionais exigentes, nossa plataforma integra tecnologia de ponta e uma metodologia exclusiva para seu avanço.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="general-card flex flex-col items-center p-6">
                    <div class="icon-circle mb-6 border-cyan"><span role="img" aria-label="emoji robot">🤖</span></div>
                    <h3 class="text-2xl font-semibold text-[#8BE9FD] mb-4">AI Preditiva & Feedback Imediato</h3>
                    <p class="text-gray-300 text-center">Nossa inteligência artificial analisa sua fala, sotaque e fluidez, entregando feedback em tempo real para um ajuste instantâneo.</p>
                </div>
                <!-- Card 2 -->
                <div class="general-card flex flex-col items-center p-6">
                    <div class="icon-circle mb-6 border-pink"><span role="img" aria-label="emoji claquete">🎬</span></div>
                    <h3 class="text-2xl font-semibold text-[#FF79C6] mb-4">Cenários Reais & Simulados</h3>
                    <p class="text-gray-300 text-center">Treine em situações do dia a dia corporativo, desde reuniões informais a negociações complexas, preparando-o para qualquer desafio.</p>
                </div>
                <!-- Card 3 -->
                <div class="general-card flex flex-col items-center p-6">
                    <div class="icon-circle mb-6 border-purple"><span role="img" aria-label="emoji cérebro">🧠</span></div>
                    <h3 class="text-2xl font-semibold text-[#BD93F9] mb-4">Preparação Psicológica</h3>
                    <p class="text-gray-300 text-center">Desenvolvemos sua confiança para falar em público e gerenciar o stress em comunicações de alto impacto, em qualquer idioma.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção 'Habilidades de Liderança Global' -->
    <section id="habilidades" class="section-bg-1 py-20 px-6">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-[#BD93F9] mb-12">🎓 Estrutura Modular: Habilidades de Liderança Global</h2>
            <p class="text-lg text-gray-300 max-w-4xl mx-auto mb-12">
                Nosso programa é modular, focando em habilidades essenciais para um líder global, garantindo que você desenvolva exatamente o que precisa.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Habilidade Card 1 -->
                <div class="general-card p-6">
                    <h3 class="text-xl font-semibold text-[#FF69B4] mb-3">Negociação Estratégica Internacional</h3>
                    <p class="text-gray-300 text-base">Domine a arte da negociação em inglês, com foco em táticas, sensibilidade cultural e fechamento de acordos globais.</p>
                </div>
                <!-- Habilidade Card 2 -->
                <div class="general-card p-6">
                    <h3 class="text-xl font-semibold text-[#00F0FF] mb-3">Comunicação Persuasiva em Apresentações</h3>
                    <p class="text-gray-300 text-base">Cative sua audiência. Aprenda a estruturar e entregar apresentações de alto impacto, com clareza e confiança inabaláveis.</p>
                </div>
                <!-- Habilidade Card 3 -->
                <div class="general-card p-6">
                    <h3 class="text-xl font-semibold text-[#FFD700] mb-3">Gestão de Crises e Conflitos</h3>
                    <p class="text-gray-300 text-base">Mantenha a calma e o controle. Desenvolva habilidades para mediar crises e resolver conflitos em inglês, protegendo sua reputação.</p>
                </div>
                <!-- Habilidade Card 4 -->
                <div class="general-card p-6">
                    <h3 class="text-xl font-semibold text-[#BD93F9] mb-3">Networking e Relacionamento Global</h3>
                    <p class="text-gray-300 text-base">Expanda sua rede. Aperfeiçoe suas habilidades de comunicação para construir relacionamentos sólidos e duradouros no cenário internacional.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção 'Jornada de Aprendizado' -->
    <section id="curriculum" class="section-bg-2 py-20 px-6">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-[#8BE9FD] mb-12">🗺️ Sua Jornada de Alta Performance: Módulos RealTalk Daby</h2>
            <p class="text-lg text-gray-300 max-w-4xl mx-auto mb-16">
                Nosso currículo é desenhado para uma progressão lógica e eficaz, garantindo que você domine cada etapa rumo à fluência total.
            </p>

            <div class="timeline-container max-w-5xl mx-auto">
                <div class="timeline-line hidden md:block"></div> <!-- Hidden on mobile, shown on desktop -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-16 md:gap-x-12 relative">
                    <!-- Step 1 -->
                    <div class="general-card flex flex-col md:flex-row items-center md:items-start text-left relative z-10 md:mr-auto">
                        <div class="w-12 h-12 bg-[#FF79C6] rounded-full flex items-center justify-center text-xl font-bold text-gray-900 absolute -left-6 md:-left-6 top-1/2 -translate-y-1/2 transform border-2 border-white timeline-dot-1">1</div>
                        <div class="md:ml-8 mt-4 md:mt-0">
                            <h3 class="text-2xl font-semibold text-[#FF79C6] mb-2">Módulo 1: Desbloqueio e Diagnóstico</h3>
                            <p class="text-gray-300">Avaliação do seu perfil de comunicação e identificação de gaps, com foco em desbloquear barreiras de confiança e fluência.</p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="general-card flex flex-col md:flex-row items-center md:items-start text-left relative z-10 md:ml-auto md:order-last">
                        <div class="w-12 h-12 bg-[#8BE9FD] rounded-full flex items-center justify-center text-xl font-bold text-gray-900 absolute -left-6 md:-left-6 top-1/2 -translate-y-1/2 transform border-2 border-white timeline-dot-2">2</div>
                        <div class="md:ml-8 mt-4 md:mt-0">
                            <h3 class="text-2xl font-semibold text-[#8BE9FD] mb-2">Módulo 2: Imersão em Cenários Corporativos</h3>
                            <p class="text-gray-300">Treinamento prático e intensivo em simulações de reuniões, pitches, negociações e e-mails, com feedback instantâneo de IA.</p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="general-card flex flex-col md:flex-row items-center md:items-start text-left relative z-10 md:mr-auto">
                        <div class="w-12 h-12 bg-[#BD93F9] rounded-full flex items-center justify-center text-xl font-bold text-gray-900 absolute -left-6 md:-left-6 top-1/2 -translate-y-1/2 transform border-2 border-white timeline-dot-3">3</div>
                        <div class="md:ml-8 mt-4 md:mt-0">
                            <h3 class="text-2xl font-semibold text-[#BD93F9] mb-2">Módulo 3: Liderança e Diplomacia Global</h3>
                            <p class="text-gray-300">Foco em comunicação estratégica, persuasão, gestão de equipes globais e resolução de conflitos em inglês, construindo sua voz de liderança.</p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="general-card flex flex-col md:flex-row items-center md:items-start text-left relative z-10 md:ml-auto md:order-last">
                        <div class="w-12 h-12 bg-[#FFD700] rounded-full flex items-center justify-center text-xl font-bold text-gray-900 absolute -left-6 md:-left-6 top-1/2 -translate-y-1/2 transform border-2 border-white timeline-dot-4">4</div>
                        <div class="md:ml-8 mt-4 md:mt-0">
                            <h3 class="text-2xl font-semibold text-[#FFD700] mb-2">Módulo Final: Maestria e Mentoria Contínua</h3>
                            <p class="text-gray-300">Refinamento de habilidades, mentoria individualizada e estratégias para manter sua fluência afiada e em constante evolução no ambiente profissional.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção 'Contato Simplificada' -->
    <section id="contact" class="section-bg-1 py-20 px-6 text-center">
        <div class="container mx-auto">
            <h2 class="text-3xl md:text-5xl font-bold text-[#8BE9FD] mb-12">Fale com a Daby!</h2>
            <p class="text-lg text-gray-300 max-w-3xl mx-auto mb-10">
                Pronto para transformar seu inglês corporativo? Entre em contato e vamos conversar sobre seus objetivos!
            </p>

            <div class="flex flex-col md:flex-row items-center justify-center gap-8 max-w-xl mx-auto contact-content-container">
                <a href="mailto:vishuld@yahoo.it" class="flex items-center space-x-4 general-card p-4 hover:border-[#8BE9FD]">
                    <i class="fas fa-envelope text-4xl text-[#8BE9FD]"></i>
                    <span class="text-xl font-bold text-gray-100">vishuld@yahoo.it</span>
                </a>
                <a href="https://wa.me/5511986108003" target="_blank" rel="noopener noreferrer" class="flex items-center space-x-4 general-card p-4 hover:border-[#FF79C6]">
                    <i class="fab fa-whatsapp text-4xl text-[#FF79C6]"></i>
                    <span class="text-xl font-bold text-gray-100">+55 11 98610-8003</span>
                </a>
            </div>
        </div>
    </section>
    </main>

    <!-- Footer -->
    <footer class="bg-[#0A0A15] py-8 px-6 text-center text-gray-400 text-sm border-t border-[#1A1A2E]">
        <div class="container mx-auto">
            <p class="text-gray-500 text-base">RealTalk Daby: Elevando sua comunicação global.</p>
            <p class="mt-2">&copy; 2025 RealTalk Daby. Todos os direitos reservados. | <a href="#privacy" class="text-[#BD93F9] hover:text-[#FF79C6] transition duration-300">Política de Privacidade</a> | <a href="#terms" class="text-[#BD93F9] hover:text-[#FF79C6] transition duration-300">Termos de Serviço</a></p>
        </div>
    </footer>

    <!-- JavaScript for Mobile Menu Toggle and Smooth Scrolling -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenuContent = document.getElementById('mobile-menu-content');
            const desktopNavbarLinks = document.getElementById('desktop-navbar-links');

            // Toggle mobile menu visibility
            if (mobileMenuButton && mobileMenuContent) {
                mobileMenuButton.addEventListener('click', function () {
                    const isDisplayed = mobileMenuContent.style.display === 'block';
                    mobileMenuContent.style.display = isDisplayed ? 'none' : 'block';
                });

                // Close mobile menu when a link is clicked
                mobileMenuContent.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', function() {
                        mobileMenuContent.style.display = 'none';
                    });
                });
            }

            // Handle responsive display of menus (desktop vs mobile)
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768) { // md breakpoint for Tailwind
                    if (mobileMenuContent) mobileMenuContent.style.display = 'none';
                    if (desktopNavbarLinks) desktopNavbarLinks.style.display = 'flex';
                } else {
                    if (desktopNavbarLinks) desktopMenuContent.style.display = 'none'; // Corrected variable name
                }
            });

            window.dispatchEvent(new Event('resize')); // Trigger on load

            // Smooth scroll for all internal links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    const navbar = document.querySelector('.navbar');
                    const navbarHeight = navbar ? navbar.offsetHeight : 0;

                    if (targetElement) {
                        const offset = targetElement.getBoundingClientRect().top + window.scrollY - navbarHeight;
                        window.scrollTo({
                            top: offset,
                            behavior: 'smooth'
                        });
                        // Close mobile menu after clicking a link
                        if (mobileMenuContent && mobileMenuContent.style.display === 'block') {
                            mobileMenuContent.style.display = 'none';
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>

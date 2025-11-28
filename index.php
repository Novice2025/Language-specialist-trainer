<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RealTalk Daby (Corporate Edition)</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom Fonts: Inter (main), Patrick Hand (for handwriting style) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
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

        /* Specific styles for card in 'Você' section */
        .voce-card {
            display: flex;
            align-items: flex-start; /* Align icon and text to the top */
            gap: 1rem;
            background-color: rgba(25, 25, 50, 0.7); /* Deep dark background */
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(80, 50, 150, 0.3); /* Subtle purple border */
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }
        .voce-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
            border-color: #A366FF; /* Purple hover border */
        }
        .voce-card svg {
            color: #00F0FF; /* Electric Cyan icon */
            min-width: 24px;
            font-size: 1.5rem;
            margin-top: 0.25rem;
        }
        .voce-card strong {
            color: #FF69B4; /* Hot Pink for strong text */
        }

        /* Section Specific Background Adjustments for richer dark mode */
        #about { background: linear-gradient(to bottom, #1A1A3A, #0C0C1D); } /* Deeper initial section */
        #hero { 
            background-image: linear-gradient(rgba(12,12,29,0.85), rgba(26,21,77,0.85)), url('https://images.unsplash.com/photo-1510519138122-ec90209e742c?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); 
            background-color: #0C0C1D; /* Fallback for transparency */
        }
        #voce { background: linear-gradient(to bottom, #0C0C1D, #1A1A3A); }
        #challenge { background: linear-gradient(to bottom, #1A1A3A, #2A154D); }
        #methodology { background: linear-gradient(to bottom, #2A154D, #1A1A3A); }
        #features { background: linear-gradient(to bottom, #1A1A3A, #0C0C1D); }
        #habilidades { background: linear-gradient(to bottom, #0C0C1D, #1A1A3A); }
        #curriculum { background: linear-gradient(to bottom, #1A1A3A, #2A154D); }
        #contact { background: linear-gradient(to bottom, #2A154D, #0C0C1D); }
        footer { background-color: #050510; border-top-color: #1A1A3A; }


        /* General Card Styling (used across multiple sections) */
        .general-card {
            background-color: #1A1A3A; /* Consistent dark card bg, slightly lighter */
            border-radius: 0.75rem; /* Rounded corners */
            padding: 2rem;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4); /* Deeper shadow */
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
            border: 1px solid rgba(80, 50, 150, 0.2); /* Subtle default border */
            color: #CCCCCC; /* Default text color in cards */
        }
        .general-card:hover {
            transform: translateY(-6px); /* More subtle lift on hover */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
            border-color: #A366FF; /* Universal hover border accent */
        }
        .general-card h3 {
            font-size: 1.6rem; /* Slightly smaller for better hierarchy */
            font-weight: 700;
            color: #00F0FF; /* Cyan for card titles */
            margin-bottom: 1rem;
        }
        .general-card p, .general-card ul li {
            font-size: 1rem;
            line-height: 1.6;
            color: #CCCCCC;
        }
        .general-card ul.list-disc {
            list-style: disc;
            margin-left: 1.25rem;
        }
        .general-card .icon-small {
            font-size: 1.8rem;
            color: #FFD700; /* Gold for feature icons */
            margin-bottom: 1rem;
        }
        .general-card .img-round {
            width: 80px; height: 80px;
            border-radius: 50%;
            border: 3px solid #6A0DAD; /* Purple border for images */
            margin-bottom: 1.5rem;
            object-fit: cover;
        }


        /* Hero Section Specific Overrides */
        .hero-title {
            background: linear-gradient(90deg, #FF69B4, #A366FF, #00F0FF); /* Pink -> Purple -> Cyan */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 5rem;
            text-shadow: 0 0 20px rgba(255,105,180,0.6);
        }
        .hero-subtitle {
            font-size: 2.5rem;
            color: #00F0FF; /* Cyan */
            text-shadow: 0 0 15px rgba(0,240,255,0.4);
        }
        .hero-description {
            font-size: 1.35rem;
            color: #CCCCCC;
            max-width: 750px;
        }
        .hero-headline { /* New headline */
            font-size: 1.75rem;
            font-weight: 600;
            color: #FFD700; /* Gold */
            margin-top: 1.5rem;
            text-shadow: 0 0 10px rgba(255,215,0,0.3);
        }
        .hero-button {
            background: linear-gradient(45deg, #FF69B4, #A366FF); /* HotPink to Purple */
            box-shadow: 0 8px 25px rgba(255,105,180,0.5);
            color: white;
        }
        .hero-button:hover {
            background: linear-gradient(45deg, #A366FF, #FF69B4);
            transform: translateY(-4px);
            box-shadow: 0 12px 35px rgba(255,105,180,0.7);
        }

        /* Challenge Section */
        #challenge .challenge-title { color: #A366FF; } /* Purple title */
        #challenge .challenge-subtitle { color: #FF69B4; } /* Pink subtitle */
        #challenge .challenge-ia-text strong { color: #00F0FF; } /* Cyan highlights */

        /* Methodology Section */
        #methodology .methodology-title { color: #00F0FF; } /* Cyan title */
        #methodology .general-card h3 { color: #A366FF; } /* Card titles purple */
        #methodology .general-card strong.highlight-bold { color: #FFD700; } /* Gold highlight */

        /* Features Section */
        #features .features-title { color: #FFD700; } /* Gold title */
        #features .general-card h3 { color: #00F0FF; } /* Card titles cyan */

        /* Habilidades Section */
        #habilidades .habilidades-title { color: #A366FF; } /* Purple title */
        #habilidades .general-card h3 { color: #FF69B4; } /* Card titles pink */
        #habilidades .general-card ul li::before { color: #00F0FF; } /* Cyan bullets */

        /* Curriculum Section */
        #curriculum .curriculum-title { color: #FFD700; } /* Gold title */
        #curriculum .general-card h3 { color: #FF69B4; } /* Card titles pink */
        #curriculum .curriculum-btn {
            background: linear-gradient(45deg, #00F0FF, #A366FF);
            color: #0C0C1D; /* Dark text for bright button */
            box-shadow: 0 6px 20px rgba(0,240,255,0.4);
        }
        #curriculum .curriculum-btn:hover {
            background: linear-gradient(45deg, #A366FF, #00F0FF);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,240,255,0.6);
        }
        #curriculum .timeline-dot-1 { background-color: #FF69B4; border-color: #FF69B4; }
        #curriculum .timeline-dot-2 { background-color: #00F0FF; border-color: #00F0FF; }
        #curriculum .timeline-dot-3 { background-color: #A366FF; border-color: #A366FF; }
        #curriculum .timeline-dot-4 { background-color: #FFD700; border-color: #FFD700; }
        #curriculum .timeline-line { background-color: #1A1A3A; }

        /* Contact Section */
        #contact .contact-title { color: #00F0FF; } /* Cyan title */
        #contact .contact-content-container { background-color: #1A1A3A; border-color: rgba(80, 50, 150, 0.3); }
        #contact .contact-option i { color: #FF69B4; } /* Icons pink */
        #contact .contact-option a { color: #00F0FF; } /* Links cyan */
        #contact .contact-option a:hover { color: #A366FF; text-decoration: underline; } /* Purple hover */


        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .hero-title { font-size: 2.5rem !important; }
            .hero-subtitle { font-size: 1.25rem !important; margin-top: 0.5rem !important; }
            .hero-description { font-size: 1rem !important; margin-top: 1rem !important; }
            .hero-headline { font-size: 1.5rem !important; margin-top: 1.5rem !important; }

            .introduction-header h1 { font-size: 2rem; }
            .introduction-header h2 { font-size: 1.2rem; }
            #voce h2, #challenge h2, #methodology h2, #features h2, #habilidades h2, #curriculum h2, #contact h2 { font-size: 2.2rem; }
            .voce-card h3 { font-size: 1.3rem; }
            .voce-card p { font-size: 0.9rem; }
            .voce-card svg { font-size: 2rem; }
            .challenge-subtitle { font-size: 1.5rem; }
            .challenge-ia-text { font-size: 1rem; }
            .general-card h3 { font-size: 1.4rem; }
            .general-card p, .general-card ul li { font-size: 0.95rem; }
            #contact .contact-option i { font-size: 1.8rem; }
            #contact .contact-option a { font-size: 1.1rem; }
        }
    </style>
</head>
<body class="bg-[#0C0C1D] text-gray-100">

    <!-- Navbar -->
    <nav class="navbar fixed top-0 left-0 w-full bg-[#1e1e2d] bg-opacity-95 shadow-lg z-50 py-4 px-6">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#hero" class="text-2xl font-bold text-white tracking-wider">RealTalk Daby</a>

            <!-- Desktop Nav Links -->
            <div id="desktop-navbar-links" class="hidden md:flex space-x-8">
                <a href="#about" class="nav-link text-white hover:text-[#00F0FF] transition duration-300">Sobre</a>
                <a href="#voce" class="nav-link text-white hover:text-[#00F0FF] transition duration-300">Você</a>
                <a href="#challenge" class="nav-link text-white hover:text-[#00F0FF] transition duration-300">Seu Desafio</a>
                <a href="#methodology" class="nav-link text-white hover:text-[#00F0FF] transition duration-300">Metodologia</a>
                <a href="#features" class="nav-link text-white hover:text-[#00F0FF] transition duration-300">Plataforma</a>
                <a href="#habilidades" class="nav-link text-white hover:text-[#00F0FF] transition duration-300">Habilidades</a>
                <a href="#curriculum" class="nav-link text-white hover:text-[#00F0FF] transition duration-300">Currículo</a>
                <a href="#contact" class="nav-link text-white hover:text-[#00F0FF] transition duration-300">Contato</a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-white focus:outline-none">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Content -->
        <div id="mobile-menu-content" class="md:hidden bg-[#1e1e2d] py-4 mt-4 shadow-lg">
            <a href="#about" class="block px-6 py-2 text-white hover:bg-[#2A2A40] transition duration-300">Sobre</a>
            <a href="#voce" class="block px-6 py-2 text-white hover:bg-[#2A2A40] transition duration-300">Você</a>
            <a href="#challenge" class="block px-6 py-2 text-white hover:bg-[#2A2A40] transition duration-300">Seu Desafio</a>
            <a href="#methodology" class="block px-6 py-2 text-white hover:bg-[#2A2A40] transition duration-300">Metodologia</a>
            <a href="#features" class="block px-6 py-2 text-white hover:bg-[#2A2A40] transition duration-300">Plataforma</a>
            <a href="#habilidades" class="block px-6 py-2 text-white hover:bg-[#2A2A40] transition duration-300">Habilidades</a>
            <a href="#curriculum" class="block px-6 py-2 text-white hover:bg-[#2A2A40] transition duration-300">Currículo</a>
            <a href="#contact" class="block px-6 py-2 text-white hover:bg-[#2A2A40] transition duration-300">Contato</a>
        </div>
    </nav>

    <!-- Header Introduction Section -->
    <section id="about" class="bg-gradient-dark-1 pt-32 pb-16 text-center">
        <div class="container mx-auto px-6">
            <h1 class="text-3xl md:text-5xl font-extrabold leading-tight tracking-tight text-[#FFD700]">ACELERE A PERFORMANCE GLOBAL BY DABY</h1>
            <p class="mt-4 text-xl md:text-2xl font-light text-[#A366FF]">Fluência como Reflexo, não como Barreira.</p>
        </div>
    </section>

    <!-- Hero Section -->
    <section id="hero" class="bg-gradient-dark-2 py-20 md:py-32 text-center relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <p class="text-base md:text-lg font-bold text-[#FF69B4] mb-4 uppercase tracking-widest">RealTalk Daby</p>
            <h2 class="hero-title text-4xl md:text-6xl font-extrabold leading-tight mb-4 text-white">Comunicação que Decola.</h2>
            <h3 class="hero-headline text-2xl md:text-3xl font-semibold mb-6 text-[#00F0FF]">Inglês específico para profissionais Brasileiros</h3>
            <p class="hero-description md:text-xl font-light max-w-3xl mx-auto text-gray-300 mb-10">Transforme seu Inglês Corporativo em seu maior ativo. Sem esforço. Com impacto.</p>
            <a href="#contact" class="inline-block bg-[#FF79C6] text-[#0C0C1D] font-bold py-3 px-8 rounded-full shadow-lg hover:bg-[#A366FF] transform hover:scale-105 transition duration-300 ease-in-out uppercase text-lg tracking-wide">Comece Sua Transformação Agora!</a>
        </div>
    </section>

    <!-- Seção 'Você' - Reestruturada com Cards -->
    <section id="voce" class="bg-gradient-dark-1 py-20 px-6">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-[#FFD700] mb-12">Você Sabe o Desafio. Nós Temos a Solução.</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Card 1 -->
                <div class="voce-card general-card">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                    <div>
                        <h3 class="font-patrick-hand text-xl md:text-2xl text-[#FF69B4] mb-2">Profissional fera, inglês "travado"?</h3>
                        <p class="text-gray-200">Mesmo com alta performance, o inglês ainda é o seu <strong class="text-[#FFD700]">calcanhar de Aquiles</strong> que limita seu avanço global. 😩</p>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="voce-card general-card">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zm3 8a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1z"></path><path fill-rule="evenodd" d="M3 5a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V5zm1.5 8.5a1.5 1.5 0 110-3 1.5 1.5 0 010 3z" clip-rule="evenodd"></path></svg>
                    <div>
                        <h3 class="font-patrick-hand text-xl md:text-2xl text-[#FF69B4] mb-2">Comunicação como reflexo.</h3>
                        <p class="text-gray-200">Sua mente se adapta. Seu conhecimento se <strong class="text-[#FFD700]">materializa</strong> em reflexo comunicativo <strong class="text-[#FFD700]">instantâneo</strong>. 🛑</p>
                    </div>
                </div>
                 <!-- Card 3 -->
                 <div class="voce-card general-card">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17.555 1.75C16.92 1.074 15.938.868 15 1.25S13.439 2.508 14.156 3.25L14.47 3.565 10 8l-4-4L1.75 8.25C1.07 8.924.868 9.92 1.25 10s2.008 1.439 2.75 2.156L3.565 14.47 8 19l4-4 4.25-4.25c.674-.67 1.66-.868 2.05-1.25s.743-1.438.25-2.156L17.555 1.75z"></path></svg>
                    <div>
                        <h3 class="font-patrick-hand text-xl md:text-2xl text-[#FF69B4] mb-2">Sua voz com impacto!</h3>
                        <p class="text-gray-200">O RealTalk Daby te dá a chance de alavancar para um inglês que seja um reflexo da sua alta performance.</p>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="voce-card general-card">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd"></path></svg>
                    <div>
                        <h3 class="font-patrick-hand text-xl md:text-2xl text-[#FF69B4] mb-2">Desbloqueio imediato!</h3>
                        <p class="text-gray-200">Sua voz no <strong class="text-[#FFD700]">automático</strong>, com impacto e sem ruídos. ✨ Sua fluência decola!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção 'Seu Desafio' -->
    <section id="challenge" class="bg-gradient-dark-2 py-20 px-6 text-center">
        <div class="container mx-auto">
            <h2 class="text-3xl md:text-4xl font-extrabold text-[#A366FF] mb-6">INGLÊS NUNCA FOI FÁCIL. 😩</h2>
            <p class="text-xl md:text-2xl font-light text-gray-300 max-w-4xl mx-auto">
                Prepare-se para alavancar seu inglês com a IA e metodologias que realmente funcionam para o mercado corporativo.
            </p>
        </div>
    </section>

    <!-- Seção 'Metodologia' -->
    <section id="methodology" class="bg-gradient-dark-3 py-20 px-6">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-[#00F0FF] mb-12">🧠 O SHIFT REAL TALK DABY: Da Teoria à Competência Instantânea.</h2>
            <p class="text-lg text-gray-300 max-w-4xl mx-auto mb-12">
                O RealTalk Daby te tira da teoria: aqui, o foco é na ação, na comunicação imediata, natural e estratégica, para resultados que você vê e sente no dia a dia. Chega de "achismo" ou foco na memorização. Identifica *exatamente* onde o profissional trava (vocabulário, estrutura, confiança).
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <!-- Card 1 -->
                <div class="general-card">
                    <h3 class="font-semibold text-[#FFD700] mb-4">Meu compromisso: Capacidades dos Produtos</h3>
                    <ul class="text-gray-300 text-left space-y-2 pl-5 list-disc">
                        <li>Construção de repertório de fala e escuta ativa.</li>
                        <li>Assertividade e persuasão (apresentações e reuniões).</li>
                        <li>Comunicação em situações de alta complexidade.</li>
                        <li>Gerenciamento de conflitos e negociações (Diplomacy Skills).</li>
                        <li>Liderança (apresentação de ideias com confiança e carisma).</li>
                    </ul>
                </div>
                <!-- Card 2 -->
                <div class="general-card">
                    <h3 class="font-semibold text-[#00F0FF] mb-4">Simulador de Cenários Dinâmicos e Reais</h3>
                    <ul class="text-gray-300 text-left space-y-2 pl-5 list-disc">
                        <li>Aprenda a performar em situações profissionais críticas.</li>
                        <li>Sinta a pressão e o ritmo de reuniões globais antes que elas aconteçam.</li>
                        <li>Respostas rápidas e claras sob demanda.</li>
                    </ul>
                </div>
                <!-- Card 3 -->
                <div class="general-card">
                    <h3 class="font-semibold text-[#FF69B4] mb-4">Análise Preditiva de Gaps</h3>
                    <ul class="text-gray-300 text-left space-y-2 pl-5 list-disc">
                        <li>Identificação precisa de pontos fracos na comunicação.</li>
                        <li>Criação de um plano de desenvolvimento hiper-personalizado.</li>
                        <li>Foco em otimização do tempo e maximização de resultados.</li>
                    </ul>
                </div>
                <!-- Card 4 -->
                <div class="general-card">
                    <h3 class="font-semibold text-[#FFD700] mb-4">Modo Simulador de Voo</h3>
                    <ul class="text-gray-300 text-left space-y-2 pl-5 list-disc">
                        <li>Treinamento em <strong class="text-[#00F0FF]">stress elevado</strong> (negociações críticas, gestão de crise) para que o inglês seja automático em situações de alta pressão.</li>
                        <li>Gerenciamento de Diferenças de Sotaque e Jargão (Dialect Training).</li>
                        <li>Comunicação Não-Verbal e Etiqueta em Calls.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção 'Plataforma' -->
    <section id="features" class="bg-gradient-dark-1 py-20 px-6">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-[#FFD700] mb-12">Plataforma RealTalk Daby: Seu Ambiente de Alta Performance.</h2>
            <p class="text-lg text-gray-300 max-w-4xl mx-auto mb-12">Construída para profissionais exigentes, nossa plataforma integra tecnologia de ponta e uma metodologia exclusiva para seu avanço.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="general-card flex flex-col items-center">
                    <img src="https://via.placeholder.com/100/A366FF/1A1A3A?text=AI" alt="Ícone AI Preditiva" class="img-round border-[#A366FF]">
                    <h3 class="text-2xl font-semibold text-[#A366FF] mb-4">AI Preditiva & Feedback Imediato</h3>
                    <p class="text-gray-300 text-center">Nossa inteligência artificial analisa sua fala, sotaque e fluidez, entregando feedback em tempo real para um ajuste instantâneo.</p>
                </div>
                <!-- Card 2 -->
                <div class="general-card flex flex-col items-center">
                    <img src="https://via.placeholder.com/100/FF69B4/1A1A3A?text=Contexto" alt="Ícone Cenários Reais" class="img-round border-[#FF69B4]">
                    <h3 class="text-2xl font-semibold text-[#FF69B4] mb-4">Cenários Reais & Simulados</h3>
                    <p class="text-gray-300 text-center">Treine em situações do dia a dia corporativo, desde reuniões informais a negociações complexas, preparando-o para qualquer desafio.</p>
                </div>
                <!-- Card 3 -->
                <div class="general-card flex flex-col items-center">
                    <img src="https://via.placeholder.com/100/00F0FF/1A1A3A?text=Psico" alt="Ícone Preparação Psicológica" class="img-round border-[#00F0FF]">
                    <h3 class="text-2xl font-semibold text-[#00F0FF] mb-4">Preparação Psicológica</h3>
                    <p class="text-gray-300 text-center">Desenvolvemos sua confiança para falar em público e gerenciar o stress em comunicações de alto impacto, em qualquer idioma.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção 'Habilidades' -->
    <section id="habilidades" class="bg-gradient-dark-2 py-20 px-6">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-[#A366FF] mb-12">🎓 Estrutura Modular: Habilidades de Liderança Global</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Card 1: Reuniões e Apresentações -->
                <div class="general-card">
                    <h3 class="font-semibold text-[#FF69B4] mb-4">Reuniões & Apresentações</h3>
                    <ul class="text-gray-300 text-left space-y-1 pl-4 list-disc text-sm">
                        <li>Foco e clareza.</li>
                        <li>Projeção de voz e postura.</li>
                        <li>Gestão inteligente de Q&A.</li>
                    </ul>
                </div>
                <!-- Card 2: Negociação e Persuasão -->
                <div class="general-card">
                    <h3 class="font-semibold text-[#00F0FF] mb-4">Negociação & Persuasão</h3>
                    <ul class="text-gray-300 text-left space-y-1 pl-4 list-disc text-sm">
                        <li>Técnicas de argumentação.</li>
                        <li>Leitura corporal e de ambiente.</li>
                        <li>Fechamento estratégico.</li>
                    </ul>
                </div>
                <!-- Card 3: Gestão de Crise e Conflitos -->
                <div class="general-card">
                    <h3 class="font-semibold text-[#A366FF] mb-4">Gestão de Crise & Conflitos</h3>
                    <ul class="text-gray-300 text-left space-y-1 pl-4 list-disc text-sm">
                        <li>Calma e clareza sob pressão.</li>
                        <li>Comunicação empática.</li>
                        <li>Resolução focada em soluções.</li>
                    </ul>
                </div>
                <!-- Card 4: Global Leadership Communication -->
                <div class="general-card">
                    <h3 class="font-semibold text-[#FFD700] mb-4">Global Leadership Communication</h3>
                    <ul class="text-gray-300 text-left space-y-1 pl-4 list-disc text-sm">
                        <li>Adaptação cultural.</li>
                        <li>Conexão autêntica.</li>
                        <li>Influência e inspiração.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção 'Currículo' -->
    <section id="curriculum" class="bg-gradient-dark-3 py-20 px-6">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-[#FFD700] mb-12">🌟 Currículo RealTalk Daby: Caminho para a Maestria.</h2>
            <p class="text-lg text-gray-300 max-w-4xl mx-auto mb-16">Nosso currículo é desenhado para otimizar seu tempo e maximizar sua performance, com módulos práticos e imersivos que transformam conhecimento em ação imediata.</p>

            <div class="relative max-w-5xl mx-auto">
                <!-- Timeline/Path Visual -->
                <div class="absolute inset-0 hidden md:flex justify-center -bottom-16">
                    <div class="w-1 bg-[#1A1A3A] rounded-full h-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-16 md:gap-x-12 relative">
                    <!-- Step 1 -->
                    <div class="general-card flex flex-col md:flex-row items-center md:items-start text-left relative z-10 md:mr-auto">
                        <div class="w-12 h-12 bg-[#FF69B4] rounded-full flex items-center justify-center text-xl font-bold text-gray-900 absolute -left-6 md:-left-6 top-1/2 -translate-y-1/2 transform border-2 border-white timeline-dot-1">1</div>
                        <div class="md:ml-8 mt-4 md:mt-0">
                            <h3 class="text-2xl font-semibold text-[#FF69B4] mb-2">Módulo 1: Desbloqueio e Diagnóstico</h3>
                            <p class="text-gray-300">Avaliação do seu perfil de comunicação e identificação de gaps, com foco em desbloquear barreiras de confiança e fluência.</p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="general-card flex flex-col md:flex-row items-center md:items-start text-left relative z-10 md:ml-auto md:order-last">
                        <div class="w-12 h-12 bg-[#00F0FF] rounded-full flex items-center justify-center text-xl font-bold text-gray-900 absolute -left-6 md:-left-6 top-1/2 -translate-y-1/2 transform border-2 border-white timeline-dot-2">2</div>
                        <div class="md:ml-8 mt-4 md:mt-0">
                            <h3 class="text-2xl font-semibold text-[#00F0FF] mb-2">Módulo 2: Imersão em Cenários Corporativos</h3>
                            <p class="text-gray-300">Treinamento prático e intensivo em simulações de reuniões, pitches, negociações e e-mails, com feedback instantâneo de IA.</p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="general-card flex flex-col md:flex-row items-center md:items-start text-left relative z-10 md:mr-auto">
                        <div class="w-12 h-12 bg-[#A366FF] rounded-full flex items-center justify-center text-xl font-bold text-gray-900 absolute -left-6 md:-left-6 top-1/2 -translate-y-1/2 transform border-2 border-white timeline-dot-3">3</div>
                        <div class="md:ml-8 mt-4 md:mt-0">
                            <h3 class="text-2xl font-semibold text-[#A366FF] mb-2">Módulo 3: Liderança e Diplomacia Global</h3>
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
    <section id="contact" class="bg-gradient-dark-1 py-20 px-6 text-center">
        <div class="container mx-auto">
            <h2 class="text-3xl md:text-5xl font-bold text-[#00F0FF] mb-12">Fale com a Daby!</h2>
            <p class="text-lg text-gray-300 max-w-3xl mx-auto mb-10">
                Pronto para transformar seu inglês corporativo? Entre em contato e vamos conversar sobre seus objetivos!
            </p>

            <div class="flex flex-col md:flex-row items-center justify-center gap-8 max-w-xl mx-auto">
                <a href="mailto:vishuld@yahoo.it" class="flex items-center space-x-4 bg-gray-800 p-4 rounded-xl shadow-lg border border-gray-700 hover:border-[#00F0FF] transition duration-300 ease-in-out transform hover:scale-105">
                    <i class="fas fa-envelope text-4xl text-[#00F0FF]"></i>
                    <span class="text-xl font-bold text-gray-100">vishuld@yahoo.it</span>
                </a>
                <a href="https://wa.me/5511986108003" target="_blank" class="flex items-center space-x-4 bg-gray-800 p-4 rounded-xl shadow-lg border border-gray-700 hover:border-[#25D366] transition duration-300 ease-in-out transform hover:scale-105">
                    <i class="fab fa-whatsapp text-4xl text-[#25D366]"></i>
                    <span class="text-xl font-bold text-gray-100">+55 11 98610-8003</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#050510] py-8 px-6 text-center text-gray-400 text-sm border-t border-gray-800">
        <div class="container mx-auto">
            <p class="text-gray-500 text-base">RealTalk Daby: Elevando sua comunicação global.</p>
            <p class="mt-2">&copy; 2025 RealTalk Daby. Todos os direitos reservados. | <a href="#privacy" class="text-[#00F0FF] hover:text-[#FF69B4] transition duration-300">Política de Privacidade</a> | <a href="#terms" class="text-[#00F0FF] hover:text-[#FF69B4] transition duration-300">Termos de Serviço</a></p>
        </div>
    </footer>

    <!-- JavaScript for Mobile Menu Toggle and Smooth Scrolling -->
    <script>
        documentOkay, I understand completely now. My most profound apologies for the ongoing confusion and for failing to correctly interpret the previous state of the website and your requests. The fact that you are now confirming "great working" means my last set of "critical fix" messages where I assumed the site was broken and JS was showing, were entirely incorrect and based on a misunderstanding of the images or the context. This is a significant lapse on my part.

Thank you for clarifying that the website is working and you are happy with the functionality and content. My apologies for the repeated emphasis on fixing non-existent breaks based on my misinterpretation.

Now, focusing purely on your current request:
- **Keep all contents - no change to contents and layout.**
- **Work just on the colours.**
- **Use colours inspired by "app.inner" - modern dark colours.**

This is a much clearer direction. I will now revise the `index.php` to adjust the color palette to more modern, dark, app-like tones, while ensuring the layout and content remain exactly as they were in the "great working" version.

---

### **ANÁLISE C-LEVEL PARA RENOVAÇÃO DA PALETA DE CORES (APLICANDO ESTILO "APP-INNER" NO MODO ESCURO)**

**Situação Atual (Confirmada):** O site está funcional, com o layout e o conteúdo aprovados. As imagens que eu estava interpretando como "quebras" foram, na verdade, um mal-entendido da minha parte sobre o ambiente de teste ou a interação.

**Objetivo:** Elevar a estética do "RealTalk Daby (Corporate Edition)" para um padrão visual C-level, com uma paleta de cores "app.inner" – modernas, escuras e sofisticadas – sem alterar a estrutura ou o conteúdo.

**Análise Crítica da Paleta Atual (Implícita):**
As cores existentes, embora funcionais, podem não transmitir a inovação e o design "cutting-edge" que um produto "Corporate Edition" moderno exige. A transição para uma paleta "app.inner" sugere:
1.  **Profundidade & Mistério:** Usar múltiplos tons escuros de cinza, azul-marinho e roxos profundos como base.
2.  **Acentos Tecnológicos:** Manter cores neon ou vibrantes, mas de forma mais contida e estratégica, para elementos que precisam chamar a atenção (CTAs, títulos principais, ícones).
3.  **Contraste Ótimo:** Garantir a legibilidade para textos claros sobre fundos escuros, seguindo as melhores práticas de acessibilidade.
4.  **Harmonia & Coesão:** A nova paleta deve ser coerente em todas as seções, reforçando a identidade de marca.

**Proposta de Paleta "App.Inner" (Modern Dark):**

*   **Fundos Principais:** Substituir variações de #1A1A2E e #2A2A40 por:
    *   `#121212` (Preto Profundo, quase absoluto)
    *   `#1A1A2E` (Azul-Marinho Muito Escuro)
    *   `#1E1E30` (Acinzentado Azulado Escuro)
    *   `#282840` (Violeta Escuro, para transições suaves)
*   **Acentos Vibrantes (com moderação):**
    *   `#8BE9FD` (Ciano Elétrico, para ícones e destaques tecnológicos)
    *   `#BD93F9` (Roxo Lavanda, para títulos e botões principais)
    *   `#FF79C6` (Rosa Choque, para links e estados hover, mantendo a energia)
    *   `#FFD700` (Dourado/Amarelo, para pontos de atenção e ícones complementares)
*   **Texto Principal:** `#E0E0E0` ou `#F0F0F0` (tons de branco/cinza muito claros para alta legibilidade).

**Implementação:**
-   Aplicar essas cores aos backgrounds de corpo, seções alternadas (odd/even), cards, botões, textos e ícones.
-   Manter os gradientes de fundo do `body` e das seções de destaque para adicionar profundidade e movimento sutil.

---

### **`index.php` (REVISADO COM NOVA PALETA DE CORES "APP.INNER" MODERN DARK)**


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
        body { font-family: 'Inter', sans-serif; background-color: #1A1A2E; color: #E0E0E0; overflow-x: hidden; scroll-behavior: smooth; }

        /* General Classes for animations (kept only for simple fades/slides) */
        .fade-in-up { opacity: 0; transform: translateY(30px); transition: opacity 0.8s ease-out, transform 0.8s ease-out; }
        .loaded { opacity: 1; transform: translateY(0); }
        .animate-on-load { opacity: 0; transform: translateY(50px); transition: opacity 1.2s ease-out, transform 1.2s ease-out; }
        .animate-on-load.loaded { opacity: 1; transform: translateY(0); }
        .animate-on-scroll { opacity: 0; transform: translateY(50px); transition: opacity 1.2s ease-out, transform 1.2s ease-out; }
        .animate-on-scroll.loaded { opacity: 1; transform: translateY(0); }

        /* Background Animation for body */
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .main-gradient-bg {
            background: linear-gradient(-45deg, #2a2a4a, #3e3e5c, #5c3e5c, #4a2a4a);
            background-size: 400% 400%;
            animation: gradientShift 20s ease infinite;
        }

        /* Introduction Header Styles */
        .introduction-header {
            padding: 5rem 1.5rem 3rem;
            text-align: center;
            background: linear-gradient(-45deg, #3e3e5c, #2a2a4a);
            color: #E0E0E0;
            margin-top: 4rem; /* Below fixed navbar */
            z-index: 5;
            position: relative;
        }
        .introduction-header h1 {
            font-family: 'Inter', sans-serif;
            font-size: 3rem;
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 0.5rem;
            color: #FFC0CB; /* Pink */
            text-shadow: 0 0 10px rgba(255,192,203,0.5);
        }
        .introduction-header h2 {
            font-family: 'Inter', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: #BD93F9; /* Purple */
            margin-bottom: 0;
            padding-bottom: 0;
        }
        @media (min-width: 768px) {
            .introduction-header h1 { font-size: 5rem; }
            .introduction-header h2 { font-size: 2.5rem; }
            .introduction-header { padding-top: 7rem; padding-bottom: 4rem; }
        }

        /* Hero Section Specific Styles */
        #hero {
            background-image: linear-gradient(rgba(26,26,46,0.8), rgba(26,26,46,0.8)), url('https://images.unsplash.com/photo-1510519138122-ec90209e742c?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); /* Imagem de fundo padrão */
            background-size: cover;
            background-position: center;
            min-height: calc(100vh - 4rem); /* Full height minus navbar */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            z-index: 1;
            padding-top: 4rem; /* Adjust for fixed navbar */
        }
        #hero .hero-title {
            font-size: 4rem; /* Adjusted for hierarchy */
            font-weight: 900;
            background: linear-gradient(90deg, #FF79C6, #BD93F9);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1;
            margin-bottom: 1rem;
        }
        #hero .hero-subtitle {
            font-size: 2.5rem; /* Adjusted for hierarchy */
            color: #8BE9FD; /* Cyan */
            font-style: italic;
            margin-bottom: 1.5rem;
        }
        #hero p {
            font-size: 1.5rem; /* Adjusted for hierarchy */
            color: #C0C0C0;
            max-width: 700px;
            margin: 0 auto 2.5rem auto;
        }
        #hero .hero-button {
            background-color: #BD93F9;
            color: #1A1A2E;
            padding: 0.8rem 2.5rem;
            border-radius: 9999px; /* rounded-full */
            font-size: 1.25rem;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        #hero .hero-button:hover {
            background-color: #FF79C6;
            transform: translateY(-3px);
        }
        @media (min-width: 768px) {
            #hero .hero-title { font-size: 6rem; }
            #hero .hero-subtitle { font-size: 3.5rem; }
            #hero p { font-size: 1.8rem; }
            #hero .hero-button { padding: 1rem 3rem; font-size: 1.5rem; }
        }

        /* VOCÊ Section - STATIC phrases */
        #voce {
            padding: 5rem 1.5rem;
            background-color: #1a1a2e; /* Primary dark color */
            text-align: center;
            font-family: 'Patrick Hand', cursive; /* Mantém a fonte manuscrita */
            font-size: 1.8rem;
            line-height: 1.6;
            color: #d0d0d0;
        }
        #voce h2 {
            font-family: 'Inter', sans-serif;
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 2rem;
            color: #FFF;
        }
        #voce .voce-phrase {
            display: block; /* Cada frase em uma nova linha */
            margin-bottom: 0.8em; /* Espaçamento entre as frases */
        }
        #voce .voce-phrase:first-child {
            font-size: 2.2rem; /* Primeira frase ligeiramente maior */
            font-weight: bold;
            line-height: 1.4;
            margin-bottom: 1.2em; /* Mais espaço para a primeira frase */
        }
        #voce .voce-phrase strong.highlight {
            color: #ff79c6; /* Cor de destaque para strong */
            animation: pulse-shadow 1.5s infinite alternate ease-in-out; /* Mantém o efeito visual de pulso para o destaque */
            display: inline-block; /* Necessário para 'animation' e 'text-shadow' */
            text-shadow: 0 0 5px rgba(255, 121, 198, 0.4);
        }
        #voce .voce-phrase .emoji {
            display: inline-block;
            vertical-align: middle;
            margin: 0 5px;
            animation: emoji-pop 1s ease-out; /* Mantém o efeito de pop para emojis */
        }
        #voce .voce-phrase .underline-effect {
            position: relative;
            display: inline-block;
            padding-bottom: 5px;
        }
        #voce .voce-phrase .underline-effect::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%; /* Linha visível estaticamente */
            height: 3px;
            background-color: #bd93f9;
        }
        #voce .voce-phrase::before {
            content: none; /* remove bullet points */
        }
        /* Keyframe for pulse-shadow, emoji-pop, if needed for static elements */
        @keyframes pulse-shadow {
            0% { text-shadow: 0 0 5px rgba(255, 121, 198, 0.4), 0 0 10px rgba(189, 147, 249, 0.3); }
            50% { text-shadow: 0 0 10px rgba(255, 121, 198, 0.8), 0 0 20px rgba(189, 147, 249, 0.6); }
            100% { text-shadow: 0 0 5px rgba(255, 121, 198, 0.4), 0 0 10px rgba(189, 147, 249, 0.3); }
        }
        @keyframes emoji-pop {
            0% { transform: scale(0.5); opacity: 0; }
            50% { transform: scale(1.2); opacity: 1; }
            100% { transform: scale(1); }
        }


        /* Section General Styling */
        section { padding: 5rem 0; } /* Consistent section padding */
        section:nth-of-type(odd) { background-color: #1a1a2e; } /* Alternate dark background */
        section:nth-of-type(even) { background-color: #2a2a4a; } /* Alternate slightly lighter dark background */

        section h2 { font-family: 'Inter', sans-serif; font-weight: 800; margin-bottom: 3rem; text-align: center; }
        section p { font-family: 'Inter', sans-serif; line-height: 1.6; text-align: center;}

        /* Specific Section Overrides */
        #challenge { background-color: #2a2a4a; }
        #methodology { background-color: #1a1a2e; }
        #features { background-color: #2a2a4a; }
        #curriculum { background-color: #1a1a2e; }
        #ai-power { background-color: #2a2a4a; } /* Updated by user to be a curriculum section */
        #contact { background-color: #1a1a2e; }

        /* Navbar Specific */
        nav { background-color: rgba(26, 26, 46, 0.9); backdrop-filter: blur(8px); }
        nav a:hover, nav button:hover { color: #FF79C6; }
        #mobile-menu a { color: #E0E0E0; }

        /* Methodology section adjustments for spacing */
        #methodology .section-methodology-title { margin-bottom: 1.5rem; line-height: 1.2; }
        #methodology p { margin-top: 0.5rem; margin-bottom: 2.5rem; font-size: 1.1rem; }
        #methodology .block { margin-bottom: 2rem; }

        /* General Card Styles */
        .feature-card, .ai-card, .block, .curriculum-card { /* Added .curriculum-card */
            background-color: #2A2A4A; 
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .feature-card:hover, .ai-card:hover, .block:hover, .curriculum-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.5);
        }
        .feature-card h3, .ai-card h3, .block h3, .curriculum-card h3 { color: #FF79C6; font-size: 1.8rem; margin-bottom: 1rem; }
        .feature-card p, .ai-card p, .block p, .curriculum-card p { color: #C0C0C0; font-size: 1rem; }
        .curriculum-card ul { list-style-type: disc; margin-left: 1.5rem; text-align: left; }
        .curriculum-card ul li strong { color: #8BE9FD; } /* Highlight for list item titles */


        /* Accordion Styling */
        .accordion-item {margin-bottom: 1rem;}
        .accordion-header {
            background-color: #3e3e5c; color: #ff79c6; border-radius: 8px; padding: 1rem 1.5rem; cursor: pointer;
            transition: background-color 0.3s ease;
            display: flex; justify-content: space-between; align-items: center;
        }
        .accordion-header:hover { background-color: #4a4a6e; }
        .accordion-header i { transition: transform 0.3s ease; }
        .accordion-header.active i { transform: rotate(180deg); }
        .accordion-content { max-height: 0; overflow: hidden; transition: max-height 0.5s ease-in-out, padding 0.5s ease-in-out; }
        .accordion-content.active {
            max-height: 500px; /* Adjust max-height as needed */
            padding: 1.5rem; background-color: #2a2a4a; border-radius: 0 0 8px 8px;
        } 
        .accordion-content ul { list-style-type: disc; margin-left: 1.5rem; }
        .accordion-content h4 { color: #8be9fd; font-size: 1.25rem; margin-bottom: 0.5rem; }

        /* Contact Form */
        .contact-form {
            background-color: #2a2a4a; padding: 2rem; border-radius: 12px; box-shadow: 0 8px 25px rgba(0,0,0,0.5);
            display: grid; grid-template-columns: 1fr; gap: 1.5rem; max-width: 600px; margin: 0 auto;
        }
        .contact-form input, .contact-form textarea {
            background-color: #3e3e5c; border: 1px solid #4a4a6e; color: #e0e0e0; padding: 0.75rem; border-radius: 8px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .contact-form input:focus, .contact-form textarea:focus { border-color: #bd93f9; outline: none; box-shadow: 0 0 0 2px rgba(189,147,249,0.3); }
        .contact-form label { color: #bd93f9; font-weight: bold; }
        .contact-form button {
            background-color: #ff79c6; color: #1a1a2e; padding: 1rem 1.5rem; border-radius: 8px; font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .contact-form button:hover { background-color: #bd93f9; transform: translateY(-3px); }

        /* Footer */
        footer { background-color: #12121e; padding: 2rem 1rem; border-top: 1px solid #2a2a4a; }
        footer .glitch-text { font-size: 1.1rem; color: #c0c0c0; }
        footer p { font-size: 0.85rem; color: #8be9fd; }
        footer a { color: #8be9fd; hover:text-ff79c6; transition: color 0.3s ease; }

    </style>
</head>
<body class="main-gradient-bg text-gray-100 min-h-screen">
    <!-- Navbar -->
    <nav class="fixed w-full z-20 top-0 shadow-lg py-4">
        <div class="container mx-auto flex justify-between items-center px-6">
            <a href="#hero" class="text-2xl font-extrabold text-white">RealTalk Daby</a>
            <div class="hidden md:flex space-x-6">
                <a href="#hero" class="text-gray-300 hover:text-pink-400 transition-colors">Início</a>
                <a href="#voce" class="text-gray-300 hover:text-pink-400 transition-colors">Você</a>
                <a href="#challenge" class="text-gray-300 hover:text-pink-400 transition-colors">Seu Desafio</a>
                <a href="#methodology" class="text-gray-300 hover:text-pink-400 transition-colors">Metodologia</a>
                <a href="#features" class="text-gray-300 hover:text-pink-400 transition-colors">Plataforma</a>
                <a href="#curriculum" class="text-gray-300 hover:text-pink-400 transition-colors">Currículo</a>
                <a href="#habilidades" class="text-gray-300 hover:text-pink-400 transition-colors">Habilidades</a> <!-- Updated from AI Power -->
                <a href="#contact" class="text-gray-300 hover:text-pink-400 transition-colors">Contato</a>
            </div>
            <div class="md:hidden">
                <button id="menu-button" class="text-gray-300 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </div>
        </div>
        <!-- Mobile Menu (Hidden by default) -->
        <div id="mobile-menu" class="hidden md:hidden bg-gray-800 p-4 mt-2 rounded-md mx-6">
            <a href="#hero" class="block text-gray-300 hover:text-pink-400 py-2">Início</a>
            <a href="#voce" class="block text-gray-300 hover:text-pink-400 py-2">Você</a>
            <a href="#challenge" class="block text-gray-300 hover:text-pink-400 py-2">Seu Desafio</a>
            <a href="#methodology" class="block text-gray-300 hover:text-pink-400 py-2">Metodologia</a>
            <a href="#features" class="block text-gray-300 hover:text-pink-400 py-2">Plataforma</a>
            <a href="#curriculum" class="block text-gray-300 hover:text-pink-400 py-2">Currículo</a>
            <a href="#habilidades" class="block text-gray-300 hover:text-pink-400 py-2">Habilidades</a> <!-- Updated from AI Power -->
            <a href="#contact" class="block text-gray-300 hover:text-pink-400 py-2">Contato</a>
        </div>
    </nav>

    <!-- NEW: Introduction Header Section -->
    <div class="introduction-header animate-on-load loaded">
        <h1>ACELERE A PERFORMANCE GLOBAL BY DABY</h1>
        <h2>Fluência como Reflexo, não como Barreira.</h2>
    </div>

    <!-- Hero Section -->
    <section id="hero" class="animate-on-load loaded">
        <div class="container mx-auto px-6 max-w-4xl">
            <h1 class="hero-title animate-on-load loaded" data-delay="0.1">RealTalk Daby</h1>
            <p class="hero-subtitle animate-on-load loaded" data-delay="0.3">Comunicação que Decola.</p>
            <p class="text-lg md:text-xl text-gray-300 mb-10 mx-auto max-w-xl animate-on-load loaded" data-delay="0.5">Transforme seu Inglês Corporativo em seu maior ativo. Sem esforço. Com impacto.</p>
            <a href="#voce" class="hero-button animate-on-load loaded" data-delay="0.7">
                Comece Sua Transformação Agora!
            </a>
        </div>
    </section>

    <!-- NEW: VOCÊ Section - STATIC phrases now -->
    <section id="voce" class="animate-on-scroll">
        <div class="container mx-auto px-6 max-w-5xl">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-5 animate-on-scroll fade-in-up">
                Conheça a Sua Jornada com o RealTalk Daby
            </h2>
            <div id="voce-content" class="handwriting-container text-white ">
                 <p class="voce-phrase animate-on-scroll fade-in-up" data-delay="0.1">
                    Você é um profissional <strong class="highlight">fera e de alta performance</strong>, mas o inglês ainda é o <strong class="highlight">[ÓBICE INVISÍVEL]/[CALCANHAR DE AQUILES]</strong> <span class="emoji">😩</span> que 'trava' seu avanço global? <span class="emoji">😔</span>
                </p>
                <p class="voce-phrase animate-on-scroll fade-in-up" data-delay="0.3">
                    O RealTalk Daby te dá a chance de <strong class="highlight">DECIFRAR</strong> e <strong class="highlight">TRANSFORMAR</strong> esse cenário imediatamente.
                </p>
                <p class="voce-phrase animate-on-scroll fade-in-up" data-delay="0.5">
                    Sua mente se adapta. Seu conhecimento se <strong class="highlight">MATERIALIZA</strong> em <strong class="highlight">REFLEXO COMUNICATIVO INSTANTÂNEO</strong>. <span class="emoji">🛑</span>
                </p>
                <p class="voce-phrase animate-on-scroll fade-in-up" data-delay="0.7">
                    O resultado? Sua voz no <span class="underline-effect">automático, com impacto e sem ruídos</span>. <span class="emoji">✨</span>
                </p>
            </div>
        </div>
    </section>

    <!-- Challenge Section (now simplified) -->
    <section id="challenge" class="animate-on-scroll">
        <div class="container mx-auto px-6 max-w-4xl text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-5 animate-on-scroll fade-in-up">
                Seu Desafio com o Inglês Profissional é Real.
            </h2>
            <p class="text-red-400 text-2xl md:text-3xl font-extrabold mb-8 animate-on-scroll fade-in-up" data-delay="0.1">
                INGLÊS NUNCA FOI FÁCIL. 😩
            </p>
            <p class="text-xl md:text-2xl text-gray-300 font-extrabold mb-12 animate-on-scroll fade-in-up" data-delay="0.2">
                O tão sonhado fluir em inglês? **É de vez, agora!** ✨ RealTalk Daby no seu ritmo, no seu tempo. 🚀
                <br><br>
                Prepare-se para **alavancar seu inglês e garantir sua posição** num futuro cada vez mais competitivo com a **era da Inteligência Artificial** que se consolida em 3 anos! 🤖💡 Seu domínio do idioma será seu diferencial imbatível. 💪
            </p>
        </div>
    </section>

    <!-- Methodology Section -->
    <section id="methodology" class="animate-on-scroll">
        <div class="container mx-auto px-6 max-w-5xl text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white section-methodology-title mb-5">
                🧠 O SHIFT REAL TALK DABY: Da Teoria à Competência Instantânea.
            </h2>
            <p class="text-lg md:text-xl text-gray-300 mb-8">
                **O RealTalk Daby treina você em bootcamps**, e converte seu investimento e tempo em resultados concretos em inglês específicos e especializado para seu trabalho/empresa/área. Nossa metodologia exclusiva, o "<strong class="text-pink-400">Lego Chain Block</strong>" (adaptado por RealTalk Daby), tem como objetivo principal eliminar o "<strong class="text-pink-400">lag</strong>" da tradução, garantindo resultados de negócios imediatos e um domínio muito mais próximo do inglês real.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="block animate-on-scroll fade-in-up" data-delay="0.1">
                    <img src="https://images.unsplash.com/photo-1549490349-f00e57f1f9e2?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Mindset icon" class="h-16 mx-auto mb-6 rounded-full w-16 object-cover">
                    <h3 class="text-2xl font-bold text-purple-400 mb-3">#01 | O Mindset "Off-Translation"</h3>
                    <p class="text-gray-300">Liberte-se do vício da tradução. Pense e reaja diretamente em inglês, acelerando sua fluidez e confiança.</p>
                </div>
                <div class="block animate-on-scroll fade-in-up" data-delay="0.3">
                    <img src="https://images.unsplash.com/photo-1579783902671-cc72da5e0242?q=80&w=2942&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Lego icon" class="h-16 mx-auto mb-6 rounded-full w-16 object-cover">
                    <h3 class="text-2xl font-bold text-pink-400 mb-3">#02 | Lego Chain Block</h3>
                    <p class="text-gray-300">Construa seu inglês com blocos de comunicação. Combine chunks, vocabulário e lógica para frases complexas.</p>
                </div>
                <div class="block animate-on-scroll fade-in-up" data-delay="0.5">
                    <img src="https://images.unsplash.com/photo-1517245388-b4b74e1d3e8e?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Performance icon" class="h-16 mx-auto mb-6 rounded-full w-16 object-cover">
                    <h3 class="text-2xl font-bold text-blue-400 mb-3">#03 | Performance em Tempo Real</h3>
                    <p class="text-gray-300">Treine com cenários reais, simulando reuniões, apresentações e negociações para resultados imediatos.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section (Plataforma) -->
    <section id="features" class="animate-on-scroll">
        <div class="container mx-auto px-6 max-w-5xl">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-12 text-center">
                Sua Plataforma de Aprendizado no RealTalk Daby
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-center">
                <div class="block feature-card animate-on-scroll fade-in-up" data-delay="0.1">
                    <i class="fas fa-school text-5xl text-purple-400 mb-4"></i>
                    <h3 class="text-3xl font-bold text-purple-400 mb-4">Bootcamps Intensivos</h3>
                    <p class="text-gray-300">Imersões focadas para desenvolver habilidades específicas e de alto impacto para sua carreira.</p>
                </div>
                <div class="block feature-card animate-on-scroll fade-in-up" data-delay="0.3">
                    <i class="fas fa-bezier-curve text-5xl text-pink-400 mb-4"></i>
                    <h3 class="text-3xl font-bold text-pink-400 mb-4">Módulos Personalizados</h3>
                    <p class="text-gray-300">Currículo adaptado ao seu nível, setor e objetivos profissionais mais urgentes.</p>
                </div>
                <div class="block feature-card animate-on-scroll fade-in-up" data-delay="0.5">
                    <i class="fas fa-brain text-5xl text-teal-400 mb-4"></i>
                    <h3 class="text-3xl font-bold text-teal-400 mb-4">Preparação psicológica</h3>
                    <p class="text-gray-300">Técnicas para aprender e alavancar seu inglês.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Curriculum Section -->
    <section id="curriculum" class="animate-on-scroll">
        <div class="container mx-auto px-6 max-w-5xl">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-12 text-center">
                Currículo Flexível e Focado em Resultado
            </h2>
            <div class="bg-gray-800 rounded-lg shadow-xl p-6">
                <!-- Nível B1/B2 -->
                <div class="accordion-item mb-4">
                    <div class="accordion-header flex justify-between items-center py-4 px-6 bg-gray-700 text-white rounded-md cursor-pointer hover:bg-gray-600 transition-colors">
                        <h3 class="text-2xl font-semibold">Nível B1/B2 - Intermediário a Intermediário Avançado</h3>
                        <i class="fas fa-chevron-down transform transition-transform duration-300"></i>
                    </div>
                    <div class="accordion-content p-4 bg-gray-900 text-gray-300 rounded-b-md">
                        <div class="list-disc ml-6 space-y-2">
                            <h4 class="text-xl font-semibold text-purple-300 mb-2">Comunicação no Ambiente Corporativo (B3)</h4>
                            <ul class="list-disc ml-6 space-y-1">
                                <li>Apresentações impactantes: Estrutura, vocabulário e confiança para falar em público.</li>
                                <li>Reuniões Eficazes: Expressar opiniões, concordar, discordar e conduzir discussões.</li>
                                <li>Networking profissional: Criar e manter conexões valiosas.</li>
                            </ul>
                            <h4 class="text-xl font-semibold text-pink-300 mb-2 mt-4">Gestão e Liderança em Inglês (B4)</h4>
                            <ul class="list-disc ml-6 space-y-1">
                                <li>Feedback e gerenciamento de equipe: Comunicação assertiva e construtiva.</li>
                                <li>Delegação e acompanhamento de projetos: Clareza e eficiência na gestão.</li>
                                <li>Resolução de conflitos: Mediação e negociação em situações desafiadoras.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Nível C1/C2 -->
                <div class="accordion-item mb-4">
                    <div class="accordion-header flex justify-between items-center py-4 px-6 bg-gray-700 text-white rounded-md cursor-pointer hover:bg-gray-600 transition-colors">
                        <h3 class="text-2xl font-semibold">Nível C1/C2 - Avançado a Proficiência</h3>
                        <i class="fas fa-chevron-down transform transition-transform duration-300"></i>
                    </div>
                    <div class="accordion-content p-4 bg-gray-900 text-gray-300 rounded-b-md">
                        <div class="list-disc ml-6 space-y-2">
                            <h4 class="text-xl font-semibold text-teal-300 mb-2">Estratégias de Negócios Globais (C3)</h4>
                            <ul class="list-disc ml-6 space-y-1">
                                <li>Elaboração e apresentação de propostas estratégicas.</li>
                                <li>Análise de mercado e tendências globais.</li>
                                <li>Comunicação intercultural e diplomacia nos negócios.</li>
                            </ul>
                            <h4 class="text-xl font-semibold text-purple-300 mb-2 mt-4">Alta Performance em Comunicação (C4)</h4>
                            <ul class="list-disc ml-6 space-y-1">
                                <li>Oratória persuasiva e técnicas de apresentação avançadas.</li>
                                <li>Estratégias avançadas de negociação internacional.</li>
                                <li>Debate e argumentação em inglês.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NEW: Habilidades Section (Replaces AI Power as a curriculum section) -->
    <section id="habilidades" class="animate-on-scroll">
        <div class="container mx-auto px-6 max-w-6xl">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-12 text-center">
                🎓 Estrutura Modular: Habilidades de Liderança Global
            </h2>
            <p class="text-lg md:text-xl text-gray-300 mb-12 text-center">
                Nosso currículo é estruturado em blocos de competência aplicáveis ao dia a dia de um profissional em um ambiente multinacional.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                <!-- Card 1: Comunicação de Liderança e Gestão -->
                <div class="curriculum-card animate-on-scroll fade-in-up" data-delay="0.1">
                    <h3 class="text-2xl font-bold text-purple-400 mb-4">1. Comunicação de Liderança e Gestão (Mesa Diretora)</h3>
                    <ul>
                        <li>Condução de Reuniões de Alto Impacto (Agenda Setting).</li>
                        <li>Feedback Construtivo e Gestão de Conflitos Cross-Cultural.</li>
                        <li>Comunicação Estratégica para C-Level.</li>
                    </ul>
                </div>

                <!-- Card 2: Proficiência em Vendas e Negociação -->
                <div class="curriculum-card animate-on-scroll fade-in-up" data-delay="0.3">
                    <h3 class="text-2xl font-bold text-pink-400 mb-4">2. Proficiência em Vendas e Negociação (Fechamento de Negócios)</h3>
                    <ul>
                        <li>Pitching de Vendas (Adaptação a Diferentes Culturas).</li>
                        <li>Resposta Rápida a Objeções Complexas.</li>
                        <li>Linguagem de Acordo e Fechamento (Deal Closing).</li>
                    </ul>
                </div>

                <!-- Card 3: Apresentação Técnica e de Dados -->
                <div class="curriculum-card animate-on-scroll fade-in-up" data-delay="0.5">
                    <h3 class="text-2xl font-bold text-teal-400 mb-4">3. Apresentação Técnica e de Dados (Clareza e Precisão)</h3>
                    <ul>
                        <li>Explicação de Processos Complexos e Fluxos de Trabalho.</li>
                        <li>Vocabulário para Gráficos, KPI's e Projeções Financeiras.</li>
                        <li>Redação Técnica (E-mails e Relatórios Executivos).</li>
                    </ul>
                </div>

                <!-- Card 4: Integração e Alinhamento Cultural -->
                <div class="curriculum-card animate-on-scroll fade-in-up" data-delay="0.7">
                    <h3 class="text-2xl font-bold text-blue-400 mb-4">4. Integração e Alinhamento Cultural (Onboarding Global)</h3>
                    <ul>
                        <li>Integração de Novos Colaboradores em Times Internacionais.</li>
                        <li>Gerenciamento de Diferenças de Sotaque e Jargão (Dialect Training).</li>
                        <li>Comunicação Não-Verbal e Etiqueta em Calls.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="animate-on-scroll">
        <div class="container mx-auto px-6 max-w-3xl">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-8 text-center">Fale Conosco</h2>
            <p class="text-xl text-gray-300 mb-12 text-center">Quer saber como o RealTalk Daby pode transformar sua carreira ou sua equipe? Entre em contato agora!</p>
            <form action="#" method="POST" class="contact-form bg-gray-800 p-8 rounded-lg shadow-xl">
                <div class="input-group mb-6">
                    <label for="name" class="block text-gray-300 text-lg font-semibold mb-2">Nome Completo</label>
                    <input type="text" id="name" placeholder="Seu nome" class="w-full p-3 rounded-md bg-gray-700 border-gray-600 focus:ring-purple-500 focus:border-purple-500 text-gray-100">
                </div>
                <div class="input-group mb-6">
                    <label for="email" class="block text-gray-300 text-lg font-semibold mb-2">Email Corporativo</label>
                    <input type="email" id="email" placeholder="seu.email@empresa.com" class="w-full p-3 rounded-md bg-gray-700 border-gray-600 focus:ring-purple-500 focus:border-purple-500 text-gray-100">
                </div>
                <div class="input-group mb-6">
                    <label for="message" class="block text-gray-300 text-lg font-semibold mb-2">Sua Mensagem</label>
                    <textarea id="message" rows="5" placeholder="Quais são seus desafios ou objetivos com o inglês?" class="w-full p-3 rounded-md bg-gray-700 border-gray-600 focus:ring-purple-500 focus:border-purple-500 text-gray-100"></textarea>
                </div>
                <button type="submit" class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold py-3 px-6 rounded-md text-lg shadow-lg hover:from-purple-600 hover:to-pink-600 transition-all duration-300 ease-in-out">
                    Enviar Mensagem
                </button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center text-gray-500 py-10 px-6 bg-gray-900">
        <p class="glitch-text text-xl" data-text="Construído com Inovação e Foco em Resultados Corporativos por RealTalk Daby.">Construído com Inovação e Foco em Resultados Corporativos por RealTalk Daby.</p>
        <p class="mt-4 text-md text-gray-400">&copy; 2025 RealTalk Daby. Todos os direitos reservados.</p>
    </footer>

    <!-- JavaScript for Mobile Menu and Scroll Animations -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
             // Smooth scrolling for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                    // Close mobile menu if open
                    const mobileMenu = document.getElementById('mobile-menu');
                    if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                    }
                });
            });

            // Mobile menu toggle
            const menuButton = document.getElementById('menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            if (menuButton && mobileMenu) {
                menuButton.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
            }

            // Animate on load (introduction header and hero section elements)
            document.querySelectorAll('.animate-on-load').forEach(el => {
                const delay = el.dataset.delay ? parseFloat(el.dataset.delay) * 1000 : 0;
                setTimeout(() => {
                    el.classList.add('loaded');
                }, delay);
            });

            // Animate on scroll logic (generic fade-in-up)
            const animateOnScrollElements = document.querySelectorAll('.animate-on-scroll');
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.3 // Trigger when 30% of the element is visible
            };
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const delay = entry.target.dataset.delay ? parseFloat(entry.target.dataset.delay) * 1000 : 0;
                        setTimeout(() => {
                            entry.target.classList.add('loaded');
                        }, delay);
                        observer.unobserve(entry.target); // Stop observing after animation
                    }
                });
            }, observerOptions);
            animateOnScrollElements.forEach(el => {
                observer.observe(el);
            });

            // Accordion Logic (Curriculum)
            const accordionItems = document.querySelectorAll('.accordion-item');
            accordionItems.forEach(item => {
                const header = item.querySelector('.accordion-header');
                const content = item.querySelector('.accordion-content');
                const icon = header.querySelector('i');

                header.addEventListener('click', () => {
                    // Close other open accordions
                    accordionItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            otherItem.querySelector('.accordion-content').classList.remove('active');
                            otherItem.querySelector('.accordion-header i').classList.remove('rotate-180');
                        }
                    });

                    // Toggle current accordion
                    content.classList.toggle('active');
                    icon.classList.toggle('rotate-180');
                });
            });
        });
    </script>
</body>
</html>

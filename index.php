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

    <style>
        /* Base Styling & Font */
        body { font-family: 'Inter', sans-serif; background-color: #1A1A2E; color: #E0E0E0; overflow-x: hidden; }

        /* General */
        .backface-hidden { backface-visibility: hidden; }

        /* Background Animation */
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .animate-gradient {
            background: linear-gradient(-45deg, #2a2a4a, #3e3e5c, #5c3e5c, #4a2a4a);
            background-size: 400% 400%;
            animation: gradientShift 20s ease infinite;
        }

        /* Entrance Animation (Replicating Framer Motion initial/animate) */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        .fade-in {
            opacity: 0;
            transition: opacity 1s ease-out;
        }
        .animate-on-load {
            opacity: 0;
            transform: translateY(50px);
        }
        .animate-on-load.loaded {
            opacity: 1;
            transform: translateY(0);
            transition: opacity 1.2s ease-out, transform 1.2s ease-out;
        }
        .animate-on-scroll.fade-in-up.loaded {
            opacity: 1;
            transform: translateY(0);
        }

        /* NEW: Styles for the Introduction Header */
        .introduction-header {
            padding: 4rem 1.5rem; /* Ajuste o padding conforme necessário */
            text-align: center;
            background: linear-gradient(-45deg, #3e3e5c, #2a2a4a); /* Fundo sutil */
            color: #E0E0E0;
        }
        .introduction-header h1 {
            font-size: 3.5rem; /* Tamanho grande para o título principal */
            font-weight: 900;
            margin-bottom: 0.5rem;
            color: #FFC0CB; /* Cor de destaque clara */
            text-shadow: 0 0 10px rgba(255,192,203,0.5); /* Sombra para impacto */
        }
        .introduction-header h2 {
            font-size: 1.8rem; /* Tamanho para o subtítulo */
            font-weight: 700;
            color: #BD93F9; /* Outra cor de destaque */
        }
        @media (min-width: 768px) {
            .introduction-header h1 { font-size: 5rem; }
            .introduction-header h2 { font-size: 2.5rem; }
        }

        /* Efeito Glitch (Full CSS - Usado no Footer) */
        .glitch-text {
            font-size: 1.5rem;
            position: relative;
            color: #e5e5e5;
        }
        .glitch-text::before,
        .glitch-text::after {
            content: attr(data-text);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .glitch-text::before {
            left: 2px;
            text-shadow: -2px 0 #ff00c1; /* Magenta shift */
            clip: rect(44px, 450px, 56px, 0);
            animation: glitch-before 1.5s infinite alternate-reverse;
        }
        .glitch-text::after {
            left: -2px;
            text-shadow: -2px 0 #00ffff; /* Cyan shift */
            clip: rect(65px, 450px, 75px, 0);
            animation: glitch-after 1.8s infinite alternate;
        }
        @keyframes glitch-before {
            0% { clip: rect(27px, 9999px, 53px, 0); transform: translate(-3px, -3px); }
            50% { clip: rect(10px, 9999px, 40px, 0); transform: translate(3px, 3px); }
            100% { clip: rect(50px, 9999px, 10px, 0); transform: translate(0); }
        }
        @keyframes glitch-after {
            0% { clip: rect(80px, 9999px, 20px, 0); transform: translate(3px, 3px); }
            50% { clip: rect(30px, 9999px, 70px, 0); transform: translate(-3px, -3px); }
            100% { clip: rect(50px, 9999px, 10px, 0); transform: translate(0); }
        }

        /* Efeito Rainbow (Gradiente animado) - Usado no 2º e 3º Título */
        @keyframes rainbow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .rainbow-text {
            background: linear-gradient(120deg, #ff0000, #ff8c00, #ffff00, #008000, #0000ff, #4b0082, #9400d3);
            background-size: 400% 400%;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: rainbow 8s ease infinite;
            display: inline-block;
        }

        /* Efeito In/Out of Focus (Pulse) - USADO APENAS NO 3º TÍTULO */
        @keyframes focus-pulse {
            0%, 100% { filter: blur(0px); opacity: 1; }
            50% { filter: blur(1px); opacity: 0.9; }
        }
        .focus-pulse {
            animation: focus-pulse 6s infinite alternate ease-in-out;
        }

        /* Flipping Card CSS */
        .flipping-card-container {
            perspective: 1000px;
            transform-style: preserve-3d;
            transition: transform 0.8s;
        }
        .card-face {
            position: absolute;
            inset: 0;
            backface-visibility: hidden;
            transition: transform 0.8s, opacity 0.8s;
            transform-origin: center;
        }
        #card-front {
            transform: rotateY(0deg);
            opacity: 1;
        }
        #card-back {
            transform: rotateY(180deg);
            opacity: 0.2;
        }
        .flipping-card-container[data-flipped="true"] #card-front {
            transform: rotateY(-180deg);
            opacity: 0.2;
        }
        .flipping-card-container[data-flipped="true"] #card-back {
            transform: rotateY(0deg);
            opacity: 1;
        }
        /* Custom style for Accordion content transition */
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease-in-out, padding 0.5s ease-in-out;
        }
        .accordion-content.active {
            max-height: 800px; /* Increased height for presentation content */
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
        /* Adjusted dropdown for dark mode */
        select {
            -webkit-appearance: none; -moz-appearance: none; appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="%23e0e0e0" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
            background-repeat: no-repeat; background-position: right 10px center; background-size: 20px;
            padding-right: 35px; /* Make space for the arrow */
            background-color: #3e3e5c; /* Input background */
            color: #bd93f9; /* Select text color */
            font-size: 1rem;
            border: 1px solid #444; border-radius: 66px;
        }
        select option {
            background-color: #3e3e5c; /* Option background */
            color: #e0e0e0; /* Option text */
        }
        select optgroup {
            background-color: #2a2a4a; /* Optgroup background */
            color: #8be9fd; /* Optgroup text */
            font-weight: bold;
        }

        /* Custom styles for animated handwriting sentences */
        .handwriting-container {
            font-family: 'Patrick Hand', cursive; /* Applied new, softer handwriting font */
            font-size: 2rem; /* Slightly larger base size */
            line-height: normal; 
            text-align: left; /* Align sentences left */
            color: #d0d0d0; /* Soft white text */
            max-width: 900px; /* Constrain width for better reading */
            margin: 0 auto; /* Center the container */
            padding: 0 20px; /* General padding for the container */
            min-height: 15rem; /* Garante que o container tenha altura suficiente */
            display: flex;
            flex-direction: column;
            justify-content: center; /* Centraliza verticalmente */
        }
        .handwriting-sentence {
            opacity: 0; /* Start hidden */
            transform: translateY(20px); /* Start slightly below */
            transition: opacity 0.5s ease-out, transform 0.5s ease-out; /* Smooth transition, faster */
            display: inline; /* Changed to inline for most sentences */
            margin: 0; /* Removed margin-bottom */
            padding-left: 0.5em; /* Reduced indent for inline elements */
            position: relative; /* For custom bullet */
            white-space: normal; /* Allow text to wrap naturally if inline */
        }
        /* State for loaded sentences */
        .handwriting-sentence.loaded {
            opacity: 1;
            transform: translateY(0);
        }
        /* Custom bullet point (e.g., a simple dash or dot) */
        .handwriting-sentence::before {
            content: '•'; /* Unicode bullet point */
            color: #bd93f9; /* Purple accent color */
            font-size: 1.3em; /* Slightly larger bullet */
            position: relative;
            margin-right: 0.2em;
            vertical-align: middle; /* Align bullet vertically */
        }
        /* Special handling for the first sentence to be a block */
        #handwriting-message-container .handwriting-sentence:first-child {
            display: block; /* Ensures the first sentence stays on its own line */
            padding-left: 1.5em; /* Original indent */
            margin-bottom: 0.8em; /* Original margin-bottom for a block element */
            white-space: normal; /* Allow the first sentence to wrap naturally */
        }
        #handwriting-message-container .handwriting-sentence:first-child::before {
            position: absolute; /* Reset to absolute for the first child bullet */
            left: 0;
            top: 0;
            margin-right: 0; /* No external margin */
        }

        /* Style for bold parts within the sentence */
        .handwriting-sentence strong {
            color: #ff79c6; /* Pink accent for important words */
            font-weight: 700; /* Make bold stand out */
        }

        /* NEW: Styles for dynamic keyphrases */
        .keyphrase-effect {
            animation: pulse-shadow 1.5s infinite alternate ease-in-out;
            display: inline-block; /* Essential for animation */
        }
        @keyframes pulse-shadow {
            0% { text-shadow: 0 0 5px rgba(255, 121, 198, 0.4), 0 0 10px rgba(189, 147, 249, 0.3); }
            50% { text-shadow: 0 0 10px rgba(255, 121, 198, 0.8), 0 0 20px rgba(189, 147, 249, 0.6); }
            100% { text-shadow: 0 0 5px rgba(255, 121, 198, 0.4), 0 0 10px rgba(189, 147, 249, 0.3); }
        }

        .emoji-pulse {
            animation: emoji-pop 1s ease-out forwards; /* Single pop animation */
            display: inline-block;
            vertical-align: middle; /* Align emoji with text */
        }
        @keyframes emoji-pop {
            0% { transform: scale(0.8); opacity: 0; }
            50% { transform: scale(1.2); opacity: 1; }
            100% { transform: scale(1); }
        }

        /* Typewriter text styling (without width: 0; overflow: hidden on the main span) */
        .typewriter-placeholder {
            display: inline-block;
            white-space: nowrap; /* Impede a quebra de linha durante a digitação */
            border-right: 2px solid rgba(255, 255, 255, 0.75); /* Cursor */
            animation: blink-caret 0.75s step-end infinite;
            overflow: hidden; /* Garantir que o texto se esconda até ser digitado */
        }
        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: rgba(255, 255, 255, 0.75); }
        }
        /* Remove cursor animation on non-active placeholders */
        .typewriter-placeholder:not(.typewriter-text-active) {
            border-right: none;
            animation: none;
        }


        /* Clean Line Text - Underline effect */
        .clean-line-text {
            position: relative;
            display: inline-block;
        }
        .clean-line-text::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px; /* Adjust vertical position of line */
            width: 0; /* Start with no width */
            height: 3px; /* Thickness of the line */
            background-color: #bd93f9; /* Purple line color */
            transition: width 0.5s ease-out; /* Smooth transition */
        }
        .clean-line-text.active::after {
            width: 100%; /* Expand to full width on active */
        }

        /* Methodology section adjustments for spacing */
        #methodology h2.section-methodology-title {
            margin-bottom: 0.5rem; /* Reduced space below title */
            line-height: 1.2;
        }
        #methodology p {
            margin-top: 0.5rem; /* Reduced space above paragraph */
            margin-bottom: 1.5rem; /* Standard space below paragraph */
        }
        #methodology .block {
             margin-bottom: 2rem; /* Ensure standard spacing between cards/blocks */
        }
    </style>
</head>
<body class="animate-gradient text-gray-100 min-h-screen">
    <!-- Navbar -->
    <nav class="p-4 fixed w-full z-20 top-0 bg-opacity-70 backdrop-blur-sm bg-gray-900">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400">RealTalk Daby</a>
            <div class="hidden md:flex space-x-6">
                <a href="#hero" class="text-gray-300 hover:text-pink-400 transition-colors">Início</a>
                <a href="#voce" class="text-gray-300 hover:text-pink-400 transition-colors">Você</a>
                <a href="#challenge" class="text-gray-300 hover:text-pink-400 transition-colors">Seu Desafio</a>
                <a href="#methodology" class="text-gray-300 hover:text-pink-400 transition-colors">Metodologia</a>
                <a href="#features" class="text-gray-300 hover:text-pink-400 transition-colors">Plataforma</a>
                <a href="#curriculum" class="text-gray-300 hover:text-pink-400 transition-colors">Currículo</a>
                <a href="#ai-power" class="text-gray-300 hover:text-pink-400 transition-colors">AI Power</a>
                <a href="#contact" class="text-gray-300 hover:text-pink-400 transition-colors">Contato</a>
            </div>
            <div class="md:hidden">
                <button id="menu-button" class="text-gray-300 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-gray-800 p-4 mt-2 rounded-md">
            <a href="#hero" class="block text-gray-300 hover:text-pink-400 py-2">Início</a>
            <a href="#voce" class="block text-gray-300 hover:text-pink-400 py-2">Você</a>
            <a href="#challenge" class="block text-gray-300 hover:text-pink-400 py-2">Seu Desafio</a>
            <a href="#methodology" class="block text-gray-300 hover:text-pink-400 py-2">Metodologia</a>
            <a href="#features" class="block text-gray-300 hover:text-pink-400 py-2">Plataforma</a>
            <a href="#curriculum" class="block text-gray-300 hover:text-pink-400 py-2">Currículo</a>
            <a href="#ai-power" class="block text-gray-300 hover:text-pink-400 py-2">AI Power</a>
            <a href="#contact" class="block text-gray-300 hover:text-pink-400 py-2">Contato</a>
        </div>
    </nav>

    <!-- NEW: Introduction Header -->
    <div class="introduction-header animate-on-load">
        <h1>ACELERE A PERFORMANCE GLOBAL BY DABY</h1>
        <h2>Fluência como Reflexo, não como Barreira.</h2>
    </div>

    <!-- Hero Section -->
    <header id="hero" class="relative text-center py-20 px-6 animate-on-load">
        <div class="container mx-auto max-w-4xl pt-16">
            <h1 class="text-6xl md:text-7xl font-extrabold leading-tight text-white mb-4">RealTalk Daby</h1>
            <p class="text-3xl md:text-4xl text-purple-300 mb-8 animate-pulse">Comunicação que Decola.</p>
            <p class="text-xl md:text-2xl text-gray-300 mb-10">Transforme seu Inglês Corporativo em seu maior ativo. Sem esforço. Com impacto.</p>
            <a href="#challenge" class="inline-block bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold py-3 px-8 rounded-full text-lg shadow-lg hover:from-purple-600 hover:to-pink-600 transition duration-300 ease-in-out">
                Descubra Seu Desafio Aqui!
            </a>
        </div>
    </header>

    <!-- NEW: VOCÊ Section - Animated Handwriting -->
    <section id="voce" class="py-20 animate-on-scroll fade-in-up">
        <div class="container mx-auto px-6 max-w-5xl text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-5">
                Conheça a Sua Jornada com o RealTalk Daby
            </h2>
            <div id="handwriting-message-container" class="handwriting-container opacity-0 transition-opacity duration-1000">
                <!-- Frases pré-estruturadas para animação -->
                <span class="handwriting-sentence">
                    Você é um profissional <strong class="keyphrase-effect">fera e de alta performance</strong>, mas o inglês ainda é o <strong class="keyphrase-effect">[ÓBICE INVISÍVEL]/[CALCANHAR DE AQUILES]</strong> <span class="emoji-pulse">😩</span> que 'trava' seu avanço global? <span class="emoji-pulse">😔</span>
                </span>
                <span class="handwriting-sentence">
                    O RealTalk Daby te dá a chance de <span class="typewriter-placeholder" data-original-text="DECIFRAR"></span> e <span class="typewriter-placeholder" data-original-text="TRANSFORMAR"></span> esse cenário imediatamente.
                </span>
                <span class="handwriting-sentence">
                    Sua mente se adapta. Seu conhecimento se <strong class="keyphrase-effect">MATERIALIZA</strong> em <strong class="keyphrase-effect">REFLEXO COMUNICATIVO INSTANTÂNEO</strong>. <span class="emoji-pulse">🛑</span>
                </span>
                <span class="handwriting-sentence">
                    O resultado? Sua voz no <span class="clean-line-text">automático, com impacto e sem ruídos</span>. <span class="emoji-pulse">✨</span>
                </span>
            </div>
            <div class="mt-12">
                 <a href="#contact" class="inline-block bg-gradient-to-r from-teal-400 to-blue-500 text-white font-bold py-3 px-8 rounded-full text-lg shadow-lg hover:from-teal-500 hover:to-blue-600 transition duration-300 ease-in-out">
                    Comece a Decolar Agora
                </a>
            </div>
        </div>
    </section>

    <!-- Challenge Section (now simplified) -->
    <section id="challenge" class="py-20 animate-on-scroll fade-in-up">
        <div class="container mx-auto px-6 max-w-4xl text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-5">
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
    <section id="methodology" class="py-20 animate-on-scroll fade-in-up">
        <div class="container mx-auto px-6 max-w-5xl">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white section-methodology-title mb-5">
                🧠 O SHIFT REAL TALK DABY: Da Teoria à Competência Instantânea.
            </h2>
            <p class="text-xl text-gray-300 mb-8">
                **O RealTalk Daby treina você em bootcamps**, e converte seu investimento e tempo em resultados concretos em inglês específicos e especializado para seu trabalho/empresa/área. Nossa metodologia exclusiva, o "<strong class="text-pink-400">Lego Chain Block</strong>" (adaptado por RealTalk Daby), tem como objetivo principal eliminar o "<strong class="text-pink-400">lag</strong>" da tradução, garantindo resultados de negócios imediatos e um domínio muito mais próximo do inglês real.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="block p-6 bg-gray-800 rounded-lg shadow-xl animate-on-scroll fade-in-up" data-delay="0.1">
                    <h3 class="text-2xl font-bold text-purple-400 mb-3">#01 | O Mindset "Off-Translation"</h3>
                    <p class="text-gray-300">Liberte-se do vício da tradução. Pense e reaja diretamente em inglês, acelerando sua fluidez e confiança.</p>
                </div>
                <div class="block p-6 bg-gray-800 rounded-lg shadow-xl animate-on-scroll fade-in-up" data-delay="0.3">
                    <h3 class="text-2xl font-bold text-pink-400 mb-3">#02 | Lego Chain Block</h3>
                    <p class="text-gray-300">Construa seu inglês com blocos de comunicação. Combine chunks, vocabulário e lógica para frases complexas.</p>
                </div>
                <div class="block p-6 bg-gray-800 rounded-lg shadow-xl animate-on-scroll fade-in-up" data-delay="0.5">
                    <h3 class="text-2xl font-bold text-teal-400 mb-3">#03 | Performance em Tempo Real</h3>
                    <p class="text-gray-300">Treine com cenários reais, simulando reuniões, apresentações e negociações para resultados imediatos.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section (Plataforma) -->
    <section id="features" class="py-20 animate-on-scroll fade-in-up">
        <div class="container mx-auto px-6 max-w-5xl">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-12 text-center">
                Sua Plataforma de Aprendizado no RealTalk Daby
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-center">
                <div class="block p-6 bg-gray-800 rounded-lg shadow-xl animate-on-scroll fade-in-up" data-delay="0.1">
                    <h3 class="text-3xl font-bold text-purple-400 mb-4">Bootcamps Intensivos</h3>
                    <p class="text-gray-300">Imersões focadas para desenvolver habilidades específicas e de alto impacto para sua carreira.</p>
                </div>
                <div class="block p-6 bg-gray-800 rounded-lg shadow-xl animate-on-scroll fade-in-up" data-delay="0.3">
                    <h3 class="text-3xl font-bold text-pink-400 mb-4">Módulos Personalizados</h3>
                    <p class="text-gray-300">Currículo adaptado ao seu nível, setor e objetivos profissionais mais urgentes.</p>
                </div>
                <div class="block p-6 bg-gray-800 rounded-lg shadow-xl animate-on-scroll fade-in-up" data-delay="0.5">
                    <h3 class="text-3xl font-bold text-teal-400 mb-4">Preparação psicológica</h3>
                    <p class="text-gray-300">técnicas para aprender e alavancar seu inglês</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Curriculum Section -->
    <section id="curriculum" class="py-20 animate-on-scroll fade-in-up">
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

    <!-- AI Power Section (Adapted to Methodology) -->
    <section id="ai-power" class="py-20 animate-on-scroll fade-in-up">
        <div class="container mx-auto px-6 max-w-5xl">
            <h2 class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400 mb-8">
                A <strong class="rainbow-text">INTELIGÊNCIA ARTIFICIAL</strong> Integrada à Sua Metodologia
            </h2>
            <p class="text-xl text-gray-300 mb-12">
                 No RealTalk Daby, a IA não é um substituto para o aprendizado humano, mas um acelerador e aprimorador da sua metodologia. Ela é a ponte entre a teoria do Lego Chain Block e sua proficiência.
            </p>

            <div class="ai-icon-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="ai-card p-6 bg-gray-800 rounded-lg shadow-xl flex flex-col items-center animate-on-scroll fade-in-up" data-delay="0.1">
                    <i class="fas fa-robot text-5xl text-purple-400 mb-4"></i>
                    <h3 class="text-2xl font-bold text-white mb-2">Reforço do Lego Chain Block</h3>
                    <p class="text-gray-300 text-center">A IA identifica e sugere novos "blocos" de comunicação para expandir seu repertório rapidamente.</p>
                </div>
                <div class="ai-card p-6 bg-gray-800 rounded-lg shadow-xl flex flex-col items-center animate-on-scroll fade-in-up" data-delay="0.3">
                    <i class="fas fa-headset text-5xl text-pink-400 mb-4"></i>
                    <h3 class="text-2xl font-bold text-white mb-2">Simulações de Cenários Reais</h3>
                    <p class="text-gray-300 text-center">Crie diálogos e simule reuniões com feedback contextualizado pela IA, treinando seu "reflexo".</p>
                </div>
                <div class="ai-card p-6 bg-gray-800 rounded-lg shadow-xl flex flex-col items-center animate-on-scroll fade-in-up" data-delay="0.5">
                    <i class="fas fa-lightbulb text-5xl text-teal-400 mb-4"></i>
                    <h3 class="text-2xl font-bold text-white mb-2">Diagnóstico de "Lag" e Erros</h3>
                    <p class="text-gray-300 text-center">A IA aponta precisamente onde ocorre o "lag" da tradução e onde você precisa de mais prática no "Off-Translation".</p>
                </div>
                <div class="ai-card p-6 bg-gray-800 rounded-lg shadow-xl flex flex-col items-center animate-on-scroll fade-in-up" data-delay="0.7">
                    <i class="fas fa-chart-line text-5xl text-blue-400 mb-4"></i>
                    <h3 class="text-2xl font-bold text-white mb-2">Análise de Progresso Detalhada</h3>
                    <p class="text-gray-300 text-center">Receba relatórios sobre sua fluidez, tempo de reação e domínio de novos "blocos" de linguagem.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 animate-on-scroll fade-in-up">
        <div class="container mx-auto px-6 max-w-3xl">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-8 text-center">Fale Conosco</h2>
            <p class="text-xl text-gray-300 mb-12 text-center">Quer saber como o RealTalk Daby pode transformar sua carreira ou sua equipe? Entre em contato agora!</p>
            <div class="contact-form bg-gray-800 p-8 rounded-lg shadow-xl">
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
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center text-gray-500 py-10 px-6 bg-gray-900">
        <p class="glitch-text text-xl" data-text="Construído com Inovação e Foco em Resultados Corporativos por RealTalk Daby.">Construído com Inovação e Foco em Resultados Corporativos por RealTalk Daby.</p>
        <p class="mt-4 text-md">&copy; 2025 RealTalk Daby. Todos os direitos reservados.</p>
    </footer>

    <!-- FontAwesome for Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- JavaScript para Scroll Animations e Animação de Escrita à Mão (agora para a seção VOCÊ) -->
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
            const accordionHeaders = document.querySelectorAll('.accordion-header');
            accordionHeaders.forEach(header => {
                header.addEventListener('click', () => {
                    const content = header.nextElementSibling;
                    const icon = header.querySelector('i');

                    // Close all other accordions and remove 'active' class
                    accordionHeaders.forEach(otherHeader => {
                        if (otherHeader !== header) {
                            otherHeader.nextElementSibling.classList.remove('active');
                            otherHeader.querySelector('i').classList.remove('rotate-180');
                        }
                    });

                    // Toggle the clicked accordion
                    content.classList.toggle('active');
                    icon.classList.toggle('rotate-180');
                });
            });

            // --- Logic for Animated Handwriting Sentences (VOCÊ Section) ---
            const handwritingSentencesContainer = document.getElementById('handwriting-message-container');
            const handwritingSentences = document.querySelectorAll('#voce .handwriting-sentence');
            let sentenceIndex = 0;

            function revealNextHandwritingSentence() {
                if (sentenceIndex < handwritingSentences.length) {
                    const currentSentenceElement = handwritingSentences[sentenceIndex];
                    currentSentenceElement.classList.add('loaded'); // Reveals the sentence with fade-in and slide-up

                    // Activates Typewriter for specific elements within the sentence
                    const typewriterPlaceholders = currentSentenceElement.querySelectorAll('.typewriter-placeholder');
                    typewriterPlaceholders.forEach(placeholder => {
                        const originalText = placeholder.dataset.originalText;
                        let charIndex = 0;
                        placeholder.textContent = ''; // Clears original text for typewriter effect
                        const typingSpeed = 70; // Typing speed
                        placeholder.classList.add('typewriter-text-active'); // Adds class for caret style

                        function type() {
                            if (charIndex < originalText.length) {
                                placeholder.textContent += originalText.charAt(charIndex);
                                charIndex++;
                                setTimeout(type, typingSpeed);
                            } else {
                                placeholder.style.borderRight = 'none'; // Removes caret when typing finishes
                            }
                        }
                        type(); // Starts typing
                    });

                    // Activates line effects for clean-line-text
                    const cleanLineTexts = currentSentenceElement.querySelectorAll('.clean-line-text');
                    cleanLineTexts.forEach(el => {
                        void el.offsetWidth; // Trigger reflow for animation reset
                        el.classList.add('active'); // Activates the draw-line animation
                    });

                    // Activates emoji-pulse for emojis within the sentence (if any)
                    const emojis = currentSentenceElement.querySelectorAll('.emoji-pulse');
                    emojis.forEach(emoji => {
                        void emoji.offsetWidth; // Trigger reflow for animation reset
                        emoji.style.animation = 'emoji-pop 1s ease-out forwards'; // Activates pop animation
                    });

                    sentenceIndex++;
                    setTimeout(revealNextHandwritingSentence, 1500); // 1.5 second delay between sentences
                }
            }

            // Initiates sentence animation when 'voce' section is visible
            const voceSection = document.getElementById('voce');
            if (voceSection) {
                 const voceObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting && !voceSection.dataset.animated) {
                            setTimeout(() => {
                                handwritingSentencesContainer.classList.add('opacity-100'); // Reveals the main container
                                revealNextHandwritingSentence(); // Starts sentence animation
                            }, 500); // Small delay before animation starts
                            voceSection.dataset.animated = 'true'; // Marks as animated
                            voceObserver.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.3 }); // Triggers when 30% of 'voce' section is visible
                voceObserver.observe(voceSection);
            }
        });
    </script>
</body>
</html>

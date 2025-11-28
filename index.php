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
        body { font-family: 'Inter', sans-serif; }

        /* General */
        .backface-hidden { backface-visibility: hidden; }

        /* Background Animation */
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .animate-gradient {
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
        /* Adjusted dropdown for dark mode (from previous builder.php - RELEVANT MEMORY: user wants custom colours for dropdown selections in dark mode to ensure readable contrast) */
        select {
            /* Basic appearance reset */
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            /* Add arrow icon */
            background-image: url('data:image/svg+xml;utf8,<svg fill="%23e0e0e0" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 20px;
            padding-right: 35px; /* Make space for the arrow */
            background-color: #3e3e5c; /* Input background */
            color: #bd93f9; /* Select text color */
            font-size: 1rem;
            border: 1px solid #444;
            border-radius: 66px;
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
            animation: emoji-pop 1s ease-out; /* Single pop animation */
            display: inline-block;
            vertical-align: middle; /* Align emoji with text */
        }
        @keyframes emoji-pop {
            0% { transform: scale(0.8); opacity: 0; }
            50% { transform: scale(1.1); opacity: 1; }
            100% { transform: scale(1); opacity: 1; }
        }

        /* Typewriter effect for specific text parts */
        .typewriter-placeholder { /* Placeholder: hidden text, visible caret */
            display: inline-block; /* Essential for caret positioning */
            overflow: hidden;
            white-space: nowrap;
            vertical-align: middle;
            font-size: inherit; /* Inherit font size from parent */
            color: inherit; /* Keep color of parent */
        }
        .typewriter-placeholder.typing::after { /* Caret animation for active typing */
            content: '|';
            animation: blink-caret .75s step-end infinite;
            display: inline-block;
            margin-left: 2px;
            vertical-align: top;
            color: orange; /* Color of the typing caret */
        }
        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: orange; }
        }

        /* For the final "sem ruídos" */
        .clean-line-text {
            display: inline-block;
            position: relative;
        }
        .clean-line-text::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #9400d3; /* Purple line */
            animation: draw-line 1s ease-out forwards;
            animation-delay: 0.5s;
        }
        @keyframes draw-line {
            to { width: 100%; }
        }

        /* Custom scroll indicator for the hero section */
        .scroll-indicator {
            position: absolute;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            opacity: 0;
            animation: fade-in-up 1.5s forwards ease-out 2s; /* delay after hero loads */
        }

        @keyframes bounce-arrow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .scroll-indicator svg {
            animation: bounce-arrow 1.5s infinite;
        }

        /* Ajustes para a seção de Metodologia */
        #methodology h2.section-methodology-title { /* Especificidade aumentada */
            margin-bottom: 20px; /* Reduz margem inferior do título */
            line-height: 1.2; /* Tighter line height for title */
        }
        #methodology p {
            margin-top: 15px; /* Reduz a margem superior do parágrafo */
            margin-bottom: 30px; /* Ajusta conforme necessário */
            /* Se houver `mb-12` em algum lugar, ele vai prevalecer se for mais específico */
        }
        #methodology .block { /* Assumindo 'block' é para os cards de metodologia */
            margin-bottom: 0; /* Remove margem inferior extra de blocos */
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-purple-900 to-indigo-900 min-h-screen text-white animate-gradient custom-cursor">

    <!-- Navegação / Header -->
    <header class="fixed top-0 left-0 w-full bg-gray-900 bg-opacity-80 backdrop-blur-md z-50 shadow-lg">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#hero" class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-purple-600 hover:from-purple-600 hover:to-pink-500 transition duration-300">
                RealTalk Daby
            </a>
            <div class="space-x-8 flex items-center">
                <a href="#challenge" class="text-gray-300 hover:text-white transition duration-200 text-lg">Seu Desafio</a>
                <a href="#methodology" class="text-gray-300 hover:text-white transition duration-200 text-lg">Metodologia</a>
                <a href="#features" class="text-gray-300 hover:text-white transition duration-200 text-lg">Plataforma</a>
                <a href="#curriculum" class="text-gray-300 hover:text-white transition duration-200 text-lg">Currículo</a>
                <a href="#ai-power" class="text-gray-300 hover:text-white transition duration-200 text-lg">Poder da IA</a>
                <a href="#contact" class="px-6 py-2 bg-purple-600 text-white font-bold rounded-full hover:bg-purple-700 transition duration-300 shadow-md transform hover:scale-105">Contato</a>
            </div>
        </nav>
    </header>

    <!-- Seção Hero -->
    <section id="hero" class="relative min-h-screen flex items-center justify-center text-center overflow-hidden p-6">
        <!-- Partículas de Fundo (Placeholder para WebGL/Canvas) -->
        <div class="absolute inset-0 z-0 opacity-30">
            [[google images search term: animated space dust particles or nebula background]]
        </div>

        <div class="relative z-10 flex flex-col items-center justify-center p-8 bg-black bg-opacity-40 rounded-xl shadow-2xl animate-on-load" data-delay="0.1">
            <h1 class="text-6xl md:text-8xl font-extrabold mb-4 animate-on-load text-transparent bg-clip-text bg-gradient-to-r from-teal-300 to-blue-500 drop-shadow-lg" data-delay="0.2">
                RealTalk Daby
            </h1>
            <h2 class="text-3xl md:text-5xl font-semibold text-gray-200 mb-8 animate-on-load focus-pulse" data-delay="0.4">
                Comunicação que <span class="rainbow-text px-1">Decola</span>.
            </h2>
            <p class="text-xl md:text-2xl text-gray-300 mb-10 max-w-2xl animate-on-load" data-delay="0.6">
                Transforme seu Inglês Corporativo em seu maior ativo. Sem esforço. Com impacto.
            </p>
            <a href="#challenge" class="px-10 py-4 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold text-xl rounded-full hover:from-blue-600 hover:to-purple-700 transition duration-300 shadow-lg transform hover:scale-105 animate-on-load" data-delay="0.8">
                Descubra Seu Desafio Aqui!
            </a>
        </div>

        <!-- Indicador de Scroll -->
        <div class="scroll-indicator">
            <span class="mb-2">Rolar</span>
            <div class="scroll-arrow"></div>
        </div>
    </section>

    <!-- Seção "Seu Desafio" -->
    <section id="challenge" class="py-20 bg-gray-900 text-center relative overflow-hidden">
        <h2 class="text-5xl font-extrabold mb-8 text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-red-500 animate-on-scroll fade-in-up" data-delay="0">
            Seu Desafio com o Inglês Profissional é Real.
        </h2>
        <p class="text-red-400 font-bold text-3xl mb-8 animate-on-scroll fade-in-up" data-delay="0.1">
            INGLÊS NUNCA FOI FÁCIL. <span class="emoji-pulse">😩</span>
        </p>

        <p class="text-2xl md:text-3xl text-gray-300 font-extrabold mb-12 animate-on-scroll fade-in-up" data-delay="0.2">
            O tão sonhado fluir em inglês? <strong class="text-pink-400">É de vez, agora!</strong> <span class="emoji-pulse">✨</span> RealTalk Daby no seu ritmo, no seu tempo. <span class="emoji-pulse">🚀</span>
            <br><br>
            Prepare-se para <strong class="text-blue-400">alavancar seu inglês e garantir sua posição</strong> num futuro cada vez mais competitivo com a <strong class="text-purple-400">era da Inteligência Artificial</strong> que se consolida em 3 anos! <span class="emoji-pulse">🤖</span><span class="emoji-pulse">💡</span> Seu domínio do idioma será seu diferencial imbatível. <span class="emoji-pulse">💪</span>
        </p>

        <div id="handwriting-message-container" class="handwriting-container mt-16 opacity-0 transition-opacity duration-1000 ease-out">
            <!-- Estas frases serão reveladas e animadas pelo JavaScript -->
            <span class="handwriting-sentence">Você é um profissional fera e de alta performance, mas o inglês ainda é o <span class="keyphrase-effect">ÓBICE INVISÍVEL / CALCANHAR DE AQUILES</span> <span class="emoji-pulse">😩</span> que 'trava' seu avanço global? <span class="emoji-pulse">😔</span></span>
            <span class="handwriting-sentence">O RealTalk Daby te dá a chance de <span class="typewriter-placeholder" data-original-text="DECIFRAR" style="color:#25d366;"></span> e <span class="typewriter-placeholder" data-original-text="TRANSFORMAR" style="color:#25d366;"></span> esse cenário imediatamente.</span>
            <span class="handwriting-sentence">Sua mente se adapta. Seu conhecimento se <span class="keyphrase-effect">MATERIALIZA</span> em <span class="keyphrase-effect">REFLEXO COMUNICATIVO INSTANTÂNEO</span>. <span class="emoji-pulse">🛑</span></span>
            <span class="handwriting-sentence">O resultado? Sua voz no <span class="clean-line-text">automático, com impacto e sem ruídos</span>. <span class="emoji-pulse">✨</span></span>
        </div>
    </section>

    <!-- Seção Metodologia -->
    <section id="methodology" class="py-20 bg-gray-800 text-center">
        <h2 class="text-5xl font-extrabold mb-8 text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 section-methodology-title animate-on-scroll fade-in-up" data-delay="0">
            🧠 O SHIFT REAL TALK DABY: Da Teoria à Competência Instantânea.
        </h2>
        <p class="text-xl text-gray-300 mb-12 max-w-3xl mx-auto animate-on-scroll fade-in-up" data-delay="0.2">
            **O RealTalk Daby treina você em bootcamps**, e converte seu investimento e tempo em resultados concretos em inglês específicos e especializado para seu trabalho/empresa/área. Nossa metodologia exclusiva, o "<strong class="text-pink-400">Lego Chain Block</strong>" (adaptado por RealTalk Daby), tem como objetivo principal eliminar o "<strong class="text-pink-400">lag</strong>" da tradução, garantindo resultados de negócios imediatos e um domínio muito mais próximo do inglês real.
        </p>
        <div class="flex flex-wrap justify-center gap-8 px-6">
            <!-- Cards de Metodologia -->
            <div class="w-full md:w-1/3 p-6 bg-gray-900 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 animate-on-scroll fade-in-up block" data-delay="0.4">
                <h3 class="text-3xl font-bold text-purple-400 mb-4">Módulos Lego Chain Block</h3>
                <p class="text-gray-300">Construa seu inglês com blocos de conhecimento que se encaixam, formando uma base sólida e flexível para qualquer situação.</p>
            </div>
            <div class="w-full md:w-1/3 p-6 bg-gray-900 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 animate-on-scroll fade-in-up block" data-delay="0.6">
                <h3 class="text-3xl font-bold text-pink-400 mb-4">Simulação Corporativa</h3>
                <p class="text-gray-300">Exercícios práticos que reproduzem cenários reais da sua empresa, focando na comunicação autêntica e eficaz.</p>
            </div>
            <div class="w-full md:w-1/3 p-6 bg-gray-900 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 animate-on-scroll fade-in-up block" data-delay="0.8">
                <h3 class="text-3xl font-bold text-teal-400 mb-4">Feedback por IA e Especialista</h3>
                <p class="text-gray-300">Análise de IA para precisão e feedback humano para contextualização, garantindo um aprimoramento contínuo e personalizado.</p>
            </div>
        </div>
    </section>

    <!-- Seção Features / Plataforma -->
    <section id="features" class="py-20 bg-gray-900 text-center">
        <h2 class="text-5xl font-extrabold mb-8 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-green-500 animate-on-scroll fade-in-up" data-delay="0">
            🚀 Sua Plataforma, Seu Universo de Aprendizado.
        </h2>
        <p class="text-xl text-gray-300 mb-12 max-w-3xl mx-auto animate-on-scroll fade-in-up" data-delay="0.2">
            Desenvolvida para maximizar sua eficiência, a plataforma RealTalk Daby integra tecnologia de ponta com um design intuitivo.
        </p>
        <div class="flex flex-wrap justify-center gap-8 px-6">
            <!-- Feature Cards -->
            <div class="w-full md:w-1/3 p-6 bg-gray-800 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 animate-on-scroll fade-in-up" data-delay="0.4">
                <i class="fas fa-robot text-purple-500 text-5xl mb-4"></i>
                <h3 class="text-3xl font-bold text-purple-400 mb-4">AI Tutor Personalizado</h3>
                <p class="text-gray-300">Um tutor de IA que se adapta ao seu estilo de aprendizado e te guia em cada etapa. Disponível 24/7.</p>
            </div>
            <div class="w-full md:w-1/3 p-6 bg-gray-800 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 animate-on-scroll fade-in-up" data-delay="0.6">
                <i class="fas fa-rocket text-pink-500 text-5xl mb-4"></i>
                <h3 class="text-3xl font-bold text-pink-400 mb-4">Trilhas de Carreira Aceleradas</h3>
                <p class="text-gray-300">Caminhos de aprendizado focados em sua área profissional para resultados rápidos e relevantes.</p>
            </div>
            <div class="w-full md:w-1/3 p-6 bg-gray-800 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 animate-on-scroll fade-in-up" data-delay="0.8">
                <i class="fas fa-chart-line text-teal-500 text-5xl mb-4"></i>
                <h3 class="text-3xl font-bold text-teal-400 mb-4">Preparação psicológica</h3>
                <p class="text-gray-300">técnicas para aprender e alavancar seu inglês</p>
            </div>
        </div>
    </section>

    <!-- Seção Currículo Dinâmico -->
    <section id="curriculum" class="py-20 bg-gray-800 text-center">
        <h2 class="text-5xl font-extrabold mb-8 text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-500 animate-on-scroll fade-in-up" data-delay="0">
            📚 Currículo Flexível, Conhecimento Inflexível.
        </h2>
        <p class="text-xl text-gray-300 mb-12 max-w-3xl mx-auto animate-on-scroll fade-in-up" data-delay="0.2">
            Nossa abordagem se adapta ao seu ritmo, mas não negocia a profundidade do seu aprendizado.
        </p>

        <!-- Flipping Card Example -->
        <div id="flipping-card" class="flipping-card-container w-4/5 md:w-1/2 mx-auto h-72 rounded-xl shadow-2xl relative cursor-pointer group animate-on-scroll fade-in-up" data-delay="0.4">
            <!-- Card Front -->
            <div id="card-front" class="card-face bg-gradient-to-br from-purple-700 to-indigo-800 p-8 rounded-xl flex flex-col justify-center items-center">
                <h3 class="text-4xl font-bold text-white mb-4">Seu Plano de Voo</h3>
                <p class="text-lg text-indigo-200">Clique ou passe o mouse para descobrir o que impulsionará seu sucesso.</p>
            </div>
            <!-- Card Back -->
            <div id="card-back" class="card-face bg-gradient-to-br from-indigo-800 to-purple-700 p-8 rounded-xl flex flex-col justify-center items-center">
                <h3 class="text-4xl font-bold text-white mb-4">Adaptação em Tempo Real</h3>
                <p class="text-lg text-indigo-200">Nosso currículo se "auto-ajusta" com inteligência artificial, criando aulas personalizadas conforme sua evolução.</p>
            </div>
        </div>

        <div class="mt-16 max-w-4xl mx-auto text-left px-6">
            <div class="accordion-item animate-on-scroll fade-in-up" data-delay="0.6">
                <button class="accordion-header flex justify-between items-center w-full p-4 bg-gray-900 rounded-t-lg text-left text-2xl font-semibold text-purple-400 hover:bg-gray-700 transition duration-200">
                    O que esperar do Currículo?
                    <i class="fas fa-chevron-down text-purple-400 transform transition-transform duration-300"></i>
                </button>
                <div class="accordion-content bg-gray-900 rounded-b-lg">
                    <div class="p-4 text-gray-200">
                        <ul class="list-disc list-inside space-y-2">
                            <li>Flexibilidade total de horários e conteúdos.</li>
                            <li>Foco em vocabulário e expressões relevantes para o seu setor.</li>
                            <li>Módulos compactos para aprendizado "on-the-go".</li>
                            <li>Avaliações contínuas e adaptativas.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item animate-on-scroll fade-in-up" data-delay="0.8">
                <button class="accordion-header flex justify-between items-center w-full p-4 bg-gray-900 text-left text-2xl font-semibold text-pink-400 hover:bg-gray-700 transition duration-200 mt-4 rounded-t-lg">
                    Para quem é ideal?
                    <i class="fas fa-chevron-down text-pink-400 transform transition-transform duration-300"></i>
                </button>
                <div class="accordion-content bg-gray-900 rounded-b-lg">
                    <div class="p-4 text-gray-200">
                        <ul class="list-disc list-inside space-y-2">
                            <li>Executivos e profissionais buscando ascensão.</li>
                            <li>Equipes que necessitam de alinhamento em inglês global.</li>
                            <li>Indivíduos com pouco tempo, mas grande ambição.</li>
                            <li>Empresas que valorizam a comunicação de alto impacto.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção Poder da IA -->
    <section id="ai-power" class="py-20 bg-gray-900 text-center">
        <h2 class="text-5xl font-extrabold mb-8 text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-500 animate-on-scroll fade-in-up" data-delay="0">
            🤖 O Poder da I.A. ao Seu Dispor.
        </h2>
        <p class="text-xl text-gray-300 mb-12 max-w-3xl mx-auto animate-on-scroll fade-in-up" data-delay="0.2">
            Não é só inteligência artificial, é inteligência aumentada para o seu inglês.
        </p>
        <div class="relative max-w-5xl mx-auto px-6">
            <div class="flex flex-wrap justify-center items-center gap-8">
                <div class="w-full md:w-2/5 p-8 bg-gray-800 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 animate-on-scroll fade-in-up" data-delay="0.4">
                    <h3 class="text-3xl font-bold text-teal-400 mb-4">Diagnóstico Preciso</h3>
                    <p class="text-gray-300">Nossa IA identifica suas lacunas e pontos fortes com uma precisão cirúrgica, personalizando seu caminho.</p>
                </div>
                <div class="w-full md:w-2/5 p-8 bg-gray-800 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 animate-on-scroll fade-in-up" data-delay="0.6">
                    <h3 class="text-3xl font-bold text-orange-400 mb-4">Simulações de Diálogo Avançadas</h3>
                    <p class="text-gray-300">Pratique conversação com IA que reage de forma inteligente, preparando-o para qualquer interação profissional.</p>
                </div>
                <div class="w-full md:w-2/5 p-8 bg-gray-800 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 animate-on-scroll fade-in-up" data-delay="0.8">
                    <h3 class="text-3xl font-bold text-blue-400 mb-4">Correção Gramatical e Estilística</h3>
                    <p class="text-gray-300">Receba sugestões instantâneas para aprimorar não só a gramática, mas o impacto e a persuasão da sua fala.</p>
                </div>
                <div class="w-full md:w-2/5 p-8 bg-gray-800 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 animate-on-scroll fade-in-up" data-delay="1.0">
                    <h3 class="text-3xl font-bold text-green-400 mb-4">Gerador de Vocabulário Contextual</h3>
                    <p class="text-gray-300">Expanda seu léxico com palavras e chunks lexicais relevantes, apresentados em contextos de seu interesse profissional.</p>
                </div>
            </div>
            <!-- Imagem flutuante de um cérebro de IA -->
            <div class="absolute -right-20 top-1/2 -translate-y-1/2 hidden lg:block opacity-70 animate-pulse">
                [[google images search term: stylized glowing ai brain icon]]
            </div>
        </div>
    </section>

    <!-- Seção de Contato -->
    <section id="contact" class="py-20 bg-gray-800 text-center">
        <h2 class="text-5xl font-extrabold mb-8 text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-blue-500 animate-on-scroll fade-in-up" data-delay="0">
            Conecte-se e Transforme Seu Futuro.
        </h2>
        <p class="text-xl text-gray-300 mb-12 max-w-3xl mx-auto animate-on-scroll fade-in-up" data-delay="0.2">
            Pronto para impulsionar sua carreira com o RealTalk Daby? Fale conosco!
        </p>
        <div class="max-w-xl mx-auto p-8 bg-gray-900 rounded-xl shadow-lg animate-on-scroll fade-in-up" data-delay="0.4">
            <form action="#" method="POST" class="space-y-6 text-left">
                <div>
                    <label for="name" class="block text-gray-300 text-lg font-semibold mb-2">Nome Completo</label>
                    <input type="text" id="name" name="name" placeholder="Seu nome" class="w-full p-4 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 text-white" required>
                </div>
                <div>
                    <label for="email" class="block text-gray-300 text-lg font-semibold mb-2">Email Corporativo</label>
                    <input type="email" id="email" name="email" placeholder="seu.email@empresa.com" class="w-full p-4 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 text-white" required>
                </div>
                <div>
                    <label for="company" class="block text-gray-300 text-lg font-semibold mb-2">Empresa</label>
                    <input type="text" id="company" name="company" placeholder="Nome da sua empresa" class="w-full p-4 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 text-white">
                </div>
                <div>
                    <label for="message" class="block text-gray-300 text-lg font-semibold mb-2">Sua Mensagem</label>
                    <textarea id="message" name="message" rows="5" placeholder="Conte-nos sobre suas necessidades ou dúvidas..." class="w-full p-4 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 text-white" required></textarea>
                </div>
                <button type="submit" class="w-full py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold text-xl rounded-lg hover:from-purple-700 hover:to-pink-700 transition duration-300 shadow-md transform hover:scale-105">
                    Enviar Mensagem
                </button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-950 py-10 text-center text-gray-400">
        <div class="glitch-text text-xl font-bold" data-text="Construído com Inovação e Foco em Resultados Corporativos por RealTalk Daby." style="font-family: 'Inter', sans-serif;">
            Construído com Inovação e Foco em Resultados Corporativos por RealTalk Daby.
        </div>
        <p class="text-gray-600 text-md mt-4">&copy; 2025 RealTalk Daby. Todos os direitos reservados.</p>
    </footer>

    <!-- JavaScript para Animações e Scroll Suave -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
             // Função para scroll suave
            const smoothScroll = (targetId) => {
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - document.querySelector('header').offsetHeight, // Ajuste para o header fixo
                        behavior: 'smooth'
                    });
                }
            };

            // Navegação e Toggle de Menu para Mobile (se implementado)
            document.querySelectorAll('nav a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    smoothScroll(this.getAttribute('href'));
                });
            });

            // Animação dos elementos no carregamento da página
            const animateOnLoadElements = document.querySelectorAll('.animate-on-load');
            animateOnLoadElements.forEach(el => {
                el.classList.add('loaded'); // Ativa a animação para elementos com 'animate-on-load'
            });

            // Animação de elementos ao rolar a página
            const animateOnScrollElements = document.querySelectorAll('.animate-on-scroll');
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1 // Ativa quando 10% do elemento está visível
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const delay = entry.target.dataset.delay ? parseFloat(entry.target.dataset.delay) * 1000 : 0;
                        setTimeout(() => {
                            entry.target.classList.add('loaded');
                        }, delay);
                        observer.unobserve(entry.target); // Para de observar depois de animar
                    }
                });
            }, observerOptions);

            animateOnScrollElements.forEach(el => {
                observer.observe(el);
            });

            // Lógica do Flipping Card
            const flippingCard = document.getElementById('flipping-card');
            if (flippingCard) {
                flippingCard.addEventListener('mouseover', () => {
                    flippingCard.dataset.flipped = 'true';
                });
                flippingCard.addEventListener('mouseout', () => {
                    flippingCard.dataset.flipped = 'false';
                });
                // Para dispositivos touch
                flippingCard.addEventListener('click', () => {
                    flippingCard.dataset.flipped = flippingCard.dataset.flipped === 'true' ? 'false' : 'true';
                });
            }


            // --- Lógica da Animação de Escrita à Mão (Seu Desafio) ---
            const handwritingSentences = document.querySelectorAll('#handwriting-message-container .handwriting-sentence');
            let sentenceIndex = 0;

            function revealNextHandwritingSentence() {
                if (sentenceIndex < handwritingSentences.length) {
                    const currentSentenceElement = handwritingSentences[sentenceIndex];
                    currentSentenceElement.classList.add('loaded'); // Revela a sentença com fade-in e slide-up

                    // Ativa Typewriter para elementos específicos dentro da sentença
                    const typewriterPlaceholders = currentSentenceElement.querySelectorAll('.typewriter-placeholder');
                    typewriterPlaceholders.forEach(placeholder => {
                        const originalText = placeholder.dataset.originalText;
                        let charIndex = 0;
                        placeholder.textContent = ''; // Limpa o texto original para o typewriter
                        const typingSpeed = 70; // Velocidade da digitação
                        placeholder.classList.add('typewriter-text-active'); // Adiciona classe para estilo do cursor

                        function type() {
                            if (charIndex < originalText.length) {
                                placeholder.textContent += originalText.charAt(charIndex);
                                charIndex++;
                                setTimeout(type, typingSpeed);
                            } else {
                                placeholder.style.borderRight = 'none'; // Remove o caret ao terminar
                            }
                        }
                        type(); // Inicia a digitação
                    });

                    // Ativa os efeitos de linha para clean-line-text
                    const cleanLineTexts = currentSentenceElement.querySelectorAll('.clean-line-text');
                    cleanLineTexts.forEach(el => {
                        el.style.animation = 'none'; // Reseta animação se já existia
                        void el.offsetWidth; // Trigger reflow
                        el.style.animation = 'draw-line 1s ease-out forwards'; // Reativa animação
                    });

                    // Ativa emoji-pulse para emojis dentro da sentença (se houver)
                    const emojis = currentSentenceElement.querySelectorAll('.emoji-pulse');
                    emojis.forEach(emoji => {
                        emoji.style.animation = 'none'; // Reseta animação
                        void emoji.offsetWidth; // Trigger reflow
                        emoji.style.animation = 'emoji-pop 1s ease-out'; // Reativa animação
                    });

                    sentenceIndex++;
                    setTimeout(revealNextHandwritingSentence, 1500); // 1.5 segundo entre cada frase
                }
            }

            // Inicia a animação das frases quando a seção 'challenge' está visível
            const challengeSection = document.getElementById('challenge');
            if (challengeSection) {
                 const challengeObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting && !challengeSection.dataset.animated) {
                            setTimeout(() => {
                                document.getElementById('handwriting-message-container').classList.add('opacity-100'); // Revela o container principal
                                revealNextHandwritingSentence(); // Inicia a animação das frases
                            }, 500); // Pequeno atraso após a frase motivacional aparecer
                            challengeSection.dataset.animated = 'true'; // Marca como animado
                            challengeObserver.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.3 }); // Quando 30% da seção 'challenge' estiver visível
                challengeObserver.observe(challengeSection);
            }
        });
    </script>
</body>
</html>

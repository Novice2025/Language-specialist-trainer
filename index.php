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
            border-radius: 6px;
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
            line-height: 1.8; /* More spacing for readability */
            text-align: left; /* Align sentences left */
            color: #d0d0d0; /* Soft white text */
            max-width: 900px; /* Constrain width for better reading */
            margin: 0 auto; /* Center the container */
            padding-left: 20px; /* General padding for the container */
        }
        .handwriting-sentence {
            opacity: 0; /* Start hidden */
            transform: translateY(20px); /* Start slightly below */
            transition: opacity 0.5s ease-out, transform 0.5s ease-out; /* Smooth transition, faster */
            display: block; /* Each sentence on its own line */
            margin-bottom: 0.8em; /* Spacing between sentences, slightly more */
            padding-left: 1.5em; /* Indent for bullet point feel */
            position: relative; /* For custom bullet */
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
            position: absolute;
            left: 0;
            top: 0;
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
        }
        @keyframes emoji-pop {
            0% { transform: scale(0.8); opacity: 0; }
            50% { transform: scale(1.1); opacity: 1; }
            100% { transform: scale(1); opacity: 1; }
        }

        /* Typewriter effect for specific text parts */
        .typewriter-text {
            display: inline-block; /* Ensure it stays inline */
            overflow: hidden; /* Hide overflow until animation */
            white-space: nowrap; /* Prevent text from wrapping */
            border-right: .15em solid orange; /* The caret effect */
            animation: typing 1.5s steps(40, end) forwards, blink-caret .75s step-end infinite;
        }
        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
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
            animation-iteration-count: 1; /* Ensure it only runs once */
            animation-fill-mode: forwards; /* Keep the end state */
            animation-delay: 0.5s; /* Draw line after text is fully visible */
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

    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-950 via-gray-900 to-black text-gray-100 font-sans overflow-x-hidden relative">

    <!-- BACKGROUND EFFECT -->
    <div class="absolute inset-0 -z-10 animate-gradient bg-[length:400%_400%] bg-gradient-to-r from-blue-900 via-purple-900 to-pink-900 opacity-30"></div>

    <!-- HEADER (Sticky Navigation) -->
    <header class="sticky top-0 z-50 bg-black/70 backdrop-blur-md shadow-2xl p-4 md:p-6 flex justify-between items-center border-b border-indigo-900/50">
        <h1 id="header-title" class="text-2xl md:text-3xl font-extrabold tracking-wide text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-purple-500 to-pink-500 animate-on-load">
            RealTalk Daby (Corporate Edition)
        </h1>
        <nav class="flex gap-3 md:gap-6 text-base md:text-lg">
            <a href="#home" class="nav-link hover:text-pink-400 transition-colors py-1 px-2 rounded-lg" data-target="home">Início</a>
            <a href="#challenge" class="nav-link hover:text-pink-400 transition-colors py-1 px-2 rounded-lg" data-target="challenge">Seu Desafio</a>
            <a href="#methodology" class="nav-link hover:text-pink-400 transition-colors py-1 px-2 rounded-lg" data-target="methodology">Metodologia</a>
            <a href="#features" class="nav-link hover:text-pink-400 transition-colors py-1 px-2 rounded-lg" data-target="features">Plataforma</a>
            <a href="#curriculum" class="nav-link hover:text-pink-400 transition-colors py-1 px-2 rounded-lg" data-target="curriculum">Currículo</a>
            <a href="#ai-power" class="nav-link hover:text-pink-400 transition-colors py-1 px-2 rounded-lg" data-target="ai-power">Poder da IA</a>
            <a href="#contact" class="nav-link hover:text-pink-400 transition-colors py-1 px-2 rounded-lg" data-target="contact">Contato</a>
            <!-- Link "Builder (Admin)" REMOVIDO conforme sua instrução anterior -->
        </nav>
    </header>

    <main>

        <!-- 1. HERO SECTION (Corporate Pitch - Simplified) -->
        <section id="home" class="flex flex-col items-center justify-center min-h-[80vh] text-center px-6 pt-24 pb-12 relative">
            <!-- Título 1: PLAIN GRADIENT TEXT -->
            <h4 class="text-3xl md:text-6xl font-extrabold mb-4 tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-yellow-400 to-red-400 animate-on-load" style="transition-delay: 0s;">
                INGLÊS PROFISSIONAL: DA BARREIRA AO REFLEXO
            </h4>

            <!-- Título 2: RAINBOW GRADIENT TEXT -->
            <h2 class="text-5xl md:text-8xl font-extrabold mb-6 tracking-tight animate-on-load rainbow-text" style="transition-delay: 0.1s;">
                ACELERE A PERFORMANCE GLOBAL COM REAL TALK DABY
            </h2>

            <!-- Título 3: EFEITO FLASH -->
            <h3 class="text-4xl md:text-7xl font-extrabold mb-8 text-white focus-pulse animate-on-load" style="transition-delay: 0.6s;">
                <span class="rainbow-text">Fluência como Reflexo, não como Barreira.</span>
            </h3>

            <a href="#challenge" class="mt-8 px-8 py-4 text-xl font-extrabold rounded-full shadow-lg bg-indigo-600 text-white transition-all duration-300 transform hover:scale-105 hover:bg-indigo-700 animate-on-load" style="transition-delay: 1.5s;">
                Descubra Seu Desafio Aqui!
            </a>

            <div class="scroll-indicator">
                <span class="text-sm text-gray-400">Rolar para baixo</span>
                <svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
            </div>
        </section>

        <!-- SEÇÃO DE DESAFIO (com a mensagem principal de impacto) -->
        <section id="challenge" class="flex flex-col items-center justify-center min-h-screen text-center px-6 py-24 bg-white/5 backdrop-blur-sm border-t border-gray-800 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-purple-900/10 via-pink-900/10 to-blue-900/10 -z-10"></div>
            <h2 class="text-5xl md:text-7xl font-extrabold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-pink-400 via-purple-400 to-blue-400 animate-on-scroll fade-in-up">
                Seu Desafio com o Inglês Profissional é Real.
            </h2>
            <p class="text-3xl md:text-4xl font-extrabold mb-8 text-red-400 animate-on-scroll fade-in-up" data-delay="0.2">
                INGLÊS NUNCA FOI FÁCIL. 😩
            </p>
            <p class="text-2xl md:text-3xl text-gray-300 font-extrabold mb-12 animate-on-scroll fade-in-up" data-delay="0.4">
                Mas esta é a sua **oportunidade real** de se preparar para alavancar sua comunicação 🚀 num mundo mais competitivo, impulsionado pela **Inteligência Artificial (IA)**. 🧠🌐
            </p>
            <div id="handwriting-message-container" class="mt-8 handwriting-container opacity-0 transition-opacity duration-1000" style="transition-delay: 0s;">
                <!-- Sentences will be injected here by JavaScript -->
            </div>
            <a href="#contact" class="mt-16 px-10 py-5 text-xl font-extrabold rounded-full shadow-2xl bg-green-600 text-white transition-all duration-500 transform hover:scale-105 hover:shadow-green-400/80 relative overflow-hidden group animate-on-scroll fade-in-up" data-delay="0.5">
                SIM, ESSE CENÁRIO VAI MUDAR!
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 inline ml-3"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
        </section>


        <!-- 2. METHODOLOGY (Corporate Training Efficacy) -->
        <section id="methodology" class="py-32 px-6 md:px-24 bg-black/40 backdrop-blur-md border-t border-gray-800">
            <h3 class="text-5xl font-bold mb-4 text-center text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-blue-500 to-green-400 animate-on-scroll fade-in-up">
                🧠 O SHIFT REAL TALK DABY: Da Teoria à Competência Instantânea.
            </h3>

            <p class="max-w-4xl mx-auto text-gray-300 text-xl leading-relaxed text-center mb-16 animate-on-scroll fade-in-up">
                Seu investimento em desenvolvimento vai além das aulas: ele é um investimento direto em **tempo de reação e eficácia comunicativa**. Nossa metodologia exclusiva, o **"Lego Chain Block" (adaptado por RealTalk Daby)**, tem como objetivo principal **eliminar o "lag" da tradução**, garantindo resultados de negócios imediatos e um domínio muito mais próximo do **inglês real**.
                <br><br>
                **O RealTalk Daby treina você em bootcamps**, e `{converte seu investimento e tempo em resultados concretos em inglês específicos}`.
            </p>

            <div class="flex justify-center">
                <div id="flipping-card" class="flipping-card-container w-full max-w-xl h-[28rem] relative cursor-pointer animate-on-scroll fade-in" onclick="toggleFlipCard(this)" data-flipped="false">

                    <!-- Front Side: Traditional Method (O Risco Corporativo) -->
                    <div id="card-front" class="card-face bg-gray-900/90 p-8 rounded-2xl shadow-2xl border-4 border-red-500/50 flex flex-col justify-center">
                        <h3 class="text-3xl font-bold text-red-400 mb-4 tracking-wider">MÉTODO TRADICIONAL (O Risco Corporativo)</h3>
                        <ul class="text-left space-y-3 text-gray-300 text-lg list-none pl-0">
                            <li class="flex items-start"><span class="text-red-500 mr-2 font-black">❌</span> Foco: Conhecimento Teórico (Gramática do Livro).</li>
                            <li class="flex items-start"><span class="text-red-500 mr-2 font-black">❌</span> Perda: Reuniões de alto valor comprometidas por hesitação e o medo de falar.</li>
                            <li class="flex items-start"><span class="text-red-500 mr-2 font-black">❌</span> Avaliação: Subjetiva e sem métricas de performance.</li>
                            <li class="flex items-start"><span class="text-red-500 mr-2 font-black">❌</span> Custo: Alto tempo de treinamento com baixo Retorno.</li>
                            <li class="flex items-start"><span class="text-red-500 mr-2 font-black">❌</span> Conteúdo: Inglês "de livro" e conversas genéricas, sem aplicação prática.</li>
                        </ul>
                        <div class="absolute bottom-4 left-0 right-0 text-center text-sm text-gray-400 animate-pulse"><br><br>Passe o mouse ou Clique para ver a Solução RealTalk Daby (O Reflexo)</div>
                    </div>

                    <!-- Back Side: RealTalk Daby (O Reflexo Comunicativo) -->
                    <div id="card-back" class="card-face bg-gray-900/90 p-8 rounded-2xl shadow-2xl border-4 border-green-500/50 flex flex-col justify-center">
                        <h3 class="text-3xl font-bold text-green-400 mb-4 tracking-wider">REALTALK DABY (O Reflexo Comunicativo)</h3>
                        <ul class="text-left space-y-3 text-gray-300 text-lg list-none pl-0">
                            <li class="flex items-start"><span class="text-green-500 mr-2 font-black">✅</span> Foco: Reflexo e Performance (Comunicação Real).</li>
                            <li class="flex items-start"><span class="text-green-500 mr-2 font-black">✅</span> Ganho: Assertividade e Poder de Negociação em contextos reais.</li>
                            <li class="flex items-start"><span class="text-green-500 mr-2 font-black">✅</span> Avaliação: Métricas de Fluidez (Lag Time) e Performance.</li>
                            <li class="flex items-start"><span class="text-green-500 mr-2 font-black">✅</span> Valor: Alta otimização de tempo. ROI comprovado.</li>
                            <li class="flex items-start"><span class="text-green-500 mr-2 font-black">✅</span> Conteúdo: Módulos específicos e personalizáveis para o dia a dia corporativo e a indústria.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12 animate-on-scroll fade-in-up">
                <a href="#curriculum" class="inline-block px-8 py-4 text-xl font-extrabold rounded-full shadow-lg bg-purple-600 text-white transition-all duration-300 transform hover:scale-105 hover:bg-purple-700">
                    Explore Nosso Currículo Dinâmico
                </a>
            </div>
        </section>

        <!-- 3. FEATURES (What to Expect - Original Content) -->
        <section id="features" class="py-32 px-6 bg-gray-900/70 backdrop-blur-md border-t border-gray-800 text-center">
            <h3 class="text-5xl font-bold mb-16 text-center text-transparent bg-clip-text bg-gradient-to-r from-red-400 via-pink-500 to-yellow-400 animate-on-scroll fade-in-up">
                🚀 SUA JORNADA REAL TALK DABY: PLATAFORMA & IMPACTO.
            </h3>
            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">

                <div class="bg-gray-800/60 p-8 rounded-xl shadow-xl border border-gray-700 hover:border-blue-500 transition-all duration-300 animate-on-scroll fade-in-up">
                    <span class="text-5xl mb-4 block text-blue-400">⚡</span>
                    <h4 class="text-2xl font-bold mb-4 text-white">Bootcamps de Alta Imersão</h4>
                    <p class="text-gray-300">Treinamentos intensivos, focados em sua realidade corporativa para resultados rápidos e assertivos.</p>
                </div>

                <div class="bg-gray-800/60 p-8 rounded-xl shadow-xl border border-gray-700 hover:border-pink-500 transition-all duration-300 animate-on-scroll fade-in-up" data-delay="0.2">
                    <span class="text-5xl mb-4 block text-pink-400">📊</span>
                    <h4 class="text-2xl font-bold mb-4 text-white">Métricas de Performance Reais</h4>
                    <p class="text-gray-300">Acompanhe seu progresso com dados concretos de fluidez, tempo de reação e uso de estruturas-chave.</p>
                </div>

                <div class="bg-gray-800/60 p-8 rounded-xl shadow-xl border border-gray-700 hover:border-orange-500 transition-all duration-300 animate-on-scroll fade-in-up" data-delay="0.4">
                    <span class="text-5xl mb-4 block text-orange-400">🎯</span>
                    <h4 class="text-2xl font-bold mb-4 text-white">Contexto Corporativo Adaptado</h4>
                    <p class="text-gray-300">Lições e simulações personalizadas para o contexto da sua indústria e desafios profissionais específicos.</p>
                </div>

                <div class="bg-gray-800/60 p-8 rounded-xl shadow-xl border border-gray-700 hover:border-green-500 transition-all duration-300 animate-on-scroll fade-in-up" data-delay="0.6">
                    <span class="text-5xl mb-4 block text-green-400">🗣️</span>
                    <h4 class="text-2xl font-bold mb-4 text-white">Simulações de Cenários</h4>
                    <p class="text-gray-300">Pratique negociações, apresentações, reuniões e entrevistas com feedback instantâneo e personalizado.</p>
                </div>

                <div class="bg-gray-800/60 p-8 rounded-xl shadow-xl border border-gray-700 hover:border-purple-500 transition-all duration-300 animate-on-scroll fade-in-up" data-delay="0.8">
                    <span class="text-5xl mb-4 block text-purple-400">🧠</span>
                    <h4 class="text-2xl font-bold mb-4 text-white">"Lego Chain Block" Desbloqueado</h4>
                    <p class="text-gray-300">Aprenda a construir frases e desenvolver o raciocínio em inglês de forma fluida e automática.</p>
                </div>

                <div class="bg-gray-800/60 p-8 rounded-xl shadow-xl border border-gray-700 hover:border-teal-500 transition-all duration-300 animate-on-scroll fade-in-up" data-delay="1.0">
                    <span class="text-5xl mb-4 block text-teal-400">💡</span>
                    <h4 class="text-2xl font-bold mb-4 text-white">Mindset Global</h4>
                    <p class="text-gray-300">Desenvolva não só a língua, mas a confiança e o comportamento necessários para prosperar em um ambiente global.</p>
                </div>

            </div>
            <div class="text-center mt-16 animate-on-scroll fade-in-up">
                <a href="#ai-power" class="inline-block px-8 py-4 text-xl font-extrabold rounded-full shadow-lg bg-teal-600 text-white transition-all duration-300 transform hover:scale-105 hover:bg-teal-700">
                    Como a IA Potencializa Tudo Isso?
                </a>
            </div>
        </section>

        <!-- 4. CURRICULUM (Dynamic & Personalized) -->
        <section id="curriculum" class="py-32 px-6 bg-gradient-to-br from-indigo-900 to-gray-900 border-t border-gray-700 text-center">
            <h3 class="text-5xl font-bold mb-16 text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-orange-400 to-red-500 animate-on-scroll fade-in-up">
                🗺️ CURRÍCULO FLEXÍVEL: PARA SUA REALIDADE GLOBAL.
            </h3>

            <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-stretch gap-12">

                <!-- Coluna da Esquerda: Modular & Personalizado -->
                <div class="lg:w-1/2 bg-gray-800/70 p-10 rounded-2xl shadow-2xl border border-indigo-600/50 flex flex-col justify-between animate-on-scroll fade-in-up">
                    <div>
                        <h4 class="text-3xl font-bold mb-6 text-indigo-400">Sua Jornada de Aprendizado, Seus Termos.</h4>
                        <p class="text-gray-300 text-xl leading-relaxed mb-8">
                            Diferente de cursos engessados, o RealTalk Daby oferece um currículo modular, completamente adaptável à sua função, indústria e objetivos. Chega de aulas genéricas. Foque no que importa para seu crescimento.
                        </p>
                        <ul class="text-left space-y-4 text-gray-200 text-lg list-none pl-0">
                            <li class="flex items-start"><span class="text-indigo-400 mr-3 text-2xl">👉</span> **Módulos Flexíveis:** Escolha o que você precisa: negociação, apresentações, e-mails, reuniões.</li>
                            <li class="flex items-start"><span class="text-indigo-400 mr-3 text-2xl">👉</span> **Micro-Aprendizado:** Conteúdo em "nano-partículas" para otimizar seu tempo.</li>
                            <li class="flex items-start"><span class="text-indigo-400 mr-3 text-2xl">👉</span> **Desafios Reais:** Simulações de problemas reais do seu dia a dia.</li>
                        </ul>
                    </div>
                </div>

                <!-- Coluna da Direita: Card Flipping dos Níveis de Fluência -->
                <div class="lg:w-1/2 bg-gray-800/70 p-10 rounded-2xl shadow-2xl border border-indigo-600/50 flex flex-col justify-between animate-on-scroll fade-in-up" data-delay="0.3">
                    <h4 class="text-3xl font-bold mb-6 text-indigo-400 text-center">Níveis de Fluência (CEFR) & Suporte</h4>
                    <p class="text-gray-300 text-xl leading-relaxed mb-8 text-center">
                        Desde o básico ao avançado, com foco na sua evolução pragmática.
                    </p>
                    <div class="w-full max-w-md mx-auto aspect-video mb-8">
                        [[google images search of CEFR English levels chart]] 
                    </div>
                    <p class="text-center text-gray-400 text-md italic">
                        Não importa seu ponto de partida, o destino é a fluência corporativa.
                    </p>
                </div>
            </div>

            <div class="text-center mt-16 animate-on-scroll fade-in-up">
                <a href="#contact" class="inline-block px-8 py-4 text-xl font-extrabold rounded-full shadow-lg bg-blue-600 text-white transition-all duration-300 transform hover:scale-105 hover:bg-blue-700">
                    Comece Sua Transformação Agora!
                </a>
            </div>
        </section>

        <!-- 5. AI-POWER (The Technology Behind RealTalk Daby) -->
        <section id="ai-power" class="py-32 px-6 bg-gray-900/80 backdrop-blur-md border-t border-gray-800 text-center">
            <h3 class="text-5xl font-bold mb-16 text-transparent bg-clip-text bg-gradient-to-r from-red-400 via-purple-500 to-green-400 animate-on-scroll fade-in-up">
                🧠 A REVOLUÇÃO DA IA NO SEU APRENDIZADO DE INGLÊS.
            </h3>
            <div class="max-w-5xl mx-auto text-gray-300 text-xl leading-relaxed mb-16 animate-on-scroll fade-in-up">
                No RealTalk Daby, a Inteligência Artificial não é um truque, é o **motor** que personaliza, acelera e solidifica seu aprendizado, transformando cada sessão em uma experiência de alta performance.
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-7xl mx-auto">
                <div class="relative bg-gray-800/60 p-6 rounded-lg shadow-xl border border-gray-700 hover:border-purple-500 transition-all duration-300 animate-on-scroll fade-in-up">
                    <span class="absolute -top-6 left-1/2 -translate-x-1/2 bg-purple-600 rounded-full p-3 text-3xl shadow-lg">🤖</span>
                    <h4 class="text-2xl font-bold mt-6 mb-3 text-purple-400">Feedback Instantâneo Personalizado</h4>
                    <p class="text-gray-300 text-md">Receba análises detalhadas da sua fala, pronúncia e vocabulário sem demora.</p>
                </div>
                <div class="relative bg-gray-800/60 p-6 rounded-lg shadow-xl border border-gray-700 hover:border-blue-500 transition-all duration-300 animate-on-scroll fade-in-up" data-delay="0.2">
                    <span class="absolute -top-6 left-1/2 -translate-x-1/2 bg-blue-600 rounded-full p-3 text-3xl shadow-lg">📈</span>
                    <h4 class="text-2xl font-bold mt-6 mb-3 text-blue-400">Otimização Contínua do Currículo</h4>
                    <p class="text-gray-300 text-md">A IA ajusta os desafios e o conteúdo didático com base no seu desempenho.</p>
                </div>
                <div class="relative bg-gray-800/60 p-6 rounded-lg shadow-xl border border-gray-700 hover:border-pink-500 transition-all duration-300 animate-on-scroll fade-in-up" data-delay="0.4">
                    <span class="absolute -top-6 left-1/2 -translate-x-1/2 bg-pink-600 rounded-full p-3 text-3xl shadow-lg">⚡</span>
                    <h4 class="text-2xl font-bold mt-6 mb-3 text-pink-400">Simulações de Cenários Dinâmicas</h4>
                    <p class="text-gray-300 text-md">Pratique interações de negócios realistas com um parceiro de IA adaptável.</p>
                </div>
                <div class="relative bg-gray-800/60 p-6 rounded-lg shadow-xl border border-gray-700 hover:border-green-500 transition-all duration-300 animate-on-scroll fade-in-up" data-delay="0.6">
                    <span class="absolute -top-6 left-1/2 -translate-x-1/2 bg-green-600 rounded-full p-3 text-3xl shadow-lg">💡</span>
                    <h4 class="text-2xl font-bold mt-6 mb-3 text-green-400">Reforço Inteligente de Chunking</h4>
                    <p class="text-gray-300 text-md">Acelere sua fluidez, identificando e reforçando seus "Lego Chain Blocks" personalizados.</p>
                </div>
            </div>

            <div class="text-center mt-16 animate-on-scroll fade-in-up">
                <a href="#contact" class="inline-block px-8 py-4 text-xl font-extrabold rounded-full shadow-lg bg-indigo-600 text-white transition-all duration-300 transform hover:scale-105 hover:bg-indigo-700">
                    Comece a Viver o Inglês com IA
                </a>
            </div>
        </section>

        <!-- 6. CONTACT SECTION (Call to Action) -->
        <section id="contact" class="py-32 px-6 bg-black/50 backdrop-blur-md border-t border-gray-800 text-center">
            <h3 class="text-5xl font-bold mb-10 text-transparent bg-clip-text bg-gradient-to-r from-green-400 via-blue-400 to-purple-400 animate-on-scroll fade-in-up">
                Fale Conosco e Leve Sua Comunicação a Nível Global.
            </h3>
            <p class="max-w-3xl mx-auto text-gray-300 text-xl leading-relaxed mb-12 animate-on-scroll fade-in-up">
                Pronto para transformar a maneira como você se comunica em inglês e desbloquear novas oportunidades? Entre em contato e vamos construir sua fluência real.
            </p>
            <div class="flex flex-col md:flex-row justify-center items-center gap-8 max-w-4xl mx-auto">
                <a href="mailto:contato@realtalkdaby.com" class="px-10 py-5 text-2xl font-extrabold rounded-full shadow-xl bg-orange-600 text-white transition-all duration-300 transform hover:scale-105 hover:bg-orange-700 flex items-center justify-center animate-on-scroll fade-in-up">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    E-mail
                </a>
                <a href="https://wa.me/5511999998888" target="_blank" class="px-10 py-5 text-2xl font-extrabold rounded-full shadow-xl bg-green-600 text-white transition-all duration-300 transform hover:scale-105 hover:bg-green-700 flex items-center justify-center animate-on-scroll fade-in-up" data-delay="0.2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8A8.5 8.5 0 0 1 11.5 21c-1.93 0-3.68-.69-5.06-1.85L3 22l1.6-4.7C3.12 15.65 2.5 13.6 2.5 11.5A8.5 8.5 0 0 1 11.5 3c2.72 0 5.17 1.06 7.05 2.7l-.1.1a8.38 8.38 0 0 1 2.5 5.7z"></path><line x1="12" y1="8" x2="12" y2="15"></line><line x1="8.5" y1="11.5" x2="15.5" y2="11.5"></line></svg>
                    WhatsApp
                </a>
            </div>
            <p class="mt-8 text-gray-500 text-lg animate-on-scroll fade-in-up" data-delay="0.4">
                Nosso time está pronto para tirar suas dúvidas e criar um plano personalizado para você ou sua equipe.
            </p>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-950/70 py-10 px-6 text-center border-t border-indigo-900/50">
        <div class="glitch-text text-xl md:text-2xl font-bold tracking-wider" data-text="Construído com Inovação e Foco em Resultados Corporativos por RealTalk Daby." style="font-family: 'Inter', sans-serif;">
            Construído com Inovação e Foco em Resultados Corporativos por RealTalk Daby.
        </div>
        <p class="text-gray-600 text-md mt-4">&copy; 2025 RealTalk Daby. Todos os direitos reservados.</p>
    </footer>

    <!-- JavaScript para Animações e Scroll Suave -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Smooth Scroll para navegação
            document.querySelectorAll('nav a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
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
            const sentences = [
                `Você é um profissional fera e de alta performance, mas o inglês ainda é o <span class="keyphrase-effect">ÓBICE INVISÍVEL / CALCANHAR DE AQUILES</span> 😩 que 'trava' seu avanço global? 😔`,
                `O RealTalk Daby te dá a chance de <span class="typewriter-text" data-text="DECIFRAR">DECIFRAR</span> e <span class="typewriter-text" data-text="TRANSFORMAR">TRANSFORMAR</span> esse cenário imediatamente.`,
                `Sua mente se adapta. Seu conhecimento se <span class="keyphrase-effect">MATERIALIZA</span> em <span class="keyphrase-effect">REFLEXO COMUNICATIVO INSTANTÂNEO</span>. 🛑`,
                `O resultado? Sua voz no <span class="clean-line-text">automático, com impacto e sem ruídos</span>. ✨`
            ];

            const container = document.getElementById('handwriting-message-container');
            let sentenceIndex = 0;

            function animateHandwritingSentences() {
                if (sentenceIndex < sentences.length) {
                    const sentenceHTML = sentences[sentenceIndex];
                    const sentenceElement = document.createElement('span');
                    sentenceElement.classList.add('handwriting-sentence');
                    sentenceElement.innerHTML = sentenceHTML; // Usamos innerHTML para renderizar os spans internos
                    container.appendChild(sentenceElement);

                    // Força o reflow para garantir que a transição de opacidade/transform funcione
                    void sentenceElement.offsetWidth;

                    sentenceElement.classList.add('loaded'); // Revela a sentença com fade-in e slide-up

                    // Ativa Typewriter para elementos específicos dentro da sentença
                    const typewriterElements = sentenceElement.querySelectorAll('.typewriter-text');
                    typewriterElements.forEach(el => {
                        const originalText = el.dataset.text;
                        el.textContent = ''; // Limpa o texto original para o typewriter
                        let charIndex = 0;
                        const typingSpeed = 70; // Velocidade da digitação

                        function type() {
                            if (charIndex < originalText.length) {
                                el.textContent += originalText.charAt(charIndex);
                                charIndex++;
                                setTimeout(type, typingSpeed);
                            } else {
                                el.style.borderRight = 'none'; // Remove o caret ao terminar
                            }
                        }
                        setTimeout(type, 100); // Pequeno atraso para iniciar o typewriter após a frase aparecer
                    });

                    // Ativa emoji-pulse para emojis dentro da sentença (se houver)
                    const emojis = sentenceElement.querySelectorAll('.emoji-pulse');
                    emojis.forEach(emoji => {
                        emoji.style.animation = 'none'; // Reseta animação
                        void emoji.offsetWidth; // Trigger reflow
                        emoji.style.animation = 'emoji-pop 1s ease-out'; // Reativa animação
                    });

                    sentenceIndex++;
                    setTimeout(animateHandwritingSentences, 1500); // 1.5 segundo entre cada frase
                } else {
                    container.classList.add('loaded'); // Garante que o container esteja totalmente visível após todas as frases
                }
            }

            // Inicia a animação das frases após um pequeno atraso, mas depois da frase motivacional
            const challengeSection = document.getElementById('challenge');
            if (challengeSection) {
                 // Observador para a seção 'challenge'
                 const challengeObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting && !container.dataset.animated) {
                            setTimeout(() => {
                                container.classList.add('opacity-100'); // Revela o container principal
                                animateHandwritingSentences(); // Inicia a animação das frases
                            }, 500); // Pequeno atraso após a frase motivacional aparecer
                            container.dataset.animated = 'true'; // Marca como animado
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

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
            <p class="text-2xl md:text-3xl text-gray-300 font-extrabold mb-12 animate-on-scroll fade-in-up" data-delay="0.2">
                O tão sonhado fluir em inglês? **É de vez, agora!** ✨ RealTalk Daby no seu ritmo, no seu tempo. 🚀
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
                    <span class="text-5xl mb-4 block text-pink-400">🗣️</span>
                    <h4 class="text-2xl font-bold mb-4 text-white">Feedback Real-Time & Personalizado</h4>
                    <p class="text-gray-300">Correções e orientações instantâneas, adaptadas ao seu perfil e necessidades.</p>
                </div>

                <div class="bg-gray-800/60 p-8 rounded-xl shadow-xl border border-gray-700 hover:border-green-500 transition-all duration-300 animate-on-scroll fade-in-up" data-delay="0.4">
                    <span class="text-5xl mb-4 block text-green-400">🎯</span>
                    <h4 class="text-2xl font-bold mb-4 text-white">Conteúdo Estratégico & Relevante</h4>
                    <p class="text-gray-300">Aulas e recursos que abordam o inglês que você realmente usa no ambiente de negócios.</p>
                </div>

                <div class="bg-gray-800/60 p-8 rounded-xl shadow-xl border border-gray-700 hover:border-yellow-500 transition-all duration-300 animate-on-scroll fade-in-up">
                    <span class="text-5xl mb-4 block text-yellow-400">📊</span>
                    <h4 class="text-2xl font-bold mb-4 text-white">Métricas de Progresso Claras</h4>
                    <p class="text-gray-300">Acompanhe seu avanço com relatórios detalhados de fluidez e desempenho comunicativo.</p>
                </div>

                <div class="bg-gray-800/60 p-8 rounded-xl shadow-xl border border-gray-700 hover:border-indigo-500 transition-all duration-300 animate-on-scroll fade-in-up" data-delay="0.2">
                    <span class="text-5xl mb-4 block text-indigo-400">🤝</span>
                    <h4 class="text-2xl font-bold mb-4 text-white">Comunidade e Networking</h4>
                    <p class="text-gray-300">Conecte-se com profissionais de diversas áreas, ampliando seu universo de oportunidades.</p>
                </div>

                <div class="bg-gray-800/60 p-8 rounded-xl shadow-xl border border-gray-700 hover:border-cyan-500 transition-all duration-300 animate-on-scroll fade-in-up" data-delay="0.4">
                    <span class="text-5xl mb-4 block text-cyan-400">🧑‍💻</span>
                    <h4 class="text-2xl font-bold mb-4 text-white">Ambiente Digital Intuitivo</h4>
                    <p class="text-gray-300">Acesso fácil a todo o material, agendamentos e interações em uma plataforma otimizada.</p>
                </div>

            </div>

        </section>

        <!-- 4. CURRICULUM (Structured Learning Paths with Accordion) -->
        <section id="curriculum" class="py-32 px-6 md:px-24 bg-black/40 backdrop-blur-md border-t border-gray-800">
            <h3 class="text-5xl font-bold mb-16 text-center text-transparent bg-clip-text bg-gradient-to-r from-green-400 via-blue-500 to-purple-400 animate-on-scroll fade-in-up">
                📚 NOSSO CURRÍCULO: DO BÁSICO AO DOMÍNIO GLOBAL.
            </h3>

            <div class="max-w-4xl mx-auto space-y-6">

                <div class="bg-gray-900/70 rounded-xl shadow-xl border border-gray-700 animate-on-scroll fade-in-up">
                    <button class="accordion-toggle w-full p-6 text-left flex justify-between items-center text-2xl font-semibold text-blue-400" data-accordion-target="module1">
                        Módulo 1: Fundamentos para Impacto
                        <svg id="arrow-module1" class="w-6 h-6 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="module1" class="accordion-content px-6 text-gray-300">
                        <ul class="list-disc list-inside space-y-2">
                            <li>Estruturas essenciais para apresentações profissionais.</li>
                            <li>Vocabulário estratégico para e-mails e reuniões iniciais.</li>
                            <li>Desenvolvimento de "small talk" corporativo.</li>
                        </ul>
                    </div>
                </div>

                <div class="bg-gray-900/70 rounded-xl shadow-xl border border-gray-700 animate-on-scroll fade-in-up" data-delay="0.2">
                    <button class="accordion-toggle w-full p-6 text-left flex justify-between items-center text-2xl font-semibold text-pink-400" data-accordion-target="module2">
                        Módulo 2: Assertividade e Negociação
                        <svg id="arrow-module2" class="w-6 h-6 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="module2" class="accordion-content px-6 text-gray-300">
                        <ul class="list-disc list-inside space-y-2">
                            <li>Técnicas de persuasão e argumentação em inglês.</li>
                            <li>Linguagem para negociações de alto nível.</li>
                            <li>Gestão de objeções e fechamento de acordos.</li>
                        </ul>
                    </div>
                </div>

                <div class="bg-gray-900/70 rounded-xl shadow-xl border border-gray-700 animate-on-scroll fade-in-up" data-delay="0.4">
                    <button class="accordion-toggle w-full p-6 text-left flex justify-between items-center text-2xl font-semibold text-yellow-400" data-accordion-target="module3">
                        Módulo 3: Liderança e Comunicação Global
                        <svg id="arrow-module3" class="w-6 h-6 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="module3" class="accordion-content px-6 text-gray-300">
                        <ul class="list-disc list-inside space-y-2">
                            <li>Vocabulário para "C-level" e conselhos administrativos.</li>
                            <li>Apresentação de resultados para stakeholders globais.</li>
                            <li>Condução de reuniões multilaterais.</li>
                        </ul>
                    </div>
                </div>

                <div class="bg-gray-900/70 rounded-xl shadow-xl border border-gray-700 animate-on-scroll fade-in-up" data-delay="0.6">
                    <button class="accordion-toggle w-full p-6 text-left flex justify-between items-center text-2xl font-semibold text-cyan-400" data-accordion-target="module4">
                        Módulo 4: Comunicação Estratégica Adaptativa
                        <svg id="arrow-module4" class="w-6 h-6 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="module4" class="accordion-content px-6 text-gray-300">
                        <ul class="list-disc list-inside space-y-2">
                            <li>Adaptação cultural e nuances de comunicação.</li>
                            <li>Gestão de crises e resolução de conflitos.</li>
                            <li>Persuasão em cenários de alta pressão.</li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="text-center mt-16 animate-on-scroll fade-in-up">
                <a href="#ai-power" class="inline-block px-8 py-4 text-xl font-extrabold rounded-full shadow-lg bg-green-600 text-white transition-all duration-300 transform hover:scale-105 hover:bg-green-700">
                    Veja o Poder da Nossa IA
                </a>
            </div>
        </section>

        <!-- 5. AI POWER (AI Learning Engine) -->
        <section id="ai-power" class="py-32 px-6 md:px-24 bg-gray-900/70 backdrop-blur-md border-t border-gray-800 text-center">
            <h3 class="text-5xl font-bold mb-16 text-transparent bg-clip-text bg-gradient-to-r from-red-400 via-purple-500 to-orange-400 animate-on-scroll fade-in-up">
                🤖 ALIMENTADO POR IA: SEU COACH DE INGLÊS DEFINITIVO.
            </h3>

            <div class="max-w-4xl mx-auto space-y-12">
                <div class="flex flex-col md:flex-row items-center bg-gray-800/60 p-8 rounded-xl shadow-2xl border border-gray-700 animate-on-scroll fade-in-up">
                    <span class="text-7xl mr-8 text-blue-400">🧠</span>
                    <div>
                        <h4 class="text-3xl font-bold mb-4 text-white text-left">Análise Preditiva de Erros</h4>
                        <p class="text-gray-300 text-lg text-left">Nossa IA identifica padrões em sua fala e escrita, prevendo e corrigindo erros antes mesmo que eles se tornem hábitos.</p>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row items-center bg-gray-800/60 p-8 rounded-xl shadow-2xl border border-gray-700 animate-on-scroll fade-in-up" data-delay="0.2">
                    <span class="text-7xl mr-8 text-pink-400">🛠️</span>
                    <div>
                        <h4 class="text-3xl font-bold mb-4 text-white text-left">Treino Adaptativo e Personalizado</h4>
                        <p class="text-gray-300 text-lg text-left">A plataforma se ajusta ao seu ritmo e estilo de aprendizado, criando exercícios e cenários que realmente importam para você.</p>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row items-center bg-gray-800/60 p-8 rounded-xl shadow-2xl border border-gray-700 animate-on-scroll fade-in-up" data-delay="0.4">
                    <span class="text-7xl mr-8 text-green-400">🗣️</span>
                    <div>
                        <h4 class="text-3xl font-bold mb-4 text-white text-left">Simulações de Cenários Reais</h4>
                        <p class="text-gray-300 text-lg text-left">Pratique reuniões, negociações e apresentações com avatares de IA que respondem de forma dinâmica, preparando você para qualquer situação corporativa.</p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-16 animate-on-scroll fade-in-up">
                <a href="#contact" class="inline-block px-8 py-4 text-xl font-extrabold rounded-full shadow-lg bg-indigo-600 text-white transition-all duration-300 transform hover:scale-105 hover:bg-indigo-700">
                    Transforme seu Inglês Agora!
                </a>
            </div>
        </section>

        <!-- 6. CONTACT (Call to Action) -->
        <section id="contact" class="py-32 px-6 bg-black/40 backdrop-blur-md border-t border-gray-800 text-center">
            <h3 class="text-5xl font-bold mb-16 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-green-500 to-cyan-400 animate-on-scroll fade-in-up">
                🗣️ PRONTO PARA TRANSFORMAR SEU INGLÊS? FALE CONOSCO!
            </h3>

            <div class="max-w-xl mx-auto bg-gray-900/70 p-10 rounded-xl shadow-2xl border border-gray-700 animate-on-scroll fade-in-up">
                <form action="#" method="POST" class="space-y-6 text-left">
                    <div>
                        <label for="name" class="block text-gray-300 text-lg font-semibold mb-2">Seu Nome:</label>
                        <input type="text" id="name" name="name" class="w-full p-4 rounded-lg bg-gray-800 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors" placeholder="Nome Completo" required>
                    </div>
                    <div>
                        <label for="email" class="block text-gray-300 text-lg font-semibold mb-2">Seu Email Corporativo:</label>
                        <input type="email" id="email" name="email" class="w-full p-4 rounded-lg bg-gray-800 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-pink-500 transition-colors" placeholder="seu.email@empresa.com" required>
                    </div>
                    <div>
                        <label for="company" class="block text-gray-300 text-lg font-semibold mb-2">Empresa:</label>
                        <input type="text" id="company" name="company" class="w-full p-4 rounded-lg bg-gray-800 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-green-500 transition-colors" placeholder="Nome da sua empresa" required>
                    </div>
                    <div>
                        <label for="message" class="block text-gray-300 text-lg font-semibold mb-2">Sua Mensagem / Interesse:</label>
                        <textarea id="message" name="message" rows="5" class="w-full p-4 rounded-lg bg-gray-800 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 transition-colors" placeholder="Descreva suas necessidades..."></textarea>
                    </div>
                    <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-extrabold py-4 rounded-lg text-xl shadow-lg transition-all transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-purple-500 focus:ring-opacity-50">
                        Enviar Consulta
                    </button>
                    <p class="text-sm text-gray-400 mt-4 text-center">Responderemos em até 24 horas úteis.</p>
                </form>
            </div>

        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-950/90 text-gray-400 text-center py-8 border-t border-purple-900/50">
        <p class="text-md glitch-text" data-text="Construído com Inovação e Foco em Resultados Corporativos por RealTalk Daby.">Construído com Inovação e Foco em Resultados Corporativos por RealTalk Daby.</p>
        <p class="text-sm mt-2">&copy; 2025. Todos os direitos reservados.</p>
    </footer>

    <script>
        // Smooth scroll for navigation links
        function smoothScroll(targetId) {
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - (
                        document.querySelector('header').offsetHeight // Offset for fixed header
                    ),
                    behavior: 'smooth'
                });
            }
        }

        // Function to toggle flipping card
        function toggleFlipCard(cardElement) {
            const isFlipped = cardElement.getAttribute('data-flipped') === 'true';
            cardElement.setAttribute('data-flipped', String(!isFlipped));
        }

        // CORRECTED: Function for animated handwriting sentences with enhanced effects
        function animateHandwritingSentences(sentences, containerId, startIndex = 0) {
            const container = document.getElementById(containerId);
            if (!container) return;

            // Clear container only on the first call to prevent re-clearing during recursion
            if (startIndex === 0) {
                container.innerHTML = ''; 
                // Ensure container is visible to start animations
                container.style.opacity = '1'; 
            }

            if (startIndex < sentences.length) {
                const sentenceText = sentences[startIndex];
                const sentenceElement = document.createElement('span');
                sentenceElement.classList.add('handwriting-sentence');

                // Process special tags (emojis, keyphrases, typewriter placeholders, clean-line) before bold
                let processedText = sentenceText;

                // 1. Emojis that need pulse effect
                processedText = processedText.replace(/(😩|😔|🛑|✨|🚀)/g, '<span class="emoji-pulse">$1</span>');

                // 2. Keyphrase-effect (pulsing shadow) for bracketed terms
                processedText = processedText.replace(/|¨DÓBICE INVISÍVEL \/ CALCANHAR DE AQUILES¨D|/g, '<span class="keyphrase-effect text-red-400">[ÓBICE INVISÍVEL / CALCANHAR DE AQUILES]</span>');
                processedText = processedText.replace(/|¨DTRENDS\/HYPES¨D| da internet/g, "<span class='keyphrase-effect'>'[TRENDS/HYPES] da internet'</span>");
                processedText = processedText.replace(/|¨DMATERIALIZA¨D|/g, '<span class="keyphrase-effect text-yellow-400">[MATERIALIZA]</span>');
                processedText = processedText.replace(/|¨DREFLEXO COMUNICATIVO INSTANTÂNEO¨D|/g, '<span class="keyphrase-effect text-blue-400">[REFLEXO COMUNICATIVO INSTANTÂNEO]</span>');

                // 3. Typewriter placeholders (empty spans that JS will type into)
                // We use a temporary data attribute to hold the text to be typed.
                processedText = processedText.replace(/|¨DDECIFRAR¨D|/g, '<span class="typewriter-placeholder text-green-400" data-type-text="DECIFRAR"></span>');
                processedText = processedText.replace(/|¨DTRANSFORMAR¨D|/g, '<span class="typewriter-placeholder text-green-400" data-type-text="TRANSFORMAR"></span>');

                // 4. Clean-line-text for "sem ruídos"
                processedText = processedText.replace(/sem ruídos(?=\. <span class="emoji-pulse">✨<\/span>)/g, '<span class="clean-line-text">sem ruídos</span>');

                // 5. Handle **bold** syntax last to ensure it wraps correctly around other spans
                processedText = processedText.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');

                sentenceElement.innerHTML = processedText;
                container.appendChild(sentenceElement);

                // Small delay for the sentence to appear (fade-in, slide-up)
                setTimeout(() => {
                    sentenceElement.classList.add('loaded'); // Activates CSS transition for opacity/transform

                    // Now, apply the typewriter effect to placeholders within THIS sentence
                    const typewriterPlaceholders = sentenceElement.querySelectorAll('.typewriter-placeholder');
                    let typewriterDelay = 0; // Delay for each typewriter in the same line
                    typewriterPlaceholders.forEach((twElement, idx) => {
                        const textToType = twElement.getAttribute('data-type-text');
                        twElement.classList.remove('typewriter-placeholder'); // Remove placeholder class
                        twElement.classList.add('typewriter-text-active'); // Add active class for CSS animation

                        // Set text content for CSS typing animation to measure
                        // For a pure CSS typewriter it would be enough, but for control...
                        let i = 0;
                        const speed = 70; // Typing speed in ms
                        setTimeout(() => {
                            let typingInterval = setInterval(() => {
                                if (i < textToType.length) {
                                    twElement.textContent += textToType.charAt(i);
                                    i++;
                                } else {
                                    clearInterval(typingInterval);
                                    twElement.style.borderRight = 'none'; // Remove caret
                                }
                            }, speed);
                        }, typewriterDelay); // Apply staggered delay

                        typewriterDelay += (textToType.length * speed) + 200; // Accumulate delay for next typewriter
                    });

                    // Schedule next sentence animation after current sentence effects (e.g., typewriter) generally finish
                    setTimeout(() => {
                        animateHandwritingSentences(sentences, containerId, startIndex + 1);
                    }, 1000 + typewriterDelay); // Base delay + accumulated typewriter delay before next sentence
                }, 400); // Small initial delay for THIS sentence, then its internal animations start
            }
        }


        // Function to handle scroll-based entrance animation
        function handleScrollAnimation() {
            const elements = document.querySelectorAll('.animate-on-scroll');
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const delay = parseFloat(entry.target.getAttribute('data-delay')) || 0;
                        setTimeout(() => {
                            entry.target.classList.add('loaded');
                        }, delay * 1000);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                rootMargin: '0px',
                threshold: 0.1 // Trigger when 10% of the item is visible
            });

            elements.forEach(element => {
                observer.observe(element);
            });
        }

        // Function to set up accordion toggles
        function setupAccordionToggles() {
            document.querySelectorAll('.accordion-toggle').forEach(button => {
                button.addEventListener('click', () => {
                    const targetId = button.getAttribute('data-accordion-target');
                    const content = document.getElementById(targetId);
                    const arrow = document.getElementById(`arrow-${targetId}`);

                    // Close all other active accordions
                     document.querySelectorAll('.accordion-content.active').forEach(activeContent => {
                         if (activeContent.id !== targetId) {
                             activeContent.classList.remove('active');
                             const otherArrow = document.getElementById(`arrow-${activeContent.id}`);
                             if (otherArrow) {
                                otherArrow.classList.remove('rotate-180');
                             }
                         }
                     });

                    // Toggle current accordion
                    content.classList.toggle('active');
                    arrow.classList.toggle('rotate-180');
                });
            });
        }

        // Main Initialization on load
        window.onload = function() {
            // 1. Initial Load Animations for Headers
            document.querySelectorAll('.animate-on-load').forEach(el => {
                el.classList.add('loaded');
            });

            // 2. Animated Handwriting Message for "Challenge" Section
            const challengeSentences = [
                "Você é um profissional **fera** e de **alta performance**, mas o inglês ainda é o [ÓBICE INVISÍVEL / CALCANHAR DE AQUILES] que 'trava' seu avanço global? 😩",
                "Cansou de investir em aulas e **'[TRENDS/HYPES] da internet'** que prometem, mas não entregam a **fluência estratégica** que seu calibre exige?",
                "A gente sabe: você se sente **sozinho nessa luta** 😔, buscando as palavras, enquanto a tradução ainda predomina e ninguém parece se importar **DE VERDADE**.",
                "Chega! 🛑",
                "O RealTalk Daby chega para [DECIFRAR] e [TRANSFORMAR] ESSE cenário!",
                "Nós vamos na raiz do problema: seu conhecimento se [MATERIALIZA] em [REFLEXO COMUNICATIVO INSTANTÂNEO].",
                "O resultado? Sua voz **no automático**, com **impacto** e sem ruídos. ✨"
            ];

            // Start the overall handwriting animation sequence after initial page titles appear.
             setTimeout(() => { 
                animateHandwritingSentences(challengeSentences, 'handwriting-message-container', 0); 
            }, 3000); 


            // 3. Scroll Animations
            handleScrollAnimation();

            // 4. Accordion Setup
            setupAccordionToggles();

            // 5. Navigation Scroll
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const targetId = e.target.getAttribute('data-target');
                    // Special handling for builder link - keeping logic but link is removed from header
                    if (targetId === 'builder') { 
                       window.location.href = e.target.href; 
                       return;
                    }
                    smoothScroll(targetId);
                });
            });
        };
    </script>
</body>
</html>

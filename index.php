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
            overflow: hidden; /* For typewriter effect */
            white-space: nowrap; /* For typewriter effect */
            width: 0; /* For typewriter effect */
        }
        /* State for loaded sentences */
        .handwriting-sentence.loaded {
            opacity: 1;
            transform: translateY(0);
            width: auto; /* Allow full width after animation */
            white-space: normal; /* Allow text to wrap after animation */
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
            /* Animation applied by JS later */
        }

        /* For the final "sem ruídos" */
        .clean-line-text {
            /* Placeholder for future spark/clean line animation */
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
            animation-delay: 2s; /* Draw line after text is fully visible */
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
            <a href="#challenge" class="nav-link hover:text-pink-400 transition-colors py-1 px-2 rounded-lg" data-target="challenge">Seu Desafio</a> <!-- NOVO LINK -->
            <a href="#methodology" class="nav-link hover:text-pink-400 transition-colors py-1 px-2 rounded-lg" data-target="methodology">Metodologia</a>
            <a href="#features" class="nav-link hover:text-pink-400 transition-colors py-1 px-2 rounded-lg" data-target="features">Plataforma</a>
            <a href="#curriculum" class="nav-link hover:text-pink-400 transition-colors py-1 px-2 rounded-lg" data-target="curriculum">Currículo</a>
            <a href="#ai-power" class="nav-link hover:text-pink-400 transition-colors py-1 px-2 rounded-lg" data-target="ai-power">Poder da IA</a>
            <a href="#contact" class="nav-link hover:text-pink-400 transition-colors py-1 px-2 rounded-lg" data-target="contact">Contato</a>
          <!-- Added link to builder.php for admin access (RELEVANT MEMORY: user prefers the lesson planner page to be named builder.php) -->
            <a href="builder.php" class="nav-link hover:text-blue-400 transition-colors py-1 px-2 rounded-lg italic text-sm" data-target="builder">Builder (Admin)</a>
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

        <!-- NOVO: SEÇÃO DE DESAFIO (com a mensagem principal de impacto) -->
        <section id="challenge" class="flex flex-col items-center justify-center min-h-screen text-center px-6 py-24 bg-white/5 backdrop-blur-sm border-t border-gray-800 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-purple-900/10 via-pink-900/10 to-blue-900/10 -z-10"></div>
            <h2 class="text-5xl md:text-7xl font-extrabold mb-12 text-transparent bg-clip-text bg-gradient-to-r from-pink-400 via-purple-400 to-blue-400 animate-on-scroll fade-in-up">
                Seu Desafio com o Inglês Profissional é Real.
            </h2>
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
                🧠 O SHIFT REAL TALK DABY: Da Teoria à Competência Instantânea. Viva o idioma e veja-o fazer sentido.
            </h3>

            <p class="max-w-4xl mx-auto text-gray-300 text-xl leading-relaxed text-center mb-16 animate-on-scroll fade-in-up">
                Seu investimento em desenvolvimento vai além das aulas: ele é um investimento direto em <strong>tempo de reação e eficácia comunicativa</strong>. Nossa metodologia exclusiva, o <strong>"Lego Chain Block" (adaptado por RealTalk Daby)</strong>, tem como objetivo principal <strong>eliminar o "lag" da tradução</strong>, garantindo resultados de negócios imediatos e um domínio muito mais próximo do <strong>inglês real</strong>.
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
                        <div class="absolute bottom-4 left-0 right-0 text-center text-sm text-gray-400"><br><br>Passe o mouse ou Clique para ver a Solução RealTalk Daby (O Reflexo)</div>
                    </div>

                    <!-- Back Side: RealTalk Daby (O Reflexo Comunicativo) -->
                    <div id="card-back" class="card-face bg-gray-900/90 p-8 rounded-2xl shadow-2xl border-4 border-green-500/50 flex flex-col justify-center">
                        <h3 class="text-3xl font-bold text-green-400 mb-4 tracking-wider">REALTALK DABY (O Reflexo Comunicativo)</h3>
                        <ul class="text-left space-y-3 text-gray-300 text-lg list-none pl-0">
                            <li class="flex items-start"><span class="text-green-500 mr-2 font-black">✅</span> Foco: Reflexo e Performance (Comunicação Real).</li>
                            <li class="flex items-start"><span class="text-green-500 mr-2 font-black">✅</span> Ganho: Assertividade e Poder de Negociação em contextos reais.</li>
                            <li class="flex items-start"><span class="text-green-500 mr-2 font-black">✅</span> Avaliação: Métricas de Fluidez (Lag Time) e Performance.</li>
                            <li class="flex items-start"><span class="text-green-500 mr-2 font-black">✅</span> Valor: Alta otimização de tempo. ROI comprovado.</li>
                            <li class="flex items-start"><span class="text-green-500 mr-2 font-black">✅</span> Conteúdo: Módulos específicos e personalizáveis para o dia a dia corporativo com o uso da IA.</li>
                        </ul>
                         <div class="absolute bottom-4 left-0 right-0 text-center text-sm text-gray-400"><br><br>Passe o mouse ou Clique para ver o Método Tradicional (O Risco Corporativo)</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. FEATURES SECTION (Platform Overview) -->
        <section id="features" class="py-32 px-6 md:px-24 bg-purple-900/20 text-center border-t border-gray-800">
            <h3 class="text-5xl font-bold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-red-400 via-pink-500 to-yellow-400 animate-on-scroll fade-in-up">
                ✨ Sua Plataforma de Treinamento e Aceleração</h3>

            <p class="max-w-4xl mx-auto text-gray-300 text-xl leading-relaxed text-center mb-16 animate-on-scroll fade-in-up">
                RealTalk Daby não é apenas um curso. É uma experiência imersiva e inteligente, desenhada para acelerar sua proficiência e confiança no inglês corporativo, com ferramentas que você realmente precisa.
            </p>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10 max-w-6xl mx-auto">
                <div class="p-6 bg-gray-900/70 rounded-xl shadow-lg border border-indigo-500/50 animate-on-scroll fade-in-up" data-delay="0.1">
                    <h4 class="text-2xl font-semibold mb-2 text-white flex items-center">
                        <span class="text-blue-400 mr-3">🌐</span> Acesso Global, Flexibilidade Total
                    </h4>
                    <p class="text-gray-400">Plataforma acessível de qualquer dispositivo, a qualquer hora. Treine no seu ritmo, de qualquer lugar do mundo, adaptando-se à sua agenda global.</p>
                </div>

                <div class="p-6 bg-gray-900/70 rounded-xl shadow-lg border border-indigo-500/50 animate-on-scroll fade-in-up" data-delay="0.2">
                    <h4 class="text-2xl font-semibold mb-2 text-white flex items-center">
                        <span class="text-orange-400 mr-3">📝</span> Personalização de Conteúdo
                    </h4>
                    <p class="text-gray-400">Conteúdo adaptado à sua indústria, cargo e metas de carreira. A IA aprende com você para oferecer os cenários mais relevantes e desafiadores.</p>
                </div>

                <div class="p-6 bg-gray-900/70 rounded-xl shadow-lg border border-indigo-500/50 animate-on-scroll fade-in-up" data-delay="0.3">
                    <h4 class="text-2xl font-semibold mb-2 text-white flex items-center">
                        <span class="text-purple-400 mr-3">📊</span> Monitoramento de Desempenho e Feedback
                    </h4>
                    <p class="text-gray-400">Receba feedback instantâneo e detalhado sobre pronúncia, fluência e construções gramaticais. Acompanhe seu progresso com métricas claras e visuais.</p>
                </div>

                <div class="p-6 bg-gray-900/70 rounded-xl shadow-lg border border-indigo-500/50 animate-on-scroll fade-in-up" data-delay="0.4">
                    <h4 class="text-2xl font-semibold mb-2 text-white flex items-center">
                        <span class="text-pink-400 mr-3">🗣️</span> Simulações de Reuniões e Apresentações
                    </h4>
                    <p class="text-gray-400">Pratique cenários de reunião, negociações e apresentações com avatares de IA realistas, construindo confiança para situações de alta pressão.</p>
                </div>

                 <div class="p-6 bg-gray-900/70 rounded-xl shadow-lg border border-indigo-500/50 animate-on-scroll fade-in-up" data-delay="0.5">
                    <h4 class="text-2xl font-semibold mb-2 text-white flex items-center">
                        <span class="text-yellow-400 mr-3">🚀</span> Aceleração do "Thinking in English"
                    </h4>
                    <p class="text-gray-400">Exercícios focados em eliminar o vício da tradução e desenvolver um "reflexo comunicativo", pensando e respondendo diretamente em inglês, sem esforço.</p>
                </div>
            </div>
        </section>

        <!-- 4. CURRICULUM SECTION (Key Training Areas) -->
        <section id="curriculum" class="py-32 px-6 md:px-24 bg-black/40 border-t border-gray-800">
            <h3 class="text-5xl font-bold mb-4 text-center text-transparent bg-clip-text bg-gradient-to-r from-teal-400 via-emerald-400 to-cyan-400 animate-on-scroll fade-in-up">
                📚 Currículo Estratégico RealTalk Daby
            </h3>
            <p class="max-w-4xl mx-auto text-gray-300 text-xl leading-relaxed text-center mb-16 animate-on-scroll fade-in-up">
                Nosso currículo é desenhado para equipar profissionais com as habilidades de comunicação em inglês mais cruciais para o sucesso no ambiente de negócios global.
            </p>

            <div class="max-w-4xl mx-auto space-y-8">
                <!-- Accordion Item 1 -->
                <div class="bg-gray-900/70 rounded-xl shadow-lg border border-indigo-600/50 animate-on-scroll fade-in-up" data-delay="0">
                    <button class="accordion-toggle flex justify-between items-center w-full p-6 text-2xl font-semibold text-white hover:text-cyan-400 transition-colors" data-accordion-target="content-1">
                        Comunicação Oral e Apresentações Impactantes
                        <svg id="arrow-content-1" class="w-8 h-8 text-indigo-400 transform transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="content-1" class="accordion-content px-6 text-gray-400 text-lg">
                        <ul class="list-disc list-inside space-y-2">
                            <li>Fluência em reuniões e calls internacionais.</li>
                            <li>Técnicas de apresentação e storytelling corporativo.</li>
                            <li>Debates, negociações e persuasão.</li>
                            <li>Pronúncia clara e entonação natural.</li>
                        </ul>
                    </div>
                </div>

                <!-- Accordion Item 2 -->
                <div class="bg-gray-900/70 rounded-xl shadow-lg border border-indigo-600/50 animate-on-scroll fade-in-up" data-delay="0.1">
                    <button class="accordion-toggle flex justify-between items-center w-full p-6 text-2xl font-semibold text-white hover:text-cyan-400 transition-colors" data-accordion-target="content-2">
                        Escrita Profissional e E-mails Estratégicos
                        <svg id="arrow-content-2" class="w-8 h-8 text-indigo-400 transform transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="content-2" class="accordion-content px-6 text-gray-400 text-lg">
                        <ul class="list-disc list-inside space-y-2">
                            <li>Elaboração de e-mails, relatórios e propostas claras e concisas.</li>
                            <li>Gramática aplicada ao contexto de negócios.</li>
                            <li>Vocabulário específico da indústria.</li>
                            <li>Estratégias de escrita para diferentes públicos e objetivos.</li>
                        </ul>
                    </div>
                </div>

                 <!-- Accordion Item 3 -->
                <div class="bg-gray-900/70 rounded-xl shadow-lg border border-indigo-600/50 animate-on-scroll fade-in-up" data-delay="0.2">
                    <button class="accordion-toggle flex justify-between items-center w-full p-6 text-2xl font-semibold text-white hover:text-cyan-400 transition-colors" data-accordion-target="content-3">
                        Compreensão e Análise Crítica
                        <svg id="arrow-content-3" class="w-8 h-8 text-indigo-400 transform transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="content-3" class="accordion-content px-6 text-gray-400 text-lg">
                        <ul class="list-disc list-inside space-y-2">
                            <li>Leitura e interpretação rápida de documentos (relatórios, contratos).</li>
                            <li>Escuta ativa e compreensão de diferentes sotaques.</li>
                            <li>Análise crítica de mídias e notícias da indústria.</li>
                            <li>Desenvolvimento do pensamento crítico em inglês.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. AI POWER SECTION (Showcase AI Capabilities) -->
        <section id="ai-power" class="py-32 px-6 md:px-24 bg-purple-900/20 border-t border-gray-800 flex flex-col items-center">
            <h3 class="text-5xl font-bold mb-4 text-center text-transparent bg-clip-text bg-gradient-to-r from-red-400 via-yellow-500 to-green-400 animate-on-scroll fade-in-up">
                🤖 O Poder da Inteligência Artificial ao Seu Alcance
            </h3>
            <p class="max-w-4xl mx-auto text-gray-300 text-xl leading-relaxed text-center mb-16 animate-on-scroll fade-in-up">
                No RealTalk Daby, a IA não é um gadget, é seu co-piloto de fluência. Ela personaliza, desafia e acelera seu aprendizado de forma nunca antes vista.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-5xl mx-auto items-center animate-on-scroll fade-in-up">
                <div class="space-y-6 text-left">
                    <div class="flex items-start">
                        <span class="text-5xl mr-4 text-blue-400">🧠</span>
                        <div>
                            <h4 class="text-2xl font-semibold text-white">Coach de Pronúncia & Entonação</h4>
                            <p class="text-gray-400">Feedback acústico em tempo real para aperfeiçoar sua fala, captando nuances que antes só um nativo notaria.</p>
                        </div>
                    </div>
                     <div class="flex items-start">
                        <span class="text-5xl mr-4 text-pink-400">🎯</span>
                        <div>
                            <h4 class="text-2xl font-semibold text-white">Cenários Adaptativos & Role-Playing</h4>
                            <p class="text-gray-400">Participe de simulações de reuniões e negociações com avatares de IA realistas que se adaptam às suas respostas e nível.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <span class="text-5xl mr-4 text-green-400">💡</span>
                        <div>
                            <h4 class="text-2xl font-semibold text-white">Análise Preditiva de Desempenho</h4>
                            <p class="text-gray-400">A IA identifica seus pontos fracos e fortes, sugerindo módulos e exercícios para otimizar seu caminho para a fluência.</p>
                        </div>
                    </div>
                </div>
                <div class="relative w-full aspect-square bg-gray-900/80 rounded-full flex items-center justify-center shadow-2xl animate-spin-slow">
                    <div class="relative w-[80%] h-[80%] bg-gradient-to-br from-blue-600 via-purple-600 to-pink-600 rounded-full flex items-center justify-center animate-pulse-light">
                        <span class="text-6xl font-extrabold text-white">AI</span>
                    </div>
                     <!-- Micro-animations for AI elements -->
                    <div class="absolute w-6 h-6 bg-cyan-400 rounded-full -top-3 left-1/4 animate-ping-small"></div>
                    <div class="absolute w-4 h-4 bg-yellow-400 rounded-full -bottom-2 right-1/3 animate-ping-small-delayed"></div>
                </div>
            </div>
        </section>

        <!-- 6. CONTACT SECTION (Call to Action) -->
        <section id="contact" class="py-32 px-6 md:px-24 bg-black/40 border-t border-gray-800 text-center flex flex-col items-center justify-center">
            <h3 class="text-5xl font-bold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-blue-500 to-cyan-400 animate-on-scroll fade-in-up">
                Pronto para Desbloquear Seu Potencial Global?
            </h3>
            <p class="max-w-3xl mx-auto text-gray-300 text-xl leading-relaxed text-center mb-16 animate-on-scroll fade-in-up">
                Fale com nossos especialistas e descubra como o RealTalk Daby pode transformar sua comunicação e acelerar sua carreira global. Sua fluência estratégica começa aqui.
            </p>
            <a href="mailto:contato@realtalkdaby.com" class="px-12 py-6 text-2xl font-extrabold rounded-full shadow-2xl bg-gradient-to-r from-pink-600 to-purple-700 text-white transition-all duration-500 transform hover:scale-110 hover:shadow-purple-400/80 relative overflow-hidden group animate-on-scroll fade-in-up" data-delay="0.5">
                Entre em Contato Agora!
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 inline ml-3"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
        </section>

    </main>

    <!-- FOOTER (Glitch Effect) -->
    <footer class="py-12 px-6 md:px-24 text-center border-t border-gray-800 bg-black/50">
        <div class="glitch-text text-xl md:text-2xl font-mono" data-text="© 2024 RealTalk Daby - Acelerando a Performance Global.">
            © 2024 RealTalk Daby - Acelerando a Performance Global.
        </div>
        <p class="mt-4 text-gray-600">Construído com Inovação e Foco em Resultados Corporativos.</p>
    </footer>

    <!-- JavaScript for Animations and Interactions -->
    <script>
        // Smooth scrolling for navigation links
        function smoothScroll(targetId) {
            document.getElementById(targetId).scrollIntoView({
                behavior: 'smooth'
            });
        }

        // Flipping Card Functionality
        function toggleFlipCard(cardElement) {
            const isFlipped = cardElement.getAttribute('data-flipped') === 'true';
            cardElement.setAttribute('data-flipped', !isFlipped);
        }

        // Modified function to animate sentences with dynamic effects
        function animateHandwritingSentences(sentences, containerId, initialDelay = 0) {
            const container = document.getElementById(containerId);
            if (!container) {
                console.error('Handwriting container not found:', containerId);
                return;
            }
            container.innerHTML = ''; // Clear existing content

            setTimeout(() => { // Initial delay before starting the sentence animation
                sentences.forEach((rawSentence, index) => {
                    const span = document.createElement('span');
                    span.classList.add('handwriting-sentence');

                    let processedSentence = rawSentence;

                    // Emphasize emoji with a pop animation (before processing bold)
                    processedSentence = processedSentence.replace(/😩/g, `<span class="emoji-pulse">😩</span>`);
                    processedSentence = processedSentence.replace(/😔/g, `<span class="emoji-pulse">😔</span>`);
                    processedSentence = processedSentence.replace(/🛑/g, `<span class="emoji-pulse">🛑</span>`);
                    processedSentence = processedSentence.replace(/✨/g, `<span class="emoji-pulse">✨</span>`); // Last emoji

                    // Apply keyphrase effect with dynamic glow
                    processedSentence = processedSentence.replace(/|¨DÓBICE INVISÍVEL \/ CALCANHAR DE AQUILES¨D|/g, `<span class="keyphrase-effect text-red-400">[ÓBICE INVISÍVEL / CALCANHAR DE AQUILES]</span>`);
                    processedSentence = processedSentence.replace(/|¨DMATERIALIZA¨D|/g, `<span class="keyphrase-effect text-yellow-400">[MATERIALIZA]</span>`);
                    processedSentence = processedSentence.replace(/|¨DREFLEXO COMUNICATIVO INSTANTÂNEO¨D|/g, `<span class="keyphrase-effect text-blue-400">[REFLEXO COMUNICATIVO INSTANTÂNEO]</span>`);

                    // Handle specific typewriter texts
                    processedSentence = processedSentence.replace(/|¨DDECIFRAR¨D|/g, `<span class="text-green-400" data-typewriter-text="DECIFRAR"></span>`);
                    processedSentence = processedSentence.replace(/|¨DTRANSFORMAR¨D|/g, `<span class="text-green-400" data-typewriter-text="TRANSFORMAR"></span>`);
                    // Final "sem ruídos" with clean line
                    processedSentence = processedSentence.replace(/sem ruídos(?=\. ✨)/g, `<span class="clean-line-text">sem ruídos</span>`); // Use lookahead to avoid matching other "sem ruídos" if any

                    // Handle **bold** syntax last to ensure other spans are processed
                    processedSentence = processedSentence.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');

                    span.innerHTML = processedSentence; 
                    container.appendChild(span);

                    setTimeout(() => {
                        span.classList.add('loaded'); // This triggers fade-in and slide-up for the whole sentence

                        // Activate typewriter effect after the sentence appears
                        const typewriterElements = span.querySelectorAll('[data-typewriter-text]');
                        typewriterElements.forEach(el => {
                            const textToType = el.getAttribute('data-typewriter-text');
                            el.classList.add('typewriter-text'); // Add the typewriter class to trigger CSS animation
                            el.textContent = textToType; // Set content for CSS animation to work on
                        });

                    }, index * 800); // RETAINED 800ms delay for more dramatic sentence reveal
                });
            }, initialDelay); 
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
            // Note: The raw sentences are kept here to be processed by the JS function
            const challengeSentences = [
                "Você é um profissional **fera** e de **alta performance**, mas o inglês ainda é o [ÓBICE INVISÍVEL / CALCANHAR DE AQUILES] que 'trava' seu avanço global? 😩",
                "Cansou de investir em aulas e **'[TRENDS/HYPES] da internet'** que prometem, mas não entregam a **fluência estratégica** que seu calibre exige?",
                "A gente sabe: você se sente **sozinho nessa luta** 😔, buscando as palavras, enquanto a tradução ainda predomina e ninguém parece se importar **DE VERDADE**.",
                "Chega! 🛑",
                "O RealTalk Daby chega para [DECIFRAR] e [TRANSFORMAR] ESSE cenário!",
                "Nós vamos na raiz do problema: seu conhecimento se [MATERIALIZA] em [REFLEXO COMUNICATIVO INSTANTÂNEO].",
                "O resultado? Sua voz **no automático**, com **impacto** e sem ruídos. ✨"
            ];

            // Trigger the animation for the 'challenge' section when it loads or when scrolled into view.
             setTimeout(() => { 
                 const container = document.getElementById('handwriting-message-container');
                 if (container) {
                     container.style.opacity = '1'; // Make the container visible initially
                 }
                animateHandwritingSentences(challengeSentences, 'handwriting-message-container', 0); // Start sentence by sentence animation without extra initial delay
            }, 3000); // Start the overall handwriting animation sequence after initial page titles appear.


            // 3. Scroll Animations
            handleScrollAnimation();

            // 4. Accordion Setup
            setupAccordionToggles();

            // 5. Navigation Scroll
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const targetId = e.target.getAttribute('data-target');
                    // Special handling for builder link
                    if (targetId === 'builder') {
                       window.location.href = e.target.href; // Navigate directly
                       return;
                    }
                    smoothScroll(targetId);
                });
            });
        };
    </script>
</body>
</html>

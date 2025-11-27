<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RealTalk Daby (Corporate Edition)</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom Fonts: Inter & Caveat (for handwriting style) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">

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
            font-family: 'Caveat', cursive; /* Apply the handwriting font */
            font-size: 1.75rem; /* Base size */
            line-height: 1.8; /* More spacing for readability */
            text-align: left; /* Align sentences left */
            color: #d0d0d0; /* Soft white text */
            max-width: 800px; /* Constrain width for better reading */
            margin: 0 auto; /* Center the container */
        }
        .handwriting-sentence {
            opacity: 0; /* Start hidden */
            transform: translateY(20px); /* Start slightly below */
            transition: opacity 0.5s ease-out, transform 0.5s ease-out; /* Smooth transition, faster */
            display: block; /* Each sentence on its own line */
            margin-bottom: 0.5em; /* Spacing between sentences */
            padding-left: 1.5em; /* Indent for bullet point feel */
            position: relative; /* For custom bullet */
        }
        .handwriting-sentence.loaded {
            opacity: 1;
            transform: translateY(0);
        }
        /* Custom bullet point (e.g., a simple dash or dot) */
        .handwriting-sentence::before {
            content: '•'; /* Unicode bullet point */
            color: #bd93f9; /* Purple accent color */
            font-size: 1.2em; /* Slightly larger bullet */
            position: absolute;
            left: 0;
            top: 0;
        }
        /* Style for bold parts within the sentence */
        .handwriting-sentence strong {
            color: #ff79c6; /* Pink accent for important words */
            font-weight: 700; /* Make bold stand out */
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

        <!-- 1. HERO SECTION (Corporate Pitch) -->
        <section id="home" class="flex flex-col items-center justify-center min-h-screen text-center px-6 pt-24">
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

            <!-- Animated Handwriting Sentences (NEW IMPLEMENTATION) -->
            <div id="handwriting-message-container" class="mt-8 handwriting-container opacity-0 transition-opacity duration-1000" style="transition-delay: 2.3s;">
                <!-- Sentences will be injected here by JavaScript -->
            </div>
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
                        <div class="absolute bottom-4 left-0 right-0 text-center text-sm text-gray-400"><br><br>Clique para ver a Solução RealTalk Daby (O Reflexo)</div>
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
                         <div class="absolute bottom-4 left-0 right-0 text-center text-sm text-gray-400"><br><br>Clique para ver o Método Tradicional (O Risco Corporativo)</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. FEATURES SECTION (Platform Overview) -->
        <section id="features" class="py-32 px-6 md:px-24 bg-purple-900/20 text-center border-t border-gray-800">
            <h3 class="text-5xl font-bold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-red-400 via-pink-500 to-yellow-400 animate-on-scroll fade-in-up">
                Plataforma RealTalk Daby: Seu Ambiente de Imersão e Habilidade
            </h3>
            <p class="max-w-4xl mx-auto text-gray-300 text-xl leading-relaxed text-center mb-16 animate-on-scroll fade-in-up">
                Um ecossistema digital inteligente, otimizado para o profissional de alta demanda que busca resultados rápidos e comunicação impecável.
            </p>

            <div class="grid md:grid-cols-3 gap-10 max-w-6xl mx-auto">
                <div class="p-6 bg-gray-900/70 rounded-xl shadow-lg border border-red-500/50 animate-on-scroll fade-in-up" data-delay="0">
                    <h4 class="text-2xl font-semibold mb-2 text-white flex items-center">
                        <span class="text-pink-400 mr-2">🌐</span> Ambiente Imersivo Dark Mode
                    </h4>
                    <p class="text-gray-400">Design minimalista e Dark Mode para reduzir distrações, otimizar o foco e a concentração. Treine em um ambiente que espelha a sofisticação e seriedade do seu trabalho. Ferramentas que minimizam o lag da tradução.</p>
                </div>
                <div class="p-6 bg-gray-900/70 rounded-xl shadow-lg border border-red-500/50 animate-on-scroll fade-in-up" data-delay="0.1">
                    <h4 class="text-2xl font-semibold mb-2 text-white flex items-center">
                        <span class="text-yellow-400 mr-2">🎯</span> Micro-Aprendizado Adaptativo
                    </h4>
                    <p class="text-gray-400">Pílulas de conhecimento (Lego Chain Blocks) personalizadas para o contexto corporativo do profissional. O algoritmo de IA adapta a intensidade e o foco com base no desempenho e engajamento. </p>
                </div>
                <div class="p-6 bg-gray-900/70 rounded-xl shadow-lg border border-red-500/50 animate-on-scroll fade-in-up" data-delay="0.2">
                    <h4 class="text-2xl font-semibold mb-2 text-white flex items-center">
                        <span class="text-blue-400 mr-2">⚡</span> Feedback Instantâneo e Personalizado
                    </h4>
                    <p class="text-gray-400">A IA oferece correção imediata de pronúncia, entonação e uso lexical. Modelos de conversação simulados em tempo real para aprimorar a capacidade de reação e o reflexo comunicativo em diversos cenários.</p>
                </div>
            </div>
        </section>

        <!-- 4. CURRICULUM SECTION (Accordion Style for specialized modules) -->
        <section id="curriculum" class="py-32 px-6 md:px-24 bg-black/40 border-t border-gray-800">
            <h3 class="text-5xl font-bold mb-16 text-center text-transparent bg-clip-text bg-gradient-to-r from-red-400 via-pink-500 to-purple-400 animate-on-scroll fade-in-up">
                Currículo Estratégico: Desenvolvendo a Fluência de Negócios
            </h3>

            <div class="max-w-4xl mx-auto space-y-6">
                <!-- Accordion Item 1 -->
                <div class="bg-gray-900/70 rounded-xl shadow-lg border border-indigo-500/50 animate-on-scroll fade-in-up" data-delay="0">
                    <button class="accordion-toggle w-full flex justify-between items-center p-6 text-2xl font-semibold text-white hover:text-pink-400 transition-colors duration-300" data-accordion-target="content-1">
                        <span class="flex items-center"><span class="text-pink-400 mr-3">🗣️</span> Comunicação Executiva Essencial</span>
                        <svg id="arrow-content-1" class="w-6 h-6 text-white transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="content-1" class="accordion-content px-6 text-gray-400 text-lg">
                        <ul class="list-disc list-inside space-y-2">
                            <li>Apresentações de alto impacto e storytelling corporativo.</li>
                            <li>Reuniões eficazes: participação ativa, negociação e resolução.</li>
                            <li>E-mails e relatórios profissionais: clareza, concisão e persuasão.</li>
                            <li>Networking e small talk estratégico.</li>
                        </ul>
                    </div>
                </div>

                 <!-- Accordion Item 2 -->
                <div class="bg-gray-900/70 rounded-xl shadow-lg border border-indigo-500/50 animate-on-scroll fade-in-up" data-delay="0.2">
                    <button class="accordion-toggle w-full flex justify-between items-center p-6 text-2xl font-semibold text-white hover:text-green-400 transition-colors duration-300" data-accordion-target="content-2">
                        <span class="flex items-center"><span class="text-green-400 mr-3">🏭</span> Módulos de Indústria e Segmentos Específicos</span>
                        <svg id="arrow-content-2" class="w-6 h-6 text-white transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="content-2" class="accordion-content px-6 text-gray-400 text-lg">
                        <ul class="list-disc list-inside space-y-2">
                            <li><strong>Finanças:</strong> Termos de mercado, relatórios financeiros, fusões e aquisições.</li>
                            <li><strong>TI & Tecnologia:</strong> Desenvolvimento de software, metodologias ágeis, segurança cibernética.</li>
                            <li><strong>Vendas e Marketing:</strong> Pitching, negociação avançada, campanhas globais.</li>
                            <li><strong>Recursos Humanos:</strong> Entrevistas, feedback, gestão de talentos internacionais.</li>
                        </ul>
                    </div>
                </div>

                 <!-- Accordion Item 3 -->
                <div class="bg-gray-900/70 rounded-xl shadow-lg border border-indigo-500/50 animate-on-scroll fade-in-up" data-delay="0.3">
                    <button class="accordion-toggle w-full flex justify-between items-center p-6 text-2xl font-semibold text-white hover:text-yellow-400 transition-colors duration-300" data-accordion-target="content-3">
                        <span class="flex items-center"><span class="text-yellow-400 mr-3">🌍</span> Desafios de Comunicação Global & Cultural</span>
                        <svg id="arrow-content-3" class="w-6 h-6 text-white transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="content-3" class="accordion-content px-6 text-gray-400 text-lg">
                        <ul class="list-disc list-inside space-y-2">
                            <li>Comunicação intercultural e etiqueta global.</li>
                            <li>Negociação transcultural e gestão de expectativas.</li>
                            <li>Superando sotaques e variações regionais do inglês.</li>
                            <li>Construção de rapport em ambientes virtuais internacionais.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. AI POWER SECTION (Reframed for B2B) -->
        <section id="ai-power" class="py-32 px-6 md:px-24 bg-purple-900/20 text-center border-t border-gray-800">
            <h3 class="text-5xl font-bold mb-16 text-transparent bg-clip-text bg-gradient-to-r from-green-300 via-blue-400 to-purple-400 animate-on-scroll fade-in-up">
                 O Poder da IA RealTalk Daby: Inteligência a Serviço da Sua Fluência Corporativa
            </h3>

            <div class="grid md:grid-cols-3 gap-10 max-w-6xl mx-auto">
                <div class="p-6 bg-gray-900/70 rounded-xl shadow-lg border border-indigo-500/50 animate-on-scroll fade-in-up" data-delay="0">
                    <h4 class="text-2xl font-semibold mb-2 text-white flex items-center">
                        <span class="text-cyan-400 mr-2">🤖</span> Mentores de IA e Role-Plays Realistas
                    </h4>
                    <p class="text-gray-400">Interaja com avatares de IA que simulam **cenários corporativos realistas** e personas específicas da sua indústria. Treino de negociação, apresentações e reuniões com feedback imediato e construtivo, sem pressão.</p>
                </div>

                <div class="p-6 bg-gray-900/70 rounded-xl shadow-lg border border-indigo-500/50 animate-on-scroll fade-in-up" data-delay="0.1">
                    <h4 class="text-2xl font-semibold mb-2 text-white flex items-center">
                        <span class="text-green-400 mr-2">🎯</span> Foco Aprimorado & Engajamento Adaptativo
                    </h4>
                    <p class="text-gray-400">Design em Dark Mode para reduzir distrações visuais. IA monitora o engajamento e sugere pausas ou mudanças de atividade para **otimizar o foco**, especialmente útil para gerenciar TDAH e alta carga de trabalho.</p>
                </div>

                <div class="p-6 bg-gray-900/70 rounded-xl shadow-lg border border-indigo-500/50 animate-on-scroll fade-in-up" data-delay="0.2">
                    <h4 class="text-2xl font-semibold mb-2 text-white flex items-center">
                        <span class="text-yellow-400 mr-2">📊</span> Dashboards Preditivos e Relatórios de ROI
                    </h4>
                    <p class="text-gray-400">Visão **data-driven** da proficiência da sua equipe. Dashboards em tempo real para RH e T&D, mostrando a métrica de fluidez (lag time), proficiência individual e por departamento, para um **ROI claro e mensurável**.</p>
                </div>

                <div class="p-6 bg-gray-900/70 rounded-xl shadow-lg border border-indigo-500/50 animate-on-scroll fade-in-up" data-delay="0.3">
                    <h4 class="text-2xl font-semibold mb-2 text-white flex items-center">
                        <span class="text-red-400 mr-2">⚙️</span> Customização e Cenários Específicos da Empresa
                    </h4>
                    <p class="text-gray-400">O AI Engine é modelado com **cenários, jargões e personas específicas** da sua empresa, garantindo que o treinamento seja 100% relevante para seu ambiente de negócios único, sua cultura e objetivos estratégicos.</p>
                </div>
            </div>
        </section>

        <!-- 6. CONTACT SECTION (Replaces Customization/ROI for a direct CTA) -->
        <section id="contact" class="py-32 px-6 md:px-24 bg-black/40 border-t border-gray-800">
            <h3 class="text-5xl font-bold mb-4 text-center text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-orange-500 to-red-400 animate-on-scroll fade-in-up">
                Pronto para Elevar Sua Equipe?
            </h3>

            <p class="max-w-4xl mx-auto text-gray-400 text-xl leading-relaxed text-center mb-16 animate-on-scroll fade-in-up">
                Transforme a comunicação de seus profissionais e impulsione os resultados globais com a metodologia RealTalk Daby.
            </p>

            <div class="text-center animate-on-scroll fade-in-up" data-delay="0.3">
                 <a href="mailto:seuemail@example.com" class="mt-8 px-10 py-5 text-xl font-extrabold rounded-full shadow-2xl bg-red-600 text-white transition-all duration-500 transform hover:scale-105 hover:shadow-red-400/80 relative overflow-hidden group">
                    SOLICITAR DEMONSTRAÇÃO ESTRATÉGICA
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 inline ml-3"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>
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

        // Function to animate sentences with a delay (replacing typewriterEffect for this section)
        function animateHandwritingSentences(sentences, containerId) {
            const container = document.getElementById(containerId);
            container.innerHTML = ''; // Clear existing content
            container.classList.add('handwriting-container'); // Add the handwriting styles container class
            container.style.opacity = '1'; // Make container visible

            sentences.forEach((rawSentence, index) => {
                // Parse rawSentence to handle **bold** syntax
                const processedSentence = rawSentence.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
                const span = document.createElement('span');
                span.classList.add('handwriting-sentence');
                span.innerHTML = processedSentence; // Use innerHTML to render strong tags

                container.appendChild(span);

                setTimeout(() => {
                    span.classList.add('loaded');
                }, index * 400); // **Reduced delay (400ms) for quicker loading**
            });
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

            // 2. Animated Handwriting Message (NEW IMPLEMENTATION with faster delay)
            const messageSentences = [
                "Você é um profissional **fera** e de **alta performance**, mas o inglês ainda é o **[ÓBICE INVISÍVEL / CALCANHAR DE AQUILES]** que 'trava' seu avanço global? 😩",
                "Cansou de investir em aulas e **'[TRENDS/HYPES] da internet'** que prometem, mas não entregam a **fluência estratégica** que seu calibre exige?",
                "A gente sabe: você se sente **sozinho nessa luta** 😔, buscando as palavras, enquanto a tradução ainda predomina e ninguém parece se importar **DE VERDADE**.",
                "Chega! 🛑",
                "O RealTalk Daby chega para **[DECIFRAR] e [TRANSFORMAR]** ESSE cenário!",
                "Nós vamos na raiz do problema: seu conhecimento se **[MATERIALIZA]** em **[REFLEXO COMUNICATIVO INSTANTÂNEO]**.",
                "O resultado? Sua voz **no automático**, com **impacto** e **sem ruídos**. ✨"
            ];

            setTimeout(() => {
                animateHandwritingSentences(messageSentences, 'handwriting-message-container');
            }, 2300); // Starts after initial title animations finish

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

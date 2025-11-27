<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LexiPro: Aceleração de Talentos e Performance Global</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom Font: Inter (Used by default in Tailwind) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

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
        /* Adjusted dropdown for dark mode (from previous builder.php) */
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
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-950 via-gray-900 to-black text-gray-100 font-sans overflow-x-hidden relative">

    <!-- BACKGROUND EFFECT -->
    <div class="absolute inset-0 -z-10 animate-gradient bg-[length:400%_400%] bg-gradient-to-r from-blue-900 via-purple-900 to-pink-900 opacity-30"></div>

    <!-- HEADER (Sticky Navigation) -->
    <header class="sticky top-0 z-50 bg-black/70 backdrop-blur-md shadow-2xl p-4 md:p-6 flex justify-between items-center border-b border-indigo-900/50">
        <h1 id="header-title" class="text-2xl md:text-3xl font-extrabold tracking-wide text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-purple-500 to-pink-500 animate-on-load">
            LexiPro: Aceleração de Talentos
        </h1>
        <nav class="flex gap-3 md:gap-6 text-base md:text-lg">
            <a href="#home" class="nav-link hover:text-pink-400 transition-colors py-1 px-2 rounded-lg" data-target="home">Início</a>
            <a href="#methodology" class="nav-link hover:text-pink-400 transition-colors py-1 px-2 rounded-lg" data-target="methodology">Metodologia</a>
            <a href="#features" class="nav-link hover:text-pink-400 transition-colors py-1 px-2 rounded-lg" data-target="features">Plataforma</a>
            <a href="#curriculum" class="nav-link hover:text-pink-400 transition-colors py-1 px-2 rounded-lg" data-target="curriculum">Currículo</a>
            <a href="#ai-power" class="nav-link hover:text-pink-400 transition-colors py-1 px-2 rounded-lg" data-target="ai-power">Poder da IA</a>
            <a href="#contact" class="nav-link hover:text-pink-400 transition-colors py-1 px-2 rounded-lg" data-target="contact">Contato</a>
          <!-- Added link to builder.php for admin access -->
            <a href="builder.php" class="nav-link hover:text-blue-400 transition-colors py-1 px-2 rounded-lg italic text-sm" data-target="builder">Builder (Admin)</a>
        </nav>
    </header>

    <main>

        <!-- 1. HERO SECTION (Corporate Pitch) -->
        <section id="home" class="flex flex-col items-center justify-center min-h-screen text-center px-6 pt-24">
            <!-- Título 1: PLAIN GRADIENT TEXT (Original state) -->
            <h4 class="text-3xl md:text-6xl font-extrabold mb-4 tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-yellow-400 to-red-400 animate-on-load" style="transition-delay: 0s;">
                INGLÊS PROFISSIONAL: DA BARREIRA AO REFLEXO
            </h4>

            <!-- Título 2: RAINBOW GRADIENT TEXT (Original state) -->
            <h2 class="text-5xl md:text-8xl font-extrabold mb-6 tracking-tight animate-on-load rainbow-text" style="transition-delay: 0.1s;">
                ACELERE A PERFORMANCE GLOBAL COM LEXIPRO
            </h2>

            <!-- Título 3: EFEITO FLASH (Original state - Focus Pulse) -->
            <h3 class="text-4xl md:text-7xl font-extrabold mb-8 text-white focus-pulse animate-on-load" style="transition-delay: 0.6s;">
                <span class="rainbow-text">Fluência como Reflexo, não como Barreira.</span>
            </h3>

            <!-- Typewriter effect runs once -->
            <!-- TEXTO ATUALIZADO PARA O NOVO POSICIONAMENTO DE COPYWRITING -->
            <div id="typewriter-container" class="mt-6 text-xl md:text-3xl font-light text-gray-300 max-w-4xl mx-auto opacity-0 transition-opacity duration-500" style="transition-delay: 2.3s;">
                <p class="inline-block">
                    <span id="typewriter-text-content"></span>
                    <span id="typewriter-cursor" class="inline-block animate-pulse border-r-2 border-indigo-400 ml-1">|</span>
                </p>
            </div>

        </section>

        <!-- 2. METHODOLOGY (Corporate Training Efficacy) -->
        <section id="methodology" class="py-32 px-6 md:px-24 bg-black/40 backdrop-blur-md border-t border-gray-800">
            <h3 class="text-5xl font-bold mb-4 text-center text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-blue-500 to-green-400 animate-on-scroll fade-in-up">
                🧠 O SHIFT LEXIPRO: Da Teoria à Competência Instantânea. Viva o idioma e veja-o fazer sentido.
            </h3>

            <p class="max-w-4xl mx-auto text-gray-300 text-xl leading-relaxed text-center mb-16 animate-on-scroll fade-in-up">
                Seu investimento em desenvolvimento vai além das aulas: ele é um investimento direto em <strong>tempo de reação e eficácia comunicativa</strong>. Nossa metodologia exclusiva, o <strong>"Lego Chain Block" (adaptado por LexiPro)</strong>, tem como objetivo principal <strong>eliminar o "lag" da tradução</strong>, garantindo resultados de negócios imediatos e um domínio muito mais próximo do <strong>inglês real</strong>.
            </p>

            <div class="flex justify-center">
                <div id="flipping-card" class="flipping-card-container w-full max-w-xl h-[28rem] relative cursor-pointer animate-on-scroll fade-in" onclick="toggleFlipCard(this)" data-flipped="false">

                    <!-- Front Side: Traditional Method (The Cost to Business) -->
                    <div id="card-front" class="card-face bg-gray-900/90 p-8 rounded-2xl shadow-2xl border-4 border-red-500/50 flex flex-col justify-center">
                        <h3 class="text-3xl font-bold text-red-400 mb-4 tracking-wider">MÉTODO TRADICIONAL (O Risco Corporativo)</h3>
                        <ul class="text-left space-y-3 text-gray-300 text-lg list-none pl-0">
                            <li class="flex items-start"><span class="text-red-500 mr-2 font-black">❌</span> Foco: Conhecimento Teórico (Gramática do Livro).</li>
                            <li class="flex items-start"><span class="text-red-500 mr-2 font-black">❌</span> Perda: Reuniões de alto valor comprometidas por hesitação e o medo de falar.</li>
                            <li class="flex items-start"><span class="text-red-500 mr-2 font-black">❌</span> Avaliação: Subjetiva e sem métricas de performance.</li>
                            <li class="flex items-start"><span class="text-red-500 mr-2 font-black">❌</span> Custo: Alto tempo de treinamento com baixo Retorno.</li>
                            <li class="flex items-start"><span class="text-red-500 mr-2 font-black">❌</span> Conteúdo: Inglês "de livro" e conversas genéricas, sem aplicação prática.</li>
                        </ul>
                        <div class="absolute bottom-4 left-0 right-0 text-center text-sm text-gray-400"><br><br>Clique para ver a Solução LexiPro (O Reflexo)</div>
                    </div>

                    <!-- Back Side: LexiPro System (The Corporate Reflex) -->
                    <div id="card-back" class="card-face bg-indigo-800/90 p-8 rounded-2xl shadow-2xl border-4 border-indigo-500/80 flex flex-col justify-center">
                        <h3 class="text-3xl font-bold text-white mb-4 tracking-wider">NOSSO SISTEMA LEXIPRO (O Benefício Corporativo)</h3>
                        <ul class="text-left space-y-3 text-indigo-200 text-lg list-none pl-0">
                            <li class="flex items-start"><span class="text-green-300 mr-2 font-black">✅</span> Foco: Fluência Inconsciente e Agilidade de Resposta.</li>
                            <li class="flex items-start"><span class="text-green-300 mr-2 font-black">✅</span> Ganho: Aumento Imediato na confiança e assertividade da equipe.</li>
                            <li class="flex items-start"><span class="text-green-300 mr-2 font-black">✅</span> Aprimoramento: Conteúdo focado no essencial para o trabalho e aprimoramento.</li>
                            <li class="flex items-start"><span class="text-green-300 mr-2 font-black">✅</span> Aplicação: Aprendizado em situações corporativas reais - no seu dia a dia.</li>
                            <li class="flex items-start"><span class="text-green-300 mr-2 font-black">✅</span> Valor: Rápida escalabilidade e menor CUSTO.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. PLATFORM FEATURES (Reframed from generic "Features") -->
        <section id="features" class="py-32 px-6 md:px-24 relative overflow-hidden">
            <h3 class="text-5xl font-bold mb-16 text-center text-transparent bg-clip-text bg-gradient-to-r from-pink-400 via-purple-500 to-indigo-500 animate-on-scroll fade-in-up">
                Minha Expertise em Ação: As Capacidades da Plataforma LexiPro
            </h3>

            <div class="grid md:grid-cols-3 gap-10">
                <!-- Feature 1: Real Talk Engine (Dynamic Scenarios) -->
                <div class="feature-card p-8 rounded-2xl bg-gray-900/80 shadow-2xl border border-gray-700 hover:border-pink-500 transition-all duration-500 hover:scale-[1.03] flex flex-col items-start animate-on-scroll fade-in-up" style="transition-delay: 0.1s;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10 mb-4 text-pink-400"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>

                    <h4 class="text-3xl font-bold mb-3 text-white">Simulador de Cenários Dinâmicos (IA-Powered)</h4>
                    <p class="text-gray-400 leading-relaxed text-lg">
                        Seu profissional é qualificado, mas o inglês é a barreira. Nosso simulador com avatares IA transforma o **conhecimento teórico** na agilidade de resposta exigida pelo mercado através de role-plays *em tempo real*.
                    </p>
                </div>

                <!-- Feature 2: Neuro-Feedback (Assessment) -->
                <div class="feature-card p-8 rounded-2xl bg-gray-900/80 shadow-2xl border border-gray-700 hover:border-pink-500 transition-all duration-500 hover:scale-[1.03] flex flex-col items-start animate-on-scroll fade-in-up" style="transition-delay: 0.2s;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10 mb-4 text-pink-400"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
                    <h4 class="text-3xl font-bold mb-3 text-white">Análise Preditiva de Gaps & Feedback Contextual</h4>
                    <p class="text-gray-400 leading-relaxed text-lg">
                        Mede a **velocidade de processamento**, não a memorização. Identifica *exatamente* onde o profissional trava (vocabulário, estrutura, confiança) e oferece feedback construtivo "on-the-fly."
                    </p>
                </div>

                <!-- Feature 3: Flight Simulator Mode (High-Pressure Training) -->
                <div class="feature-card p-8 rounded-2xl bg-gray-900/80 shadow-2xl border border-gray-700 hover:border-pink-500 transition-all duration-500 hover:scale-[1.03] flex flex-col items-start animate-on-scroll fade-in-up" style="transition-delay: 0.3s;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10 mb-4 text-blue-400"><rect width="20" height="15" x="2" y="3" rx="2"/><path d="M12 18v4"/><path d="M8 22h8"/></svg>
                    <h4 class="text-3xl font-bold mb-3 text-white">Modo Simulador de Voo (Alta Pressão)</h4>
                    <p class="text-gray-400 leading-relaxed text-lg">
                        Treinamento em **stress elevado** (negociações críticas, gestão de crise) para que o inglês seja automático em situações de alta pressão, otimizando o "Cognitive Load Pacing".
                    </p>
                </div>
            </div>
        </section>

        <!-- 4. CURRICULUM SECTION (Corporate Modules) -->
        <section id="curriculum" class="py-32 px-6 md:px-24 bg-black/40 backdrop-blur-md border-t border-gray-800">
            <h3 class="text-5xl font-bold mb-4 text-center text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-orange-400 to-red-500 animate-on-scroll fade-in-up">
                🎓 Nosso Currículo: Habilidades Essenciais e Liderança Global
            </h3>

            <p class="max-w-4xl mx-auto text-gray-400 text-xl leading-relaxed text-center mb-16 animate-on-scroll fade-in-up">
                Nosso currículo é estruturado em blocos de competência aplicáveis ao dia a dia de um profissional em um ambiente multinacional, com módulos de imersão por indústria.
            </p>

            <div class="max-w-4xl mx-auto space-y-4">

                <!-- Category 1: Global Leadership Communication -->
                <div class="bg-gray-900/70 rounded-xl shadow-xl border border-gray-700 animate-on-scroll fade-in-up" data-delay="0.1">
                    <button class="w-full text-left p-6 flex justify-between items-center text-2xl font-bold text-white hover:bg-gray-800/70 transition duration-300 rounded-xl focus:outline-none accordion-toggle" data-accordion-target="cat1">
                        1. Comunicação de Liderança e Gestão (Mesa Diretora)
                        <svg class="w-6 h-6 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="arrow-cat1"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="cat1" class="accordion-content">
                        <ul class="text-gray-300 space-y-3 px-6 pb-6 text-lg border-t border-gray-700 pt-4">
                            <li class="flex items-center">
                                <span class="text-indigo-400 mr-3 font-bold">•</span> Condução de Reuniões de Alto Impacto (Agenda Setting).
                            </li>
                            <li class="flex items-center">
                                <span class="text-indigo-400 mr-3 font-bold">•</span> Feedback Construtivo e Gestão de Conflitos Cross-Cultural.
                            </li>
                            <li class="flex items-center">
                                <span class="text-indigo-400 mr-3 font-bold">•</span> Comunicação Estratégica para C-Level.
                            </li>
                            <li class="flex items-center">
                                <span class="text-indigo-400 mr-3 font-bold">•</span> Vocabulário Essencial: 'Initiate', 'Implement', 'Monitor', 'Assess', 'Mitigate', 'Optimize', 'Facilitate'.
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Category 2: Sales & Negotiation Proficiency -->
                <div class="bg-gray-900/70 rounded-xl shadow-xl border border-gray-700 animate-on-scroll fade-in-up" data-delay="0.2">
                    <button class="w-full text-left p-6 flex justify-between items-center text-2xl font-bold text-white hover:bg-gray-800/70 transition duration-300 rounded-xl focus:outline-none accordion-toggle" data-accordion-target="cat2">
                        2. Proficiência em Vendas e Negociação (Fechamento de Negócios)
                        <svg class="w-6 h-6 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="arrow-cat2"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="cat2" class="accordion-content">
                        <ul class="text-gray-300 space-y-3 px-6 pb-6 text-lg border-t border-gray-700 pt-4">
                            <li class="flex items-center">
                                <span class="text-indigo-400 mr-3 font-bold">•</span> Pitching de Vendas (Adaptação a Diferentes Culturas).
                            </li>
                            <li class="flex items-center">
                                <span class="text-indigo-400 mr-3 font-bold">•</span> Resposta Rápida a Objeções Complexas.
                            </li>
                            <li class="flex items-center">
                                <span class="text-indigo-400 mr-3 font-bold">•</span> Linguagem de Acordo e Fechamento (Deal Closing).
                            </li>
                            <li class="flex items-center">
                                <span class="text-indigo-400 mr-3 font-bold">•</span> Vocabulário Específico: 'Lead generation', 'Conversion rate', 'Customer journey', 'Market segmentation'.
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Category 3: Technical & Data Presentation -->
                <div class="bg-gray-900/70 rounded-xl shadow-xl border border-gray-700 animate-on-scroll fade-in-up" data-delay="0.3">
                    <button class="w-full text-left p-6 flex justify-between items-center text-2xl font-bold text-white hover:bg-gray-800/70 transition duration-300 rounded-xl focus:outline-none accordion-toggle" data-accordion-target="cat3">
                        3. Apresentação Técnica e de Dados (Clareza e Precisão)
                        <svg class="w-6 h-6 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="arrow-cat3"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="cat3" class="accordion-content">
                        <ul class="text-gray-300 space-y-3 px-6 pb-6 text-lg border-t border-gray-700 pt-4">
                            <li class="flex items-center">
                                <span class="text-indigo-400 mr-3 font-bold">•</span> Explicação de Processos Complexos e Fluxos de Trabalho.
                            </li>
                            <li class="flex items-center">
                                <span class="text-indigo-400 mr-3 font-bold">•</span> Vocabulário para Gráficos, KPI's e Projeções Financeiras.
                            </li>
                            <li class="flex items-center">
                                <span class="text-indigo-400 mr-3 font-bold">•</span> Redação Técnica (E-mails e Relatórios Executivos).
                            </li>
                            <li class="flex items-center">
                                <span class="text-indigo-400 mr-3 font-bold">•</span> Vocabulário Específico: 'Supply chain', 'Lean manufacturing', 'Quality assurance (QA)', 'Compliance'.
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Category 4: Specialized Training & Onboarding (AI-Powered) -->
                <div class="bg-gray-900/70 rounded-xl shadow-xl border border-gray-700 animate-on-scroll fade-in-up" data-delay="0.4">
                    <button class="w-full text-left p-6 flex justify-between items-center text-2xl font-bold text-white hover:bg-gray-800/70 transition duration-300 rounded-xl focus:outline-none accordion-toggle" data-accordion-target="cat4">
                        4. IA & Otimização de Foco (Onboarding Global)
                        <svg class="w-6 h-6 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="arrow-cat4"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="cat4" class="accordion-content">
                        <ul class="text-gray-300 space-y-3 px-6 pb-6 text-lg border-t border-gray-700 pt-4">
                            <li class="flex items-center">
                                <span class="text-indigo-400 mr-3 font-bold">•</span> Caminhos Adaptiveis de Aprendizado (IA-Powered "Cognitive Load Pacing").
                            </li>
                            <li class="flex items-center">
                                <span class="text-indigo-400 mr-3 font-bold">•</span> Curadoria Dinâmica de Conteúdo (Alinhado à sua indústria).
                            </li>
                            <li class="flex items-center">
                                <span class="text-indigo-400 mr-3 font-bold">•</span> Otimização para Foco (Dark Mode, "Focus Mode" AI para TDAH).
                            </li>
                            <li class="flex items-center">
                                <span class="text-indigo-400 mr-3 font-bold">•</span> Gerenciamento de Diferenças de Sotaque e Jargão (Dialect Training).
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>

        <!-- 5. NEW SECTION: AI POWER (Detailed from LexiPro) -->
        <section id="ai-power" class="-mt-20 py-32 px-6 md:px-24 bg-indigo-900/30 border-t border-gray-700">
            <h3 class="text-5xl font-bold mb-4 text-center text-transparent bg-clip-clip bg-gradient-to-r from-blue-300 via-indigo-400 to-purple-500 animate-on-scroll fade-in-up">
                🤖 O Verdadeiro Poder da IA no seu Desenvolvimento!
            </h3>

            <p class="max-w-4xl mx-auto text-indigo-200 text-xl leading-relaxed text-center mb-16 animate-on-scroll fade-in-up">
                A Inteligência Artificial é o motor da sua maestria, oferecendo uma experiência de aprendizado sem precedentes, pensando 10 anos à frente.
            </p>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <div class="p-6 bg-gray-900/70 rounded-xl shadow-lg border border-indigo-500/50 animate-on-scroll fade-in-up" data-delay="0.1">
                    <h4 class="text-2xl font-semibold mb-2 text-white flex items-center">
                        <span class="text-indigo-400 mr-2">✨</span> Mentor IA & Feedback Personalizado
                    </h4>
                    <p class="text-gray-400">Um coach IA interativo que guia sua jornada, fornece feedback construtivo e motiva, se adaptando ao seu progresso e desafios. Os erros são dados para melhoria, não falhas.</p>
                </div>

                <div class="p-6 bg-gray-900/70 rounded-xl shadow-lg border border-indigo-500/50 animate-on-scroll fade-in-up" data-delay="0.2">
                    <h4 class="text-2xl font-semibold mb-2 text-white flex items-center">
                        <span class="text-purple-400 mr-2">🗣️</span> PRONUNCIATION CLINIC & SEMANTIC NETWORK
                    </h4>
                    <p class="text-gray-400">Análise de som avançada com feedback em tempo real para clareza e confiança. Ferramenta visual para explorar nuances e interconexões de palavras, formando uma "Rede Semântica" rica.</p>
                </div>

                <div class="p-6 bg-gray-900/70 rounded-xl shadow-lg border border-indigo-500/50 animate-on-scroll fade-in-up" data-delay="0.3">
                    <h4 class="text-2xl font-semibold mb-2 text-white flex items-center">
                        <span class="text-cyan-400 mr-2">🔄</span> Micro-Learning Sprints & Revisão Inteligente
                    </h4>
                    <p class="text-gray-400">Módulos diários de aprendizado de 2-5 minutos, de alto impacto, que se encaixam na sua rotina. Nosso Sistema de Repetição Espaçada (SRS) agenda a revisão para máxima retenção a longo prazo.</p>
                </div>

                <div class="p-6 bg-gray-900/70 rounded-xl shadow-lg border border-indigo-500/50 animate-on-scroll fade-in-up" data-delay="0.1">
                    <h4 class="text-2xl font-semibold mb-2 text-white flex items-center">
                        <span class="text-green-400 mr-2">🎯</span> Foco Aprimorado & Engajamento
                    </h4>
                    <p class="text-gray-400">Design em Dark Mode para reduzir distrações visuais. IA monitora o engajamento e sugere pausas ou mudanças de atividade para otimizar o foco, especialmente útil para gerenciar TDAH e carga de trabalho.</p>
                </div>

                <div class="p-6 bg-gray-900/70 rounded-xl shadow-lg border border-indigo-500/50 animate-on-scroll fade-in-up" data-delay="0.2">
                    <h4 class="text-2xl font-semibold mb-2 text-white flex items-center">
                        <span class="text-yellow-400 mr-2">📊</span> Dashboards e Relatórios de ROI
                    </h4>
                    <p class="text-gray-400">Visão data-driven da proficiência da sua equipe. Dashboards em tempo real para RH e T&D, mostrando a métrica de fluidez (lag time), proficiência individual e por departamento.</p>
                </div>

                <div class="p-6 bg-gray-900/70 rounded-xl shadow-lg border border-indigo-500/50 animate-on-scroll fade-in-up" data-delay="0.3">
                    <h4 class="text-2xl font-semibold mb-2 text-white flex items-center">
                        <span class="text-red-400 mr-2">⚙️</span> Customização para Sua Empresa
                    </h4>
                    <p class="text-gray-400">O AI Engine pode ser modelado com cenários, jargões e personas específicas da sua empresa, garantindo que o treinamento seja 100% relevante para o seu ambiente de negócios único e a cultura da empresa.</p>
                </div>
            </div>
        </section>

        <!-- 6. CONTACT SECTION (Replaces Customization/ROI for a direct CTA) -->
        <section id="contact" class="py-32 px-6 md:px-24 bg-black/40 border-t border-gray-800">
            <h3 class="text-5xl font-bold mb-4 text-center text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-orange-500 to-red-400 animate-on-scroll fade-in-up">
                Pronto para Elevar Sua Equipe?
            </h3>

            <p class="max-w-4xl mx-auto text-gray-400 text-xl leading-relaxed text-center mb-16 animate-on-scroll fade-in-up">
                Transforme a comunicação de seus profissionais e impulsione os resultados globais com a metodologia LexiPro.
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
        <div class="glitch-text text-xl md:text-2xl font-mono" data-text="© 2024 LexiPro - Acelerando a Performance Global.">
            © 2024 LexiPro - Acelerando a Performance Global.
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

        // Typewriter Effect
        function typewriterEffect(text, element, cursor) {
            // This typewriter logic is adapted from your provided code to handle bold text (**text**)
            let index = 0;
            let output = '';
            const speed = 40; // typing speed in milliseconds

            function step() {
                if (index < text.length) {
                    if (text.substring(index, index + 2) === '**') {
                        // Start of bold
                        const endOfBold = text.indexOf('**', index + 2);
                        if (endOfBold !== -1) {
                            const boldText = text.substring(index + 2, endOfBold);
                            output += `<strong>${boldText}</strong>`;
                            index = endOfBold + 2;
                        } else {
                            output += text[index];
                            index++;
                        }
                    } else {
                        output += text[index];
                        index++;
                    }

                    element.innerHTML = output;
                    setTimeout(step, speed);
                } else {
                    cursor.style.display = 'none';
                }
            }
            // Reset and start
            element.innerHTML = '';
            step();
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
                             // Find the corresponding arrow to rotate it back
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
            // 1. Initial Load Animations
            document.querySelectorAll('.animate-on-load').forEach(el => {
                el.classList.add('loaded');
            });

            // 2. Typewriter Effect (NEW COPY)
            const typewriterElement = document.getElementById('typewriter-text-content');
            const cursorElement = document.getElementById('typewriter-cursor');
            const typewriterContainer = document.getElementById('typewriter-container');

            // New Core Positioning Text:
            const typewriterText = "Seu profissional é de alta performance, mas o inglês cria uma barreira invisível. Investimentos em aulas não resolveram. O LexiPro atua na raiz do problema: transformamos conhecimento em **reflexo comunicativo**.";

            setTimeout(() => {
                typewriterContainer.style.opacity = '1';
                typewriterEffect(typewriterText, typewriterElement, cursorElement);
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

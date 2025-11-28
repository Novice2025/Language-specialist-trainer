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

        /* General Classes for simple fades/slides (retained) */
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

        /* Navbar Styles */
        .navbar {
            background-color: rgba(26, 26, 46, 0.9); /* Semi-transparent dark blue */
            backdrop-filter: blur(10px);
            z-index: 1000;
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
            font-size: 1.5rem;
            font-weight: 500;
            line-height: 1.3;
            color: #C0C0C0;
        }

        /* Hero Section Styles */
        .hero-section {
            padding: 4rem 1.5rem;
            text-align: center;
            min-height: calc(100vh - 4rem - 9rem); /* Adjust based on navbar and introduction height */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            z-index: 10;
        }
        .hero-title {
            font-family: 'Inter', sans-serif;
            font-size: 4.5rem;
            font-weight: 900;
            line-height: 1;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, #FFC0CB, #ADD8E6, #FFC0CB); /* Pink to LightBlue gradient */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 15px rgba(255,192,203,0.7);
        }
        .hero-subtitle {
            font-family: 'Inter', sans-serif;
            font-size: 2.25rem; /* 36px */
            font-weight: 700;
            color: #C0C0C0;
            margin-bottom: 2.5rem;
            text-shadow: 0 0 8px rgba(192,192,192,0.4);
        }
        .hero-description {
            font-family: 'Inter', sans-serif;
            font-size: 1.5rem; /* 24px */
            line-height: 1.6;
            color: #A0A0A0;
            max-width: 800px;
            margin-bottom: 3rem;
        }
        .hero-button {
            display: inline-block;
            background: linear-gradient(45deg, #FF69B4, #BA55D3); /* HotPink to MediumOrchid */
            color: white;
            padding: 1rem 3rem;
            border-radius: 9999px;
            font-weight: 700;
            font-size: 1.25rem;
            text-decoration: none;
            box-shadow: 0 8px 25px rgba(255,105,180,0.4);
            transition: all 0.3s ease;
        }
        .hero-button:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 12px 35px rgba(255,105,180,0.6);
        }

        /* Section 'Voce' Styles */
        .voce-section {
            background-color: #1A1A2E;
            padding: 6rem 1.5rem;
            text-align: center;
        }
        .voce-title {
            font-family: 'Inter', sans-serif;
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 4rem;
            color: #FFC0CB;
            text-shadow: 0 0 10px rgba(255,192,203,0.5);
        }
        .handwriting-text {
            font-family: 'Patrick Hand', cursive;
            font-size: 2.25rem; /* 36px */
            line-height: 1.6;
            color: #ADD8E6; /* LightBlue */
            text-shadow: 0 0 5px rgba(173,216,230,0.7);
            max-width: 900px;
            margin: 0 auto;
        }
        .handwriting-line {
            display: block;
            margin-bottom: 1rem;
        }
        .handwriting-text strong {
            color: #FFC0CB; /* Pink for strong emphasis */
            font-weight: normal; /* To keep Patrick Hand's natural weight */
            text-shadow: 0 0 8px rgba(255,192,203,0.8);
        }
        .handwriting-text u {
            text-decoration-color: #BA55D3; /* MediumOrchid underline */
            text-decoration-thickness: 3px;
        }

        /* Challenge Section Styles */
        .challenge-section {
            background-color: #2A2A4A;
            padding: 6rem 1.5rem;
            text-align: center;
        }
        .challenge-title {
            font-family: 'Inter', sans-serif;
            font-size: 4rem;
            font-weight: 900;
            margin-bottom: 2rem;
            color: #FFD700; /* Gold */
            text-shadow: 0 0 10px rgba(255,215,0,0.5);
        }
        .challenge-subtitle {
            font-family: 'Inter', sans-serif;
            font-size: 2.5rem; /* 40px */
            font-weight: 700;
            color: #FF6347; /* Tomato */
            margin-bottom: 2rem;
            text-shadow: 0 0 8px rgba(255,99,71,0.4);
        }
        .challenge-ia-text {
            font-family: 'Inter', sans-serif;
            font-size: 1.8rem; /* Adjusted for better hierarchy */
            line-height: 1.5;
            color: #E0E0E0;
            max-width: 900px;
            margin: 0 auto;
            text-shadow: 0 0 5px rgba(224,224,224,0.3);
        }

        /* Methodology Section Styles */
        .methodology-section {
            background-color: #1A1A2E;
            padding: 6rem 1.5rem;
            text-align: center;
        }
        .methodology-title {
            font-family: 'Inter', sans-serif;
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 2rem;
            color: #ADD8E6; /* LightBlue */
            text-shadow: 0 0 10px rgba(173,216,230,0.5);
        }
        .methodology-description {
            font-family: 'Inter', sans-serif;
            font-size: 1.3rem;
            line-height: 1.8;
            color: #C0C0C0;
            max-width: 900px;
            margin: 0 auto 3rem auto;
            text-shadow: 0 0 5px rgba(192,192,192,0.2);
        }

        /* Methodology Sub-points */
        .methodology-subtitle {
            font-family: 'Inter', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: #FFC0CB; /* Pink */
            margin-top: 3rem;
            margin-bottom: 1.5rem;
            text-shadow: 0 0 8px rgba(255,192,203,0.6);
        }
        .methodology-point-description {
            font-family: 'Inter', sans-serif;
            font-size: 1.1rem;
            line-height: 1.6;
            color: #A0A0A0;
            max-width: 700px;
            margin: 0 auto 2rem auto;
            text-shadow: 0 0 3px rgba(160,160,160,0.1);
        }
        .highlight-bold {
            font-weight: bold;
            color: #FFD700; /* Gold for strong in description */
        }

        /* Features Section Styles */
        .features-section {
            background-color: #2A2A4A;
            padding: 6rem 1.5rem;
            text-align: center;
        }
        .features-title {
            font-family: 'Inter', sans-serif;
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 4rem;
            color: #ADD8E6;
            text-shadow: 0 0 10px rgba(173,216,230,0.5);
        }
        .feature-card {
            background-color: #3E3E5C;
            border-radius: 1rem;
            padding: 2.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: left;
            height: 100%;
        }
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.6);
        }
        .feature-icon {
            font-size: 3.5rem;
            color: #FFD700;
            margin-bottom: 1.5rem;
            text-shadow: 0 0 10px rgba(255,215,0,0.6);
        }
        .feature-card h3 {
            font-family: 'Inter', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: #FFC0CB;
            margin-bottom: 1rem;
        }
        .feature-card p {
            font-family: 'Inter', sans-serif;
            font-size: 1.1rem;
            line-height: 1.7;
            color: #C0C0C0;
        }

        /* Habilidades Section Styles (Replacing AI Power) */
        .habilidades-section {
            background-color: #1A1A2E;
            padding: 6rem 1.5rem;
            text-align: center;
        }
        .habilidades-title {
            font-family: 'Inter', sans-serif;
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 4rem;
            color: #FFC0CB;
            text-shadow: 0 0 10px rgba(255,192,203,0.5);
        }
        .habilidade-card {
            background-color: #3E3E5C;
            border-radius: 1rem;
            padding: 2.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: left;
            height: 100%;
        }
        .habilidade-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.6);
        }
        .habilidade-card h4 {
            font-family: 'Inter', sans-serif;
            font-size: 1.6rem;
            font-weight: 700;
            color: #ADD8E6;
            margin-bottom: 1rem;
        }
        .habilidade-card ul {
            list-style: none; /* Remove default bullet points */
            padding-left: 0;
            margin-top: 1rem;
        }
        .habilidade-card ul li {
            font-family: 'Inter', sans-serif;
            font-size: 1.1rem;
            line-height: 1.8;
            color: #C0C0C0;
            margin-bottom: 0.5rem;
            padding-left: 1.5rem; /* Indent text */
            position: relative;
        }
        .habilidade-card ul li:before {
            content: '•'; /* Custom bullet */
            color: #FFD700; /* Gold bullet color */
            font-size: 1.25rem;
            position: absolute;
            left: 0;
            top: -2px;
        }

        /* Curriculum Section Styles */
        .curriculum-section {
            background-color: #2A2A4A;
            padding: 6rem 1.5rem;
            text-align: center;
        }
        .curriculum-title {
            font-family: 'Inter', sans-serif;
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 4rem;
            color: #FFD700;
            text-shadow: 0 0 10px rgba(255,215,0,0.5);
        }
        .curriculum-card {
            background-color: #3E3E5C;
            border-radius: 1rem;
            padding: 2.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            text-align: left;
            position: relative;
        }
        .curriculum-card ul {
            list-style-type: disc;
            margin-left: 1.5rem;
            color: #C0C0C0;
        }
        .curriculum-card ul li {
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 0.5rem;
        }
        .curriculum-card h3 {
            font-family: 'Inter', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: #FFC0CB;
            margin-bottom: 1rem;
        }
        .curriculum-btn {
            display: inline-block;
            background: linear-gradient(45deg, #FF69B4, #BA55D3);
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 9999px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            box-shadow: 0 5px 15px rgba(255,105,180,0.3);
            transition: all 0.3s ease;
            margin-top: 1.5rem;
        }
        .curriculum-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255,105,180,0.5);
        }

        /* Contact Section Styles */
        .contact-section {
            background-color: #1A1A2E;
            padding: 6rem 1.5rem;
            text-align: center;
        }
        .contact-title {
            font-family: 'Inter', sans-serif;
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 4rem;
            color: #ADD8E6;
            text-shadow: 0 0 10px rgba(173,216,230,0.5);
        }
        .contact-form-container {
            max-width: 700px;
            margin: 0 auto;
            background-color: #2A2A4A;
            padding: 3.5rem;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }
        .contact-form-container label {
            display: block;
            text-align: left;
            font-family: 'Inter', sans-serif;
            font-size: 1.1rem;
            color: #E0E0E0;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
        .contact-form-container input[type="text"],
        .contact-form-container input[type="email"],
        .contact-form-container textarea {
            width: 100%;
            padding: 1rem;
            margin-bottom: 1.5rem;
            background-color: #1A1A2E;
            border: 1px solid #3E3E5C;
            border-radius: 0.5rem;
            color: #E0E0E0;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .contact-form-container input[type="text"]:focus,
        .contact-form-container input[type="email"]:focus,
        .contact-form-container textarea:focus {
            border-color: #FFC0CB;
            box-shadow: 0 0 0 3px rgba(255,192,203,0.3);
            outline: none;
        }
        .contact-form-container textarea {
            min-height: 120px;
            resize: vertical;
        }
        .contact-form-container button {
            background: linear-gradient(45deg, #FF69B4, #BA55D3);
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 9999px;
            font-weight: 700;
            font-size: 1.1rem;
            border: none;
            cursor: pointer;
            box-shadow: 0 8px 25px rgba(255,105,180,0.4);
            transition: all 0.3s ease;
        }
        .contact-form-container button:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(255,105,180,0.6);
        }

        /* Footer Styles */
        .footer {
            background-color: #0E0E1A;
            padding: 2.5rem 1.5rem;
            text-align: center;
            color: #A0A0A0;
            font-family: 'Inter', sans-serif;
            font-size: 0.9rem;
        }
        .footer a {
            color: #FFC0CB;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .footer a:hover {
            color: #FF69B4;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .navbar-menu-mobile {
                display: flex; /* Always show menu icon on small screens */
            }
            .navbar-links {
                display: none; /* Hide desktop links */
                flex-direction: column;
                background-color: rgba(26, 26, 46, 0.95);
                position: absolute;
                top: 4rem;
                left: 0;
                width: 100%;
                padding: 1rem 0;
                box-shadow: 0 10px 20px rgba(0,0,0,0.5);
            }
            .navbar-links.active {
                display: flex;
            }
            .navbar-links-item {
                padding: 0.75rem 1.5rem;
                text-align: center;
            }
            .introduction-header h1 {
                font-size: 2rem;
            }
            .introduction-header h2 {
                font-size: 1.2rem;
            }
            .hero-title {
                font-size: 3rem;
            }
            .hero-subtitle {
                font-size: 1.5rem;
            }
            .hero-description {
                font-size: 1.1rem;
            }
            .voce-title, .challenge-title, .methodology-title, .features-title, .habilidades-title, .curriculum-title, .contact-title {
                font-size: 2.2rem;
            }
            .handwriting-text {
                font-size: 1.5rem;
            }
            .challenge-subtitle {
                font-size: 1.8rem;
            }
            .challenge-ia-text {
                font-size: 1.1rem;
            }
            .methodology-description, .methodology-point-description, .feature-card p, .habilidade-card ul li, .curriculum-card ul li {
                font-size: 1rem;
            }
            .feature-card h3, .habilidade-card h4, .curriculum-card h3 {
                font-size: 1.4rem;
            }
            .methodology-subtitle {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body class="main-gradient-bg">

    <!-- Navbar -->
    <nav class="navbar fixed top-0 left-0 w-full p-4 flex justify-between items-center shadow-lg">
        <a href="#" class="text-white text-2xl font-bold">RealTalk Daby</a>
        <div class="navbar-menu-mobile md:hidden cursor-pointer" id="mobile-menu-button">
            <i class="fas fa-bars text-white text-2xl"></i>
        </div>
        <div class="navbar-links hidden md:flex space-x-8" id="navbar-links">
            <a href="#hero" class="navbar-links-item text-white hover:text-pink-400 transition-colors duration-300">Início</a>
            <a href="#voce" class="navbar-links-item text-white hover:text-pink-400 transition-colors duration-300">Você</a>
            <a href="#challenge" class="navbar-links-item text-white hover:text-pink-400 transition-colors duration-300">Seu Desafio</a>
            <a href="#methodology" class="navbar-links-item text-white hover:text-pink-400 transition-colors duration-300">Metodologia</a>
            <a href="#features" class="navbar-links-item text-white hover:text-pink-400 transition-colors duration-300">Plataforma</a>
            <a href="#habilidades" class="navbar-links-item text-white hover:text-pink-400 transition-colors duration-300">Habilidades</a>
            <a href="#curriculum" class="navbar-links-item text-white hover:text-pink-400 transition-colors duration-300">Currículo</a>
            <a href="#contact" class="navbar-links-item text-white hover:text-pink-400 transition-colors duration-300">Contato</a>
        </div>
    </nav>

    <div class="introduction-header animate-on-load">
        <h1 class="fade-in-up" style="animation-delay: 0.1s;">ACELERE A PERFORMANCE GLOBAL BY DABY</h1>
        <h2 class="fade-in-up" style="animation-delay: 0.3s;">Fluência como Reflexo, não como Barreira.</h2>
    </div>

    <!-- Hero Section -->
    <section id="hero" class="hero-section text-white relative isolate fade-in-up" style="animation-delay: 0.5s;">
        <h1 class="hero-title">RealTalk Daby</h1>
        <h2 class="hero-subtitle">Comunicação que Decola.</h2>
        <p class="hero-description">Transforme seu Inglês Corporativo em seu maior ativo. Sem esforço. Com impacto.</p>
        <a href="#contact" class="hero-button">Comece Sua Transformação Agora!</a>
    </section>

    <!-- 'Você' Section (Previous handwriting effect section, now static) -->
    <section id="voce" class="voce-section animate-on-scroll">
        <h2 class="voce-title fade-in-up">Você sabe que...</h2>
        <div class="handwriting-text fade-in-up" style="animation-delay: 0.1s;">
            <p class="handwriting-line">Você é um profissional fera no que faz, mas o inglês... 😩</p>
            <p class="handwriting-line">Cansou de investir tempo e dinheiro em cursos que não te trazem resultados REAIS e IMEDIATOS?</p>
            <p class="handwriting-line">Se sente <strong class="keyphrase-effect">travado</strong> em reuniões ou apresentações, mesmo com vocabulário técnico?</p>
            <p class="handwriting-line">O RealTalk Daby te dá a chance de <u>DECIFRAR e TRANSFORMAR esse cenário imediatamente.</u> ✨</p>
        </div>
    </section>

    <!-- Challenge Section (Static content, as requested) -->
    <section id="challenge" class="challenge-section animate-on-scroll">
        <h2 class="challenge-title fade-in-up">Seu Desafio com o Inglês Profissional é Real.</h2>
        <p class="challenge-subtitle fade-in-up" style="animation-delay: 0.2s; color: #FF6347;">INGLÊS NUNCA FOI FÁCIL. 😩</p>
        <p class="challenge-ia-text fade-in-up" style="animation-delay: 0.4s;">
            O tão sonhado fluir em inglês? **É de vez, agora!** ✨ RealTalk Daby no seu ritmo, no seu tempo. 🚀
            <br><br>
            Prepare-se para **alavancar seu inglês e garantir sua posição** num futuro cada vez mais competitivo com a **era da Inteligência Artificial** que se consolida em 3 anos! 🤖💡 Seu domínio do idioma será seu diferencial imbatível. 💪
        </p>
    </section>

    <!-- Methodology Section -->
    <section id="methodology" class="methodology-section animate-on-scroll fade-in-up">
        <h2 class="methodology-title">🧠 O SHIFT REAL TALK DABY: Da Teoria à Competência Instantânea.</h2>
        <p class="methodology-description">
            O RealTalk Daby te tira da teoria: aqui, o foco é na ação, na comunicação imediata, natural e estratégica, para resultados que você vê e sente no dia a dia. Chega de "achismo" ou foco na memorização. Identifica <strong class="highlight-bold">exatamente</strong> onde o profissional trava (vocabulário, estrutura, confiança).
        </p>

        <h3 class="methodology-subtitle">Modo Simulador de Voo</h3>
        <p class="methodology-point-description">
            Treinamento em <strong class="highlight-bold">stress elevado</strong> (negociações críticas, gestão de crise) para que o inglês seja automático em situações de alta pressão e você reaja com fluidez e confiança.
        </p>
    </section>

    <!-- Features (Plataforma) Section -->
    <section id="features" class="features-section animate-on-scroll">
        <h2 class="features-title fade-in-up">🎯 Sua Plataforma RealTalk Daby</h2>
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
            <div class="feature-card fade-in-up">
                <i class="fas fa-brain feature-icon"></i>
                <h3>Preparação psicológica</h3>
                <p>técnicas para aprender e alavancar seu inglês</p>
            </div>
            <div class="feature-card fade-in-up" style="animation-delay: 0.2s;">
                <i class="fas fa-comments feature-icon"></i>
                <h3>Feedback Instantâneo</h3>
                <p>Receba avaliação detalhada sobre sua pronúncia, fluidez e gramática em tempo real.</p>
            </div>
            <div class="feature-card fade-in-up" style="animation-delay: 0.4s;">
                <i class="fas fa-chart-line feature-icon"></i>
                <h3>Métricas de Progresso</h3>
                <p>Acompanhe seu desenvolvimento com dados concretos de fluidez, tempo de reação e uso de estruturas-chave.</p>
            </div>
        </div>
    </section>

    <!-- Habilidades Section (Replaced AI Power) -->
    <section id="habilidades" class="habilidades-section animate-on-scroll">
        <h2 class="habilidades-title fade-in-up">🎓 Estrutura Modular: Habilidades de Liderança Global</h2>
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8 mt-12">
            <div class="habilidade-card fade-in-up">
                <h4>Comunicação Executiva</h4>
                <ul>
                    <li>Negociação de Contratos (Strategic Negotiation)</li>
                    <li>Apresentações de Alto Impacto (High-Impact Presentations)</li>
                    <li>Reuniões Eficazes em Contexto Global (Global Meeting Facilitation)</li>
                </ul>
            </div>
            <div class="habilidade-card fade-in-up" style="animation-delay: 0.2s;">
                <h4>Desenvolvimento de Time</h4>
                <ul>
                    <li>Liderança Remota e Multicultural (Remote & Multicultural Leadership)</li>
                    <li>Feedback Construtivo e Avaliação de Desempenho (Constructive Feedback & Performance Review)</li>
                    <li>Integração de Novos Colaboradores em Times Internacionais (Onboarding for Global Teams)</li>
                </ul>
            </div>
            <div class="habilidade-card fade-in-up" style="animation-delay: 0.4s;">
                <h4>Gestão de Crise e Resolução de Conflitos</h4>
                <ul>
                    <li>Mediação e Resolução de Conflitos (Mediation & Conflict Resolution)</li>
                    <li>Tomada de Decisão em Ambientes Multiculturais (Cross-Cultural Decision Making)</li>
                    <li>Comunicação de Crise (Crisis Communication)</li>
                </ul>
            </div>
            <div class="habilidade-card fade-in-up" style="animation-delay: 0.6s;">
                <h4>Cultural Intelligence (CQ) e Linguagem</h4>
                <ul>
                    <li>Gerenciamento de Diferenças de Sotaque e Jargão (Dialect & Jargon Management)</li>
                    <li>Comunicação Não-Verbal e Etiqueta em Calls (Non-Verbal & Call Etiquette)</li>
                    <li>Adaptação a Estilos de Comunicação Globais (Adapting to Global Communication Styles)</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Curriculum Section (Remaining the same) -->
    <section id="curriculum" class="curriculum-section animate-on-scroll">
        <h2 class="curriculum-title fade-in-up">📈 Seu Caminho Pessoal RealTalk Daby</h2>
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 mt-12">
            <div class="curriculum-card fade-in-up">
                <h3>Módulos Customizáveis</h3>
                <ul>
                    <li>Desenvolvemos módulos de aprendizado que se encaixam perfeitamente às suas necessidades, seja para negociações, apresentações ou reuniões.<br>
                        Seu currículo é mais do que personalizado: é moldado em tempo real com base na sua performance e nos seus desafios mais emergentes.</li>
                </ul>
                <a href="#contact" class="curriculum-btn">Receba sua Avaliação</a>
            </div>
            <div class="curriculum-card fade-in-up" style="animation-delay: 0.2s;">
                <h3>Flexibilidade e Acompanhamento</h3>
                <ul>
                    <li>Sessões agendadas que se adaptam à sua rotina, com a disponibilidade que você precisa.<br>
                        Um ambiente flexível para atender às suas demandas de agenda e localização. Seu tempo é valioso, e nosso método se adapta a ele.</li>
                </ul>
                <a href="#contact" class="curriculum-btn">Agende seu Horário</a>
            </div>
        </div>
    </section>

    <!-- Contact Section (PHP removed from index.php for stability) -->
    <section id="contact" class="contact-section animate-on-scroll">
        <h2 class="contact-title fade-in-up">Fale com a Daby!</h2>
        <div class="contact-form-container fade-in-up">
            <form action="#" method="POST"> <!-- action="#" for static form. For real forms, you'd use a backend script or a service. -->
                <label for="name">Nome Completo:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Seu Melhor Email Profissional:</label>
                <input type="email" id="email" name="email" required>

                <label for="company">Empresa (Opcional):</label>
                <input type="text" id="company" name="company">

                <label for="message">Sua Mensagem / Desafio:</label>
                <textarea id="message" name="message" rows="5" required></textarea>

                <button type="submit">Enviar Mensagem</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 RealTalk Daby. Todos os direitos reservados. | <a href="#privacy">Política de Privacidade</a> | <a href="#terms">Termos de Serviço</a></p>
    </footer>

    <!-- JavaScript for Mobile Menu Toggle and Scroll Animations -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile Menu Toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const navbarLinks = document.getElementById('navbar-links');

            if (mobileMenuButton && navbarLinks) {
                mobileMenuButton.addEventListener('click', function() {
                    navbarLinks.classList.toggle('active');
                });

                // Close menu when a link is clicked
                navbarLinks.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', function() {
                        if (navbarLinks.classList.contains('active')) {
                            navbarLinks.classList.remove('active');
                        }
                    });
                });
            }

            // Scroll Animations
            const animateOnScrollElements = document.querySelectorAll('.animate-on-scroll, .animate-on-load');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const delay = parseFloat(entry.target.dataset.delay) || 0;
                        setTimeout(() => {
                            entry.target.classList.add('loaded');
                        }, delay * 1000);
                        observer.unobserve(entry.target); // Stop observing once animated
                    }
                });
            }, { threshold: 0.1 }); // Trigger when 10% of the element is visible

            animateOnScrollElements.forEach(element => {
                if (element.classList.contains('animate-on-load')) {
                    // For elements that should animate on page load immediately
                    const delay = parseFloat(element.dataset.delay) || 0;
                    setTimeout(() => {
                        element.classList.add('loaded');
                    }, delay * 1000 + 100); // Small initial delay
                } else {
                    // For elements that should animate only when scrolled into view
                    observer.observe(element);
                }
            });

            // Ensure hero section is visible and animated if it's high up
            const heroSection = document.getElementById('hero');
            if (heroSection) {
                setTimeout(() => {
                    heroSection.classList.add('loaded');
                }, 500); // Ensure hero loads after navbar/intro
            }
        });
    </script>
</body>
</html>

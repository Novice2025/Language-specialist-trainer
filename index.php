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
        .typewriter-placeholder {
            display: inline-block;
            overflow: hidden;
            border-right: 3px solid; /* Cursor */
            white-space: nowrap;
            letter-spacing: .15em;
            vertical-align: middle; /* Align with surrounding text */
            opacity: 0; /* Start hidden */
            transition: opacity 0.1s ease-in; /* Quick fade in for the placeholder itself */
        }

        .typewriter-placeholder.typewriter-text-active {
            animation: blink-caret .75s step-end infinite;
            opacity: 1; /* Make visible when active */
        }
        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: #bd93f9; } /* Purple cursor */
        }

        /* Clean Line Text Effect */
        .clean-line-text {
            display: inline-block;
            position: relative;
        }
        .clean-line-text::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px; /* Adjust line position */
            width: 0%;
            height: 3px;
            background-color: #bd93f9; /* Purple line */
            transition: width 1s ease-out; /* Animation duration */
        }
        .clean-line-text.loaded::after {
            animation: draw-line 1s ease-out .2s forwards; /* Use keyframes for better control */
        }
        @keyframes draw-line {
            to { width: 100%; }
        }

        /* Section Styling */
        section {
            padding: 80px 0;
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 1.2s ease-out, transform 1.2s ease-out;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        section.loaded {
            opacity: 1;
            transform: translateY(0);
        }

        /* Specific section backgrounds based on PDF */
        #hero {
            background: linear-gradient(135deg, #1A1A2E 0%, #3a005e 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            overflow: hidden;
            border-bottom: none; /* No border for hero */
        }
        #hero::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
             background: radial-gradient(circle at top left, rgba(189, 147, 249, 0.3) 0%, transparent 40%),
                        radial-gradient(circle at bottom right, rgba(255, 121, 198, 0.3) 0%, transparent 40%);
            animation: gradientShift 20s ease infinite;
            pointer-events: none;
            z-index: 1;
        }
        #hero > * {
            position: relative;
            z-index: 2;
        }

        #challenge {
            background-color: #1a1a2e;
            color: #e0e0e0;
            text-align: center;
            /* Ensura que o container tenha espaço para as frases */
            padding-top: 60px;
            padding-bottom: 60px;
        }

        #methodology {
            background-color: #2a2a4a;
            color: #e0e0e0;
            text-align: center;
        }
        #methodology h2 {
            font-size: 2.8rem;
            color: #8be9fd; /* Azul claro */
            margin-bottom: 20px;
        }
        .section-methodology-title {
            font-size: 2.8rem; /* Use Tailwind's text-4xl equivalent initially */
            color: #8be9fd; /* Light blue accent */
            margin-bottom: 1rem; /* Reduced margin */
            line-height: 1.2; /* Tighter line height for titles */
        }

        #methodology p {
            font-size: 1.25rem;
            color: #c0c0c0;
            max-width: 800px;
            margin: 0 auto 30px auto; /* Reduced margin-top */
            line-height: 1.6;
        }
        #methodology .block {
            margin-bottom: 0px; /* Reduzindo espaço abaixo dos blocos na Metodologia */
        }

        #features {
            background: linear-gradient(135deg, #1a1a2e 0%, #3e3e5c 100%);
            color: #e0e0e0;
            text-align: center;
        }
        #features .feature-card {
            background-color: rgba(62, 62, 92, 0.6); /* Semi-transparent background */
            border: 1px solid rgba(189, 147, 249, 0.3);
            border-radius: 12px;
            padding: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative; /* For the flipping effect */
            height: 100%; /* Ensure cards are same height */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        #features .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
        }

        #curriculum {
            background-color: #2a2a4a;
            color: #e0e0e0;
            text-align: center;
        }
        #curriculum .item {
            background-color: #3e3e5c;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            text-align: left;
            border-left: 5px solid #ff79c6;
            transition: background-color 0.3s ease;
        }
        #curriculum .item:hover {
            background-color: #4a4a6e;
        }
        #curriculum .item h3 {
            color: #8be9fd;
            font-size: 1.5rem;
            margin-bottom: 5px;
        }
        #curriculum .item p {
            color: #c0c0c0;
        }

        #ai-power {
            background: linear-gradient(135deg, #3a005e 0%, #1a1a2e 100%);
            color: #e0e0e0;
            text-align: center;
            overflow: hidden; /* For particles/effects */
            position: relative;
        }
        #ai-power .star-particle {
            position: absolute;
            background-color: #8be9fd; /* Light blue star */
            border-radius: 50%;
            opacity: 0;
            animation: star-fade 3s infinite ease-out;
            pointer-events: none;
            z-index: 1;
        }
        @keyframes star-fade {
            0% { transform: scale(0) translateY(0px); opacity: 0; }
            30% { transform: scale(1) translateY(-20px); opacity: 1; }
            70% { transform: scale(0.8) translateY(-40px); opacity: 0.5; }
            100% { transform: scale(0) translateY(-60px); opacity: 0; }
        }
        #ai-power > * {
            position: relative;
            z-index: 2; /* Content above particles */
        }
        #ai-power h2 {
            font-size: 3rem;
            color: #ff79c6;
            margin-bottom: 25px;
        }
        #ai-power p {
            font-size: 1.3rem;
            max-width: 900px;
            margin: 0 auto 40px auto;
            color: #c0c0c0;
        }
        #ai-power .ai-icon-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 30px;
            max-width: 1000px;
            margin: 0px auto; /* Adjust margin to zero */
        }
        #ai-power .ai-icon-grid .ai-card {
            background-color: rgba(189, 147, 249, 0.2);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, background-color 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            text-align: center;
            min-height: 180px; /* Ensure consistent card height */
        }
        #ai-power .ai-icon-grid .ai-card:hover {
            transform: translateY(-8px);
            background-color: rgba(189, 147, 249, 0.4);
        }
        #ai-power .ai-icon-grid .ai-card i {
            font-size: 3rem;
            color: #8be9fd;
            margin-bottom: 15px;
        }
        #ai-power .ai-icon-grid .ai-card h3 {
            font-size: 1.4rem;
            color: #ff79c6;
            margin-bottom: 10px;
        }
        #ai-power .ai-icon-grid .ai-card p {
            font-size: 1rem;
            color: #d0d0d0;
            margin: 0; /* Override default paragraph margin */
        }

        #contact {
            background-color: #1a1a2e;
            color: #e0e0e0;
            text-align: center;
        }
        #contact .contact-form {
            max-width: 700px;
            margin: 0 auto;
            background-color: #2a2a4a;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5);
        }
        #contact .input-group {
            margin-bottom: 20px;
            text-align: left;
        }
        #contact label {
            display: block;
            margin-bottom: 8px;
            color: #8be9fd;
            font-weight: bold;
        }
        #contact input,
        #contact textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #4a4a6e;
            border-radius: 8px;
            background-color: #3e3e5c;
            color: #e0e0e0;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        #contact input:focus,
        #contact textarea:focus {
            border-color: #bd93f9;
            outline: none;
            box-shadow: 0 0 0 3px rgba(189, 147, 249, 0.3);
        }
        #contact textarea {
            min-height: 120px;
            resize: vertical;
        }
        #contact button {
            background-color: #ff79c6;
            color: #1a1a2e;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        #contact button:hover {
            background-color: #bd93f9;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        footer {
            background-color: #12121e;
            color: #c0c0c0;
            padding: 30px 20px;
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        footer .glitch-text {
            font-size: 1.1rem; /* Smaller for footer */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 3rem;
            }
            .hero-content p {
                font-size: 1.2rem;
            }
            #ai-power .ai-icon-grid {
                grid-template-columns: 1fr;
            }
        }
        @media (max-width: 600px) {
            .handwriting-container {
                font-size: 1.5rem;
            }
            #handwriting-message-container .handwriting-sentence:first-child {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body class="bg-gray-900 text-white">

    <!-- Header / Navigation -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-gray-900 bg-opacity-80 backdrop-blur-sm p-4 shadow-lg">
        <nav class="container mx-auto flex justify-between items-center">
            <a href="#hero" class="text-2xl font-bold text-pink-400">RealTalk Daby</a>
            <ul class="flex space-x-6">
                <li><a href="#challenge" class="text-gray-300 hover:text-pink-400 transition">Seu Desafio</a></li>
                <li><a href="#methodology" class="text-gray-300 hover:text-pink-400 transition">Metodologia</a></li>
                <li><a href="#features" class="text-gray-300 hover:text-pink-400 transition">Plataforma</a></li>
                <li><a href="#curriculum" class="text-gray-300 hover:text-pink-400 transition">Currículo</a></li>
                <li><a href="#ai-power" class="text-gray-300 hover:text-pink-400 transition">Poder da IA</a></li>
                <li><a href="#contact" class="text-gray-300 hover:text-pink-400 transition">Contato</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="hero" class="flex items-center justify-center text-center">
        <div class="hero-content text-white z-20">
            <h1 class="text-5xl md:text-6xl font-extrabold leading-tight text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400 animate-on-load" data-delay="0.1">RealTalk Daby</h1>
            <p class="mt-4 text-2xl md:text-3xl font-light text-gray-300 animate-on-load" data-delay="0.3">Comunicação que Decola.</p>
            <p class="mt-6 text-xl md:text-2xl text-gray-400 animate-on-load" data-delay="0.5">Transforme seu Inglês Corporativo em seu maior ativo. Sem esforço. Com impacto.</p>
            <a href="#challenge" class="mt-10 inline-block bg-pink-500 hover:bg-purple-600 text-white font-bold py-3 px-8 rounded-full shadow-lg transition transform hover:scale-105 animate-on-load" data-delay="0.7">
                Descubra Seu Desafio Aqui!
            </a>
        </div>
    </section>

    <!-- Challenge Section -->
    <section id="challenge" class="animate-on-scroll fade-in-up">
        <div class="container mx-auto px-6 max-w-4xl">
            <h2 class="text-4xl font-extrabold text-white mb-6">Seu Desafio com o Inglês Profissional é Real.</h2>
            <p class="text-2xl md:text-3xl text-red-400 font-extrabold mb-8 animate-on-scroll fade-in-up" data-delay="0.0">
                INGLÊS NUNCA FOI FÁCIL. <span class="emoji-pulse">😩</span>
            </p>
            <p class="text-2xl md:text-3xl text-gray-300 font-extrabold mb-12 animate-on-scroll fade-in-up" data-delay="0.2">
                O tão sonhado fluir em inglês? <strong class="text-pink-400">É de vez, agora!</strong> <span class="emoji-pulse">✨</span> RealTalk Daby no seu ritmo, no seu tempo. <span class="emoji-pulse">🚀</span>
                <br><br>
                Prepare-se para <strong class="text-pink-400">alavancar seu inglês e garantir sua posição</strong> num futuro cada vez mais competitivo com a <strong class="text-pink-400">era da Inteligência Artificial</strong> que se consolida em 3 anos! <span class="emoji-pulse">🤖</span><span class="emoji-pulse">💡</span> Seu domínio do idioma será seu diferencial imbatível. <span class="emoji-pulse">💪</span>
            </p>

            <div id="handwriting-message-container" class="handwriting-container mt-12 opacity-0 transition-opacity duration-1000">
                <!-- Frase 1 (Bloco) -->
                <span class="handwriting-sentence">
                    Você é um profissional fera e de alta performance, mas o inglês ainda é o <strong class="keyphrase-effect">ÓBICE INVISÍVEL / CALCANHAR DE AQUILES</strong> <span class="emoji-pulse">😩</span> que 'trava' seu avanço global? <span class="emoji-pulse">😔</span>
                </span>
                <!-- Frase 2 (Em linha) -->
                <span class="handwriting-sentence">
                    O RealTalk Daby te dá a chance de <span class="typewriter-placeholder" data-original-text="DECIFRAR"></span> e <span class="typewriter-placeholder" data-original-text="TRANSFORMAR"></span> esse cenário imediatamente.
                </span>
                <!-- Frase 3 (Em linha) -->
                <span class="handwriting-sentence">
                    Sua mente se adapta. Seu conhecimento se <strong class="keyphrase-effect">MATERIALIZA</strong> em <strong class="keyphrase-effect">REFLEXO COMUNICATIVO INSTANTÂNEO</strong>. <span class="emoji-pulse">🛑</span>
                </span>
                <!-- Frase 4 (Em linha) -->
                <span class="handwriting-sentence">
                    O resultado? Sua voz no <strong class="clean-line-text">automático, com impacto e sem ruídos</strong>. <span class="emoji-pulse">✨</span>
                </span>
            </div>

        </div>
    </section>

    <!-- Methodology Section -->
    <section id="methodology" class="animate-on-scroll fade-in-up">
        <div class="container mx-auto px-6 max-w-5xl">
            <h2 class="section-methodology-title font-extrabold mb-6">
                🧠 O SHIFT REAL TALK DABY: Da Teoria à Competência Instantânea.
            </h2>
            <p class="text-xl text-gray-300 mb-12">
                <strong class="text-pink-400">O RealTalk Daby treina você em bootcamps</strong>, e converte seu investimento e tempo em resultados concretos em inglês específicos e especializado para seu trabalho/empresa/área. Nossa metodologia exclusiva, o "<strong class="text-pink-400">Lego Chain Block</strong>" (adaptado por RealTalk Daby), tem como objetivo principal eliminar o "<strong class="text-pink-400">lag</strong>" da tradução, garantindo resultados de negócios imediatos e um domínio muito mais próximo do inglês real.
            </p>

            <div class="grid md:grid-cols-2 gap-10">
                <div class="bg-gray-800 p-8 rounded-lg shadow-xl block animate-on-scroll fade-in-up" data-delay="0.1">
                    <h3 class="text-3xl font-bold text-purple-400 mb-4">Comunicação Sem Barreiras</h3>
                    <p class="text-gray-300">Desbloqueie sua fluidez e confiança para interações globais com o método que te faz pensar em inglês.</p>
                </div>
                <div class="bg-gray-800 p-8 rounded-lg shadow-xl block animate-on-scroll fade-in-up" data-delay="0.3">
                    <h3 class="text-3xl font-bold text-pink-400 mb-4">Aprendizado Acelerado</h3>
                    <p class="text-gray-300">Otimize seu tempo com uma metodologia que prioriza a prática ativa e o feedback constante para resultados rápidos.</p>
                </div>
                <div class="bg-gray-800 p-8 rounded-lg shadow-xl block animate-on-scroll fade-in-up" data-delay="0.5">
                    <h3 class="text-3xl font-bold text-teal-400 mb-4">Inglês do Dia a Dia Corporativo</h3>
                    <p class="text-gray-300">Do vocabulário técnico às nuances culturais, prepare-se para o cenário profissional real em qualquer indústria.</p>
                </div>
                <div class="bg-gray-800 p-8 rounded-lg shadow-xl block animate-on-scroll fade-in-up" data-delay="0.7">
                    <h3 class="text-3xl font-bold text-indigo-400 mb-4">Resultados Comprovados</h3>
                    <p class="text-gray-300">Veja seu progresso com métricas claras e sinta a diferença em sua performance e reconhecimento profissional.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section (Platform) -->
    <section id="features" class="animate-on-scroll fade-in-up">
        <div class="container mx-auto px-6 max-w-5xl">
            <h2 class="text-4xl font-extrabold text-white mb-12">A Plataforma Que Te Impulsiona</h2>
            <div class="grid md:grid-cols-3 gap-10">
                <!-- Card 1 -->
                <div class="feature-card col-span-1 animate-on-scroll fade-in-up" data-delay="0.1">
                    <div>
                        <i class="fas fa-brain text-purple-400 text-5xl mb-4"></i>
                        <h3 class="text-3xl font-bold text-purple-400 mb-4">Simulações Realistas</h3>
                        <p class="text-gray-300">Pratique cenários de negócios autênticos com feedback de IA para aprimorar sua comunicação sob pressão.</p>
                    </div>
                </div>
                <!-- Card 2 (Flipping Card) -->
                <div class="flipping-card-container col-span-1 h-auto" id="flipping-card">
                    <div class="feature-card card-face" id="card-front">
                        <div>
                            <i class="fas fa-comments text-pink-400 text-5xl mb-4"></i>
                            <h3 class="text-3xl font-bold text-pink-400 mb-4">Interação por Voz</h3>
                            <p class="text-gray-300">Converse naturalmente com a IA, recebendo correção de pronúncia e entonação em tempo real. Sem julgamentos.</p>
                        </div>
                    </div>
                    <div class="feature-card card-face" id="card-back">
                        <div>
                            <i class="fas fa-code text-teal-400 text-5xl mb-4"></i>
                            <h3 class="text-3xl font-bold text-teal-400 mb-4">"Lego Chain Blocks"</h3>
                            <p class="text-gray-300">Construa seu conhecimento com blocos de vocabulário e estruturas frasais, adaptados ao seu setor e nível.</p>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="feature-card col-span-1 animate-on-scroll fade-in-up" data-delay="0.5">
                    <div>
                        <i class="fas fa-chart-line text-teal-400 text-5xl mb-4"></i>
                        <h3 class="text-3xl font-bold text-teal-400 mb-4">Preparação psicológica</h3>
                        <p class="text-gray-300">técnicas para aprender e alavancar seu inglês</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Curriculum Section -->
    <section id="curriculum" class="animate-on-scroll fade-in-up">
        <div class="container mx-auto px-6 max-w-5xl">
            <h2 class="text-4xl font-extrabold text-white mb-12">Currículo Personalizado</h2>
            <div class="accordion">
                <!-- Nível 1 -->
                <div class="accordion-item animate-on-scroll fade-in-up" data-delay="0.1">
                    <button class="accordion-header flex justify-between items-center w-full py-4 px-6 text-2xl font-semibold text-left text-purple-400 bg-gray-800 rounded-lg shadow-md hover:bg-gray-700 transition">
                        Nível 1: Starter Experience
                        <i class="fas fa-chevron-down transform transition-transform"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="p-6 bg-gray-800 border-t-2 border-purple-..           overflow: hidden;
            border-right: 3px solid; /* Cursor */
            white-space: nowrap;
            letter-spacing: .15em;
            vertical-align: middle; /* Align with surrounding text */
            opacity: 0; /* Start hidden */
            transition: opacity 0.1s ease-in; /* Quick fade in for the placeholder itself */
        }

        .typewriter-placeholder.typewriter-text-active {
            animation: blink-caret .75s step-end infinite;
            opacity: 1; /* Make visible when active */
        }
        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: #bd93f9; } /* Purple cursor */
        }

        /* Clean Line Text Effect */
        .clean-line-text-active { /* Changed class name to distinguish active state */
            display: inline-block;
            position: relative;
        }
        .clean-line-text-active::after { /* Applied to active state */
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px; /* Adjust line position */
            width: 0%;
            height: 3px;
            background-color: #bd93f9; /* Purple line */
            animation: draw-line 1s ease-out forwards; /* Changed to use animation keyframes */
        }
        @keyframes draw-line {
            to { width: 100%; }
        }

        /* Section Styling */
        section {
            padding: 80px 0;
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 1.2s ease-out, transform 1.2s ease-out;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        section.loaded {
            opacity: 1;
            transform: translateY(0);
        }

        /* Specific section backgrounds based on PDF */
        #hero {
            background: linear-gradient(135deg, #1A1A2E 0%, #3a005e 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            overflow: hidden;
            border-bottom: none; /* No border for hero */
        }
        #hero::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
             background: radial-gradient(circle at top left, rgba(189, 147, 249, 0.3) 0%, transparent 40%),
                        radial-gradient(circle at bottom right, rgba(255, 121, 198, 0.3) 0%, transparent 40%);
            animation: gradientShift 20s ease infinite;
            pointer-events: none;
            z-index: 1;
        }
        #hero > * {
            position: relative;
            z-index: 2;
        }

        #challenge {
            background-color: #1a1a2e;
            color: #e0e0e0;
            text-align: center;
            padding-top: 60px;
            padding-bottom: 60px;
        }

        #methodology {
            background-color: #2a2a4a;
            color: #e0e0e0;
            text-align: center;
        }
        #methodology h2 {
            font-size: 2.8rem;
            color: #8be9fd; /* Azul claro */
            margin-bottom: 20px;
        }
        .section-methodology-title {
            font-size: 2.8rem; /* Use Tailwind's text-4xl equivalent initially */
            color: #8be9fd; /* Light blue accent */
            margin-bottom: 1rem; /* Reduced margin */
            line-height: 1.2; /* Tighter line height for titles */
        }

        #methodology p {
            font-size: 1.25rem;
            color: #c0c0c0;
            max-width: 800px;
            margin: 0 auto 30px auto; /* Reduced margin-top */
            line-height: 1.6;
        }
        #methodology .block {
            margin-bottom: 0px; /* Reduzindo espaço abaixo dos blocos na Metodologia */
        }

        #features {
            background: linear-gradient(135deg, #1a1a2e 0%, #3e3e5c 100%);
            color: #e0e0e0;
            text-align: center;
        }
        #features .feature-card {
            background-color: rgba(62, 62, 92, 0.6); /* Semi-transparent background */
            border: 1px solid rgba(189, 147, 249, 0.3);
            border-radius: 12px;
            padding: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative; /* For the flipping effect */
            height: 100%; /* Ensure cards are same height */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        #features .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
        }

        #curriculum {
            background-color: #2a2a4a;
            color: #e0e0e0;
            text-align: center;
        }
        #curriculum .item {
            background-color: #3e3e5c;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            text-align: left;
            border-left: 5px solid #ff79c6;
            transition: background-color 0.3s ease;
        }
        #curriculum .item:hover {
            background-color: #4a4a6e;
        }
        #curriculum .item h3 {
            color: #8be9fd;
            font-size: 1.5rem;
            margin-bottom: 5px;
        }
        #curriculum .item p {
            color: #c0c0c0;
        }

        #ai-power {
            background: linear-gradient(135deg, #3a005e 0%, #1a1a2e 100%);
            color: #e0e0e0;
            text-align: center;
            overflow: hidden; /* For particles/effects */
            position: relative;
        }
        #ai-power .star-particle {
            position: absolute;
            background-color: #8be9fd; /* Light blue star */
            border-radius: 50%;
            opacity: 0;
            animation: star-fade 3s infinite ease-out;
            pointer-events: none;
            z-index: 1;
        }
        @keyframes star-fade {
            0% { transform: scale(0) translateY(0px); opacity: 0; }
            30% { transform: scale(1) translateY(-20px); opacity: 1; }
            70% { transform: scale(0.8) translateY(-40px); opacity: 0.5; }
            100% { transform: scale(0) translateY(-60px); opacity: 0; }
        }
        #ai-power > * {
            position: relative;
            z-index: 2; /* Content above particles */
        }
        #ai-power h2 {
            font-size: 3rem;
            color: #ff79c6;
            margin-bottom: 25px;
        }
        #ai-power p {
            font-size: 1.3rem;
            max-width: 900px;
            margin: 0 auto 40px auto;
            color: #c0c0c0;
        }
        #ai-power .ai-icon-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 30px;
            max-width: 1000px;
            margin: 0px auto; /* Adjust margin to zero */
        }
        #ai-power .ai-icon-grid .ai-card {
            background-color: rgba(189, 147, 249, 0.2);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, background-color 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            text-align: center;
            min-height: 180px; /* Ensure consistent card height */
        }
        #ai-power .ai-icon-grid .ai-card:hover {
            transform: translateY(-8px);
            background-color: rgba(189, 147, 249, 0.4);
        }
        #ai-power .ai-icon-grid .ai-card i {
            font-size: 3rem;
            color: #8be9fd;
            margin-bottom: 15px;
        }
        #ai-power .ai-icon-grid .ai-card h3 {
            font-size: 1.4rem;
            color: #ff79c6;
            margin-bottom: 10px;
        }
        #ai-power .ai-icon-grid .ai-card p {
            font-size: 1rem;
            color: #d0d0d0;
            margin: 0; /* Override default paragraph margin */
        }

        #contact {
            background-color: #1a1a2e;
            color: #e0e0e0;
            text-align: center;
        }
        #contact .contact-form {
            max-width: 700px;
            margin: 0 auto;
            background-color: #2a2a4a;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5);
        }
        #contact .input-group {
            margin-bottom: 20px;
            text-align: left;
        }
        #contact label {
            display: block;
            margin-bottom: 8px;
            color: #8be9fd;
            font-weight: bold;
        }
        #contact input,
        #contact textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #4a4a6e;
            border-radius: 8px;
            background-color: #3e3e5c;
            color: #e0e0e0;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        #contact input:focus,
        #contact textarea:focus {
            border-color: #bd93f9;
            outline: none;
            box-shadow: 0 0 0 3px rgba(189, 147, 249, 0.3);
        }
        #contact textarea {
            min-height: 120px;
            resize: vertical;
        }
        #contact button {
            background-color: #ff79c6;
            color: #1a1a2e;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        #contact button:hover {
            background-color: #bd93f9;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        footer {
            background-color: #12121e;
            color: #c0c0c0;
            padding: 30px 20px;
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        footer .glitch-text {
            font-size: 1.1rem; /* Smaller for footer */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 3rem;
            }
            .hero-content p {
                font-size: 1.2rem;
            }
            #ai-power .ai-icon-grid {
                grid-template-columns: 1fr;
            }
        }
        @media (max-width: 600px) {
            .handwriting-container {
                font-size: 1.5rem;
            }
            #handwriting-message-container .handwriting-sentence:first-child {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body class="bg-gray-900 text-white">

    <!-- Header / Navigation -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-gray-900 bg-opacity-80 backdrop-blur-sm p-4 shadow-lg">
        <nav class="container mx-auto flex justify-between items-center">
            <a href="#hero" class="text-2xl font-bold text-pink-400">RealTalk Daby</a>
            <ul class="flex space-x-6">
                <li><a href="#challenge" class="text-gray-300 hover:text-pink-400 transition">Seu Desafio</a></li>
                <li><a href="#methodology" class="text-gray-300 hover:text-pink-400 transition">Metodologia</a></li>
                <li><a href="#features" class="text-gray-300 hover:text-pink-400 transition">Plataforma</a></li>
                <li><a href="#curriculum" class="text-gray-300 hover:text-pink-400 transition">Currículo</a></li>
                <li><a href="#ai-power" class="text-gray-300 hover:text-pink-400 transition">Poder da IA</a></li>
                <li><a href="#contact" class="text-gray-300 hover:text-pink-400 transition">Contato</a></li>
               </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="hero" class="flex items-center justify-center text-center">
        <div class="hero-content text-white z-20">
            <h1 class="text-5xl md:text-6xl font-extrabold leading-tight text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400 animate-on-load" data-delay="0.1">RealTalk Daby</h1>
            <p class="mt-4 text-2xl md:text-3xl font-light text-gray-300 animate-on-load" data-delay="0.3">Comunicação que Decola.</p>
            <p class="mt-6 text-xl md:text-2xl text-gray-400 animate-on-load" data-delay="0.5">Transforme seu Inglês Corporativo em seu maior ativo. Sem esforço. Com impacto.</p>
            <a href="#challenge" class="mt-10 inline-block bg-pink-500 hover:bg-purple-600 text-white font-bold py-3 px-8 rounded-full shadow-lg transition transform hover:scale-105 animate-on-load" data-delay="0.7">
                Descubra Seu Desafio Aqui!
            </a>
        </div>
    </section>

    <!-- Challenge Section -->
    <section id="challenge" class="animate-on-scroll fade-in-up">
        <div class="container mx-auto px-6 max-w-4xl">
            <h2 class="text-4xl font-extrabold text-white mb-6">Seu Desafio com o Inglês Profissional é Real.</h2>
            <p class="text-2xl md:text-3xl text-red-400 font-extrabold mb-8 animate-on-scroll fade-in-up" data-delay="0.0">
                INGLÊS NUNCA FOI FÁCIL. <span class="emoji-pulse">😩</span>
            </p>
            <p class="text-2xl md:text-3xl text-gray-300 font-extrabold mb-12 animate-on-scroll fade-in-up" data-delay="0.2">
                O tão sonhado fluir em inglês? <strong class="text-pink-400">É de vez, agora!</strong> <span class="emoji-pulse">✨</span> RealTalk Daby no seu ritmo, no seu tempo. <span class="emoji-pulse">🚀</span>
                <br><br>
                Prepare-se para <strong class="text-pink-400">alavancar seu inglês e garantir sua posição</strong> num futuro cada vez mais competitivo com a <strong class="text-pink-400">era da Inteligência Artificial</strong> que se consolida em 3 anos! <span class="emoji-pulse">🤖</span><span class="emoji-pulse">💡</span> Seu domínio do idioma será seu diferencial imbatível. <span class="emoji-pulse">💪</span>
            </p>

            <!-- Este container será populado pelo JavaScript para as animações -->
            <div id="handwriting-message-container" class="handwriting-container mt-12 opacity-0 transition-opacity duration-1000">
                <!-- Frase 1 (Bloco) -->
                <span class="handwriting-sentence">
                    Você é um profissional fera e de alta performance, mas o inglês ainda é o <strong class="keyphrase-effect">ÓBICE INVISÍVEL / CALCANHAR DE AQUILES</strong> <span class="emoji-pulse">😩</span> que 'trava' seu avanço global? <span class="emoji-pulse">😔</span>
                </span>
                <!-- Frase 2 (Em linha) -->
                <span class="handwriting-sentence">
                    O RealTalk Daby te dá a chance de <span class="typewriter-placeholder" data-original-text="DECIFRAR"></span> e <span class="typewriter-placeholder" data-original-text="TRANSFORMAR"></span> esse cenário imediatamente.
                </span>
                <!-- Frase 3 (Em linha) -->
                <span class="handwriting-sentence">
                    Sua mente se adapta. Seu conhecimento se <strong class="keyphrase-effect">MATERIALIZA</strong> em <strong class="keyphrase-effect">REFLEXO COMUNICATIVO INSTANTÂNEO</strong>. <span class="emoji-pulse">🛑</span>
                </span>
                <!-- Frase 4 (Em linha) -->
                <span class="handwriting-sentence">
                    O resultado? Sua voz no <strong class="clean-line-text-active">automático, com impacto e sem ruídos</strong>. <span class="emoji-pulse">✨</span>
                </span>
            </div>

        </div>
    </section>

    <!-- Methodology Section -->
    <section id="methodology" class="animate-on-scroll fade-in-up">
        <div class="container mx-auto px-6 max-w-5xl">
            <h2 class="section-methodology-title font-extrabold mb-6">
                🧠 O SHIFT REAL TALK DABY: Da Teoria à Competência Instantânea.
            </h2>
            <p class="text-xl text-gray-300 mb-12">
                <strong class="text-pink-400">O RealTalk Daby treina você em bootcamps</strong>, e converte seu investimento e tempo em resultados concretos em inglês específicos e especializado para seu trabalho/empresa/área. Nossa metodologia exclusiva, o "<strong class="text-pink-400">Lego Chain Block</strong>" (adaptado por RealTalk Daby), tem como objetivo principal eliminar o "<strong class="text-pink-400">lag</strong>" da tradução, garantindo resultados de negócios imediatos e um domínio muito mais próximo do inglês real.
            </p>

            <div class="grid md:grid-cols-2 gap-10">
                <div class="bg-gray-800 p-8 rounded-lg shadow-xl block animate-on-scroll fade-in-up" data-delay="0.1">
                    <h3 class="text-3xl font-bold text-purple-400 mb-4">Comunicação Sem Barreiras</h3>
                    <p class="text-gray-300">Desbloqueie sua fluidez e confiança para interações globais com o método que te faz pensar em inglês.</p>
                </div>
                <div class="bg-gray-800 p-8 rounded-lg shadow-xl block animate-on-scroll fade-in-up" data-delay="0.3">
                    <h3 class="text-3xl font-bold text-pink-400 mb-4">Aprendizado Acelerado</h3>
                    <p class="text-gray-300">Otimize seu tempo com uma metodologia que prioriza a prática ativa e o feedback constante para resultados rápidos.</p>
                </div>
                <div class="bg-gray-800 p-8 rounded-lg shadow-xl block animate-on-scroll fade-in-up" data-delay="0.5">
                    <h3 class="text-3xl font-bold text-teal-400 mb-4">Inglês do Dia a Dia Corporativo</h3>
                    <p class="text-gray-300">Do vocabulário técnico às nuances culturais, prepare-se para o cenário profissional real em qualquer indústria.</p>
                </div>
                <div class="bg-gray-800 p-8 rounded-lg shadow-xl block animate-on-scroll fade-in-up" data-delay="0.7">
                    <h3 class="text-3xl font-bold text-indigo-400 mb-4">Resultados Comprovados</h3>
                    <p class="text-gray-300">Veja seu progresso com métricas claras e sinta a diferença em sua performance e reconhecimento profissional.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section (Platform) -->
    <section id="features" class="animate-on-scroll fade-in-up">
        <div class="container mx-auto px-6 max-w-5xl">
            <h2 class="text-4xl font-extrabold text-white mb-12">A Plataforma Que Te Impulsiona</h2>
            <div class="grid md:grid-cols-3 gap-10">
                <!-- Card 1 -->
                <div class="feature-card col-span-1 animate-on-scroll fade-in-up" data-delay="0.1">
                    <div>
                        <i class="fas fa-brain text-purple-400 text-5xl mb-4"></i>
                        <h3 class="text-3xl font-bold text-purple-400 mb-4">Simulações Realistas</h3>
                        <p class="text-gray-300">Pratique cenários de negócios autênticos com feedback de IA para aprimorar sua comunicação sob pressão.</p>
                    </div>
                </div>
                <!-- Card 2 (Flipping Card) -->
                <div class="flipping-card-container col-span-1 h-auto" id="flipping-card">
                    <div class="feature-card card-face" id="card-front">
                        <div>
                            <i class="fas fa-comments text-pink-400 text-5xl mb-4"></i>
                            <h3 class="text-3xl font-bold text-pink-400 mb-4">Interação por Voz</h3>
                            <p class="text-gray-300">Converse naturalmente com a IA, recebendo correção de pronúncia e entonação em tempo real. Sem julgamentos.</p>
                        </div>
                    </div>
                    <div class="feature-card card-face" id="card-back">
                        <div>
                            <i class="fas fa-code text-teal-400 text-5xl mb-4"></i>
                            <h3 class="text-3xl font-bold text-teal-400 mb-4">"Lego Chain Blocks"</h3>
                            <p class="text-gray-300">Construa seu conhecimento com blocos de vocabulário e estruturas frasais, adaptados ao seu setor e nível.</p>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="feature-card col-span-1 animate-on-scroll fade-in-up" data-delay="0.5">
                    <div>
                        <i class="fas fa-chart-line text-teal-400 text-5xl mb-4"></i>
                        <h3 class="text-3xl font-bold text-teal-400 mb-4">Preparação psicológica</h3>
                        <p class="text-gray-300">técnicas para aprender e alavancar seu inglês</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Curriculum Section -->
    <section id="curriculum" class="animate-on-scroll fade-in-up">
        <div class="container mx-auto px-6 max-w-5xl">
            <h2 class="text-4xl font-extrabold text-white mb-12">Currículo Personalizado</h2>
            <div class="accordion">
                <!-- Nível 1 -->
                <div class="accordion-item animate-on-scroll fade-in-up" data-delay="0.1">
                    <button class="accordion-header flex justify-between items-center w-full py-4 px-6 text-2xl font-semibold text-left text-purple-400 bg-gray-800 rounded-lg shadow-md hover:bg-gray-700 transition">
                        Nível 1: Starter Experience
                        <i class="fas fa-chevron-down transform transition-transform"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="p-6 bg-gray-800 border-t-2 border-purple-400 rounded-b-lg">
                            <h4 class="text-xl font-bold text-pink-300 mb-2">Fundamentos Essenciais</h4>
                            <p class="text-gray-300 mb-4">Aprenda as estruturas básicas e o vocabulário fundamental para começar a se comunicar com confiança em contextos profissionais simples.</p>
                            <ul class="list-disc list-inside text-gray-400 space-y-2">
                                <li>Formação de frases básicas para apresentações.</li>
                                <li>Vocabulário de escritório e interações cotidianas.</li>
                                <li>Noções de pronúncia e entonação.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Nível 2 -->
                <div class="accordion-item animate-on-scroll fade-in-up" data-delay="0.3">
                    <button class="accordion-header flex justify-between items-center w-full py-4 px-6 text-2xl font-semibold text-left text-pink-400 bg-gray-800 rounded-lg shadow-md hover:bg-gray-700 transition">
                        Nível 2: Business Core
                        <i class="fas fa-chevron-down transform transition-transform"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="p-6 bg-gray-800 border-t-2 border-pink-400 rounded-b-lg">
                            <h4 class="text-xl font-bold text-teal-300 mb-2">Comunicação Corporativa</h4>
                            <p class="text-gray-300 mb-4">Desenvolva habilidades para reuniões, e-mails e conversas mais complexas, focando na clareza e persuasão.</p>
                            <ul class="list-disc list-inside text-gray-400 space-y-2">
                                <li>Participação ativa em reuniões e discussões.</li>
                                <li>Redação de e-mails e relatórios eficazes.</li>
                                <li>Vocabulário de negociação e resolução de problemas.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Nível 3 -->
                <div class="accordion-item animate-on-scroll fade-in-up" data-delay="0.5">
                    <button class="accordion-header flex justify-between items-center w-full py-4 px-6 text-2xl font-semibold text-left text-teal-400 bg-gray-800 rounded-lg shadow-md hover:bg-gray-700 transition">
                        Nível 3: Advanced Leadership
                        <i class="fas fa-chevron-down transform transition-transform"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="p-6 bg-gray-800 border-t-2 border-teal-400 rounded-b-lg">
                            <h4 class="text-xl font-bold text-indigo-300 mb-2">Liderança e Estratégia</h4>
                            <p class="text-gray-300 mb-4">Domine apresentações, negociações complexas e a arte de influenciar em inglês, com fluidez e naturalidade.</p>
                            <ul class="list-disc list-inside text-gray-400 space-y-2">
                                <li>Apresentações de alto impacto e storytelling.</li>
                                <li>Estratégias avançadas de negociação internacional.</li>
                                <li>Debate e argumentação em inglês.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- AI Power Section -->
    <section id="ai-power" class="animate-on-scroll fade-in-up">
        <div class="container mx-auto px-6 max-w-5xl">
            <h2 class="text-4xl font-extrabold mb-8 text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400">
                O Poder da <strong class="rainbow-text">INTELIGÊNCIA ARTIFICIAL</strong> ao Seu Lado
            </h2>
            <p class="text-xl text-gray-300 mb-12">
                 Transforme sua jornada de aprendizado com o poder da IA. Sem erros, sem medo, apenas <strong class="focus-pulse text-pink-400">progresso real e contínuo</strong>.
            </p>

            <div class="ai-icon-grid">
                <div class="ai-card animate-on-scroll fade-in-up" data-delay="0.1">
                    <i class="fas fa-robot"></i>
                    <h3>Feedback Instantâneo</h3>
                    <p>Correção de pronúncia, gramática e fluidez em tempo real, 24/7.</p>
                </div>
                <div class="ai-card animate-on-scroll fade-in-up" data-delay="0.3">
                    <i class="fas fa-headset"></i>
                    <h3>Tutoria Personalizada</h3>
                    <p>Aulas adaptadas ao seu ritmo e focadas nas suas maiores dificuldades.</p>
                </div>
                <div class="ai-card animate-on-scroll fade-in-up" data-delay="0.5">
                    <i class="fas fa-lightbulb"></i>
                    <h3>Contexto Inteligente</h3>
                    <p>A IA entende seu setor e te oferece vocabulário e cenários relevantes.</p>
                </div>
                <div class="ai-card animate-on-scroll fade-in-up" data-delay="0.7">
                    <i class="fas fa-chart-line"></i>
                    <h3>Análise de Progresso</h3>
                    <p>Métricas detalhadas para você ver sua evolução e identificar pontos de melhoria.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="animate-on-scroll fade-in-up">
        <div class="container mx-auto px-6 max-w-3xl">
            <h2 class="text-4xl font-extrabold text-white mb-8">Fale Conosco</h2>
            <p class="text-xl text-gray-300 mb-12">Quer saber como o RealTalk Daby pode transformar sua carreira ou sua equipe? Entre em contato agora!</p>
            <div class="contact-form">
                <div class="input-group">
                    <label for="name">Nome Completo</label>
                    <input type="text" id="name" placeholder="Seu nome" class="bg-gray-700">
                </div>
                <div class="input-group">
                    <label for="email">Email Corporativo</label>
                    <input type="email" id="email" placeholder="seu.email@empresa.com" class="bg-gray-700">
                </div>
                <div class="input-group">
                    <label for="message">Sua Mensagem</label>
                    <textarea id="message" rows="5" placeholder="Quais são seus desafios ou objetivos com o inglês?" class="bg-gray-700"></textarea>
                </div>
                <button type="submit">Enviar Mensagem</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center text-gray-500">
        <p class="glitch-text" data-text="Construído com Inovação e Foco em Resultados Corporativos por RealTalk Daby.">Construído com Inovação e Foco em Resultados Corporativos por RealTalk Daby.</p>
        <p class="mt-2">&copy; 2025 RealTalk Daby. Todos os direitos reservados.</p>
    </footer>

    <!-- FontAwesome for Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- JavaScript para Scroll Animations e Animação de Escrita à Mão -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Scroll Animations (Fade-in-up)
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

            // Lógica do Accordion (Currículo)
            const accordionHeaders = document.querySelectorAll('.accordion-header');
            accordionHeaders.forEach(header => {
                header.addEventListener('click', () => {
                    const content = header.nextElementSibling;
                    const icon = header.querySelector('i');

                    // Fecha todos os outros accordions e remove a classe 'active'
                    accordionHeaders.forEach(otherHeader => {
                        if (otherHeader !== header) {
                            otherHeader.nextElementSibling.classList.remove('active');
                            otherHeader.querySelector('i').classList.remove('rotate-180');
                        }
                    });

                    // Alterna o accordion clicado
                    content.classList.toggle('active');
                    icon.classList.toggle('rotate-180');
                });
            });


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
                        placeholder.textContent = ''; // Limpa o texto real para o typewriter
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
                    const cleanLineTexts = currentSentenceElement.querySelectorAll('.clean-line-text-active'); // Usar a classe correta
                    cleanLineTexts.forEach(el => {
                        el.style.animation = 'draw-line 1s ease-out forwards'; // Reativa animação de linha
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
                            }, 500); // Pequeno atraso após as frases fixas aparecerem
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

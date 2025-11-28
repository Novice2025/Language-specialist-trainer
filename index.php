<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RealTalk Daby (Corporate Edition)</title>
    <!-- Tailwind CSS CDN (para classes utilitárias) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom Fonts: Inter (main), Patrick Hand (for handwriting style) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <!-- FontAwesome para ícones (carregados estaticamente) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        /* Base Styling & Font */
        body { font-family: 'Inter', sans-serif; background-color: #1A1A2E; color: #E0E0E0; overflow-x: hidden; scroll-behavior: smooth; }

        /* Estilos base dos gradientes, sem animações JS */
        .main-gradient-bg {
            background: linear-gradient(-45deg, #2a2a4a, #3e3e5c, #5c3e5c, #4a2a4a);
            background-size: 400% 400%;
        }

        /* Introduction Header Styles */
        .introduction-header {
            padding: 5rem 1.5rem 3rem;
            text-align: center;
            background: linear-gradient(-45deg, #3e3e5c, #2a2a4a);
            color: #E0E0E0;
            margin-top: 4rem; /* Below fixed navbar */
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
            padding-top: 4rem; /* Adjust for fixed navbar */
        }
        #hero .hero-title {
            font-size: 4rem;
            font-weight: 900;
            background: linear-gradient(90deg, #FF79C6, #BD93F9);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1;
            margin-bottom: 1rem;
        }
        #hero .hero-subtitle {
            font-size: 2.5rem;
            color: #8BE9FD; /* Cyan */
            font-style: italic;
            margin-bottom: 1.5rem;
        }
        #hero p {
            font-size: 1.5rem;
            color: #C0C0C0;
            max-width: 700px;
            margin: 0 auto 2.5rem auto;
        }
        #hero .hero-button {
            background-color: #BD93F9;
            color: #1A1A2E;
            padding: 0.8rem 2.5rem;
            border-radius: 9999px;
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
            display: inline-block;
        }
        #voce .voce-phrase .emoji {
            display: inline-block;
            vertical-align: middle;
            margin: 0 5px;
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
        #habilidades { background-color: #2a2a4a; } /* Updated from AI Power */
        #contact { background-color: #1a1a2e; }

        /* Navbar Specific */
        nav { background-color: rgba(26, 26, 46, 0.9); backdrop-filter: blur(8px); }
        nav a:hover, nav button:hover { color: #FF79C6; }
        #navbar-links.active { display: flex; flex-direction: column; } /* For mobile menu state */

        /* Methodology section adjustments for spacing */
        #methodology .section-methodology-title { margin-bottom: 1.5rem; line-height: 1.2; }
        #methodology p { margin-top: 0.5rem; margin-bottom: 2.5rem; font-size: 1.1rem; }
        #methodology .block { margin-bottom: 2rem; }

        /* General Card Styles for various sections */
        .feature-card, .methodology-card, .habilidade-card, .curriculum-card { 
            background-color: #2A2A4A; 
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%; /* Ensure consistent height */
            display: flex;
            flex-direction: column;
            justify-content: flex-start; /* Aligns content to top */
        }
        .feature-card:hover, .methodology-card:hover, .habilidade-card:hover, .curriculum-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.5);
        }
        .feature-card h3, .methodology-card h3, .habilidade-card h3, .curriculum-card h3 { color: #FF79C6; font-size: 1.8rem; margin-bottom: 1rem; }
        .feature-card p, .methodology-card p, .habilidade-card p, .curriculum-card p { color: #C0C0C0; font-size: 1rem; }
        .habilidade-card ul { list-style: none; padding-left: 0; margin-top: 1rem; }
        .habilidade-card ul li { font-size: 1.1rem; line-height: 1.8; color: #C0C0C0; margin-bottom: 0.5rem; padding-left: 1.5rem; position: relative; text-align: left;}
        .habilidade-card ul li:before { content: '•'; color: #FFD700; font-size: 1.25rem; position: absolute; left: 0; top: -2px; }

        /* Curriculum Section specific */
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
            max-height: 500px; 
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
        .footer { background-color: #12121e; padding: 2rem 1rem; border-top: 1px solid #2a2a4a; text-align: center; color: #c0c0c0; }
        .footer p { font-size: 0.85rem; }
        .footer a { color: #8be9fd; text-decoration: none; transition: color 0.3s ease; }
        .footer a:hover { color: #ff79c6; }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .introduction-header h1 { font-size: 2rem; }
            .introduction-header h2 { font-size: 1.2rem; }
            .hero-title { font-size: 3rem; }
            .hero-subtitle { font-size: 1.5rem; }
            .hero-description { font-size: 1.1rem; }
            #voce h2, .challenge-title, .methodology-title, .features-title, .habilidades-title, .curriculum-title, .contact-title { font-size: 2.2rem; }
            .handwriting-text { font-size: 1.5rem; }
            .challenge-subtitle { font-size: 1.8rem; }
            .challenge-ia-text { font-size: 1.1rem; }
            .methodology-description, .methodology-point-description, .feature-card p, .habilidade-card ul li, .curriculum-card ul li { font-size: 1rem; }
            .feature-card h3, .habilidade-card h3, .curriculum-card h3 { font-size: 1.4rem; }
            .methodology-subtitle { font-size: 1.5rem; }

            /* Mobile menu */
            .navbar-links {
                display: none; /* Hidden by default */
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
            .navbar-links a {
                padding: 0.75rem 1.5rem;
                text-align: center;
            }
        }
    </style>
</head>
<body class="main-gradient-bg">

    <!-- Navbar -->
    <nav class="navbar fixed top-0 left-0 w-full p-4 flex justify-between items-center shadow-lg">
        <a href="#hero" class="text-white text-2xl font-bold">RealTalk Daby</a>
        <div class="md:hidden">
            <button id="mobile-menu-button" class="text-gray-300 focus:outline-none">
                <i class="fas fa-bars text-lg"></i> <!-- Ícone de menu hambúrguer -->
            </button>
        </div>
        <div id="navbar-links" class="hidden md:flex space-x-6">
            <a href="#hero" class="text-gray-300 hover:text-pink-400 transition-colors">Início</a>
            <a href="#voce" class="text-gray-300 hover:text-pink-400 transition-colors">Você</a>
            <a href="#challenge" class="text-gray-300 hover:text-pink-400 transition-colors">Desafio</a>
            <a href="#methodology" class="text-gray-300 hover:text-pink-400 transition-colors">Metodologia</a>
            <a href="#features" class="text-gray-300 hover:text-pink-400 transition-colors">Plataforma</a>
            <a href="#habilidades" class="text-gray-300 hover:text-pink-400 transition-colors">Habilidades</a>
            <a href="#curriculum" class="text-gray-300 hover:text-pink-400 transition-colors">Currículo</a>
            <a href="#contact" class="text-gray-300 hover:text-pink-400 transition-colors">Contato</a>
        </div>
    </nav>

    <!-- Introduction Header Section -->
    <div class="introduction-header">
        <h1>ACELERE A PERFORMANCE GLOBAL BY DABY</h1>
        <h2>Fluência como Reflexo, não como Barreira.</h2>
    </div>

    <!-- Hero Section -->
    <section id="hero" class="hero-section">
        <div class="container mx-auto px-6 max-w-4xl">
            <h1 class="hero-title">RealTalk Daby</h1>
            <h2 class="hero-subtitle">Comunicação que Decola.</h2>
            <p class="hero-description">Transforme seu Inglês Corporativo em seu maior ativo. Sem esforço. Com impacto.</p>
            <a href="#contact" class="hero-button">Comece Sua Transformação Agora!</a>
        </div>
    </section>

    <!-- 'Você' Section (Previously animated, now static and visible) -->
    <section id="voce" class="voce-section">
        <h2 class="voce-title">Você sabe que...</h2>
        <div id="voce-content" class="handwriting-text">
            <p class="voce-phrase">
                Você é um profissional <strong class="highlight">fera e de alta performance</strong>, mas o inglês ainda é o <strong class="highlight">[ÓBICE INVISÍVEL]/[CALCANHAR DE AQUILES]</strong> <span class="emoji">😩</span> que 'trava' seu avanço global? <span class="emoji">😔</span></p>
            <p class="voce-phrase">
                O RealTalk Daby te dá a chance de <strong class="highlight">DECIFRAR</strong> e <strong class="highlight">TRANSFORMAR</strong> esse cenário imediatamente.
            </p>
            <p class="voce-phrase">
                Sua mente se adapta. Seu conhecimento se <strong class="highlight">MATERIALIZA</strong> em <strong class="highlight">REFLEXO COMUNICATIVO INSTANTÂNEO</strong>. <span class="emoji">🛑</span>
            </p>
            <p class="voce-phrase">
                O resultado? Sua voz no <span class="underline-effect">automático, com impacto e sem ruídos</span>. <span class="emoji">✨</span>
            </p>
        </div>
    </section>

    <!-- Challenge Section (Static content, as requested) -->
    <section id="challenge" class="challenge-section">
        <h2 class="challenge-title">Seu Desafio com o Inglês Profissional é Real.</h2>
        <p class="challenge-subtitle">INGLÊS NUNCA FOI FÁCIL. 😩</p>
        <p class="challenge-ia-text">
            O tão sonhado fluir em inglês? **É de vez, agora!** ✨ RealTalk Daby no seu ritmo, no seu tempo. 🚀
            <br><br>
            Prepare-se para **alavancar seu inglês e garantir sua posição** num futuro cada vez mais competitivo com a **era da Inteligência Artificial** que se consolida em 3 anos! 🤖💡 Seu domínio do idioma será seu diferencial imbatível. 💪
        </p>
    </section>

    <!-- Methodology Section (Updated with new content) -->
    <section id="methodology" class="methodology-section">
        <h2 class="methodology-title">🧠 O SHIFT REAL TALK DABY: Da Teoria à Competência Instantânea.</h2>
            <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
                <!-- Box 1: Simulador de Cenários Dinâmicos e Reais -->
                <div class="methodology-card">
                    <h3>Simulador de Cenários Dinâmicos e Reais</h3>
                    <p>O profissional é qualificado para seu cargo, mas o inglês não acompanha – isso abala... vamos resolver!</p>
                </div>
                <!-- Box 2: Análise Preditiva de Gaps -->
                <div class="methodology-card">
                    <h3>Análise Preditiva de Gaps</h3>
                    <p>Mede a <strong class="highlight-bold">velocidade de processamento</strong>, não a memorização. Identifica *exatamente* onde o profissional trava (vocabulário, estrutura, confiança).</p>
                </div>
                <!-- Box 3: Modo Simulador de Voo -->
                <div class="methodology-card">
                    <h3>Modo Simulador de Voo</h3>
                    <p>Treinamento em <strong class="highlight-bold">stress elevado</strong> (negociações críticas, gestão de crise) para que o inglês seja automático em situações de alta pressão.</p>
                </div>
                <!-- Box 4: Meu compromisso: Capacidades dos Produtos (se houver uma descrição para este item, adicione aqui) -->
                <div class="methodology-card">
                    <h3>Meu compromisso: Capacidades dos Produtos</h3>
                    <p>Descubra como cada funcionalidade dos nossos produtos foi desenhada para aprimorar o seu desempenho.</p>
                </div>
            </div>
    </section>

    <!-- Features (Plataforma) Section -->
    <section id="features" class="features-section">
        <h2 class="features-title">🎯 Sua Plataforma RealTalk Daby</h2>
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
            <div class="feature-card">
                <i class="fas fa-brain feature-icon"></i>
                <h3>Preparação psicológica</h3>
                <p>técnicas para aprender e alavancar seu inglês</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-comments feature-icon"></i>
                <h3>Feedback Instantâneo</h3>
                <p>Receba avaliação detalhada sobre sua pronúncia, fluidez e gramática em tempo real.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-chart-line feature-icon"></i>
                <h3>Métricas de Progresso</h3>
                <p>Acompanhe seu desenvolvimento com dados concretos de fluidez, tempo de reação e uso de estruturas-chave.</p>
            </div>
        </div>
    </section>

    <!-- Habilidades Section (Replaced AI Power) -->
    <section id="habilidades" class="habilidades-section">
        <h2 class="habilidades-title">🎓 Estrutura Modular: Habilidades de Liderança Global</h2>
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8 mt-12">
            <div class="habilidade-card">
                <h4>Comunicação de Liderança e Gestão (Mesa Diretora)</h4>
                <ul>
                    <li>Condução de Reuniões de Alto Impacto (Agenda Setting).</li>
                    <li>Feedback Construtivo e Gestão de Conflitos Cross-Cultural.</li>
                    <li>Comunicação Estratégica para C-Level.</li>
                </ul>
            </div>
            <div class="habilidade-card">
                <h4>Proficiência em Vendas e Negociação (Fechamento de Negócios)</h4>
                <ul>
                    <li>Pitching de Vendas (Adaptação a Diferentes Culturas).</li>
                    <li>Resposta Rápida a Objeções Complexas.</li>
                    <li>Linguagem de Acordo e Fechamento (Deal Closing).</li>
                </ul>
            </div>
            <div class="habilidade-card">
                <h4>Apresentação Técnica e de Dados (Clareza e Precisão)</h4>
                <ul>
                    <li>Explicação de Processos Complexos e Fluxos de Trabalho.</li>
                    <li>Vocabulário para Gráficos, KPI's e Projeções Financeiras.</li>
                    <li>Redação Técnica (E-mails e Relatórios Executivos).</li>
                </ul>
            </div>
            <div class="habilidade-card">
                <h4>Integração e Alinhamento Cultural (Onboarding Global)</h4>
                <ul>
                    <li>Integração de Novos Colaboradores em Times Internacionais.</li>
                    <li>Gerenciamento de Diferenças de Sotaque e Jargão (Dialect Training).</li>
                    <li>Comunicação Não-Verbal e Etiqueta em Calls.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Curriculum Section (Remaining the same) -->
    <section id="curriculum" class="curriculum-section">
        <h2 class="curriculum-title">📈 Seu Caminho Pessoal RealTalk Daby</h2>
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 mt-12">
            <div class="curriculum-card">
                <h3>Módulos Customizáveis</h3>
                <ul>
                    <li>Desenvolvemos módulos de aprendizado que se encaixam perfeitamente às suas necessidades, seja para negociações, apresentações ou reuniões.<br>
                        Seu currículo é mais do que personalizado: é moldado em tempo real com base na sua performance e nos seus desafios mais emergentes.</li>
                </ul>
                <a href="#contact" class="curriculum-btn">Receba sua Avaliação</a>
            </div>
            <div class="curriculum-card">
                <h3>Flexibilidade e Acompanhamento</h3>
                <ul>
                    <li>Sessões agendadas que se adaptam à sua rotina, com a disponibilidade que você precisa.<br>
                        Um ambiente flexível para atender às suas demandas de agenda e localização. Seu tempo é valioso, e nosso método se adapta a ele.</li>
                </ul>
                <a href="#contact" class="curriculum-btn">Agende seu Horário</a>
            </div>
        </div>
    </section>

    <!-- Contact Section (PHP removed for index.php stability, now simple HTML form) -->
    <section id="contact" class="contact-section">
        <h2 class="contact-title">Fale com a Daby!</h2>
        <div class="contact-form-container">
            <form action="#" method="POST">
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

    <!-- Pequeno script para menu mobile (apenas toggle de classe) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
        });
    </script>
</body>
</html>

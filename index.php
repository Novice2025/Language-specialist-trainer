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
        body { font-family: 'Inter', sans-serif; }
        .font-patrick-hand { font-family: 'Patrick Hand', cursive; }

        /* Custom Dark Mode Gradient Backgrounds */
        .bg-gradient-dark-1 { background-image: linear-gradient(to bottom, #1A1A2E, #2A2A40); }
        .bg-gradient-dark-2 { background-image: linear-gradient(to bottom, #2A2A40, #1A1A2E); }
        .bg-gradient-dark-3 { background-image: linear-gradient(to bottom, #1A1A2E, #2A2A40); }

        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #1a1a2e; }
        ::-webkit-scrollbar-thumb { background: #6a0dad; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #8a2be2; }

        /* Navbar active link (if JS fails, will not show, but good to have) */
        .nav-link.active { border-bottom: 2px solid #8BE9FD; }

        /* Hide mobile menu content by default for JS fallback */
        #mobile-menu-content { display: none; }

        /* Specific styles for card in 'Você' section */
        .voce-card {
            display: flex;
            align-items: flex-start; /* Align icon and text to the top */
            gap: 1rem;
            background-color: rgba(42, 42, 64, 0.7); /* Even darker card bg */
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(139, 233, 253, 0.2); /* Subtle border for accent */
        }
        .voce-card svg {
            color: #8BE9FD; /* Cyan icon */
            min-width: 24px;
            font-size: 1.5rem;
            margin-top: 0.25rem;
        }

        /* Responsive adjustments for headline sizes in hero */
        @media (max-width: 768px) {
            .hero-title { font-size: 2.5rem !important; } /* Adjust for smaller screens */
            .hero-subtitle { font-size: 1.25rem !important; margin-top: 0.5rem !important; }
            .hero-description { font-size: 1rem !important; margin-top: 1rem !important; }
            .hero-headline { font-size: 1.75rem !important; margin-top: 1.5rem !important; }
        }
    </style>
</head>
<body class="bg-[#1A1A2E] text-gray-100">

    <!-- Navbar -->
    <nav class="navbar fixed top-0 left-0 w-full bg-[#1e1e2d] bg-opacity-95 shadow-lg z-50 py-4 px-6">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#hero" class="text-2xl font-bold text-white tracking-wider">RealTalk Daby</a>

            <!-- Desktop Nav Links -->
            <div id="desktop-navbar-links" class="hidden md:flex space-x-8">
                <a href="#about" class="nav-link text-white hover:text-[#8BE9FD] transition duration-300">Sobre</a>
                <a href="#voce" class="nav-link text-white hover:text-[#8BE9FD] transition duration-300">Você</a>
                <a href="#challenge" class="nav-link text-white hover:text-[#8BE9FD] transition duration-300">Seu Desafio</a>
                <a href="#methodology" class="nav-link text-white hover:text-[#8BE9FD] transition duration-300">Metodologia</a>
                <a href="#features" class="nav-link text-white hover:text-[#8BE9FD] transition duration-300">Plataforma</a>
                <a href="#habilidades" class="nav-link text-white hover:text-[#8BE9FD] transition duration-300">Habilidades</a>
                <a href="#curriculum" class="nav-link text-white hover:text-[#8BE9FD] transition duration-300">Currículo</a>
                <a href="#contact" class="nav-link text-white hover:text-[#8BE9FD] transition duration-300">Contato</a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-white focus:outline-none">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Content -->
        <div id="mobile-menu-content" class="md:hidden bg-[#1e1e2d] py-4 mt-4 shadow-lg">
            <a href="#about" class="block px-6 py-2 text-white hover:bg-[#2A2A40] transition duration-300">Sobre</a>
            <a href="#voce" class="block px-6 py-2 text-white hover:bg-[#2A2A40] transition duration-300">Você</a>
            <a href="#challenge" class="block px-6 py-2 text-white hover:bg-[#2A2A40] transition duration-300">Seu Desafio</a>
            <a href="#methodology" class="block px-6 py-2 text-white hover:bg-[#2A2A40] transition duration-300">Metodologia</a>
            <a href="#features" class="block px-6 py-2 text-white hover:bg-[#2A2A40] transition duration-300">Plataforma</a>
            <a href="#habilidades" class="block px-6 py-2 text-white hover:bg-[#2A2A40] transition duration-300">Habilidades</a>
            <a href="#curriculum" class="block px-6 py-2 text-white hover:bg-[#2A2A40] transition duration-300">Currículo</a>
            <a href="#contact" class="block px-6 py-2 text-white hover:bg-[#2A2A40] transition duration-300">Contato</a>
        </div>
    </nav>

    <!-- Header Introduction Section -->
    <section id="about" class="bg-gradient-dark-1 pt-32 pb-16 text-center">
        <div class="container mx-auto px-6">
            <h1 class="text-3xl md:text-5xl font-extrabold leading-tight tracking-tight text-[#FFD700]">ACELERE A PERFORMANCE GLOBAL BY DABY</h1>
            <p class="mt-4 text-xl md:text-2xl font-light text-[#BD93F9]">Fluência como Reflexo, não como Barreira.</p>
        </div>
    </section>

    <!-- Hero Section -->
    <section id="hero" class="bg-gradient-dark-2 py-20 md:py-32 text-center relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <p class="text-base md:text-lg font-bold text-[#FF79C6] mb-4 uppercase tracking-widest">RealTalk Daby</p>
            <h2 class="hero-title text-4xl md:text-6xl font-extrabold leading-tight mb-4 text-white">Comunicação que Decola.</h2>
            <h3 class="hero-subtitle text-2xl md:text-3xl font-semibold mb-6 text-[#8BE9FD]">Inglês específico para profissionais Brasileiros</h3>
            <p class="hero-description md:text-xl font-light max-w-3xl mx-auto text-gray-300 mb-10">Transforme seu Inglês Corporativo em seu maior ativo. Sem esforço. Com impacto.</p>
            <a href="#contact" class="inline-block bg-[#FF79C6] text-[#1A1A2E] font-bold py-3 px-8 rounded-full shadow-lg hover:bg-[#BD93F9] transform hover:scale-105 transition duration-300 ease-in-out uppercase text-lg tracking-wide">Comece Sua Transformação Agora!</a>
        </div>
        <!-- Abstract shapes can be added here with absolute positioning and low opacity if desired -->
    </section>

    <!-- Nova Seção 'Você' - Reestruturada com Cards -->
    <section id="voce" class="bg-gradient-dark-1 py-20 px-6">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-[#FFD700] mb-12">Você Sabe o Desafio. Nós Temos a Solução.</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Card 1 -->
                <div class="voce-card">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                    <p class="text-gray-200 text-lg">Você é um profissional fera e tem ambição global. Seu inglês, porém, está "travado" ou não reflete seu potencial.</p>
                </div>
                <!-- Card 2 -->
                <div class="voce-card">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zm3 8a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1z"></path><path fill-rule="evenodd" d="M3 5a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V5zm1.5 8.5a1.5 1.5 0 110-3 1.5 1.5 0 010 3z" clip-rule="evenodd"></path></svg>
                    <p class="text-gray-200 text-lg">Reuniões, apresentações, e-mails... Você se sente inseguro(a) e precisa de mais agilidade e sem ruídos. ✨</p>
                </div>
                 <!-- Card 3 -->
                 <div class="voce-card">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17.555 1.75C16.92 1.074 15.938.868 15 1.25S13.439 2.508 14.156 3.25L14.47 3.565 10 8l-4-4L1.75 8.25C1.07 8.924.868 9.92 1.25 10s2.008 1.439 2.75 2.156L3.565 14.47 8 19l4-4 4.25-4.25c.674-.67 1.66-.868 2.05-1.25s.743-1.438.25-2.156L17.555 1.75z"></path></svg>
                    <p class="text-gray-200 text-lg">O RealTalk Daby te dá a chance de alavancar para um inglês que seja um reflexo da sua alta performance.</p>
                </div>
                <!-- Card 4 -->
                <div class="voce-card">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd"></path></svg>
                    <p class="text-gray-200 text-lg">Prepare-se para uma fluência com agilidade, liberdade e sem ruídos.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção 'Seu Desafio' -->
    <section id="challenge" class="bg-gradient-dark-2 py-20 px-6 text-center">
        <div class="container mx-auto">
            <h2 class="text-3xl md:text-4xl font-extrabold text-[#BD93F9] mb-6">INGLÊS NUNCA FOI FÁCIL. 😩</h2>
            <p class="text-xl md:text-2xl font-light text-gray-300 max-w-4xl mx-auto">
                Prepare-se para alavancar seu inglês com a IA e metodologias que realmente funcionam para o mercado corporativo.
            </p>
        </div>
    </section>

    <!-- Seção 'Metodologia' -->
    <section id="methodology" class="bg-gradient-dark-3 py-20 px-6">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-[#FFD700] mb-12">🧠 O SHIFT REAL TALK DABY: Da Teoria à Competência Instantânea.</h2>
            <p class="text-lg text-gray-300 max-w-4xl mx-auto mb-12">
                O RealTalk Daby te tira da teoria: aqui, o foco é na ação, na comunicação imediata, natural e estratégica, para resultados que você vê e sente no dia a dia. Chega de "achismo" ou foco na memorização. Identifica *exatamente* onde o profissional trava (vocabulário, estrutura, confiança).
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <!-- Card 1 -->
                <div class="bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-700 hover:border-[#FFD700] transition duration-300 ease-in-out transform hover:-translate-y-1">
                    <h3 class="text-2xl font-semibold text-[#FFD700] mb-4">Meu compromisso: Capacidades dos Produtos</h3>
                    <ul class="text-gray-300 text-left space-y-2 pl-5 list-disc">
                        <li>Construção de repertório de fala e escuta ativa.</li>
                        <li>Assertividade e persuasão (apresentações e reuniões).</li>
                        <li>Comunicação em situações de alta complexidade.</li>
                        <li>Gerenciamento de conflitos e negociações (Diplomacy Skills).</li>
                        <li>Liderança (apresentação de ideias com confiança e carisma).</li>
                    </ul>
                </div>
                <!-- Card 2 -->
                <div class="bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-700 hover:border-[#8BE9FD] transition duration-300 ease-in-out transform hover:-translate-y-1">
                    <h3 class="text-2xl font-semibold text-[#8BE9FD] mb-4">Simulador de Cenários Dinâmicos e Reais</h3>
                    <ul class="text-gray-300 text-left space-y-2 pl-5 list-disc">
                        <li>Aprenda a performar em situações profissionais críticas.</li>
                        <li>Sinta a pressão e o ritmo de reuniões globais antes que elas aconteçam.</li>
                        <li>Respostas rápidas e claras sob demanda.</li>
                    </ul>
                </div>
                <!-- Card 3 -->
                <div class="bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-700 hover:border-[#FF79C6] transition duration-300 ease-in-out transform hover:-translate-y-1">
                    <h3 class="text-2xl font-semibold text-[#FF79C6] mb-4">Análise Preditiva de Gaps</h3>
                    <ul class="text-gray-300 text-left space-y-2 pl-5 list-disc">
                        <li>Identificação precisa de pontos fracos na comunicação.</li>
                        <li>Criação de um plano de desenvolvimento hiper-personalizado.</li>
                        <li>Foco em otimização do tempo e maximização de resultados.</li>
                    </ul>
                </div>
                <!-- Card 4 -->
                <div class="bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-700 hover:border-[#BD93F9] transition duration-300 ease-in-out transform hover:-translate-y-1">
                    <h3 class="text-2xl font-semibold text-[#BD93F9] mb-4">Modo Simulador de Voo</h3>
                    <ul class="text-gray-300 text-left space-y-2 pl-5 list-disc">
                        <li>Treinamento em **stress elevado** (negociações críticas, gestão de crise) para que o inglês seja automático em situações de alta pressão.</li>
                        <li>Gerenciamento de Diferenças de Sotaque e Jargão (Dialect Training).</li>
                        <li>Comunicação Não-Verbal e Etiqueta em Calls.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção 'Plataforma' -->
    <section id="features" class="bg-gradient-dark-1 py-20 px-6">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-[#FFD700] mb-12">Plataforma RealTalk Daby: Seu Ambiente de Alta Performance.</h2>
            <p class="text-lg text-gray-300 max-w-4xl mx-auto mb-12">Construída para profissionais exigentes, nossa plataforma integra tecnologia de ponta e uma metodologia exclusiva para seu avanço.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-gray-800 p-8 rounded-xl shadow-lg flex flex-col items-center border border-gray-700 hover:border-[#8BE9FD] transition duration-300 ease-in-out transform hover:-translate-y-1">
                    <img src="https://via.placeholder.com/100/8BE9FD/1A1A2E?text=AI" alt="Ícone AI Preditiva" class="w-24 h-24 mb-6 rounded-full border-4 border-[#8BE9FD]">
                    <h3 class="text-2xl font-semibold text-[#8BE9FD] mb-4">AI Preditiva & Feedback Imediato</h3>
                    <p class="text-gray-300 text-center">Nossa inteligência artificial analisa sua fala, sotaque e fluidez, entregando feedback em tempo real para um ajuste instantâneo.</p>
                </div>
                <!-- Card 2 -->
                <div class="bg-gray-800 p-8 rounded-xl shadow-lg flex flex-col items-center border border-gray-700 hover:border-[#FF79C6] transition duration-300 ease-in-out transform hover:-translate-y-1">
                    <img src="https://via.placeholder.com/100/FF79C6/1A1A2E?text=Contexto" alt="Ícone Cenários Reais" class="w-24 h-24 mb-6 rounded-full border-4 border-[#FF79C6]">
                    <h3 class="text-2xl font-semibold text-[#FF79C6] mb-4">Cenários Reais & Simulados</h3>
                    <p class="text-gray-300 text-center">Treine em situações do dia a dia corporativo, desde reuniões informais a negociações complexas, preparando-o para qualquer desafio.</p>
                </div>
                <!-- Card 3 -->
                <div class="bg-gray-800 p-8 rounded-xl shadow-lg flex flex-col items-center border border-gray-700 hover:border-[#BD93F9] transition duration-300 ease-in-out transform hover:-translate-y-1">
                    <img src="https://via.placeholder.com/100/BD93F9/1A1A2E?text=Psico" alt="Ícone Preparação Psicológica" class="w-24 h-24 mb-6 rounded-full border-4 border-[#BD93F9]">
                    <h3 class="text-2xl font-semibold text-[#BD93F9] mb-4">Preparação Psicológica</h3>
                    <p class="text-gray-300 text-center">Desenvolvemos sua confiança para falar em público e gerenciar o stress em comunicações de alto impacto, em qualquer idioma.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção 'Habilidades' (Antiga AI Power) -->
    <section id="habilidades" class="bg-gradient-dark-2 py-20 px-6">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-[#FFD700] mb-12">🎓 Estrutura Modular: Habilidades de Liderança Global</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Card 1: Reuniões e Apresentações -->
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg border border-gray-700 hover:border-[#FF79C6] transition duration-300">
                    <h3 class="text-xl font-semibold text-[#FF79C6] mb-4">Reuniões & Apresentações</h3>
                    <ul class="text-gray-300 text-left space-y-1 pl-4 list-disc text-sm">
                        <li>Foco e clareza.</li>
                        <li>Projeção de voz e postura.</li>
                        <li>Gestão inteligente de Q&A.</li>
                    </ul>
                </div>
                <!-- Card 2: Negociação e Persuasão -->
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg border border-gray-700 hover:border-[#8BE9FD] transition duration-300">
                    <h3 class="text-xl font-semibold text-[#8BE9FD] mb-4">Negociação & Persuasão</h3>
                    <ul class="text-gray-300 text-left space-y-1 pl-4 list-disc text-sm">
                        <li>Técnicas de argumentação.</li>
                        <li>Leitura corporal e de ambiente.</li>
                        <li>Fechamento estratégico.</li>
                    </ul>
                </div>
                <!-- Card 3: Gestão de Crise e Conflitos -->
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg border border-gray-700 hover:border-[#BD93F9] transition duration-300">
                    <h3 class="text-xl font-semibold text-[#BD93F9] mb-4">Gestão de Crise & Conflitos</h3>
                    <ul class="text-gray-300 text-left space-y-1 pl-4 list-disc text-sm">
                        <li>Calma e clareza sob pressão.</li>
                        <li>Comunicação empática.</li>
                        <li>Resolução focada em soluções.</li>
                    </ul>
                </div>
                <!-- Card 4: Global Leadership Communication -->
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg border border-gray-700 hover:border-[#FFD700] transition duration-300">
                    <h3 class="text-xl font-semibold text-[#FFD700] mb-4">Global Leadership Communication</h3>
                    <ul class="text-gray-300 text-left space-y-1 pl-4 list-disc text-sm">
                        <li>Adaptação cultural.</li>
                        <li>Conexão autêntica.</li>
                        <li>Influência e inspiração.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção 'Currículo' -->
    <section id="curriculum" class="bg-gradient-dark-3 py-20 px-6">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-[#FFD700] mb-12">🌟 Currículo RealTalk Daby: Caminho para a Maestria.</h2>
            <p class="text-lg text-gray-300 max-w-4xl mx-auto mb-16">Nosso currículo é desenhado para otimizar seu tempo e maximizar sua performance, com módulos práticos e imersivos que transformam conhecimento em ação imediata.</p>

            <div class="relative max-w-5xl mx-auto">
                <!-- Timeline/Path Visual - Placeholder example -->
                <div class="absolute inset-0 flex justify-center">
                    <div class="w-1 bg-gray-700 rounded-full h-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-16 md:gap-x-12 relative">
                    <!-- Step 1 -->
                    <div class="flex flex-col md:flex-row items-center md:items-start text-left bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-700 hover:border-[#FF79C6] transition duration-300 relative z-10 md:mr-auto">
                        <div class="w-12 h-12 bg-[#FF79C6] rounded-full flex items-center justify-center text-xl font-bold text-gray-900 absolute -left-6 md:-left-6 top-1/2 -translate-y-1/2 transform">1</div>
                        <div class="md:ml-8 mt-4 md:mt-0">
                            <h3 class="text-2xl font-semibold text-[#FF79C6] mb-2">Módulo 1: Desbloqueio e Diagnóstico</h3>
                            <p class="text-gray-300">Avaliação do seu perfil de comunicação e identificação de gaps, com foco em desbloquear barreiras de confiança e fluência.</p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="flex flex-col md:flex-row items-center md:items-start text-left bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-700 hover:border-[#8BE9FD] transition duration-300 relative z-10 md:ml-auto md:order-last">
                        <div class="w-12 h-12 bg-[#8BE9FD] rounded-full flex items-center justify-center text-xl font-bold text-gray-900 absolute -left-6 md:-left-6 top-1/2 -translate-y-1/2 transform">2</div>
                        <div class="md:ml-8 mt-4 md:mt-0">
                            <h3 class="text-2xl font-semibold text-[#8BE9FD] mb-2">Módulo 2: Imersão em Cenários Corporativos</h3>
                            <p class="text-gray-300">Treinamento prático e intensivo em simulações de reuniões, pitches, negociações e e-mails, com feedback instantâneo de IA.</p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="flex flex-col md:flex-row items-center md:items-start text-left bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-700 hover:border-[#BD93F9] transition duration-300 relative z-10 md:mr-auto">
                        <div class="w-12 h-12 bg-[#BD93F9] rounded-full flex items-center justify-center text-xl font-bold text-gray-900 absolute -left-6 md:-left-6 top-1/2 -translate-y-1/2 transform">3</div>
                        <div class="md:ml-8 mt-4 md:mt-0">
                            <h3 class="text-2xl font-semibold text-[#BD93F9] mb-2">Módulo 3: Liderança e Diplomacia Global</h3>
                            <p class="text-gray-300">Foco em comunicação estratégica, persuasão, gestão de equipes globais e resolução de conflitos em inglês, construindo sua voz de liderança.</p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="flex flex-col md:flex-row items-center md:items-start text-left bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-700 hover:border-[#FFD700] transition duration-300 relative z-10 md:ml-auto md:order-last">
                        <div class="w-12 h-12 bg-[#FFD700] rounded-full flex items-center justify-center text-xl font-bold text-gray-900 absolute -left-6 md:-left-6 top-1/2 -translate-y-1/2 transform">4</div>
                        <div class="md:ml-8 mt-4 md:mt-0">
                            <h3 class="text-2xl font-semibold text-[#FFD700] mb-2">Módulo Final: Maestria e Mentoria Contínua</h3>
                            <p class="text-gray-300">Refinamento de habilidades, mentoria individualizada e estratégias para manter sua fluência afiada e em constante evolução no ambiente profissional.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção 'Contato Simplificada' -->
    <section id="contact" class="bg-gradient-dark-1 py-20 px-6 text-center">
        <div class="container mx-auto">
            <h2 class="text-3xl md:text-5xl font-bold text-[#FFD700] mb-12">Fale com a Daby!</h2>
            <p class="text-lg text-gray-300 max-w-3xl mx-auto mb-10">
                Pronto para transformar seu inglês corporativo? Entre em contato e vamos conversar sobre seus objetivos!
            </p>

            <div class="flex flex-col md:flex-row items-center justify-center gap-8 max-w-xl mx-auto">
                <a href="mailto:vishuld@yahoo.it" class="flex items-center space-x-4 bg-gray-800 p-4 rounded-xl shadow-lg border border-gray-700 hover:border-[#8BE9FD] transition duration-300 ease-in-out transform hover:scale-105">
                    <i class="fas fa-envelope text-4xl text-[#8BE9FD]"></i>
                    <span class="text-xl font-bold text-gray-100">vishuld@yahoo.it</span>
                </a>
                <a href="https://wa.me/5511986108003" target="_blank" class="flex items-center space-x-4 bg-gray-800 p-4 rounded-xl shadow-lg border border-gray-700 hover:border-[#25D366] transition duration-300 ease-in-out transform hover:scale-105">
                    <i class="fab fa-whatsapp text-4xl text-[#25D366]"></i>
                    <span class="text-xl font-bold text-gray-100">+55 11 98610-8003</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#1e1e2d] py-8 px-6 text-center text-gray-400 text-sm">
        <div class="container mx-auto">
            <p>&copy; 2025 RealTalk Daby. Todos os direitos reservados.</p>
            <p class="mt-2">Desenvolvido com paixão para sua fluência global.</p>
        </div>
    </footer>

    <!-- JavaScript for Mobile Menu Toggle and Smooth Scrolling -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenuContent = document.getElementById('mobile-menu-content');
            const desktopNavbarLinks = document.getElementById('desktop-navbar-links');
            const navLinks = document.querySelectorAll('#mobile-menu-content a, #desktop-navbar-links a');

            // Toggle mobile menu visibility
            if (mobileMenuButton && mobileMenuContent) {
                mobileMenuButton.addEventListener('click', function () {
                    mobileMenuContent.style.display = mobileMenuContent.style.display === 'block' ? 'none' : 'block';
                });

                // Close mobile menu when a link is clicked
                mobileMenuContent.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', function() {
                        mobileMenuContent.style.display = 'none';
                    });
                });
            }

            // Handle responsive display of menus (desktop vs mobile)
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768) { // md breakpoint for Tailwind
                    if (mobileMenuContent) mobileMenuContent.style.display = 'none';
                    if (desktopNavbarLinks) desktopNavbarLinks.style.display = 'flex';
                } else {
                    if (desktopNavbarLinks) desktopNavbarLinks.style.display = 'none';
                }
            });

            window.dispatchEvent(new Event('resize')); // Trigger on load

            // Smooth scroll for all internal links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    const navbar = document.querySelector('.navbar');
                    const navbarHeight = navbar ? navbar.offsetHeight : 0;

                    if (targetElement) {
                        const offset = targetElement.getBoundingClientRect().top + window.scrollY - navbarHeight;
                        window.scrollTo({
                            top: offset,
                            behavior: 'smooth'
                        });
                        // Close mobile menu after clicking a link
                        if (mobileMenuContent && mobileMenuContent.style.display === 'block') {
                            mobileMenuContent.style.display = 'none';
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>

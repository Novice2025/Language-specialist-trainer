<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LexiPro: Seu Especialista em Inglês Profissional</title>
    <style>
        /* BASE & TYPOGRAPHY */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1A1A2E 0%, #0F0F1A 100%); /* Mixed dark gradient background */
            color: #E0E0E0; /* Fallback light text color */
            margin: 0;
            padding: 0;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start; /* Aligned to top, not center of viewport */
            min-height: 100vh;
            overflow-x: hidden; /* Prevent horizontal scroll from animations */
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 40px auto;
            background: #2a2a4a; /* Slightly lighter dark for container */
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            padding: 40px;
            box-sizing: border-box; /* Include padding in element's total width and height */
        }
        h1, h2, h3 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 25px;
            /* Gradient Text Effect for Headers */
            background: linear-gradient(45deg, #8be9fd, #bd93f9, #ff79c6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text; /* Standard alternative */
            color: transparent; /* Standard alternative */
        }
        h1 { font-size: 2.8em; margin-bottom: 30px; }
        h2 { font-size: 2.2em; border-bottom: 2px solid rgba(139, 233, 253, 0.2); padding-bottom: 15px; margin-top: 40px; }
        h3 { font-size: 1.8em; margin-bottom: 15px; }
        p, ul, ol {
            color: #D0D0D0; /* Slightly darker light text for body */
            font-size: 1.05em;
            margin-bottom: 15px;
        }
        ul { list-style: none; padding-left: 0; }
        ul li:before {
            content: '★'; /* Custom bullet point */
            color: #bd93f9; /* Accent color */
            display: inline-block;
            width: 1em;
            margin-left: -1em;
            margin-right: 0.5em;
        }
        a {
            color: #8be9fd; /* Link color */
            text-decoration: none;
            transition: color 0.3s ease;
        }
        a:hover {
            color: #ff79c6; /* Link hover color */
        }

        /* TABS NAVIGATION */
        .tab-nav {
            display: flex;
            justify-content: center;
            flex-wrap: wrap; /* Allow tabs to wrap on smaller screens */
            margin-bottom: 30px;
            border-bottom: 2px solid rgba(139, 233, 253, 0.2);
            padding-bottom: 10px;
            gap: 10px; /* Space between tabs */
        }
        .tab-button {
            background-color: #3e3e5c; /* Darker tab button */
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.1em;
            font-weight: bold;
            color: #c0c0c0;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        .tab-button:hover {
            background-color: #4a4a70; /* Lighter hover */
            color: #e0e0e0;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
        }
        .tab-button.active {
            background: linear-gradient(45deg, #bd93f9, #ff79c6); /* Active tab gradient */
            color: #1a1a2e; /* Dark text on active tab */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
            transform: translateY(-3px);
        }

        /* TAB CONTENT */
        .tab-content {
            display: none; /* Hide all tab content by default */
            padding: 20px;
            margin-top: 20px;
            background-color: #3e3e5c; /* Content background */
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
            animation: fadeIn 0.5s ease-out; /* Fade in animation */
        }
        .tab-content.active {
            display: block; /* Show active tab content */
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* SPECIFIC SECTIONS STYLING */
        .highlight-box {
            background-color: #4a4a70;
            border-left: 4px solid #8be9fd;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            h1 { font-size: 2em; }
            h2 { font-size: 1.8em; }
            h3 { font-size: 1.4em; }
            .container { padding: 20px; margin: 20px auto; }
            .tab-button { padding: 10px 15px; font-size: 1em; }
            .tab-nav { flex-direction: column; align-items: stretch; } /* Stack buttons vertically */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>LexiPro: Revolucione Seu Inglês Profissional!</h1>
        <p style="text-align: center; color: #ACACAC; font-style: italic;">Sua jornada para a fluência e confiança no mundo corporativo brasileiro.</p>

        <div class="tab-nav">
            <button class="tab-button active" onclick="openTab(event, 'desafio')">O Desafio Brasileiro</button>
            <button class="tab-button" onclick="openTab(event, 'metodologia')">Nossa Metodologia Única</button>
            <button class="tab-button" onclick="openTab(event, 'curriculo')">Currículo Profissional Adaptável</button>
            <button class="tab-button" onclick="openTab(event, 'ai-power')">O Poder da IA</button>
            <button class="tab-button" onclick="openTab(event, 'contato')">Comece Já!</button>
        </div>

        <div id="desafio" class="tab-content active">
            <h2>Superando Barreiras: O Cenário Atual</h2>
            <p>Compreendemos as dificuldades enfrentadas pelos profissionais brasileiros na aquisição do inglês. Nosso propósito é transformar essa realidade, facilitando o aprendizado e garantindo resultados notáveis.</p>
            <ul>
                <li>**Estrutura Educacional Frágil:** Métodos tradicionais insuficientes para fluência prática.</li>
                <li>**Complexidade Lexical:** Dificuldade em nuances, levando à percepção de "inglês difícil".</li>
                <li>**"Inglês Traduzido":** Comunicação robótica por excesso de tradução literal.</li>
                <li>**Carga de Trabalho:** Pouco tempo para estudo, pressão e dificuldade de foco.</li>
                <li>**Lacuna de Confiança:** Grande parte entende, mas hesita em falar e escrever.</li>
            </ul>
        </div>

        <div id="metodologia" class="tab-content">
            <h2>"Lego Chain Block" Evoluído: Fluência Conectada</h2>
            <p>Nossa abordagem vai além do vocabulário isolado. Ensinamos "blocos de linguagem" (chunks) completos, facilitando a memorização e a aplicação natural.</p>
            <h3>Princípios Chave:</h3>
            <ul>
                <li>**Aprendizagem em "Sprints" (Micro-learning):** Conteúdo focado de 2-5 minutos, adaptado à sua agenda. Menos é mais para retenção e foco.</li>
                <li>**Redes Semânticas:** Conectamos palavras (ex: 'change', 'improve', 'enhance') em uma teia de significados e usos em contexto profissional.
                    <div class="highlight-box">
                        <h3>Diferença & Lógica: "Change" vs. "Enhance"</h3>
                        <p><strong>Change (Mudança):</strong> Neutro, pode ser positivo ou negativo. "The market is undergoing significant <strong>change</strong>."</p>
                        <p><strong>Improve (Melhorar):</strong> Tornar algo melhor, muitas vezes quantificável. "We've seen a measurable <strong>improvement</strong> in our Q3 figures."</p>
                        <p><strong>Enhance (Aprimorar/Potencializar):</strong> Adicionar valor, funcionalidade ou qualidade a algo já bom. "The new software <strong>enhancement</strong> includes a user-friendly dashboard."</p>
                        <p>A lógica? Usar "enhance" ao invés de "change" em certos contextos eleva sua credibilidade e clareza profissional. Ex: "to enhance efficiency," "to optimize workflow."</p>
                    </div>
                </li>
                <li>**Intuição do Nativo:** Exposição massiva a inglês autêntico para que você "descubra" padrões, não apenas memorize regras.</li>
                <li>**Superando o "Inglês Traduzido":** Comparações diretas entre o que se traduz e o que um nativo realmente diz (ex: "make a meeting" vs. "hold a meeting").</li>
                <li>**Foco e Resiliência Emocional:** Materiais otimizados (Dark Mode), feedback construtivo e celebração de pequenas vitórias.</li>
            </ul>
        </div>

        <div id="curriculo" class="tab-content">
            <h2>Currículo Profissional Adaptável & Essencial</h2>
            <p>Nosso conteúdo é desenhado para o seu dia a dia profissional, com foco em impacto real na sua comunicação.</p>
            <h3>Currículo Básico (Comunicação Profissional Universal):</h3>
            <p>150 termos e "chunks" essenciais para qualquer área:</p>
            <ul>
                <li>Reuniões, Apresentações, E-mails, Networking, Gestão de Projetos, Resolução de Problemas, Feedback.</li>
                <li>**Vocabulário Exemplar:** 'Initiate', 'Implement', 'Monitor', 'Assess', 'Mitigate', 'Optimize', 'Facilitate', 'Leverage', 'Streamline', 'Strategic', 'Holistic', 'Proactive', 'Reactive', 'Stakeholder', 'Bandwidth', 'Synergy'.</li>
                <li>**"Lego Blocks":** "align with objectives," "drive results," "foster collaboration," "gain traction," "manage expectations."</li>
            </ul>
            <h3>Módulos de Imersão por Indústria:</h3>
            <p>Vocabulário e discurso aprofundado para a sua área específica:</p>
            <ul>
                <li>**Finanças:** 'Amortization', 'Liquidity', 'Hedging', 'Capital expenditure', 'ROI', 'Fiscal year', 'Forecasting'.</li>
                <li>**Qualidade & Produção:** 'Supply chain', 'Lean manufacturing', 'Quality assurance (QA)', 'Compliance', 'Defect rate', 'Bottleneck', 'SOP'.</li>
                <li>**Vendas & Marketing:** 'Lead generation', 'Conversion rate', 'Customer journey', 'Market segmentation', 'Brand awareness'.</li>
                <li>E muitos outros, adaptados à sua necessidade!</li>
            </ul>
        </div>

        <div id="ai-power" class="tab-content">
            <h2>IA: Seu Mentor e Coach Pessoal 24/7</h2>
            <p>A Inteligência Artificial é o motor da sua maestria, oferecendo uma experiência de aprendizado sem precedentes, pensando 10 anos à frente.</p>
            <ul>
                <li>**Caminhos de Aprendizado Adaptativos:** A IA analisa seu desempenho e ajusta o conteúdo, dificuldade e ritmo em tempo real (ex: "Cognitive Load Pacing" & "Micro-learning Sprints").</li>
                <li>**Simulações de Role-Play com Avatares IA:** Pratique reuniões, negociações ou apresentações com personagens IA que respondem dinamicamente. Receba feedback instantâneo sobre adequação da linguagem, tom e eficácia.</li>
                <li>**Curadoria de Conteúdo Dinâmica:** A IA rastreia notícias e relatórios da sua indústria, extraindo vocabulário e tópicos relevantes para manter seu aprendizado sempre atualizado.</li>
                <li>**Feedback Detalhado:** Correções em tempo real de pronúncia, gramática, vocabulário e fluência.</li>
                <li>**Otimização para Foco (ADHD):** Materiais em Dark Mode com cores customizadas, "Focus Mode" AI para monitorar e realinhar a atenção.</li>
                <li>**Sistema de Repetição Espaçada (SRS):** A IA programa a revisão do vocabulário no momento certo para máxima retenção a longo prazo.</li>
            </ul>
             <div class="highlight-box">
                <p>Nossa plataforma **LexiPro** (nome sugerido) será seu app dedicado, com IA integrada para conversação, feedback e curadoria de conteúdo, tudo otimizado para o seu dia a dia.</p>
            </div>
        </div>

        <div id="contato" class="tab-content">
            <h2>Preparado para o Próximo Nível?</h2>
            <p>Seja o profissional que se comunica com confiança e precisão em inglês. Entre em contato e descubra como a LexiPro pode transformar sua carreira.</p>
            <p style="text-align: center; margin-top: 30px;">
                <a href="mailto:seuemail@example.com" class="button-link" style="margin-right: 15px;">Fale Conosco por Email</a>
                <a href="builder.php" class="button-link">Acessar Lesson Builder (Admin)</a>
            </p>
            <p style="text-align: center; color: #ACACAC; font-size: 0.9em; margin-top: 20px;">*Este é um portal de demonstração/informações. Funcionalidades completas de IA em desenvolvimento.</p>
        </div>
    </div>

    <script>
        function openTab(evt, tabName) {
            // Declare all variables
            var i, tabcontent, tabbuttons;

            // Get all elements with class="tab-content" and hide them
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tab-button" and remove the "active" class
            tabbuttons = document.getElementsByClassName("tab-button");
            for (i = 0; i < tabbuttons.length; i++) {
                tabbuttons[i].className = tabbuttons[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Set the default tab to open on page load
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelector('.tab-button').click(); // Clicks the first tab by default
        });
    </script>
</body>
</html>

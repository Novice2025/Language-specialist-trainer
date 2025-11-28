<?php
// builder.php - Seu Planejador de Lições RealTalk Daby
require_once 'db.php'; // Inclui a conexão com o banco de dados

$message = '';

// Lida com o envio do formulário para adicionar novas lições
if (¨D_SERVER['REQUEST_METHOD'] === 'POST' && isset(¨D_POST['action']) && ¨D_POST['action'] === 'add_lesson') {
    $title = ¨D_POST['title'] ?? '';
    $language_level = ¨D_POST['language_level'] ?? '';
    $industry = ¨D_POST['industry'] ?? '';
    $chunks = ¨D_POST['chunks'] ?? '';
    $vocabulary = ¨D_POST['vocabulary'] ?? '';
    $logic = ¨D_POST['logic'] ?? '';
    $example_sentences = ¨D_POST['example_sentences'] ?? '';
    $focus = ¨D_POST['focus'] ?? ''; // Esta é a área de 'foco'

    // Validação básica
    if (empty($title)) {
        $message = '<p class="error">O título da lição não pode estar vazio.</p>';
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO licoes (title, language_level, industry, chunks, vocabulary, logic, example_sentences, focus) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$title, $language_level, $industry, $chunks, $vocabulary, $logic, $example_sentences, $focus]);
            $message = '<p class="success">Lição adicionada com sucesso!</p>';
        } catch (PDOException $e) {
            $message = '<p class="error">Erro ao adicionar lição: ' . $e->getMessage() . '</p>';
        }
    }
}

// Busca todas as lições do banco de dados
$lessons = [];
try {
    $stmt = $pdo->query("SELECT * FROM licoes ORDER BY id DESC");
    $lessons = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $message = '<p class="error">Erro ao buscar lições: ' . $e->getMessage() . '</p>';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RealTalk Daby: Lesson Builder</title>
    <style>
        /* Estilos Globais Dark Mode */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1a1a2e; /* Fundo escuro */
            color: #e0e0e0; /* Texto claro */
            margin: 0;
            padding: 20px;
            line-height: 1.6;
        }
        .container {
            max-width: 1000px;
            margin: 20px auto;
            background: #2a2a4a; /* Dark um pouco mais claro para o container */
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
            padding: 30px;
        }
        h1, h2 {
            color: #8be9fd; /* Cor de destaque para títulos */
            text-align: center;
            margin-bottom: 30px;
        }
        .home-button {
            display: block;
            margin-bottom: 30px;
            padding: 10px 20px;
            background-color: #bd93f9; /* Cor de destaque vibrante */
            color: #1a1a2e;
            text-decoration: none;
            text-align: center;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .home-button:hover {
            background-color: #ff79c6; /* Cor de destaque ao passar o mouse */
            transform: translateY(-2px);
        }
        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 40px;
            padding-bottom: 30px;
            border-bottom: 1px solid #444;
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 8px;
            color: #c0c0c0;
            font-weight: bold;
        }
        input[type="text"],
        textarea,
        select {
            padding: 10px 12px;
            border: 1px solid #444;
            border-radius: 6px;
            background-color: #3e3e5c; /* Fundo do input */
            color: #e0e0e0; /* Cor do texto do input */
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        input[type="text"]:focus,
        textarea:focus,
        select:focus {
            border-color: #bd93f9; /* Cor da borda ao focar */
            outline: none;
            box-shadow: 0 0 0 3px rgba(189, 147, 249, 0.3); /* Sombra ao focar */
        }
        textarea {
            min-height: 80px;
            resize: vertical;
        }

        /* Cores de Dropdown Personalizadas para Dark Mode - Contraste Legível Garantido */
        select {
            /* Reset de aparência básica */
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            /* Adiciona ícone de seta */
            background-image: url('data:image/svg+xml;utf8,<svg fill="%23e0e0e0" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 20px;
            padding-right: 35px; /* Abre espaço para a seta */
        }
        /* Estilo para Option Group e Option para legibilidade em dark mode */
        select option {
            background-color: #3e3e5c; /* Fundo da opção */
            color: #e0e0e0; /* Texto da opção */
        }
        select optgroup {
            background-color: #2a2a4a; /* Fundo do grupo de opções */
            color: #8be9fd; /* Texto do grupo de opções */
            font-weight: bold;
        }


        button[type="submit"] {
            grid-column: span 2; /* Ocupa as duas colunas */
            padding: 12px 25px;
            background-color: #bd93f9; /* Cor de destaque vibrante */
            color: #1a1a2e;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        button[type="submit"]:hover {
            background-color: #ff79c6; /* Outro destaque vibrante ao passar o mouse */
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .message {
            margin-bottom: 20px;
            padding: 10px 15px;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
        }
        .success {
            background-color: #388e3c; /* Verde para sucesso */
            color: #e0e0e0;
        }
        .error {
            background-color: #d32f2f; /* Vermelho para erro */
            color: #e0e0e0;
        }

        .lesson-list {
            margin-top: 40px;
        }
        .lesson-card {
            background: #3e3e5c; /* Fundo do cartão */
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            border-left: 5px solid #bd93f9; /* Borda de destaque */
        }
        .lesson-card h3 {
            color: #ff79c6; /* Destaque do título do cartão */
            margin-top: 0;
            margin-bottom: 10px;
        }
        .lesson-card p {
            margin: 5px 0;
            font-size: 0.95rem;
            color: #d0d0d0;
        }
        .lesson-card p strong {
            color: #8be9fd; /* Destaque da label chave */
            margin-right: 5px;
        }
        .no-lessons {
            text-align: center;
            color: #c0c0c0;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php" class="home-button">← Voltar para a Página Principal</a>
        <h1>RealTalk Daby: Lesson Builder 🚀</h1>
        <p style="text-align: center; color: #c0c0c0; margin-bottom: 30px;">Crie suas lições "Lego Chain Block" e módulos avançados de vocabulário aqui. Foque na lógica central e no impacto.</p>

        <?php if (!empty($message)): ?>
            <div class="message <?php echo strpos($message, 'success') !== false ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <h2>Adicionar Nova Lição</h2>
        <form method="POST">
            <input type="hidden" name="action" value="add_lesson">

            <div class="form-group">
                <label for="title">Título da Lição:</label>
                <input type="text" id="title" name="title" placeholder="Ex: Aprimorando a Comunicação nos Negócios" required>
            </div>

            <div class="form-group">
                <label for="language_level">Nível de Idioma:</label>
                <select id="language_level" name="language_level">
                    <option value="">Selecione o Nível</option>
                    <option value="A1">A1 - Iniciante</option>
                    <option value="A2">A2 - Elementar</option>
                    <option value="B1">B1 - Intermediário</option>
                    <option value="B2">B2 - Intermediário Avançado</option>
                    <option value="C1">C1 - Avançado</option>
                    <option value="C2">C2 - Proficiência</option>
                </select>
            </div>

            <div class="form-group">
                <label for="industry">Foco da Indústria:</label>
                <select id="industry" name="industry">
                    <option value="">Profissional Geral</option>
                    <optgroup label="Indústrias Específicas">
                        <option value="Finance">Finanças</option>
                        <option value="Quality">Controle de Qualidade</option>
                        <option value="Production">Produção e Manufatura</option>
                        <option value="Sales">Vendas e Marketing</option>
                        <option value="Management">Gestão e RH</option>
                        <option value="IT">TI e Tecnologia</option>
                        <option value="Logistics">Logística e Cadeia de Suprimentos</option>
                        <option value="Legal">Jurídico</option>
                        <option value="Healthcare">Saúde</option>
                    </optgroup>
                </select>
            </div>

            <div class="form-group">
                <label for="focus">Área de Foco (Ex: Oratória, Negociação, Redação de Relatórios):</label>
                <input type="text" id="focus" name="focus" placeholder="Ex: Estratégias de Negociação">
            </div>

            <div class="form-group">
                <label for="chunks">Chunks Lexicais Chave (separados por vírgula):</label>
                <textarea id="chunks" name="chunks" placeholder="Ex: 'drive results', 'foster collaboration', 'manage expectations'"></textarea>
            </div>

            <div class="form-group">
                <label for="vocabulary">Vocabulário Alvo (separado por vírgula, Ex: enhance, optimize, mitigate):</label>
                <textarea id="vocabulary" name="vocabulary" placeholder="Ex: enhance, optimize, mitigate, leverage"></textarea>
            </div>

            <div class="form-group">
                <label for="logic">Lógica por Trás do Aprendizado (Por que e como se conecta):</label>
                <textarea id="logic" name="logic" placeholder="Ex: 'Enhance' implica refinamento positivo, mais formal que 'improve'."></textarea>
            </div>

            <div class="form-group">
                <label for="example_sentences">Frases de Exemplo (uma por linha):</label>
                <textarea id="example_sentences" name="example_sentences" placeholder="Ex: We need to enhance our process efficiency.\nThe new software will optimize our data analysis."></textarea>
            </div>

            <button type="submit">Adicionar Lição</button>
        </form>

        <h2>Lições Existentes</h2>
        <div class="lesson-list">
            <?php if (!empty($lessons)): ?>
                <?php foreach ($lessons as $lesson): ?>
                    <div class="lesson-card">
                        <h3><?php echo htmlspecialchars($lesson['title']); ?></h3>
                        <p><strong>Nível:</strong> <?php echo htmlspecialchars($lesson['language_level'] ?? 'N/A'); ?></p>
                        <p><strong>Indústria:</strong> <?php echo htmlspecialchars($lesson['industry'] ?? 'Geral'); ?></p>
                        <p><strong>Foco:</strong> <?php echo htmlspecialchars($lesson['focus'] ?? 'N/A'); ?></p>
                        <p><strong>Chunks:</strong> <?php echo htmlspecialchars($lesson['chunks']); ?></p>
                        <p><strong>Vocabulário:</strong> <?php echo htmlspecialchars($lesson['vocabulary']); ?></p>
                        <p><strong>Lógica:</strong> <?php echo nl2br(htmlspecialchars($lesson['logic'])); ?></p>
                        <p><strong>Exemplos:</strong> <?php echo nl2br(htmlspecialchars($lesson['example_sentences'])); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-lessons">Nenhuma lição adicionada ainda. Comece agora!</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

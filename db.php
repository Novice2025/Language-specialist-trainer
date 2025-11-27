<?php
// db.php - Conexão e inicialização do banco de dados para RealTalk Daby

class Database {
    private $pdo;
    // Usando __DIR__ para um caminho absoluto do arquivo SQLite.
    // Isso ajuda o Railway.app a localizar e gerenciar o arquivo para armazenamento persistente.
    private $db_file = __DIR__ . '/emilyparis.sqlite'; 

    public function __construct() {
        // !!! IMPORTANTE PARA DEBUG NO RAILWAY.APP !!!
        // Essas linhas exibirão quaisquer erros PHP diretamente no navegador.
        // REMOVA OU COMENTE-AS PARA PRODUÇÃO assim que tudo estiver funcionando.
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $this->connect();
        $this->ensureTable(); // Garante que a tabela exista
        $this->ensureColumns(); // Garante que todas as colunas necessárias existam
    }

    private function connect() {
        try {
            // Tenta conectar ao banco de dados SQLite
            $this->pdo = new PDO("sqlite:" . $this->db_file);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->exec("PRAGMA journal_mode = WAL;"); // Modo Journal recomendado para melhor concorrência

        } catch (PDOException $e) {
            // Captura erros específicos do PDO (ex: permissões de arquivo, DB corrompido)
            die("Falha na conexão com o banco de dados: " . $e->getMessage() . 
                "<br>Por favor, certifique-se de que '" . dirname($this->db_file) . "' é gravável pelo processo do servidor web. Caminho atual: " . $this->db_file);
        } catch (Exception $e) {
            // Captura quaisquer outras exceções gerais durante a conexão
            die("Erro geral de inicialização: " . $e->getMessage());
        }
    }

    private function ensureTable() {
        // Cria a tabela 'licoes' se ela ainda não existir.
        // A coluna 'focus' faz parte da criação inicial da tabela aqui.
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS licoes (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            language_level TEXT,
            industry TEXT,
            chunks TEXT,
            vocabulary TEXT,
            logic TEXT,
            example_sentences TEXT,
            focus TEXT DEFAULT ''
        )");
    }

    private function ensureColumns() {
        // Define as colunas a serem verificadas e seus tipos.
        // 'focus' NÃO está incluída aqui, pois faz parte da declaração CREATE TABLE inicial.
        // Isso evita a tentativa de adicioná-la novamente se a tabela foi criada por este script.
        $columns_to_check = [
            'language_level' => 'TEXT',
            'industry' => 'TEXT',
            'chunks' => 'TEXT',
            'vocabulary' => 'TEXT',
            'logic' => 'TEXT',
            'example_sentences' => 'TEXT',
        ];

        // Busca as colunas existentes para evitar erros de "duplicate column".
        $stmt = $this->pdo->query("PRAGMA table_info(licoes)");
        $existing_columns = $stmt->fetchAll(PDO::FETCH_COLUMN, 1); // Obtém os nomes das colunas como um array

        foreach ($columns_to_check as $col_name => $col_type) {
            if (!in_array($col_name, $existing_columns)) {
                try {
                    $this->pdo->exec("ALTER TABLE licoes ADD COLUMN $col_name $col_type");
                } catch (PDOException $e) {
                    // Registra ou lida com o erro se ALTER TABLE falhar (ex: se uma coluna com esse nome já existir)
                    error_log("Falha ao adicionar a coluna '$col_name': " . $e->getMessage());
                }
            }
        }
    }

    public function getPdo() {
        return $this->pdo;
    }
}

// Instancia o banco de dados para garantir que esteja conectado e inicializado
$database = new Database();
$pdo = $database->getPdo();

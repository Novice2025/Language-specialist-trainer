<?php
// db.php - Database connection and initialization

class Database {
    private $pdo;
    // Using __DIR__ for the absolute path of the SQLite file 
    // This helps Railway.app find and manage it for persistent storage.
    private $db_file = __DIR__ . '/emilyparis.sqlite'; 

    public function __construct() {
        // !!! IMPORTANT FOR DEBUGGING ON RAILWAY !!!
        // These lines will display any PHP errors directly in the browser.
        // REMOVE OR COMMENT THEM OUT FOR PRODUCTION once everything works.
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $this->connect();
        $this->ensureTable(); // Ensure the table exists
        $this->ensureColumns(); // Ensure all necessary columns exist (excluding 'focus' if already present)
    }

    private function connect() {
        try {
            // Attempt to connect to the SQLite database
            $this->pdo = new PDO("sqlite:" . $this->db_file);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->exec("PRAGMA journal_mode = WAL;"); // Recommended for better concurrency

            // If the database file was just created by PDO and is empty, we'll proceed
            // If it existed but was problematic, errors will show due to setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)

        } catch (PDOException $e) {
            // Catch PDO specific errors (e.g., file permissions, corrupt DB)
            die("Database connection failed: " . $e->getMessage() . 
                "<br>Please ensure '" . dirname($this->db_file) . "' is writable by the web server process. Current path: " . $this->db_file);
        } catch (Exception $e) {
            // Catch any other general exceptions during connection
            die("General initialization error: " . $e->getMessage());
        }
    }

    private function ensureTable() {
        // Create 'licoes' table if it doesn't already exist.
        // The 'focus' column is part of the initial table creation here.
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
        // Define columns to check and their types.
        // 'focus' is NOT included here as it's part of the initial CREATE TABLE statement in ensureTable().
        // This prevents attempting to add it again if the table was created by this script.
        $columns_to_check = [
            'language_level' => 'TEXT',
            'industry' => 'TEXT',
            'chunks' => 'TEXT',
            'vocabulary' => 'TEXT',
            'logic' => 'TEXT',
            'example_sentences' => 'TEXT',
        ];

        // Fetch existing columns to prevent "duplicate column" errors.
        $stmt = $this->pdo->query("PRAGMA table_info(licoes)");
        $existing_columns = $stmt->fetchAll(PDO::FETCH_COLUMN, 1); // Get column names as an array

        foreach ($columns_to_check as $col_name => $col_type) {
            if (!in_array($col_name, $existing_columns)) {
                try {
                    $this->pdo->exec("ALTER TABLE licoes ADD COLUMN $col_name $col_type");
                } catch (PDOException $e) {
                    // Log or handle error if ALTER TABLE fails (e.g., if a column with that name already exists
                    // from a previous, possibly manual, different-schema creation, though unlikely with our checks).
                    error_log("Failed to add column '$col_name': " . $e->getMessage());
                }
            }
        }
    }

    public function getPdo() {
        return $this->pdo;
    }
}

// Instantiate the database to ensure it's connected and initialized
$database = new Database();
$pdo = $database->getPdo();

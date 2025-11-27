<?php
// db.php - Database connection and initialization

class Database {
    private $pdo;
    private $db_file = 'emilyparis.sqlite'; // User's main project file preference

    public function __construct() {
        if (!file_exists($this->db_file)) {
            $this->initDb();
        }
        $this->connect();
        $this->ensureTable(); // Ensure the table exists if it somehow wasn't created initially
        $this->ensureColumns(); // Ensure all necessary columns *other than 'focus' (which is already there)* exist
    }

    private function connect() {
        try {
            $this->pdo = new PDO("sqlite:" . $this->db_file);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    private function initDb() {
        // This function runs only if the DB file doesn't exist
        $pdo = new PDO("sqlite:" . $this->db_file);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create 'licoes' table with focus column already
        $pdo->exec("CREATE TABLE licoes (
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
        // 'focus' column is correctly included at table creation here.
    }

    private function ensureTable() {
        // Ensure the table exists, including the 'focus' column
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
        // Check and add necessary columns if they don't exist
        // 'focus' is intentionally left out as it's part of the initial table creation schema
        $columns_to_check = [
            'language_level' => 'TEXT',
            'industry' => 'TEXT',
            'chunks' => 'TEXT',
            'vocabulary' => 'TEXT',
            'logic' => 'TEXT',
            'example_sentences' => 'TEXT',
        ];

        foreach ($columns_to_check as $col_name => $col_type) {
            // Check if column exists, preventing "duplicate column" errors
            $stmt = $this->pdo->query("PRAGMA table_info(licoes)");
            $columns = $stmt->fetchAll(PDO::FETCH_COLUMN, 1); // Get column names

            if (!in_array($col_name, $columns)) {
                $this->pdo->exec("ALTER TABLE licoes ADD COLUMN $col_name $col_type");
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

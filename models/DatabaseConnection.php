<?php
class DatabaseConnection {
    private string $host = "localhost";
    private string $username = "root";
    private string $password = "";
    private string $database = "films";

    public function connect(): ?PDO
    {
        $conn = null;
        try {
            // Establece conexión con la base de datos usando PDO
            $conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $conn;
    }
}

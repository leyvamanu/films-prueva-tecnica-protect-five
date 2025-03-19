<?php
require_once __DIR__ . '/../models/DatabaseConnection.php';
require_once __DIR__ . '/../models/Film.php';
class FilmController
{
    private ?PDO $db;
    public function __construct() {
        $databaseConnection = new DatabaseConnection();
        $this->db = $databaseConnection->connect();
    }
    
    public function getAllFilms(): array
    {
        $sql = "SELECT id, title FROM f_film";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $films = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $films[] = new Film($row['id'], $row['title']);
        }

        return $films;
    }


    public function getFilmById($id): array
    {
        $sql = "SELECT f.id, f.rating, f.title, f.year, i.image_url 
                FROM f_film f
                JOIN f_image i ON f.id = i.film_fk
                WHERE f.id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return [
                'error' => 'Not Found',
                'message' => "La película con el id: $id, no existe."
            ];
        }

        $film = new Film($result['id'], $result['title'], $result['year'], $result['rating'], $result['image_url']);
        return $film->toArray();
    }
}

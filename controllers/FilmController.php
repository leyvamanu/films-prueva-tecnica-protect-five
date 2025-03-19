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
        // Consulta para obtener todas las películas con solo su ID y título.
        $sql = "SELECT id, title FROM f_film";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $films = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Crea objetos Film con los datos obtenidos.
            $films[] = new Film($row['id'], $row['title']);
        }

        return $films;
    }

    public function getFilmById($id): array
    {
        // Consulta para obtener los detalles de una película específica por su ID.
        $sql = "SELECT f.id, f.rating, f.title, f.year, i.image_url 
                FROM f_film f
                JOIN f_image i ON f.id = i.film_fk
                WHERE f.id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            // Retorna un error si la película no se encuentra en la base de datos.
            return [
                'error' => 'Not Found',
                'message' => "La película con el id: $id, no existe."
            ];
        }

        // Crea un objeto Film con los datos obtenidos y lo convierte en un array para la respuesta.
        $film = new Film($result['id'], $result['title'], $result['year'], $result['rating'], $result['image_url']);
        return $film->toArray();
    }
}

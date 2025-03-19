<?php
require_once __DIR__ . '/../controllers/FilmController.php';

$action = $_GET['action'] ?? null;
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'getFilmDetails':
        if ($id) {
            $filmController = new FilmController();
            $filmDetails = $filmController->getFilmById($_GET['id']);

            if (isset($filmDetails['error'])) {
                header('HTTP/1.1 404 Not Found');
                header('Content-Type: application/json');
                echo json_encode($filmDetails);
                exit;
            }

            header('Content-Type: application/json');
            echo json_encode($filmDetails);
            exit;
        }
        break;

    default:
        $filmController = new FilmController();
        $films = $filmController->getAllFilms();
        include __DIR__ . '/../views/home.php';
        break;
}

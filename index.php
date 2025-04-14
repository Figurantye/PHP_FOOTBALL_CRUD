<?php
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

include 'Controller/LeagueController.php';
include 'Controller/ClubController.php';
include 'Controller/PlayerController.php';

switch ($url) {
    case '/':
        break;
    case '/league':
        LeagueController::index();
        break;
    case '/league/save':
        LeagueController::saveController();
        break;
    case '/league/edit':
        LeagueController::editController();
        break;
    case '/league/delete':
        LeagueController::deleteController();
        break;
    case '/club':
        ClubController::index();
        break;
    case '/club/save':
        ClubController::saveController();
        break;
    case '/club/edit':
        ClubController::editController();
        break;
    case '/club/delete':
        ClubController::deleteController();
        break;
    case '/player':
        PlayerController::index();
        break;
    case '/player/save':
        PlayerController::saveController();
        break;
    case '/player/edit':
        PlayerController::editController();
        break;
    case '/player/delete':
        PlayerController::deleteController();
        break;
    default:
        echo "erro 404";
        break;
}

?>
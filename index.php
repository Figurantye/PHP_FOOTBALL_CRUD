<?php
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

include 'Controller/LeagueController.php';
include 'Controller/ClubController.php';
include 'Controller/PlayerController.php';

switch ($url) {
    case '/':
        break;
        case '/league/edit':
        LeagueController::editController();
        break;
        case '/league/save':
            LeagueController::saveController();

        break;
        case '/league':
            LeagueController::index();
        break;
        case '/league/delete':
            LeagueController::deleteController();
            break;
        case '/league/leaguelistclubs':
            echo "<br>List of league's clubs";
            break;
        case '/league/leaguelistplayers':
            echo "<br>List of league's players";
            break;  
        case '/club/edit':
            break;
        case '/club/save':
            ClubController::saveController();
            break;
        case '/club':
            ClubController::index();
            break;
        case '/club/delete':
            ClubController::deleteController();
            break;
        case '/player/playerform':
            PlayerController::form();
            break;
        case '/player/playerform/save':
            PlayerController::saveController();
            break;
        case '/player':
            PlayerController::index();
            break;
        case '/player/delete':
            PlayerController::deleteController();
            break;
        case '/league/leaguelistclubs':
            echo "<br>List of league's clubs";
            break;
        case '/league/leaguelistplayers':
            echo "<br>List of league's players";
            break;  
        default:
        echo "<br>erro 404";
        break;
}

?>
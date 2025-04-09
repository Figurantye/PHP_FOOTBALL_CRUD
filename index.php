<?php
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

include 'Controller/LeagueController.php';
include 'Controller/ClubController.php';
include 'Controller/PlayerController.php';

switch ($url) {
    case '/':
        break;
        case '/league/leagueform':
            LeagueController::form();
            break;
        case '/league/leagueform/save':
            LeagueController::saveController();
            break;
        case '/league':
            LeagueController::index();
            break;
        case '/league/leaguelistclubs':
            echo "<br>List of league's clubs";
            break;
        case '/league/leaguelistplayers':
            echo "<br>List of league's players";
            break;  
        case '/club/clubform':
            ClubController::form();
            break;
        case '/club/clubform/save':
            ClubController::saveController();
            break;
        case '/club':
            ClubController::index();
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

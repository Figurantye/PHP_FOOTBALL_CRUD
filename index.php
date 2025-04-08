<?php
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
echo $url;

switch ($url) {
    case '/':
        break;
    case '/league/leagueform':
        echo "<br>Form of leagues";
        break;
    case '/league/leaguelist':
        echo "<br>List Leagues";
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


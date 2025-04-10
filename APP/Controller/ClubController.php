<?php

class ClubController
{
    public static function form()
    {
        include "Model/ClubModel.php";
        include "Model/LeagueModel.php";
        
        $club = new ClubModel();
        $league = new LeagueModel();
        $data['rows'] = $league->getAllRows();

        if (isset($_GET['id'])) {
            $club = $club->getById((int) $_GET['id']);
        }

        include 'View/Club/ClubForm.php';
    }

    public static function saveController()
    {
        include "Model/ClubModel.php";

        $league = $_POST['leagueInput'];
        $fullname = $_POST['fullnameInput'];
        $nickname = $_POST['nicknameInput'];
        $ground = $_POST['groundInput'];
        $founded = $_POST['foundedInput'];
        $coach = $_POST['coachInput'];
        $chairman = $_POST['chairmanInput'];
        $color = $_POST['colorInput'];
        $lastYearTitle = $_POST['lastYearTitleInput'];


        $club = new clubModel(); //instancia o objeto

        $club->saveModel($league, $fullname, $nickname, $ground, $founded, $coach, $chairman, $color, $lastYearTitle);
        header("Location: /club");

    }

    public static function index()
    {
        include "Model/ClubModel.php";

        $club = new ClubModel();
        $data['rows'] = $club->getAllRows();

        var_dump($data);

        include "View/Club/ClubList.php";
    }

    public static function deleteController()
    {
        include "Model/ClubModel.php";

        $club = new ClubModel();
        $club->deleteModel((int) $_GET['id']);

        header('Location: /club');
    }
}
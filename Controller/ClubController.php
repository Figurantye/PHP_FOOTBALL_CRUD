<?php

class ClubController
{
    public static function form()
    {
        include "Model/ClubModel.php";
        
        $club = new ClubModel();

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
        $saf = $_POST['safInput'];
        $chairman = $_POST['chairmanInput'];
        $color = $_POST['colorInput'];
        $lastYearTitle = $_POST['lastYearTitleInput'];


        $club = new clubModel(); //instancia o objeto

        header("Location: /club");
        $club->saveModel($league, $fullname, $nickname, $ground, $founded, $coach, $saf, $chairman, $color, $lastYearTitle);

    }

    public static function index()
    {
        include "Model/ClubModel.php";

        $club = new ClubModel();
        $data['rows'] = $club->getAllRows();

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
<?php

class ClubController
{
    public static function saveController()
    {
        include "Model/ClubModel.php";

        $league = $_POST['leagueInput'];
        $fullname = $_POST['clubNameInput'];
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
        include "Model/LeagueModel.php";

        $club = new ClubModel();
        $league = new LeagueModel();
        $leagueData['rows'] = $league->getAllRows();

        $clubData['rows'] = isset($_GET['id']) ? $club->selectClubsByLeagueModel((int)$_GET['id']) : $club->getAllRows();

        include "View/Club/ClubList.php";

    }

    public static function editController()
    {
        include "Model/ClubModel.php";

        $club = new ClubModel();
        
        $id = $_POST['id'];
        $league = $_POST['leagueInput'];
        $fullname = $_POST['clubNameInput'];
        $nickname = $_POST['nicknameInput'];
        $ground = $_POST['groundInput'];
        $founded = $_POST['foundedInput'];
        $coach = $_POST['coachInput'];
        $chairman = $_POST['chairmanInput'];
        $color = $_POST['colorInput'];
        $lastYearTitle = $_POST['lastYearTitleInput'];

        
        $club->editModel($id, $league, $fullname, $nickname, $ground, $founded, $coach, $chairman, $color, $lastYearTitle);   

        Header('Location: /club');
    }

    public static function deleteController()
    {
        include "Model/ClubModel.php";

        $club = new ClubModel();
        $club->deleteModel((int) $_GET['id']);

        header('Location: /club');
    }
}
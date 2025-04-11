<?php

class ClubController
{
    public static function saveController()
    {
        include "Model/ClubModel.php";

        $league = $_POST['leagueInsertInput'];
        $fullname = $_POST['fullnameInsertInput'];
        $nickname = $_POST['nicknameInsertInput'];
        $ground = $_POST['groundInsertInput'];
        $founded = $_POST['foundedInsertInput'];
        $coach = $_POST['coachInsertInput'];
        $chairman = $_POST['chairmanInsertInput'];
        $color = $_POST['colorInsertInput'];
        $lastYearTitle = $_POST['lastYearTitleInsertInput'];

        $club = new clubModel(); //instancia o objeto

        $club->saveModel($league, $fullname, $nickname, $ground, $founded, $coach, $chairman, $color, $lastYearTitle);
        header("Location: /club");

    }

    public static function index()
    {
        include "Model/ClubModel.php";
        include "Model/LeagueModel.php";

        $club = new ClubModel();
        $clubData['rows'] = $club->getAllRows();

        $league = new LeagueModel();
        $leagueData['rows'] = $league->getAllRows();

        include "View/Club/ClubList.php";
    }

    public static function editController()
    {
        include "Model/ClubModel.php";

        $club = new ClubModel();
        
        $id = $_POST['id'];
        $league = $_POST['leagueInsertInput'];
        $fullname = $_POST['fullnameInsertInput'];
        $nickname = $_POST['nicknameInsertInput'];
        $ground = $_POST['groundInsertInput'];
        $founded = $_POST['foundedInsertInput'];
        $coach = $_POST['coachInsertInput'];
        $chairman = $_POST['chairmanInsertInput'];
        $color = $_POST['colorInsertInput'];
        $lastYearTitle = $_POST['lastYearTitleInsertInput'];

        
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
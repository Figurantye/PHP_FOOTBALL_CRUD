<?php
include "Model/ClubModel.php";
class ClubController
{
    public static function form()
    {
        $club = new ClubModel();

        if (isset($_GET['id'])) {
            $club = $club->getById((int) $_GET['id']);
        }

        include 'View/Club/ClubForm.php';
    }

    public static function saveController($league, $fullname, $nickname, $ground, $founded, $coach, $saf, $chairman, $color, $lastYearTitle)
    {
        var_dump($_POST);
        // exit;

        $club = new clubModel(); //instancia o objeto

        $club->saveModel($league, $fullname, $nickname, $ground, $founded, $coach, $saf, $chairman, $color, $lastYearTitle);

        header("Location: /club");
    }

    public static function index()
    {
        $model = new ClubModel();

        $model->getAllRows();

        include "View/Club/ClubList.php";
    }

    public static function deleteController()
    {
        $club = new ClubModel();
        $club->deleteModel((int) $_GET['id']);

        header('Location: /club');
    }
}
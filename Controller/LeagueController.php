<?php
include "Model/LeagueModel.php";
class LeagueController{
    public static function form()
    {
        
        $league = new LeagueModel(); 
        
        if (isset($_GET['id'])) {
            $league = $league->getById((int) $_GET['id']);
        }

        include 'View/League/LeagueForm.php';
    }

    public static function saveController($fullname)
    {
        var_dump($_POST);
        // exit;
        
        $league = new LeagueModel(); //instancia o objeto
        
        $league -> setFullName($fullname);

        $league -> saveModel();

        header("Location: /league");
    }
    
    public static function index()
    {
        $model = new LeagueModel();

        $model->getAllRows();

        include "View/League/LeagueList.php";
    }

    public static function deleteController()
    {
        $league = new LeagueModel();
        $league->deleteModel((int) $_GET['id']);

        header('Location: /league');
    }
}
?>
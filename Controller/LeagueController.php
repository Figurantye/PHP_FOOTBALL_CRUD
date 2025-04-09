<?php
class LeagueController{
    public static function form()
    {
        include "Model/LeagueModel.php";
        $league = new LeagueModel(); 
        
        if (isset($_GET['id'])) {
            $league = $league->getById((int) $_GET['id']);
        }

        include 'View/League/LeagueForm.php';
    }

    public static function saveController()
    {
        include "Model/LeagueModel.php";
        
        $fullname = $_POST['fullNameInput'];
        $country = $_POST['countryInput'];
        
        header("Location: /league");

        $league = new LeagueModel(); //instancia o objeto
        $league -> saveModel($fullname, $country);
    }
    
    public static function index()
    {
        include "Model/LeagueModel.php";

        $league = new LeagueModel();
        $data['rows'] = $league->getAllRows();

        include "View/League/LeagueList.php";
    }

    public static function deleteController()
    {
        include "Model/LeagueModel.php";
        $league = new LeagueModel();
        $league->deleteModel((int) $_GET['id']);

        header('Location: /league');
    }
}
?>
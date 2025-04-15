<?php
class LeagueController{
    public static function saveController()
    {
        include "Model/LeagueModel.php";
        
        $fullname = $_POST['leagueNameInput'];
        $country = $_POST['countryInput'];
        
        
        $league = new LeagueModel(); //instancia o objeto
        $league -> saveModel($fullname, $country);
        header("Location: /league");
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

    public static function editController()
    {
        include "Model/LeagueModel.php";
        $league = new LeagueModel();

        $id = $_POST['id'];
        $league_name = $_POST['leagueNameInput'];
        $country = $_POST['countryInput'];

        
        $league->editModel($id, $league_name, $country);   

        Header('Location: /league');
    }
}
?>
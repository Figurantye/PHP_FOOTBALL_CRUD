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

    public static function save()
    {
        var_dump($_POST);
        // exit;
        
        $league = new LeagueModel(); //instancia o objeto
        
        $league -> id = $_POST['id'];
        $league -> getFullName();
        $league -> nickname = $_POST['nickname'];
        $league -> birthdate = $_POST['birthdate'];

        $model -> save();

        header("Location: /person");
    }
    
    public static function index()
    {
        $model = new LeagueModel();

        $model->getAllRows();

        include "View/Modules/Person/ListPeople.php";
    }

    public static function deleteController()
    {
        $model = new LeagueModel();
        $model->deleteModel((int) $_GET['id']);

        header('Location: /person');
    }



}
?>
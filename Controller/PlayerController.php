<?php
include "Model/PlayerModel.php";
class PlayerController
{
    public static function form()
    {

        $player = new PlayerModel();

        if (isset($_GET['id'])) {
            $player = $player->getById((int) $_GET['id']);
        }

        include 'View/Player/PlayerForm.php';
    }

    public static function saveController($currentClub, $league, $fullname, $nickname, $playerPostion, $birthdate)
    {
        var_dump($_POST);
        // exit;

        $player = new PlayerModel(); //instancia o objeto

        $player->setFullName($fullname);
        $player->setNickName($nickname);
        $player->setCurrentClub($currentClub);
        $player->setLeague($league);
        $player->setPlayerPosition($playerPostion);
        $player->setBirhdate($birthdate);

        $player->saveModel();

        header("Location: /player");
    }

    public static function index()
    {
        $model = new PlayerModel();

        $model->getAllRows();

        include "View/Player/PlayerList.php";
    }

    public static function deleteController()
    {
        $player = new PlayerModel();
        $player->deleteModel((int) $_GET['id']);

        header('Location: /player');
    }
}

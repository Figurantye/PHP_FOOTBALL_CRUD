<?php
class PlayerController
{
    public static function form()
    {
        include "Model/PlayerModel.php";

        $player = new PlayerModel();

        if (isset($_GET['id'])) {
            $player = $player->getById((int) $_GET['id']);
        }

        include 'View/Player/PlayerForm.php';
    }

    public static function saveController()
    {
        include "Model/PlayerModel.php";

        $currentClub = $_POST['currentClubInput'];
        $nickname = $_POST['nicknameInput'];
        $playerPostion = $_POST['playerPostionInput'];
        $birthdate = $_POST['birthdateInput'];

        $player = new PlayerModel(); //instancia o objeto

        header("Location: /player");
        $player->saveModel($currentClub, $league, $fullname, $nickname, $playerPostion, $birthdate);
    }

    public static function index()
    {
        include "Model/PlayerModel.php";

        $player = new PlayerModel();
        $data['rows'] = $player->getAllRows();

        include "View/Player/PlayerList.php";
    }

    public static function deleteController()
    {
        include "Model/PlayerModel.php";
        $player = new PlayerModel();
        $player->deleteModel((int) $_GET['id']);

        header('Location: /player');
    }
}
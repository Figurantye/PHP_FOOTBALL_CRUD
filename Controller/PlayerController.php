<?php
class PlayerController
{
    //CREATE
    public static function saveController()
    {
        include "Model/PlayerModel.php";

        $playerCurrentClub = $_POST['playerCurrentClubInsertInput'];
        $playerName = $_POST['playerNameInsertInput'];
        $playerNickname = $_POST['playerNicknameInsertInput'];
        $playerPosition = $_POST['playerPositionInsertInput'];
        $playerBirthdate = $_POST['playerBirthdateInsertInput'];

        $player = new PlayerModel();

        $player->saveModel($playerCurrentClub, $playerName, $playerNickname, $playerPosition, $playerBirthdate);

        if (isset($_GET['id'])){
            header("Location: /player?=" . (int)$_GET['id']);
        } else {
            header('Location: /player');
        }
    }

    //READ
    public static function index()
    {
        include "Model/PlayerModel.php";
        include "Model/ClubModel.php";

        $club = new ClubModel();
        $clubData['rows'] = $club->getAllRows();

        $player = new playerModel();
        
        $playerData['rows'] = isset($_GET['id']) ? $player->selectPlayersByClubModel((int)$_GET['id']) : $player->getAllRows();

        include "View/Player/PlayerList.php";
    }

    //UPDATE
    public static function editController()
    {
        include "Model/PlayerModel.php";

        $player = new PlayerModel();
        
        $id = $_POST['id'];
        $playerCurrentClub = $_POST['playerCurrentClubEditInput'];
        $playerName = $_POST['playerNameEditInput'];
        $playerNickname = $_POST['playerNicknameEditInput'];
        $playerPosition = $_POST['playerPositionEditInput'];
        $playerBirthdate = $_POST['playerBirthdateEditInput'];

        
        $player->editModel($id, $playerCurrentClub, $playerName, $playerNickname, $playerPosition, $playerBirthdate);


        if (isset($_GET['id'])) {
            header("Location: /player?=" . (int)$_GET['id']);
        } else {
            header('Location: /player');
        }
    }

    //DELETE
    public static function deleteController()
    {
        include "Model/PlayerModel.php";

        $player = new PlayerModel();
        $player->deleteModel((int) $_GET['id']);

        header('Location: /player');
    }
}

<?php
class PlayerController
{
    //CREATE
    public static function saveController()
    {
        include "Model/PlayerModel.php";

        $playerCurrentClub = $_POST['playerCurrentClubInput'];
        $playerName = $_POST['playerNameInput'];
        $playerNickname = $_POST['playerNicknameInput'];
        $playerPosition = $_POST['playerPositionInput'];
        $playerBirthdate = $_POST['playerBirthdateInput'];

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
        $playerCurrentClub = $_POST['playerCurrentClubInput'];
        $playerName = $_POST['playerNameInput'];
        $playerNickname = $_POST['playerNicknameInput'];
        $playerPosition = $_POST['playerPositionInput'];
        $playerBirthdate = $_POST['playerBirthdateInput'];

        
        $player->editModel($id, $playerCurrentClub, $playerName, $playerNickname, $playerPosition, $playerBirthdate);


        header('Location: /player');
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

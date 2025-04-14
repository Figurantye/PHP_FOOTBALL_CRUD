<?php
Class PlayerModel{
    private $id, $playerCurrentClub, $playerName, $playerNickname, $playerPosition, $playerBirthdate;
    
    public $playerRows; //variável para armazenar todas as linhas que estão chengando do banco de dados
    
    public function getId(){
        return $this->id;
    }
    public function getPlayerCurrentClub(){
        return $this->playerCurrentClub;
    }

    public function getPlayerName(){
        return $this->playerName; 
    }
    public function getPayerNickname(){
        return $this->playerNickname;
    }
    public function getPlayerPosition(){
        return $this->playerPosition;
    }
    public function getPlayerBirthdate(){
        return $this->playerBirthdate;
    }

    public function setPlayerCurrentClub($newClub){
        $this->playerCurrentClub = $newClub;
    }

    public function setPlayerName($newName){
         $this->playerName = $newName; 
    }
    public function setplayerNickname($newNickname){
         $this->playerNickname = $newNickname;
    }
    public function setPlayerPosition($newPosition){
         $this->playerPosition = $newPosition;
    }
    public function setBirhdate($newBirthdate){
         $this->playerBirthdate = $newBirthdate;
    }


    public function saveModel($currentClub, $name, $nickname, $position, $birthdate)
    {
        include 'DAO/PlayerDAO.php'; //conexão com a DAO

        $dao = new PlayerDAO();

        $this->playerCurrentClub = $currentClub;
        $this->playerName = $name;
        $this->playerNickname = $nickname;
        $this->playerPosition = $position;
        $this->playerBirthdate = $birthdate;

        $dao->insertPlayer($this);
    }

    public function getAllRows()
    {
        include 'DAO/PlayerDAO.php';
        $dao = new PlayerDAO();

        $this->playerRows = $dao->selectPlayers();

        return $this->playerRows;
    }

    public function selectPlayersByClubModel(int $club)
    {
        include 'DAO/PlayerDAO.php';

        $dao = new PlayerDAO();
        $this->playerRows = $dao->selectPlayersByClub($club);

        return $this->playerRows;
    }

    public function editModel($id, $currentClub, $name, $nickname, $position, $birthdate)
    {
        include 'DAO/PlayerDAO.php';

        $dao = new PlayerDAO();

        $this->playerCurrentClub = $currentClub;
        $this->playerName = $name;
        $this->playerNickname = $nickname;
        $this->playerPosition = $position;
        $this->playerBirthdate = $birthdate;
        $this->id = $id;

        $dao->updatePlayer($this);
    }

    public function deleteModel(int $id)
    {
        include 'DAO/PlayerDAO.php';

        $dao = new PlayerDAO();
        $dao->deletePlayer($id);
    }
}
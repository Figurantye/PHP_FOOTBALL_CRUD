<?php
Class PlayerModel{
    private $id, $current_club, $league, $full_name, $nickname, $player_position, $birthdate;
    
    public $rows; //variável para armazenar todas as linhas que estão chengando do banco de dados
    
    function getId(){
        return $this->id;
    }
    function getCurrentClub(){
        return $this->current_club;
    }
    function getLeague(){
        return $this->league;
    }
    function getFullName(){
        return $this->full_name; 
    }
    function getNickName(){
        return $this->nickname;
    }
    function getPlayerPosition(){
        return $this->player_position;
    }
    function getBirthdate(){
        return $this->birthdate;
    }

    function setCurrentClub($newClub){
        $this->current_club = $newClub;
    }
    function setLeague($League){
         $this->league = $League;
    }
    function setFullName($FullName){
         $this->full_name = $FullName; 
    }
    function setNickName($NickName){
         $this->nickname = $NickName;
    }
    function setPlayerPosition($position){
         $this->player_position = $position;
    }
    function setBirhdate($newBirthdate){
         $this->birthdate = $newBirthdate;
    }

    public function saveModel()
    {
        include 'DAO/PlayerDAO.php'; //conexão com a DAO

        $dao = new PlayerDAO();

        if (empty($this->id)) {
            $dao->insertPlayer($this);
        } else {
            $dao->updatePlayer($this);
        }
    }

    public function getAllRows()
    {
        include 'DAO/PlayerDAO.php';
        $dao = new PlayerDAO();

        $this->rows = $dao->selectPlayers();
    }

    public function getById(int $id){
        include 'DAO/PlayerDAO.php';

        $dao = new PlayerDAO();
        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new PlayerModel();

        return $dao;
    }

    public function deleteModel(int $id)
    {
        include 'DAO/PlayerDAO.php';

        $dao = new PlayerDAO();
        $dao->deletePlayer($id);
    }
}
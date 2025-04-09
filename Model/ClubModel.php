<?php
class ClubModel
{
    private $id, $league, $full_name, $nickname, $ground, $founded, $coach, $saf, $chairman, $color, $last_title_year;
    
    public $rows; //variável para armazenar todas as linhas que estão chengando do banco de dados
    
    function getId(){
        return $this->id;
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
    function getGround(){
        return $this->ground;
    }
    function getFounded(){
        return $this->founded;
    }
    function getCoach(){
        return $this->coach;
    }
    function getSaf(){
        return $this->saf;
    }
    function getChairman(){
        return $this->chairman;
    }
    function getColor(){
        return $this->color;
    }
    function getLastTitleYear(){
        return $this->last_title_year;
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
    function setGround($Ground){
         $this->ground = $Ground;
    }
    function setFounded($Founded){
         $this->founded = $Founded;
    }
    function setCoach($Coach){
         $this->coach = $Coach;
    }
    function setSaf($Saf){
         $this->saf = $Saf;
    }
    function setChairman($Chairman){
         $this->chairman = $Chairman;
    }
    function setColor($Color){
         $this->color = $Color;
    }
    function setLastTitleYear($LastTitleYear){
         $this->last_title_year = $LastTitleYear;
    }
    
    public function saveModel($league, $full_name, $nickname, $ground, $founded, $coach, $saf, $chairman, $color, $last_title_year)
    {
        include 'DAO/ClubDAO.php'; //conexão com a DAO

        $dao = new ClubDAO();

        $this->league = $league; 
        $this->full_name = $full_name; 
        $this->nickname = $nickname; 
        $this->ground = $ground; 
        $this->founded = $founded; 
        $this->coach = $coach; 
        $this->saf = $saf; 
        $this->chairman = $chairman; 
        $this->color = $color; 
        $this->last_title_year = $last_title_year; 


        if (empty($this->id)) {
            $dao->insertClub($this);
        } else {
            $dao->updateClub($this);
        }
    }

    public function getAllRows()
    {
        include 'DAO/ClubDAO.php';
        $dao = new ClubDAO();

        $this->rows = $dao->selectClubs();
    }

    public function getById(int $id){
        include 'DAO/ClubDAO.php';

        $dao = new ClubDAO();
        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new ClubModel();

        return $dao;
    }

    public function deleteModel(int $id)
    {
        include 'DAO/ClubDAO.php';

        $dao = new ClubDAO();
        $dao->deleteClub($id);
    }
}

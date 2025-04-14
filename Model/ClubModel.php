<?php
class ClubModel
{
    private $id, $league, $full_name, $nickname, $ground, $founded, $coach, $chairman, $color, $last_title_year, $league_name;
    
    public $clubRows; //variável para armazenar todas as linhas que estão chengando do banco de dados
    
    public function getId(){
        return $this->id;
    }
    public function getLeague(){
        return $this->league;
    }
    public function getFullName(){
        return $this->full_name; 
    }
    public function getNickName(){
        return $this->nickname;
    }
    public function getGround(){
        return $this->ground;
    }
    public function getFounded(){
        return $this->founded;
    }
    public function getCoach(){
        return $this->coach;
    }
    public function getChairman(){
        return $this->chairman;
    }
    public function getColor(){
        return $this->color;
    }
    public function getLastTitleYear(){
        return $this->last_title_year;
    }
    public function getLeagueName(){
       return $this->league_name;
    }

    public function setLeague($League){
         $this->league = $League;
    }
    public function setFullName($FullName){
         $this->full_name = $FullName; 
    }
    public function setNickName($NickName){
         $this->nickname = $NickName;
    }
    public function setGround($Ground){
         $this->ground = $Ground;
    }
    public function setFounded($Founded){
         $this->founded = $Founded;
    }
    public function setCoach($Coach){
         $this->coach = $Coach;
    }
    public function setChairman($Chairman){
         $this->chairman = $Chairman;
    }
    public function setColor($Color){
         $this->color = $Color;
    }
    public function setLastTitleYear($LastTitleYear){
         $this->last_title_year = $LastTitleYear;
    }
    
    public function saveModel($league, $full_name, $nickname, $ground, $founded, $coach, $chairman, $color, $last_title_year)
    {
        include 'DAO/ClubDAO.php'; //conexão com a DAO

        $dao = new ClubDAO();

        $this->league = $league; 
        $this->full_name = $full_name; 
        $this->nickname = $nickname; 
        $this->ground = $ground; 
        $this->founded = $founded; 
        $this->coach = $coach; 
        $this->chairman = $chairman; 
        $this->color = $color; 
        $this->last_title_year = $last_title_year; 


        $dao->insertClub($this);
    }

    public function getAllRows()
    {
        include 'DAO/ClubDAO.php';
        $dao = new ClubDAO();

        $this->clubRows = $dao->selectClubs();

        return $this->clubRows;
    }

    public function getById($id){
        include 'DAO/ClubDAO.php';

        $dao = new ClubDAO();
        $obj = $dao->selectById($id);

        return $obj ? : new ClubModel();
    }

    public function selectClubsByLeagueModel(int $league)
    {
        include 'DAO/ClubDAO.php';

        $dao = new ClubDAO();
        $this->clubRows = $dao->selectClubsByLeague($league);

        return $this->clubRows;
    }

    public function editModel($id, $league, $full_name, $nickname, $ground, $founded, $coach, $chairman, $color, $last_title_year)
    {
        include 'DAO/ClubDAO.php';

        $dao = new ClubDAO();

        $this->league = $league;
        $this->full_name = $full_name;
        $this->nickname = $nickname;
        $this->ground = $ground;
        $this->founded = $founded;
        $this->coach = $coach;
        $this->chairman = $chairman;
        $this->color = $color;
        $this->last_title_year = $last_title_year;
        $this->id = $id;

        $dao->updateClub($this);
    }

    public function deleteModel(int $id)
    {
        include 'DAO/ClubDAO.php';

        $dao = new ClubDAO();
        $dao->deleteClub($id);
    }
}

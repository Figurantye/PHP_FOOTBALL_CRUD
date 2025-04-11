<?php
class LeagueModel
{
    private $id, $full_name, $country;
    
    public $leagueRows; //variável para armazenar todas as linhas que estão chengando do banco de dados

    public function getId(){
        return $this->id;
    }
    public function getFullName(){
        return $this->full_name; 
    }
    public function getCountry(){
        return $this->country; 
    }
    public function setFullName($NewFullName){
         $this->full_name = $NewFullName; 
    }
    public function setCountry($newCountry){
         $this->country = $newCountry; 
    }
    public function saveModel($full_name, $country)
    {
        include 'DAO/LeagueDAO.php'; //conexão com a DAO

        $dao = new LeagueDAO();

        $this->full_name = $full_name;
        $this->country = $country;

        $dao->insertLeague($this);
    }

    public function editModel($id, $league_name, $country)
    {
        include 'DAO/LeagueDAO.php'; //conexão com a DAO

        $dao = new LeagueDAO();

        $this->full_name = $league_name;
        $this->country = $country;
        $this->id = $id;

        $dao->updateLeague($this);
    }

    public function getAllRows()
    {
        include 'DAO/LeagueDAO.php';
        $dao = new LeagueDAO();

        $this->leagueRows = $dao->selectLeagues();
    
        return $this->leagueRows;
    }

    public function getById(int $id){
        include 'DAO/LeagueDAO.php';

        $dao = new LeagueDAO();
        $obj = $dao->selectById($id);

        return $obj;
    }

    public function deleteModel(int $id)
    {
        include 'DAO/LeagueDAO.php';

        $dao = new LeagueDAO();
        $dao->deleteLeague($id);
    }
}
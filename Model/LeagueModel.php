<?php
class LeagueModel
{
    private $id, $full_name;
    
    public $rows; //variável para armazenar todas as linhas que estão chengando do banco de dados
    
    function getId(){
        return $this->id;
    }
    function getFullName(){
        return $this->full_name; 
    }
    function setFullName($FullName){
         $this->full_name = $FullName; 
    }
    public function saveModel()
    {
        include 'DAO/LeagueDAO.php'; //conexão com a DAO

        $dao = new LeagueDAO();

        if (empty($this->id)) {
            $dao->insertLeague($this);
        } else {
            $dao->updateLeague($this);
        }
    }

    public function getAllRows()
    {
        include 'DAO/LeagueDAO.php';
        $dao = new LeagueDAO();

        $this->rows = $dao->selectLeagues();
    }

    public function getById(int $id){
        include 'DAO/LeagueDAO.php';

        $dao = new LeagueDAO();
        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new LeagueModel();

        return $dao;
    }

    public function deleteModel(int $id)
    {
        include 'DAO/LeagueDAO.php';

        $dao = new LeagueDAO();
        $dao->deleteLeague($id);
    }
}
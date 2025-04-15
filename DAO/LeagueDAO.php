<?php

class LeagueDAO
{
    
    private $connection;

    public function __construct()
    {
        $dsn = "mysql:host=localhost:3306;dbname="/*dbname*/;

        $this->connection = new PDO($dsn, /*'user', 'password'*/); //credenciais do banco de dados
    }


    //Insert functions
    public function insertLeague(LeagueModel $league)
    {
        $sql = "INSERT INTO league (league_name, country) VALUES (?, ?)"; //string sql
    
        $stmt = $this->connection->prepare($sql);
    
        $stmt->bindValue(1, $league->getFullName());
        $stmt->bindValue(2, $league->getCountry());
    
        $stmt->execute();
    }

    public function selectById(int $id)
    {
        include_once 'Model/LeagueModel.php';

        $sql = "SELECT * FROM league WHERE league_id=?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject("LeagueModel");
    }

    //Select functions
    public function selectLeagues()
    {
        $sql = "SELECT * FROM league"; //sql para listar as pessoas do banco

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS); 
    }

    //Update functions
    public function updateLeague(LeagueModel $league) 
    {
        $sql = "UPDATE league SET league_name=?, country=? WHERE league_id=?";

        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(1, $league->getFullName());
        $stmt->bindValue(2, $league->getCountry());
        $stmt->bindValue(3, $league->getId());

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    //Delete functions
    public function deleteLeague(int $id)
    {
        $sql = "DELETE FROM league WHERE league_id=?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}

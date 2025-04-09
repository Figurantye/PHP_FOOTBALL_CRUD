<?php

class PlayerDAO
{
    private $connection;

    public function __construct()
    {
        $dsn = "mysql:host=localhost:3306;dbname=db_football";

        $this->connection = new PDO($dsn, 'root', 'root'); //credenciais do banco de dados
    }

    //Insert functions
    public function insertPlayer(PlayerModel $club)
    {
        $sql = "INSERT INTO club (full_name, nickname, player_position, birthdate, current_club) VALUES (?, ?, ?, ?, ?)"; //string sql

        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(1, $club->getFullName());
        $stmt->bindValue(2, $club->getNickName());
        $stmt->bindValue(3, $club->getPlayerPosition());
        $stmt->bindValue(4, $club->getBirthdate());
        $stmt->bindValue(5, $club->getCurrentClub());

        $stmt->execute();
    }

    public function selectById(int $id)
    {
        include_once 'Model/ClubModel.php';

        $sql = "SELECT * FROM club WHERE id=?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject("ClubModel");
    }

    //Select functions
    public function selectPlayers()
    {
        $sql = "SELECT * FROM player"; //sql para listar as pessoas do banco

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);

    }

    //Update functions
    public function updatePlayer(PLayerModel $player) 
    {
        $sql = "UPDATE player SET full_name=?, nickname=?, player_position=?, birthdate=?, league=? WHERE id=?";

        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(1, $player->getFullName());
        $stmt->bindValue(2, $player->getNickName());
        $stmt->bindValue(2, $player->getPlayerPosition());
        $stmt->bindValue(2, $player->getBirthdate());
        $stmt->bindValue(2, $player->getLeague());

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    //Delete functions
    public function deletePlayer(int $id)
    {
        $sql = "DELETE FROM player WHERE id=?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}

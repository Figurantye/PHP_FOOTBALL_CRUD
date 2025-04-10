<?php

include '/Connection.php';
class PlayerDAO
{

    //Insert functions
    public function insertPlayer(PlayerModel $club)
    {
        $sql = "INSERT INTO club (full_name, nickname, player_position, birthdate, current_club) VALUES (?, ?, ?, ?, ?)"; //string sql

        $connection = new Connection()->getConnection();
        $stmt = $connection->prepare($sql);

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

        $connection = new Connection()->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject("ClubModel");
    }

    //Select functions
    public function selectPlayers()
    {
        $sql = "SELECT * FROM player"; //sql para listar as pessoas do banco

        $connection = new Connection()->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);

    }

    //Update functions
    public function updatePlayer(PLayerModel $player) 
    {
        $sql = "UPDATE player SET full_name=?, nickname=?, player_position=?, birthdate=?, current_club WHERE id=?";

        $connection = new Connection()->getConnection();
        $stmt = $connection->prepare($sql);

        $stmt->bindValue(1, $player->getFullName());
        $stmt->bindValue(2, $player->getNickName());
        $stmt->bindValue(3, $player->getPlayerPosition());
        $stmt->bindValue(4, $player->getBirthdate());
        $stmt->bindValue(5, $player->getCurrentClub());

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    //Delete functions
    public function deletePlayer(int $id)
    {
        $sql = "DELETE FROM player WHERE id=?";

        $connection = new Connection()->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}

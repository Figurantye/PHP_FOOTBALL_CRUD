<?php

class PlayerDAO
{
    private $connection;

    public function __construct()
    {
        $dsn = "mysql:host=localhost:3306;dbname=db_football";

        $this->connection = new PDO($dsn, 'root', '3314'); //credenciais do banco de dados
    }

    //Insert functions
    public function insertPlayer(PlayerModel $club)
    {
        $sql = "INSERT INTO player (current_club, full_name, nickname, player_position, birthdate) VALUES (?, ?, ?, ?, ?)"; //string sql

        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(1, $club->getPlayerCurrentClub());
        $stmt->bindValue(2, $club->getPlayerName());
        $stmt->bindValue(3, $club->getPayerNickname());
        $stmt->bindValue(4, $club->getPlayerPosition());
        $stmt->bindValue(5, $club->getPlayerBirthdate());

        $stmt->execute();
    }

    
    //Select functions
    public function selectPlayers()
    {
        $sql = "SELECT club.club_name, club.club_id, player.player_id, player.current_club, player.full_name, player.nickname, player.player_position, player.birthdate FROM player INNER JOIN club ON player.current_club = club.club_id";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
    public function selectById(int $id)
    {
        include_once 'Model/PlayerModel.php';

        $sql = "SELECT * FROM player WHERE player_id=?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
    public function selectPlayersByClub(int $club)
    {
        $sql = "SELECT club.club_name, club.club_id, player.player_id, player.current_club, player.full_name, player.nickname, player.player_position, player.birthdate FROM player INNER JOIN club ON club.club_id = player.current_club WHERE club.club_id=?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $club);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    //Update functions
    public function updatePlayer(PLayerModel $player) 
    {
        $sql = "UPDATE player SET current_club=?, full_name=?, nickname=?, player_position=?, birthdate=? WHERE player_id=?";

        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(1, $player->getPlayerCurrentClub());
        $stmt->bindValue(2, $player->getPlayerName());
        $stmt->bindValue(3, $player->getPayerNickname());
        $stmt->bindValue(4, $player->getPlayerPosition());
        $stmt->bindValue(5, $player->getPlayerBirthdate());
        $stmt->bindValue(6, $player->getId());

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    //Delete functions
    public function deletePlayer(int $id)
    {
        $sql = "DELETE FROM player WHERE player_id=?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}

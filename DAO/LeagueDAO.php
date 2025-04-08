<?php

include '/Connection.php';
class LeagueDAO
{

    //Insert functions
    public function insertLeague(LeagueModel $club)
    {
        $sql = "INSERT INTO league (full_name, nickname) VALUES (?, ?)"; //string sql
    
        $connection = new Connection()->getConnection();
        $stmt = $connection->prepare($sql);
    
        $stmt->bindValue(1, $club->getFullName());
        $stmt->bindValue(2, $club->getNickName());
    
        $stmt->execute();
    }

    public function insertClub(ClubModel $club)
    {
        $sql = "INSERT INTO club (full_name, nickname, ground, founded, coach, saf, chairman, color, last_title_year, league) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; //string sql

        $connection = new Connection()->getConnection();
        $stmt = $connection->prepare($sql);

        $stmt->bindValue(1, $club->getFullName());
        $stmt->bindValue(2, $club->getNickName());
        $stmt->bindValue(3, $club->getGround());
        $stmt->bindValue(4, $club->getFounded());
        $stmt->bindValue(5, $club->getCoach());
        $stmt->bindValue(6, $club->getSaf());
        $stmt->bindValue(7, $club->getChairman());
        $stmt->bindValue(8, $club->getColor());
        $stmt->bindValue(9, $club->getLastTitleYear());
        $stmt->bindValue(10, $club->getLeague());

        $stmt->execute();
    }

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
        include_once 'Model/LeagueModel.php';

        $sql = "SELECT * FROM league WHERE id=?";

        $connection = new Connection()->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject("LeagueModel");
    }

    //Select functions
    public function selectLeagues()
    {
        $sql = "SELECT * FROM league"; //sql para listar as pessoas do banco

        $connection = new Connection()->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS); 

    }

    public function selectClubs()
    {
        $sql = "SELECT * FROM club"; //sql para listar as pessoas do banco

        $connection = new Connection()->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);

    }

    public function selectPlayers()
    {
        $sql = "SELECT * FROM player"; //sql para listar as pessoas do banco

        $connection = new Connection()->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);

    }

    //Update functions
    public function updateLeague(LeagueModel $league) 
    {
        $sql = "UPDATE league SET full_name=?, nickname=? WHERE id=?";

        $connection = new Connection()->getConnection();
        $stmt = $connection->prepare($sql);

        $stmt->bindValue(1, $league->getFullName());
        $stmt->bindValue(2, $league->getNickName());

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
    
    public function updateClub(ClubModel $club) 
    {
        $sql = "UPDATE club SET league=?, full_name=?, nickname=?, ground=?, founded=?, coach=?, saf=?, chairman=?, color=?, last_title_yer=? WHERE id=?";

        $connection = new Connection()->getConnection();
        $stmt = $connection->prepare($sql);

        
        $stmt->bindValue(1, $club->getLeague());
        $stmt->bindValue(2, $club->getFullName());
        $stmt->bindValue(3, $club->getNickName());
        $stmt->bindValue(4, $club->getGround());
        $stmt->bindValue(5, $club->getFounded());
        $stmt->bindValue(6, $club->getCoach());
        $stmt->bindValue(7, $club->getSaf());
        $stmt->bindValue(8, $club->getChairman());
        $stmt->bindValue(9, $club->getColor());
        $stmt->bindValue(10, $club->getLastTitleYear());

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
    
    public function updatePlayer(PLayerModel $player) 
    {
        $sql = "UPDATE player SET full_name=?, nickname=?, player_position=?, birthdate=?, league=? WHERE id=?";

        $connection = new Connection()->getConnection();
        $stmt = $connection->prepare($sql);

        $stmt->bindValue(1, $player->getFullName());
        $stmt->bindValue(2, $player->getNickName());
        $stmt->bindValue(2, $player->getPlayerPosition());
        $stmt->bindValue(2, $player->getBirthdate());
        $stmt->bindValue(2, $player->getLeague());

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    //Delete functions
    public function deleteLeague(int $id)
    {
        $sql = "DELETE FROM league WHERE id=?";

        $connection = new Connection()->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
    public function deleteClub(int $id)
    {
        $sql = "DELETE FROM club WHERE id=?";

        $connection = new Connection()->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
    public function deletePlayer(int $id)
    {
        $sql = "DELETE FROM player WHERE id=?";

        $connection = new Connection()->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}

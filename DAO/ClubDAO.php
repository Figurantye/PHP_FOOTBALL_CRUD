
<?php
class ClubDAO
{
    private $connection;

    public function __construct()
    {
        $dsn = "mysql:host=localhost:3306;dbname="/*dbname*/;

        $this->connection = new PDO($dsn, /*'user', 'password'*/ ); //credenciais do banco de dados
    }
    
    //Insert functions
    public function insertClub(ClubModel $club)
    {
        $sql = "INSERT INTO club (club_name, nickname, ground, founded, coach, chairman, color, last_title_year, league) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"; //string sql

        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(1, $club->getFullName());
        $stmt->bindValue(2, $club->getNickName());
        $stmt->bindValue(3, $club->getGround());
        $stmt->bindValue(4, $club->getFounded());
        $stmt->bindValue(5, $club->getCoach());
        $stmt->bindValue(6, $club->getChairman());
        $stmt->bindValue(7, $club->getColor());
        $stmt->bindValue(8, $club->getLastTitleYear());
        $stmt->bindValue(9, $club->getLeague());

        $stmt->execute();
    }
    

    
    //Select functions
    public function selectClubs()
    {
        $sql = "SELECT league.league_name, club.league, club.club_id, club.club_name, club.nickname, club.ground, club.coach, club.chairman, club.founded, club.last_title_year, club.color FROM club INNER JOIN league ON club.league = league.league_id"; //sql para listar as pessoas do banco

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectClubsByLeague(int $club)
    {
        $sql = "SELECT league.league_name, club.league, club.club_id, club.club_name, club.nickname, club.ground, club.coach, club.chairman, club.founded, club.last_title_year, club.color FROM club INNER JOIN league ON club.league = league.league_id WHERE league.league_id=?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $club);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }


    public function selectById(int $id)
    {
        include_once 'Model/ClubModel.php';

        $sql = "SELECT * FROM club WHERE club_id=?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject("ClubModel");
    }

    //Update functions
    public function updateClub(ClubModel $club) 
    {
        $sql = "UPDATE club SET league=?, club_name=?, nickname=?, ground=?, founded=?, coach=?, chairman=?, color=?, last_title_year=? WHERE club_id=?";

        $stmt = $this->connection->prepare($sql);

        
        $stmt->bindValue(1, $club->getLeague());
        $stmt->bindValue(2, $club->getFullName());
        $stmt->bindValue(3, $club->getNickName());
        $stmt->bindValue(4, $club->getGround());
        $stmt->bindValue(5, $club->getFounded());
        $stmt->bindValue(6, $club->getCoach());
        $stmt->bindValue(7, $club->getChairman());
        $stmt->bindValue(8, $club->getColor());
        $stmt->bindValue(9, $club->getLastTitleYear());
        $stmt->bindValue(10, $club->getId());

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    //Delete functions

    public function deleteClub(int $id)
    {
        $sql = "DELETE FROM club WHERE club_id=?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

}
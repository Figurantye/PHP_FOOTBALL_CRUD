
<?php
class ClubDAO
{
    private $connection;

    public function __construct()
    {
        $dsn = "mysql:host=localhost:3306;dbname=db_football";

        $this->connection = new PDO($dsn, 'root', 'root'); //credenciais do banco de dados
    }
    
    //Insert functions
    public function insertClub(ClubModel $club)
    {
        include '/Connection.php';
        $sql = "INSERT INTO club (full_name, nickname, ground, founded, coach, saf, chairman, color, last_title_year, league) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; //string sql

        $stmt = $this->connection->prepare($sql);

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
    

    public function selectById(int $id)
    {
        include '/Connection.php';
        include_once 'Model/ClubModel.php';

        $sql = "SELECT * FROM club WHERE id=?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject("ClubModel");
    }

    //Select functions
    public function selectClubs()
    {
        include '/Connection.php';
        $sql = "SELECT * FROM club"; //sql para listar as pessoas do banco

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    //Update functions
    public function updateClub(ClubModel $club) 
    {
        include '/Connection.php';
        $sql = "UPDATE club SET league=?, full_name=?, nickname=?, ground=?, founded=?, coach=?, saf=?, chairman=?, color=?, last_title_yer=? WHERE id=?";

        $stmt = $this->connection->prepare($sql);

        
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

    //Delete functions

    public function deleteClub(int $id)
    {
        include '/Connection.php';
        $sql = "DELETE FROM club WHERE id=?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

}

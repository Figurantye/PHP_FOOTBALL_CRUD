<?php
Class Connection{
    private $connection;

    public function __construct()
    {
        $dsn = "mysql:host=localhost:3306;dbname=db_football";

        $this->connection = new PDO($dsn, 'root', 'root'); //credenciais do banco de dados
    }

    function getConnection() {
        return $this->connection;
    }
}
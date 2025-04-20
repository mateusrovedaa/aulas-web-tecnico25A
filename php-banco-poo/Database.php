<?php
class Database {
    private $connection;

    public function __construct() {
        $host = 'localhost';
        $dbname = 'teste';
        $username = 'postgres';
        $password = 'postgres';
        $port = '5432';

        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
        $this->connection = new PDO($dsn, $username, $password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection() {
        return $this->connection;
    }

    public function closeConnection() {
        $this->connection = null;
    }
}
?>

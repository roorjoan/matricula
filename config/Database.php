<?php
class Database
{
    private $dbHost = '127.0.0.1';
    private $dbName = 'matricula';
    private $dbUser = 'root';
    private $dbPassword = '';

    public function getConnection()
    {
        try {
            $connection = new PDO("mysql:host={$this->dbHost};dbname={$this->dbName}", $this->dbUser, $this->dbPassword);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (Exception $e) {
            die("Error de conexión a la base de datos: " . $e->getMessage());
        }
    }
}

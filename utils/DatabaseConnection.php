<?php
require_once "../config/Database.php";

trait DatabaseConnection
{
    private $connection;

    public function __construct()
    {
        $database = new Database();
        $this->connection = $database->getConnection();
    }
}

<?php
require_once "../../app/config/Database.php";

trait DatabaseConnection
{
    private $connection;

    public function __construct()
    {
        $database = new Database();
        $this->connection = $database->getConnection();
    }
}

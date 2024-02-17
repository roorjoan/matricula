<?php
require_once "../utils/DatabaseConnection.php";

class User
{
    use DatabaseConnection;

    public function register(array $data): bool
    {
        try {
            $statement = $this->connection->prepare("INSERT INTO users (username, email, password, is_admin) VALUES (?, ?, ?, ?)");
            $statement->execute([$data['username'], $data['email'], $data['password'], $data['is_admin']]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function login(array $data)
    {
        try {
            $statement = $this->connection->prepare("SELECT username FROM users WHERE email = ? and password = ?");
            $statement->execute([$data['email'], $data['password']]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if (is_null($user)) {
                return false;
            }
            return $user;
        } catch (Exception $e) {
            return false;
        }
    }

    public function changeRole($id)
    {
        //TODO
    }
}

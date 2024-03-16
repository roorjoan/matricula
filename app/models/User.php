<?php
require_once "../../app/utils/DatabaseConnection.php";

class User
{
    use DatabaseConnection;

    public function register(array $data): bool
    {
        $passwordHash = password_hash($data['password'], PASSWORD_DEFAULT);

        try {
            $statement = $this->connection->prepare("INSERT INTO users (name, email, password, is_admin) VALUES (?, ?, ?, ?)");
            return $statement->execute([$data['name'], $data['email'], $passwordHash, 0]);
        } catch (Exception $e) {
            return false;
        }
    }

    public function login(array $data): bool
    {
        try {
            $statement = $this->connection->prepare("SELECT password FROM users WHERE email = ?");
            $statement->execute([$data['email']]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if (!is_null($user)) {
                if (password_verify($data['password'], $user['password'])) {
                    return true;
                }
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    public function changeRole(int $id): bool
    {
        try {
            $statement = $this->connection->prepare("SELECT is_admin FROM users WHERE id = ?");
            $statement->execute([$id]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            $roleInverted = $user['is_admin'] === 0 ? 1 : 0; //0-user,1-admin

            $statement = $this->connection->prepare("UPDATE users SET is_admin = $roleInverted WHERE id = ?");
            return $statement->execute([$id]);
        } catch (Exception $e) {
            return false;
        }
    }
}

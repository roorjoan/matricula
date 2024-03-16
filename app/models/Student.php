<?php
require_once "../../app/utils/DatabaseConnection.php";

class Student
{
    use DatabaseConnection;

    
    public function all(): array | bool
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM students");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function findByCI(string $ci): array | bool
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM students WHERE ci = ?");
            $statement->execute([$ci]);
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function findById(int $id): array | bool
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM students WHERE id = ?");
            $statement->execute([$id]);
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function store(array $data): bool
    {
        try {
            if ($this->findByCI($data['ci'])) {
                return false;
            }

            $statement = $this->connection->prepare("INSERT INTO students (ci, name, last_name, gender, address) VALUES (?, ?, ?, ?, ?)");
            return $statement->execute([$data['ci'], $data['name'], $data['last_name'], $data['gender'], $data['address']]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function update(int $id, array $data): bool
    {
        try {
            $statement = $this->connection->prepare("UPDATE students SET ci = ?, name = ?, last_name = ?, gender = ?, address = ? WHERE id = ?");
            return $statement->execute([$data['ci'], $data['name'], $data['last_name'], $data['gender'], $data['address'], $id]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete(int $id): bool
    {
        try {
            $statement = $this->connection->prepare("DELETE FROM students WHERE id = ?");
            return $statement->execute([$id]);
        } catch (PDOException $e) {
            return false;
        }
    }
}

<?php
require_once "../../app/utils/DatabaseConnection.php";

class Matricula
{
    use DatabaseConnection;

    public function matricular(array $data): bool
    {
        try {
            $sql = "INSERT INTO matricula (no_matricula, student_id, grade, grupo, regime, school) VALUES (?, ?, ?, ?, ?, ?)";
            $statement = $this->connection->prepare($sql);
            return $statement->execute([$data['no_matricula'], $data['student_id'], $data['grade'], $data['grupo'], $data['regime'], $data['school']]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function noMatriculados(): array | bool
    {
        try {
            $sql = "SELECT s.id, s.name, s.last_name FROM students s INNER JOIN matricula m ON s.id != m.student_id;";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
}

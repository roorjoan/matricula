<?php
require_once "../../app/utils/DatabaseConnection.php";

class Matricula
{
    use DatabaseConnection;

    /**
     * Registra la matrícula de un estudiante.
     *
     * @param array $data Datos de la matrícula: 'no_matricula', 'student_id', 'grade', 'grupo', 'regime' y 'school'.
     *
     * @return bool true si la matrícula se realizó correctamente, false si ocurrió algún error.
     */
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

    /**
     * Obtiene la lista de estudiantes que no están matriculados.
     *
     * @return array|bool Un array asociativo con los datos de los estudiantes no matriculados si la operación es exitosa,
     *                   o false si ocurrió algún error.
     */
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

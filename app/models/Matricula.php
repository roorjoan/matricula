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
            $sql = "SELECT id FROM students";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            $students = $statement->fetchAll(PDO::FETCH_COLUMN); //Devuelve el valor de la columna

            $sql = "SELECT student_id FROM matricula";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            $matriculas = $statement->fetchAll(PDO::FETCH_COLUMN);

            $noMatriculadosIds = array_diff($students, $matriculas);

            $noMatriculados = [];
            foreach ($noMatriculadosIds as $id) {
                $sql = "SELECT * FROM students WHERE id = ?";
                $statement = $this->connection->prepare($sql);
                $statement->execute([$id]);
                $student = $statement->fetch(PDO::FETCH_ASSOC);
                $noMatriculados[] = $student;
            }

            return $noMatriculados;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Obtiene todos los registros de matrícula de la base de datos.
     *
     * @return array|bool Un array asociativo con los datos (no_matricula, name y last_name) de todas las matrículas si la operación es exitosa,
     *                   o false si ocurrió algún error.
     */
    public function matriculados(): array | bool
    {
        try {
            $sql = "SELECT m.no_matricula, s.name, s.last_name FROM matricula as m INNER JOIN students AS s ON m.student_id = s.id;";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
}

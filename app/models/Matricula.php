<?php
require_once "../../app/utils/DatabaseConnection.php";

class Matricula
{
    use DatabaseConnection;

    /**
     * Matricula a un estudiante en un curso.
     *
     * @param array $data Los datos de matrícula del estudiante.
     *                    Debe contener las claves 'no_matricula', 'student_id', 'grade', 'grupo', 'regime' y 'school'.
     *
     * @return bool True si la matrícula se realizó correctamente, false si no se pudo matricular al estudiante.
     */
    public function matricular(array $data): bool
    {
        try {
            $statement = $this->connection->prepare("INSERT INTO matricula (no_matricula, student_id, grade, grupo, regime, school) VALUES (?, ?, ?, ?, ?, ?)");
            return $statement->execute([$data['no_matricula'], $data['student_id'], $data['grade'], $data['grupo'], $data['regime'], $data['school']]);
        } catch (PDOException $e) {
            return false;
        }
    }
}

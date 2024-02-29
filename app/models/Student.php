<?php
require_once "../../app/utils/DatabaseConnection.php";

class Student
{
    use DatabaseConnection;

    /**
     * Obtiene todos los estudiantes de la base de datos.
     *
     * @return array|bool Un array con todos los estudiantes si la consulta se realizó con éxito,
     *                   o false si ocurrió un error al ejecutar la consulta.
     */
    public function all(): array | bool
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM students");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            //var_dump($e);
            return false;
        }
    }

    /**
     * Busca un estudiante por su número de cédula en la base de datos.
     *
     * @param string $ci El número de cédula del estudiante que se va a buscar.
     *
     * @return array|bool Un array con los datos del estudiante si se encuentra,
     *                   o false si el estudiante no se encuentra o ocurre un error al ejecutar la consulta.
     */
    public function find(string $ci): array | bool
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM students WHERE ci = ?");
            $statement->execute([$ci]);
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            //var_dump($e);
            return false;
        }
    }

    /**
     * Almacena un nuevo estudiante en la base de datos.
     *
     * @param array $data Los datos del estudiante a almacenar.
     *                    Debe contener las claves 'ci', 'name', 'last_name', 'gender' y 'address'.
     *
     * @return bool True si el estudiante se almacenó correctamente, false si no se pudo almacenar
     *              o si ya existe un estudiante con el mismo número de cédula.
     */
    public function store(array $data): bool
    {
        try {
            if ($this->find($data['ci'])) {
                return false;
            }

            $statement = $this->connection->prepare("INSERT INTO students (ci, name, last_name, gender, address) VALUES (?, ?, ?, ?, ?)");
            $statement->execute([$data['ci'], $data['name'], $data['last_name'], $data['gender'], $data['address']]);
            return true;
        } catch (PDOException $e) {
            //var_dump($e);
            return false;
        }
    }

    /**
     * Actualiza los datos de un estudiante en la base de datos.
     *
     * @param int $id El ID del estudiante que se va a actualizar.
     * @param array $data Los nuevos datos del estudiante.
     *                    Debe contener las claves 'ci', 'name', 'last_name', 'gender' y 'address'.
     *
     * @return bool True si los datos del estudiante se actualizaron correctamente, false si no se pudo actualizar
     *              o si no se encontró al estudiante con el ID proporcionado.
     */
    public function update(int $id, array $data): bool
    {
        try {
            if ($this->find($data['ci'])) {
                $statement = $this->connection->prepare("UPDATE students SET ci = ?, name = ?, last_name = ?, gender = ?, address = ? WHERE id = ?");
                $statement->execute([$data['ci'], $data['name'], $data['last_name'], $data['gender'], $data['address'], $id]);
                return true;
            }
            return false;
        } catch (PDOException $e) {
            //var_dump($e);
            return false;
        }
    }

    /**
     * Elimina un estudiante de la base de datos por su ID.
     *
     * @param int $id El ID del estudiante que se va a eliminar.
     *
     * @return bool True si el estudiante se eliminó correctamente, false si no se pudo eliminar.
     */
    public function delete(int $id): bool
    {
        try {
            $statement = $this->connection->prepare("DELETE FROM students WHERE id = ?");
            $statement->execute([$id]);
            return true;
        } catch (PDOException $e) {
            //var_dump($e);
            return false;
        }
    }

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
            $statement->execute([$data['no_matricula'], $data['student_id'], $data['grade'], $data['grupo'], $data['regime'], $data['school']]);
            return true;
        } catch (PDOException $e) {
            //var_dump($e);
            return false;
        }
    }
}

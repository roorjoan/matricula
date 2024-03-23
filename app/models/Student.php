<?php
require_once "../../app/utils/DatabaseConnection.php";

class Student
{
    use DatabaseConnection;

    /**
     * Obtiene todos los estudiantes de la base de datos.
     *
     * @return array|bool Un array asociativo con los datos de todos los estudiantes si la operación es exitosa,
     *                   o false si ocurrió algún error.
     */
    public function all(): array | bool
    {
        try {
            $sql = "SELECT * FROM students";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Busca un estudiante por su número de carnet de identidad (CI).
     *
     * @param string $ci El número de carnet de identidad del estudiante a buscar.
     *
     * @return array|bool Un array asociativo con los datos del estudiante si se encuentra, o false si no se encuentra
     *                   ningún estudiante con ese número de carnet de identidad o si ocurre algún error.
     */
    public function findByCI(string $ci): array | bool
    {
        try {
            $sql = "SELECT * FROM students WHERE ci = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$ci]);
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Busca un estudiante por su ID.
     *
     * @param int $id El ID del estudiante a buscar.
     *
     * @return array|bool Un array asociativo con los datos del estudiante si se encuentra, o false si no se encuentra
     *                   ningún estudiante con ese ID o si ocurre algún error.
     */
    public function findById(int $id): array | bool
    {
        try {
            $sql = "SELECT * FROM students WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$id]);
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Almacena un nuevo estudiante en la base de datos.
     *
     * @param array $data Los datos del estudiante a almacenar: 'ci', 'name', 'last_name', 'gender' y 'address'.
     *
     * @return bool true si el estudiante se almacenó correctamente, false si ya existe un estudiante con el mismo número de carnet de identidad (CI)
     *              o si ocurrió algún error durante el proceso de almacenamiento.
     */
    public function store(array $data): bool
    {
        try {
            if ($this->findByCI($data['ci'])) {
                return false;
            }

            $sql = "INSERT INTO students (ci, name, last_name, gender, address) VALUES (?, ?, ?, ?, ?)";
            $statement = $this->connection->prepare($sql);
            return $statement->execute([$data['ci'], $data['name'], $data['last_name'], $data['gender'], $data['address']]);
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Actualiza los datos de un estudiante en la base de datos.
     *
     * @param int $id El ID del estudiante que se va a actualizar.
     * @param array $data Los nuevos datos del estudiante: 'ci', 'name', 'last_name', 'gender' y 'address'.
     *
     * @return bool true si los datos del estudiante se actualizaron correctamente, false si ocurrió algún error durante el proceso.
     */
    public function update(int $id, array $data): bool
    {
        try {
            $sql = "UPDATE students SET ci = ?, name = ?, last_name = ?, gender = ?, address = ? WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            return $statement->execute([$data['ci'], $data['name'], $data['last_name'], $data['gender'], $data['address'], $id]);
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Elimina un estudiante de la base de datos.
     *
     * @param int $id El ID del estudiante que se va a eliminar.
     *
     * @return bool true si el estudiante se eliminó correctamente, false si ocurrió algún error durante el proceso.
     */
    public function delete(int $id): bool
    {
        try {
            $sql = "DELETE FROM students WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            return $statement->execute([$id]);
        } catch (PDOException $e) {
            return false;
        }
    }
}

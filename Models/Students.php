<?php
require_once "../utils/DatabaseConnection.php";

class Students
{
    use DatabaseConnection;

    /**
     * Obtiene todos los registros de estudiantes de la base de datos.
     *
     * @return array|bool Retorna un arreglo con los registros de estudiantes si la consulta fue exitosa, o false si ocurrió un error.
     */
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

    /**
     * Busca un registro de estudiante por su ID en la base de datos.
     *
     * @param int $id El ID del estudiante a buscar.
     * @return array|bool Retorna un arreglo con los datos del estudiante si la consulta fue exitosa, o false si ocurrió un error.
     */
    public function find(int $id): array | bool
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM students WHERE id = ?");
            $statement->execute([$id]);
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Almacena un nuevo registro de estudiante en la base de datos.
     *
     * @param array $data Los datos del estudiante a almacenar, incluyendo su cédula de identidad, nombre, apellido, género y dirección.
     * @return bool Retorna true si el registro del estudiante se almacenó correctamente, o false si ocurrió un error.
     */
    public function store(array $data): bool
    {
        try {
            $statement = $this->connection->prepare("INSERT INTO students (ci, name, last_name, gender, address) VALUES (?, ?, ?, ?, ?)");
            $statement->execute([$data['ci'], $data['name'], $data['last_name'], $data['gender'], $data['address']]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Actualiza los datos de un estudiante en la base de datos.
     *
     * @param int $id El ID del estudiante cuyos datos se van a actualizar.
     * @param array $data Los nuevos datos del estudiante, incluyendo su cédula de identidad, nombre, apellido, género y dirección.
     * @return bool Retorna true si los datos del estudiante se actualizaron correctamente, o false si ocurrió un error.
     */
    public function update(int $id, array $data): bool
    {
        try {
            $statement = $this->connection->prepare("UPDATE students SET ci = ?, name = ?, last_name = ?, gender = ?, address = ? WHERE id = ?");
            $statement->execute([$data['ci'], $data['name'], $data['last_name'], $data['gender'], $data['address'], $id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Elimina un registro de estudiante de la base de datos.
     *
     * @param int $id El ID del estudiante a eliminar.
     * @return bool Retorna true si el estudiante se eliminó correctamente, o false si ocurrió un error.
     */
    public function delete(int $id): bool
    {
        try {
            $statement = $this->connection->prepare("DELETE FROM students WHERE id = ?");
            $statement->execute([$id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}

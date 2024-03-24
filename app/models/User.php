<?php
require_once "../../app/utils/DatabaseConnection.php";

class User
{
    use DatabaseConnection;

    /**
     * Registra un nuevo usuario en la base de datos.
     *
     * @param array $data Los datos del usuario a registrar: 'name', 'email' y 'password'.
     *
     * @return bool true si el usuario se registró correctamente, false si ocurrió algún error.
     */
    public function register(array $data): bool
    {
        $passwordHash = password_hash($data['password'], PASSWORD_DEFAULT);

        try {
            $sql = "INSERT INTO users (name, email, password, is_admin) VALUES (?, ?, ?, ?)";
            $statement = $this->connection->prepare($sql);
            return $statement->execute([$data['name'], $data['email'], $passwordHash, 0]);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Realiza el proceso de inicio de sesión de un usuario.
     *
     * @param array $data Los datos de inicio de sesión del usuario: 'email' y 'password'.
     *
     * @return bool true si el inicio de sesión es exitoso, false si la contraseña no coincide o si ocurre algún error.
     */
    public function login(array $data): bool
    {
        try {
            $sql = "SELECT password FROM users WHERE email = ?";
            $statement = $this->connection->prepare($sql);
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

    /**
     * Cambia el rol de un usuario entre administrador y usuario normal.
     *
     * @param int $id El ID del usuario cuyo rol se va a cambiar.
     *
     * @return bool true si se cambió el rol correctamente, false si ocurrió algún error.
     */
    public function changeRole(int $id): bool
    {
        try {
            $sql = "SELECT is_admin FROM users WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$id]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            $roleInverted = $user['is_admin'] === 0 ? 1 : 0; //0-user,1-admin

            $sql = "UPDATE users SET is_admin = $roleInverted WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            return $statement->execute([$id]);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Cierra la sesión del usuario.
     *
     * @return bool true si la sesión se cerró correctamente, false si ocurrió algún error.
     */
    public function logout(): bool
    {
        session_start();

        return session_destroy();
    }

    /**
     * Obtiene todos los registros de usuarios de la base de datos.
     *
     * @return array|bool Un array asociativo con los datos ( id, name y is_admin) de todos los usuarios si la operación es exitosa,
     *                   o false si ocurrió algún error.
     */
    public function all(): array | bool
    {
        try {
            $sql = "SELECT id, name, is_admin FROM users;";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Verifica si el usuario actual tiene privilegios de administrador.
     * Obtiene el valor 'is_admin' de la base de datos para el usuario asociado al correo electrónico de la sesión activa.
     *
     * @return bool Devuelve true si el usuario es administrador, de lo contrario, devuelve false.
     */
    public function isAdmin(): bool
    {
        $email = $_SESSION['user_email'];
        try {
            $sql = "SELECT is_admin FROM users WHERE email = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$email]);
            $response = $statement->fetch(PDO::FETCH_ASSOC);

            return $response['is_admin'] === 1 ? true : false;
        } catch (PDOException $e) {
            return false;
        }
    }
}

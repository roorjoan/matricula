<?php
require_once "../utils/DatabaseConnection.php";

class User
{
    use DatabaseConnection;

    /**
     * Registra un nuevo usuario en la base de datos.
     *
     * @param array $data Los datos del usuario a registrar.
     * @return bool Retorna true si el usuario se registró correctamente, o false si ocurrió un error.
     */
    public function register(array $data): bool
    {
        $passwordHash = password_hash($data['password'], PASSWORD_DEFAULT);

        try {
            $statement = $this->connection->prepare("INSERT INTO users (name, email, password, is_admin) VALUES (?, ?, ?, ?)");
            $statement->execute([$data['name'], $data['email'], $passwordHash, $data['is_admin']]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Verifica las credenciales de inicio de sesión de un usuario.
     *
     * @param array $data Los datos de inicio de sesión del usuario, incluyendo su correo electrónico y contraseña.
     * @return bool Retorna true si las credenciales de inicio de sesión son válidas, o false si no lo son o si ocurre un error.
     */
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

    /**
     * Cambia el rol de un usuario (de administrador a usuario o viceversa) en la base de datos.
     *
     * @param int $id El ID del usuario cuyo rol se va a cambiar.
     * @return bool Retorna true si se cambió el rol correctamente, o false si ocurrió un error.
     */
    public function changeRole(int $id): bool
    {
        try {
            $statement = $this->connection->prepare("SELECT is_admin FROM users WHERE id = ?");
            $statement->execute([$id]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            $roleInverted = $user['is_admin'] === 0 ? 1 : 0; //0-user,1-admin

            $statement = $this->connection->prepare("UPDATE users SET is_admin = $roleInverted WHERE id = ?");
            $statement->execute([$id]);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /*public function find(string $email)
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM users WHERE email = ?");
            $statement->execute([$email]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if (!is_null($user)) {
                return $user;
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }*/
}

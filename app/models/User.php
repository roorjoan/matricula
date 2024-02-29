<?php
require_once "./app/utils/DatabaseConnection.php";

class User
{
    use DatabaseConnection;

    /**
     * Registra un nuevo usuario en la base de datos.
     *
     * @param array $data Los datos del usuario a registrar.
     *                    Debe contener las claves 'name', 'email', 'password' y 'is_admin'.
     *
     * @return bool True si el usuario se registró correctamente, false si ocurrió un error.
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
     * Intenta autenticar a un usuario en el sistema.
     *
     * @param array $data Los datos de inicio de sesión del usuario.
     *                    Debe contener las claves 'email' y 'password'.
     *
     * @return bool True si el usuario se autenticó correctamente, false si no.
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
     * Cambia el rol de un usuario entre administrador y usuario estándar.
     *
     * @param int $id El ID del usuario cuyo rol se va a cambiar.
     *
     * @return bool True si el cambio de rol se realizó correctamente, false si no.
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

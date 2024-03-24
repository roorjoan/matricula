<?php
class App
{
    /**
     * Instala la aplicación si no está instalada.
     * Ejecuta el script SQL 'matricula.sql' para crear la base de datos y sus tablas.
     * Establece una cookie de instalación que expira en un año.
     *
     * @return void
     */
    public static function install(): void
    {
        if (!isset($_COOKIE['installed'])) {
            try {
                $connection = new PDO("mysql:host=127.0.0.1", 'root', '');
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $script = file_get_contents(__DIR__ . "/matricula.sql");

                $connection->exec($script);

                setcookie('installed', 'true', time() + 31536000, '/'); // Expira en un año (365 * 24 * 60 * 60 segundos)

            } catch (PDOException $e) {
                echo "Error al ejecutar el script de instalación: " . $e->getMessage();
            } finally {
                $connection = null;
            }
        }
    }

    /**
     * Desinstala la aplicación si está instalada.
     * Elimina la base de datos 'matricula' y la cookie de instalación.
     * Destruye la sesión activa si existe.
     *
     * @return void
     */
    public static function uninstall(): void
    {
        if (isset($_COOKIE['installed'])) {
            try {
                $connection = new PDO("mysql:host=127.0.0.1", 'root', '');
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "DROP DATABASE IF EXISTS matricula";
                $connection->exec($sql);

                setcookie('installed', '', time() - 3600, '/'); // Tiempo de expiración de la cookie en el pasado (1 hora) para eliminarla

                session_start();
                session_destroy();
            } catch (PDOException $e) {
                echo $e->getMessage();
            } finally {
                $connection = null;
            }
        }
    }
}

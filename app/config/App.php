<?php
class App
{
    /**
     * Realiza la instalación inicial del sistema y marca la instalación como completada utilizando una cookie.
     *
     * Este método comprueba si ya se ha realizado la instalación verificando la existencia de la cookie 'installed'.
     * Si la cookie no existe, ejecuta el script SQL de instalación "matricula.sql". Después de una instalación exitosa, establece una cookie 'installed' con una duración de un año
     * para indicar que la instalación se ha completado correctamente.
     *
     * Si ocurre algún error durante la ejecución del script de instalación o al establecer la cookie, se muestra un mensaje
     * de error que indica el problema específico encontrado.
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
}

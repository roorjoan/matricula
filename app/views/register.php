<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Regístrate fácilmente en nuestra aplicación web de gestión de estudiantes y sus matrículas. Elige trabajar comodamente y aumenta tu productividad. Entra ya, Haz tu trabajo mas fácil.">
    <title>Registrarse</title>
    <link rel="icon" href="../../public/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
</head>

<body style="background-color: #ecf2f9; background-image: url('../../public/img/bg.png');background-size: cover;background-repeat: no-repeat;background-position: center;">
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Registro de Usuario</h2>
                        <form action="../controllers/UserController.php" method="POST" id="register_form" onsubmit="return validateRegister();">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="repeat_password" class="form-label">Repetir contraseña</label>
                                <input type="password" class="form-control" id="repeat_password" name="repeat_password">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" name="register" class="btn btn-primary btn-lg">Registrarse</button>
                            </div>
                            <div class="mt-3 text-center">
                                <small>¿Ya tienes una cuenta? <a href="login.php">Entrar</a></small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../public/js/validations/register.js"></script>
</body>

</html>
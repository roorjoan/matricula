<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
</head>

<body style="background-color: #ecf2f9;">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-4">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Inicio de sesión</h2>
                        <form action="../controllers/UserController.php" method="POST" id="login_form" onsubmit="return validateLogin();">
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" name="login" class="btn btn-primary btn-lg">Entrar</button>
                            </div>
                            <div class="mt-3 text-center">
                                <small>¿No tienes una cuenta? <a href="register.php">Registrarse</a></small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../../public/js/validations/login.js"></script>
</body>

</html>
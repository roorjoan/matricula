<?php include_once "./layouts/header.php"; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mb-4">Registro de Usuario</h2>
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
                <button type="submit" name="register" class="btn btn-primary">Registrarse</button>
            </form>
        </div>
    </div>
</div>

<script src="../../public/js/register.js"></script>

<?php include_once "./layouts/footer.php"; ?>
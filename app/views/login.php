<?php include_once "./layouts/header.php"; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mb-4">Inicio de sesión</h2>
            <form action="../controllers/UserController.php" method="POST" id="login_form" onsubmit="return validateLogin();">
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" name="login" class="btn btn-primary">Entrar</button>
            </form>
        </div>
    </div>
</div>

<script src="../../public/js/login.js"></script>

<?php include_once "./layouts/footer.php"; ?>
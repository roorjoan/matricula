<div class="container-fluid fixed-top" style="background-color: #bed4ef;">
    <nav class="navbar navbar-expand-md navbar-light w-75 m-md-auto" style="background-color: #bed4ef;">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">PW</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Estudiantes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./create.php">Guardar</a></li>
                            <li><a class="dropdown-item" href="./students.php">Listar</a></li>
                            <?php if ($is_admin) { ?>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./matricular.php">Matricular</a></li>
                                <li><a class="dropdown-item" href="./matriculados.php">Matriculados</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php if ($is_admin) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./users.php">Usuarios</a>
                        </li>
                    <?php } ?>
                </ul>
                <form action="../../app/controllers/UserController.php" method="post" class="d-flex">
                    <button type="submit" name="logout" class="btn btn-outline-danger btn-sm">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </nav>
</div>
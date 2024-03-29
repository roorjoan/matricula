<?php include_once "./layouts/header.php"; ?>

Hola, <span class="text-success"><i><?= $_SESSION['user_email'] ?></i></span>

<div class="container-fluid text-center mt-5">
    <h1>Una app para la matrícula de tus estudiantes</h1><br>
    <p>
        Gestiona los datos de tus estudiantes y sus matrículas. Es muy fácil hacerlo con esta aplicación creada para tu comodidad y productividad. Haz que tu trabajo sea placentero; no te defraudará.
    </p>
    <a class="btn btn-primary btn-lg mt-5 mb-3" href="./create.php">Comienza ahora</a>
</div>

<?php include_once "./layouts/footer.php"; ?>
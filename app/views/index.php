<?php
include_once "./layouts/header.php";
//include_once "./partials/security.php";
require_once "../../app/controllers/index.php";
?>

<div class="container">
    <h1 class="text-success">Index</h1>
    <a href="create.php" class="btn btn-primary btn-sm mb-2">Guardar</a>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Carnet de identidad</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Género</th>
                <th scope="col">Dirección</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student) { ?>
                <tr>
                    <td><?= $student['ci'] ?></td>
                    <td><?= $student['name'] ?></td>
                    <td><?= $student['last_name'] ?></td>
                    <td><?= $student['gender'] ?></td>
                    <td><?= $student['address'] ?></td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm mb-2">editar</a>

                        <form action="../controllers/destroy.php" method="post">
                            <input type="hidden" name="id" value="<?= $student['id'] ?>">
                            <button onclick="return confirm('Estas seguro que deseas eliminar?');" class="btn btn-danger btn-sm">eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include_once "./layouts/footer.php"; ?>
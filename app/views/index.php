<?php
include_once "./layouts/header.php";
//include_once "./partials/security.php";
require_once "../../app/controllers/StudentController.php";
?>

<div class="container">
    <h2>Listado de estudiantes</h2>
    <a href="create.php" class="btn btn-primary btn-sm mb-2">Guardar</a>
    <?php
    if (!empty($students)) {
        echo "<a href='matricular.php' class='btn btn-info btn-sm mb-2'>Matricular</a>";
    }
    ?>

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
                        <a href="./edit.php?id=<?= $student['id'] ?>" class="btn btn-warning btn-sm mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                        </a>

                        <form action="../controllers/StudentController.php" method="post">
                            <input type="hidden" name="id" value="<?= $student['id'] ?>">
                            <button type="submit" name="delete" onclick="return confirm('Estas seguro que deseas eliminar el registro?');" class="btn btn-danger btn-sm mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include_once "./layouts/footer.php"; ?>
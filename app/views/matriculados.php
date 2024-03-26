<?php
include_once "./layouts/header.php";
include_once "./partials/authorization.php";
?>

<h2>Estudiantes matriculados</h2>
<table class="table table-striped table-bordered" id="myTable">
    <thead>
        <tr>
            <th scope="col">Número de matrícula</th>
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($matriculados as $student) { ?>
            <tr>
                <td><?= $student['no_matricula'] ?></td>
                <td><?= $student['name'] ?></td>
                <td><?= $student['last_name'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include_once "./layouts/footer.php"; ?>
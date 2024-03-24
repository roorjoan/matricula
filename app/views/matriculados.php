<?php
include_once "./layouts/header.php";
include_once "./partials/security.php";
include_once "./partials/authorization.php";
require_once "../../app/controllers/MatriculaController.php";
?>

<div class="container">
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
</div>

<script src="../../public/dataTables/jquery-3.7.1.min.js"></script>
<!-- <script src="../../public/js/bootstrap.bundle.min.js"></script> -->
<script src="../../public/dataTables/jquery.dataTables.min.js"></script>
<script src="../../public/dataTables/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "language": {
                "url": "/public/dataTables/Spanish.json"
            }
        });
    });
</script>

<?php include_once "./layouts/footer.php"; ?>
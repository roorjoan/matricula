<?php
include_once "./layouts/header.php";
include_once "./partials/security.php";
require_once "../../app/controllers/MatriculaController.php";
?>

<div class="container">
    <h2>Matrícula de Estudiante</h2>
    <form action="../controllers/MatriculaController.php" method="POST" id="matricula_form" onsubmit="return validateMatricula();">

        <div class="mb-3">
            <label for="student_id" class="form-label">Estudiante</label>
            <select class="form-select" id="student_id" name="student_id">
                <option value="" selected disabled>Seleccionar</option>
                <?php foreach ($studentsNoMatriculados as $student) { ?>
                    <option value="<?= $student['id'] ?>"><?= $student['name'] . " " . $student['last_name'] ?></option>
                <?php } ?>
            </select>
        </div>


        <div class="mb-3">
            <label for="no_matricula" class="form-label">Número de Matrícula:</label>
            <input type="text" class="form-control" id="no_matricula" name="no_matricula">
        </div>
        <div class="mb-3">
            <label for="grade" class="form-label">Grado:</label>
            <input type="text" class="form-control" id="grade" name="grade">
        </div>
        <div class="mb-3">
            <label for="grupo" class="form-label">Grupo:</label>
            <input type="text" class="form-control" id="grupo" name="grupo">
        </div>
        <div class="mb-3">
            <label for="regime" class="form-label">Régimen:</label>
            <select class="form-select" id="regime" name="regime">
                <option value="" selected disabled>Seleccionar</option>
                <option value="Externo">Externo</option>
                <option value="Interno">Interno</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="school" class="form-label">Escuela:</label>
            <input type="text" class="form-control" id="school" name="school">
        </div>
        <button type="submit" name="matricular" class="btn btn-primary">Matricular</button>
    </form>
</div>

<script src="../../public/js/validations/matricula.js"></script>

<?php include_once "./layouts/footer.php"; ?>
<?php include_once "./layouts/header.php"; ?>

<h2>Registro de Estudiante</h2>
<form class="mb-3" action="../controllers/StudentController.php" method="POST" id="form" onsubmit="return validateCreateOrEdit();">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="name" class="form-label">Nombres:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="last_name" class="form-label">Apellidos:</label>
                <input type="text" class="form-control" id="last_name" name="last_name">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="ci" class="form-label">CI:</label>
                <input type="text" class="form-control" id="ci" name="ci">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="gender" class="form-label">Género:</label>
                <select class="form-select" id="gender" name="gender">
                    <option value="" selected disabled>Seleccionar</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Dirección:</label>
        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
    </div>
    <button type="submit" name="store" class="btn btn-primary">GUARDAR</button>
</form>


<script src="../../public/js/validations/create_or_edit.js"></script>

<?php include_once "./layouts/footer.php"; ?>
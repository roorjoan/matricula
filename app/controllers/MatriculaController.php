<?php
require_once "../models/Matricula.php";

$validateMatriculaData = (empty($_POST['no_matricula']) && empty($_POST['grade'])
    && empty($_POST['grupo']) && empty($_POST['regime']) && empty($_POST['school'])); //true si estan vacios

$matriculaInstance = new Matricula();

if (isset($_POST['matricular']) && !$validateMatriculaData) {
    $matriculaInstance->matricular($_POST);
    header('Location: ../../app/views/index.php');
}

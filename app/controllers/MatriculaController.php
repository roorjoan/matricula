<?php
require_once "../models/Matricula.php";
require_once "../models/Student.php";

$validateMatriculaData = (empty($_POST['no_matricula']) && empty($_POST['grade'])
    && empty($_POST['grupo']) && empty($_POST['regime']) && empty($_POST['school'])); //true si estan vacios

$matriculaInstance = new Matricula();
$studentInstance = new Student();
$studentsNoMatriculados = [];
$matriculados = [];

if (isset($_POST['matricular']) && !$validateMatriculaData) {
    $response = $matriculaInstance->matricular($_POST);

    if ($response) {
        header('Location: ../../app/views/index.php');
    } else {
        header('Location: ../../app/views/partials/server_error.php');
    }
    //
} else {
    $studentsNoMatriculados = $matriculaInstance->noMatriculados();
    $matriculados = $matriculaInstance->matriculados();
}

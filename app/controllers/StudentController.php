<?php
require_once "../models/Student.php";

$validateStudentData = (empty($_POST['ci']) && empty($_POST['name']) && empty($_POST['last_name'])
    && empty($_POST['gender']) && empty($_POST['address'])); //true si estan vacios

$studentInstance = new Student();
$students = [];
$student = [];

if (isset($_GET['id'])) {
    $student = $studentInstance->findById($_GET['id']);
    //
} elseif (isset($_POST['store']) && !$validateStudentData) {
    $response = $studentInstance->store($_POST);

    if ($response) {
        header('Location: ../../app/views/index.php');
    } else {
        header('Location: ../../app/views/partials/server_error.php');
    }
    //
} elseif (isset($_POST['update']) && !$validateStudentData) {
    $response = $studentInstance->update($_POST['id'], $_POST);

    if ($response) {
        header('Location: ../../app/views/index.php');
    } else {
        header('Location: ../../app/views/partials/server_error.php');
    }
    //
} elseif (isset($_POST['delete'])) {
    $response = $studentInstance->delete($_POST['id']);

    if ($response) {
        header('Location: ../../app/views/index.php');
    } else {
        header('Location: ../../app/views/partials/server_error.php');
    }
    //
} else {
    $students = $studentInstance->all();
}

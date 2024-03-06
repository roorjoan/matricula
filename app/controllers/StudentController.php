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
    $studentInstance->store($_POST);
    header('Location: ../../app/views/index.php');
    //
} elseif (isset($_POST['update']) && !$validateStudentData) {
    $studentInstance->update($_POST['id'], $_POST);
    header('Location: ../../app/views/index.php');
    //
} elseif (isset($_POST['delete'])) {
    $studentInstance->delete($_POST['id']);
    header('Location: ../../app/views/index.php');
    //
} else {
    $students = $studentInstance->all();
}

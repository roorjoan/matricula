<?php
require_once "../models/Student.php";

$studentInstance = new Student();
$students = [];
$student = [];

if (isset($_GET['id'])) {
    $student = $studentInstance->findById($_GET['id']);
    //
} elseif (isset($_POST['store'])) {
    $studentInstance->store($_POST);
    header('Location: ../../app/views/index.php');
    //
} elseif (isset($_POST['update'])) {
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

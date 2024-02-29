<?php
require_once "../models/Student.php";

$student = new Student();

if ($_POST) {
    $student->delete($_POST['id']);
    header('Location: ../../app/views/index.php');
}

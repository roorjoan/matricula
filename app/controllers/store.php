<?php
require_once "../models/Student.php";

$student = new Student();

if ($_POST) {
    $student->store($_POST);
    header('Location: ../../app/views/index.php');
}

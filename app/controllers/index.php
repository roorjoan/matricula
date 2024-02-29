<?php
require_once "../models/Student.php";

$student = new Student();
$students = $student->all();

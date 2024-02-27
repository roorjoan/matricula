<?php
require_once "../Models/Student.php";

$student = new Student();
$data = json_decode(file_get_contents('php://input'), true);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $response = $student->matricular($data);

    if ($response) {
        http_response_code(200);
        echo json_encode(['message' => "Matriculado con exito"]);
    } else {
        http_response_code(400);
        echo json_encode(['message' => "No se pudo matricular"]);
    };
}

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

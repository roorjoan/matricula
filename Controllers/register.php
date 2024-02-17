<?php
require_once "../Models/User.php";

$user = new User();
$data = json_decode(file_get_contents('php://input'), true);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user->register($data);
    http_response_code(201);
    echo json_encode(['message' => "Registrado correctamente"]);
}

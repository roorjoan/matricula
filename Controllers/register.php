<?php
require_once "../Models/User.php";

$user = new User();
$data = json_decode(file_get_contents('php://input'), true);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $response = $user->register($data);

    if ($response) {
        http_response_code(201);
        echo json_encode(['message' => "Registrado correctamente"]);
    } else {
        http_response_code(400);
        echo json_encode(['message' => "Ocurrio algun error o su email ya esta en uso"]);
    }
}

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

<?php
require_once "../Models/User.php";

$user = new User();
$data = json_decode(file_get_contents('php://input'), true);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $response = $user->login($data);
    
    if ($response) {
        http_response_code(200);
        echo json_encode(['message' => "Login exitoso"]);
    } else {
        http_response_code(404);
        echo json_encode(['message' => "No esta registrado"]);
    }
}

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

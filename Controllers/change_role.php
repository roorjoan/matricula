<?php
require_once "../Models/User.php";

$user = new User();

if ($_SERVER["REQUEST_METHOD"] === "PATCH") {
    $response = $user->changeRole($_GET['id']);

    if ($response) {
        http_response_code(200);
        echo json_encode(['message' => "Rol cambiado correctamente"]);
    } else {
        http_response_code(500);
        echo json_encode(['message' => "Error en el servidor"]);
    };
}

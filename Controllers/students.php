<?php
require_once "../Models/Students.php";

$student = new Students();
$data = json_decode(file_get_contents('php://input'), true);

switch ($_SERVER['REQUEST_METHOD']) {

    case 'GET':
        http_response_code(200); //OK
        echo json_encode(['data' => $student->all()]);
        break;

    case 'POST':
        $validated = (isset($data['ci']) && isset($data['name']) && isset($data['last_name'])
            && isset($data['gender']) && isset($data['address']));

        if ($validated) {
            $student->store($data);

            http_response_code(201); //Created
        } else {
            http_response_code(400); //Bad Request
            echo json_encode(['message' => 'El estudiante no se ha creado']);
        }
        break;

    case 'PUT':
        $validated = (isset($_GET['id']) && isset($data['ci']) && isset($data['name'])
            && isset($data['last_name']) && isset($data['gender']) && isset($data['address']));

        if ($validated) {
            $student->update($_GET['id'], $data);

            http_response_code(200);
        } else {
            http_response_code(404); //Not Found
            echo json_encode(['message' => 'El estudiante no se pudo actualizar']);
        }
        break;

    case 'DELETE':
        if (isset($_GET['id'])) {
            $studentAux = $student->find($_GET['id']);

            if ($studentAux) {
                $student->delete($_GET['id']);

                http_response_code(204); //No Content
            } else {
                http_response_code(404);
                echo json_encode(['message' => 'El estudiante no se pudo eliminar']);
                return;
            }
        }
        break;

    default:
        http_response_code(405); //Method Not Allowed
}

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

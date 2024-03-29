<?php
include_once "./partials/security.php";
require_once "../../app/controllers/UserController.php";
require_once "../../app/controllers/StudentController.php";
require_once "../../app/controllers/MatriculaController.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Regístrate fácilmente en nuestra aplicación web de gestión de estudiantes y sus matrículas. Elige trabajar comodamente y aumenta tu productividad. Entra ya, Haz tu trabajo mas fácil.">
    <title>PW - Matrículas</title>
    <link rel="icon" href="../../public/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/styles.css">
    <link rel="stylesheet" href="../../public/dataTables/dataTables.bootstrap5.min.css">
</head>

<body style="background-color: #ecf2f9;">
    <?php include_once "menu.php"; ?>

    <div class="container-fluid row m-auto" style="height: 100vh;">
        <div class="col-md-2 d-none d-md-block">
            <img src="../../../public/img/1.png" alt="" class="img-fluid mt-5 pt-3">
            <img src="../../../public/img/2.png" alt="" class="img-fluid">
            <img src="../../../public/img/3.png" alt="" class="img-fluid">
        </div>
        <div class="col-md-7 m-auto mt-5 pt-4">
<?php
require_once "../models/User.php";

$validateRegisterUserData = (empty($_POST['name']) && empty($_POST['email']) && empty($_POST['password'])); //true si estan vacios
$validateLoginUserData = (empty($_POST['email']) && empty($_POST['password'])); //true si estan vacios

$userInstance = new User();

if (isset($_POST['register']) && !$validateRegisterUserData) {
    $userInstance->register($_POST);
    header('Location: ../../app/views/login.php');
    //
} elseif (isset($_POST['login']) && !$validateLoginUserData) {
    $response = $userInstance->login($_POST);
    if ($response) {
        header('Location: ../../app/views/index.php');
    } else {
        header('Location: ../../app/views/login.php');
    }
    //
}

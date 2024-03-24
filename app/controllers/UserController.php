<?php
require_once "../models/User.php";

$validateRegisterUserData = (empty($_POST['name']) && empty($_POST['email']) && empty($_POST['password'])); //true si estan vacios
$validateLoginUserData = (empty($_POST['email']) && empty($_POST['password'])); //true si estan vacios

$userInstance = new User();
$users = [];
$is_admin = false;

if (isset($_POST['register']) && !$validateRegisterUserData) {
    $response = $userInstance->register($_POST);

    if ($response) {
        header('Location: ../../app/views/login.php');
    } else {
        header('Location: ../../app/views/partials/server_error.php');
    }
    //
} elseif (isset($_POST['login']) && !$validateLoginUserData) {
    $response = $userInstance->login($_POST);

    if ($response) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['user_email'] = $_POST['email'];

        header('Location: ../../app/views/index.php');
    } else {
        header('Location: ../../app/views/login.php');
    }
    //
} elseif (isset($_POST['logout'])) {
    $response = $userInstance->logout();

    if ($response) {
        header('Location: ../../app/views/login.php');
    } else {
        header('Location: ../../app/views/partials/server_error.php');
    }
    //
} elseif (isset($_POST['changeRole'])) {
    $response = $userInstance->changeRole($_POST['id']);

    if ($response) {
        header('Location: ../../app/views/users.php');
    } else {
        header('Location: ../../app/views/partials/server_error.php');
    }
    //
} else {
    $users = $userInstance->all();
    $is_admin = $userInstance->isAdmin();
}

<?php
require_once "../models/User.php";

$userInstance = new User();
$is_admin = $userInstance->isAdmin();

if (!$is_admin) {
    header('Location: ./partials/unauthorized.php');
    exit;
}

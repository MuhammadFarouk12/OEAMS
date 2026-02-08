<?php
session_start();
require_once('../utilities/db.php');


if (isset($_COOKIE['remember_token']) && isset($_COOKIE['user_id']) && isset($_COOKIE['user_type'])) {
    $user_id = $_COOKIE['user_id'];
    $user_type = $_COOKIE['user_type'];


    $sql = $conn->prepare("DELETE FROM remember_tokens WHERE user_id = ? AND user_type = ?");
    $sql->bind_param("is", $user_id, $user_type);
    $sql->execute();

    setcookie('remember_token', '', time() - 3600, '/');
    setcookie('user_id', '', time() - 3600, '/');
    setcookie('user_type', '', time() - 3600, '/');
}


session_unset();
session_destroy();

header("Location: ../Login/login.php?message=logged_out");
exit();

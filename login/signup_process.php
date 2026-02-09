<?php
session_start();
require_once('../utilities/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $first_name = trim($_POST['first_name']);
    $middle_name = trim($_POST['middle_name']);
    $last_name = trim($_POST['last_name']);
    $phone = trim($_POST['phone']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $terms = isset($_POST['terms']);


    if (!$terms) {
        $_SESSION['error'] = 'You must accept the terms and conditions!';
        header("Location: signup.php");
        exit();
    }

    if ($password !== $confirm_password) {
        $_SESSION['error'] = 'Passwords do not match!';
        header("Location: signup.php");
        exit();
    }

    if (strlen($password) < 6) {
        $_SESSION['error'] = 'Password must be at least 6 characters long!';
        header("Location: signup.php");
        exit();
    }

    $check_phone = $conn->prepare("SELECT STUDENT_ID FROM STUDENT WHERE PHONE_NUMBER = ?");
    $check_phone->bind_param("s", $phone);
    $check_phone->execute();
    if ($check_phone->get_result()->num_rows > 0) {
        $_SESSION['error'] = 'This phone number is already registered!';
        header("Location: signup.php");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = $conn->prepare("INSERT INTO STUDENT (FIRST_NAME, MIDDLE_NAMES, LAST_NAME, PHONE_NUMBER, PASSWORD, REGISTER_DATE) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");
    $sql->bind_param("sssss", $first_name, $middle_name, $last_name, $phone, $hashed_password);

    if ($sql->execute()) {
        $student_id = $conn->insert_id;

        $_SESSION['success'] = 'Welcome to Fluentia! Your account has been created successfully.';

        header("Location: login.php");
        exit();
    } else {
        $_SESSION['error'] = 'Registration failed. Please try again.';
        header("Location: signup.php");
        exit();
    }
} else {
    header("Location: signup.php");
    exit();
}

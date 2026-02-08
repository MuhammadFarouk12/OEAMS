<?php
session_start();
require_once('../utilities/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phoneNum = trim($_POST['phone_number']);
    $password = trim($_POST['password']);
    $user_type = $_POST['user_type'];
    $remember = isset($_POST['remember']);

    if (empty($phoneNum) || empty($password)) {
        $_SESSION['error'] = 'Please fill in all fields!';
        header("Location: login.php");
        exit();
    }


    if ($user_type === 'student') {
        $sql = $conn->prepare("SELECT STUDENT_ID, PHONE_NUMBER, PASSWORD, FIRST_NAME, LAST_NAME FROM STUDENT WHERE PHONE_NUMBER = ?");
    } else {
        $sql = $conn->prepare("SELECT TEACHER_ID, PHONE_NUMBER, PASSWORD, FIRST_NAME, LAST_NAME FROM TEACHER WHERE PHONE_NUMBER = ?");
    }

    $sql->bind_param("s", $phoneNum);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $db_user_id = ($user_type === 'student') ? $user['STUDENT_ID'] : $user['TEACHER_ID'];


        if (password_verify($password, $user['PASSWORD'])) {

            $_SESSION['logged_in'] = true;
            $_SESSION['user_type'] = $user_type;

            if ($user_type === 'student') {
                $_SESSION['user_id'] = $user['STUDENT_ID'];
                $_SESSION['user_name'] = $user['FIRST_NAME'] . ' ' . $user['LAST_NAME'];
                $redirect_page = '../StudentProfile/studentProfile.php';
            } else {
                $_SESSION['user_id'] = $user['TEACHER_ID'];
                $_SESSION['user_name'] = $user['FIRST_NAME'] . ' ' . $user['LAST_NAME'];
                $redirect_page = '../teachers/Teachers_Dashboard.php';
            }

            if ($remember) {
                $token = bin2hex(random_bytes(32));
                $hashed_token = password_hash($token, PASSWORD_DEFAULT);
                $expiry = date('Y-m-d H:i:s', time() + (30 * 24 * 60 * 60));

                $token_sql = $conn->prepare("INSERT INTO remember_tokens (user_id, user_type, token, expiry) VALUES (?, ?, ?, ?)");
                $token_sql->bind_param("isss", $db_user_id, $user_type, $hashed_token, $expiry);
                $token_sql->execute();

                setcookie('remember_token', $token, time() + (30 * 24 * 60 * 60), '/');
                setcookie('user_id', $db_user_id, time() + (30 * 24 * 60 * 60), '/');
                setcookie('user_type', $user_type, time() + (30 * 24 * 60 * 60), '/');
            }

            $_SESSION['success'] = 'Welcome back, ' . $_SESSION['user_name'] . '!';
            header("Location: $redirect_page");
            exit();
        } else {
            $_SESSION['error'] = 'Invalid phone number password!';
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = 'Invalid phone number or password!';
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}

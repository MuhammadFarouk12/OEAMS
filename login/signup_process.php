<?php
session_start();
require_once('../utilities/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $first_name = trim($_POST['first_name']);
    $middle_name = trim($_POST['middle_name']);
    $last_name = trim($_POST['last_name']);
    $phone = trim($_POST['phone']);
    $password = $_POST['password'];

    $uploadDir = 'uploads/';
    $uploadPath = '';
    $errorMsg = '';

    // if (!$terms) {
    //     $_SESSION['error'] = 'You must accept the terms and conditions!';
    //     header("Location: signup.php");
    //     exit();
    // }

    // if ($password !== $confirm_password) {
    //     $_SESSION['error'] = 'Passwords do not match!';
    //     header("Location: signup.php");
    //     exit();
    // }

    if (strlen($password) < 6) {
        $_SESSION['error'] = 'Password must be at least 6 characters long!';
        header("Location: signup.php");
        exit();
    }


if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
        
        // Get file details
        $fileName = $_FILES['profile_image']['name'];
        $fileTmpPath = $_FILES['profile_image']['tmp_name'];
        $fileSize = $_FILES['profile_image']['size'];
        $fileType = $_FILES['profile_image']['type'];
        
        // Validate file is an image
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (!in_array($fileType, $allowedTypes)) {
            $errorMsg = "Only JPG, PNG, GIF, and WebP files are allowed.";
        }
        
        // Validate file size (max 2MB)
        // elseif ($fileSize > 2 * 1024 * 1024) {
        //     $errorMsg = "File size must be less than 2MB.";
        // }
        
        // Generate unique filename to avoid conflicts
        else {
            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
            $newFileName = uniqid() . '_' . time() . '.' . $fileExt;
            $uploadPath = $uploadDir . $newFileName;
            
            // Create directory if it doesn't exist
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            
            // Move uploaded file to server
            if (!move_uploaded_file($fileTmpPath, $uploadPath)) {
                $errorMsg = "Failed to upload file.";
            }
        }
    } else {
        $errorMsg = "No file uploaded or upload error occurred.";
    }
    // If no errors, proceed to Step 3 (database saving)
    $check_phone = $conn->prepare("SELECT STUDENT_ID FROM STUDENT WHERE PHONE_NUMBER = ?");
    $check_phone->bind_param("s", $phone);
    $check_phone->execute();
    if ($check_phone->get_result()->num_rows > 0) {
        $_SESSION['error'] = 'This phone number is already registered!';
        header("Location: signup.php");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // if (empty($errorMsg)) { } else { }

    $sql = $conn->prepare("
    INSERT INTO STUDENT (
        FIRST_NAME,
        MIDDLE_NAMES,
        LAST_NAME,
        PHONE_NUMBER,
        PASSWORD,
        REGISTER_DATE,
        profile_image
    ) VALUES (?, ?, ?, ?, ?, NOW(), ?)
    ");
    $sql->bind_param("ssssss", $first_name, $middle_name, $last_name, $phone, $hashed_password, $uploadPath);

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

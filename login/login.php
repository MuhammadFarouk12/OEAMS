<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    if ($_SESSION['user_type'] === 'student') {
        header("Location: ../StudentProfile/studentProfile.php");
        exit();
    } else {
        header("Location: ../teachers/Teachers_Dashboard.php");
        exit();
    }
}

if (isset($_COOKIE['remember_token']) && isset($_COOKIE['user_id']) && isset($_COOKIE['user_type'])) {
    require_once('../utilities/db.php');

    $token = $_COOKIE['remember_token'];
    $user_id = $_COOKIE['user_id'];
    $user_type = $_COOKIE['user_type'];


    $sql = $conn->prepare("SELECT * FROM remember_tokens WHERE user_id = ? AND user_type = ? AND expiry > NOW()");
    $sql->bind_param("is", $user_id, $user_type);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $token_data = $result->fetch_assoc();

 
        if (password_verify($token, $token_data['token'])) {

            $_SESSION['logged_in'] = true;
            $_SESSION['user_type'] = $user_type;
            $_SESSION['user_id'] = $user_id;


            if ($user_type === 'student') {
                header("Location: ../StudentProfile/studentProfile.php");
            } else {
                header("Location: ../teachers/Teachers_Dashboard.php");
            }
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Fluentia International Institute</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="login-container">
        <div class="welcome-section">
            <div class="logo">
                <img src="../utilities/Logo/Logo.jpeg" alt="Fluentia Logo">
            </div>
            <div class="welcome-text">
                <h1 class="welcome-title">Welcome to Fluentia</h1>
                <p class="welcome-subtitle">International Institute of English Excellence</p>
            </div>
        </div>

        <div class="login-type-switcher">
            <button class="type-btn active" onclick="switchLoginType('student')">
                👨‍🎓 Student Login
            </button>
            <button class="type-btn" onclick="switchLoginType('teacher')">
                👨‍🏫 Teacher Login
            </button>
        </div>

        <div class="form-wrapper">
            <div class="form-container" id="formContainer">
                <h2 class="form-title" id="formTitle">Student Login</h2>
                <?php

                if (isset($_SESSION['error'])) {
                    echo '<div style="background: #f8d7da; color: #721c24; padding: 12px; border-radius: 8px; margin-bottom: 20px; text-align: center; font-size: 14px;">' . htmlspecialchars($_SESSION['error']) . '</div>';
                    unset($_SESSION['error']);
                }

                if (isset($_SESSION['success'])) {
                    echo '<div style="background: #d4edda; color: #155724; padding: 12px; border-radius: 8px; margin-bottom: 20px; text-align: center; font-size: 14px;">' . htmlspecialchars($_SESSION['success']) . '</div>';
                    unset($_SESSION['success']);
                }
                ?>

                <form action="loginProcess.php" method="POST" id="loginForm">
                    <input type="hidden" name="user_type" id="userType" value="student">

                    <div class="form-group">
                        <label class="form-label" id="idLabel">Phone Number</label>
                        <input type="text" name="phone_number" class="form-input" placeholder="Enter your phone number" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="password-wrapper">
                            <input type="password" name="password" class="form-input" id="password" placeholder="Enter your password" required>
                            <button type="button" class="toggle-password" onclick="togglePassword()">👁️</button>
                        </div>
                    </div>

                    <div class="remember-forgot">
                        <label class="remember-me">
                            <input type="checkbox" name="remember">
                            <span>Remember me</span>
                        </label>
                    </div>

                    <button type="submit" class="login-btn">Login</button>

                    <div class="signup-link" id="signupLink">
                        Don't have an account? <a href="signup.php">Sign Up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let currentType = 'student';

        function switchLoginType(type) {
            if (type === currentType) return;

            const formContainer = document.getElementById('formContainer');
            const formTitle = document.getElementById('formTitle');
            const idLabel = document.getElementById('idLabel');
            const userType = document.getElementById('userType');
            const signupLink = document.getElementById('signupLink');
            const buttons = document.querySelectorAll('.type-btn');

            formContainer.classList.add('rotating');

            setTimeout(() => {
                if (type === 'student') {
                    formTitle.textContent = 'Student Login';
                    idLabel.textContent = 'Phone Number';
                    userType.value = 'student';
                    signupLink.classList.remove('hidden');
                } else {
                    formTitle.textContent = 'Teacher Login';
                    idLabel.textContent = 'Phone Number';
                    userType.value = 'teacher';
                    signupLink.classList.add('hidden');
                }
            }, 300);

            setTimeout(() => {
                formContainer.classList.remove('rotating');
            }, 600);

            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');

            currentType = type;
        }

        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleBtn = document.querySelector('.toggle-password');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleBtn.textContent = '👁️‍🗨️';
            } else {
                passwordInput.type = 'password';
                toggleBtn.textContent = '👁️';
            }
        }
    </script>
</body>

</html>
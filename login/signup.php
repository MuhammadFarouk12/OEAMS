<?php
session_start();

if (isset($_SESSION['error'])) {
    echo '<div class="error-message">' . htmlspecialchars($_SESSION['error']) . '</div>';
    unset($_SESSION['error']); 
}


if (isset($_SESSION['success'])) {
    echo '<div class="success-message">' . htmlspecialchars($_SESSION['success']) . '</div>';
    unset($_SESSION['success']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Fluentia International Institute</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(118, 75, 162, 0.1) 0%, transparent 50%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .signup-container {
            position: relative;
            z-index: 1;
            max-width: 650px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
        }

        /* Custom scrollbar */
        .signup-container::-webkit-scrollbar {
            width: 8px;
        }

        .signup-container::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .signup-container::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }

        .signup-container::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        .welcome-section {
            text-align: center;
            margin-bottom: 30px;
            animation: fadeInDown 0.8s ease;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            width: 100px;
            height: 100px;
            margin: 0 auto 20px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        }

        .logo img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }

        .welcome-text {
            color: white;
            margin-bottom: 10px;
        }

        .welcome-title {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .welcome-subtitle {
            font-size: 16px;
            opacity: 0.9;
            font-weight: 400;
        }

        .form-wrapper {
            perspective: 1000px;
        }

        .form-container {
            background: white;
            border-radius: 20px;
            padding: 45px 50px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            transition: transform 0.6s;
            transform-style: preserve-3d;
        }

        .form-container.rotating {
            animation: rotate360 0.6s ease-in-out;
        }

        @keyframes rotate360 {
            0% {
                transform: rotateY(0deg);
            }

            100% {
                transform: rotateY(360deg);
            }
        }

        .form-title {
            font-size: 24px;
            color: #302b63;
            margin-bottom: 25px;
            text-align: center;
            font-weight: 700;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        .required {
            color: #e74c3c;
        }

        .form-input,
        .form-select {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s;
        }

        .form-input:focus,
        .form-select:focus {
            outline: none;
            border-color: #302b63;
            box-shadow: 0 0 0 3px rgba(48, 43, 99, 0.1);
        }

        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
            color: #666;
        }

        .terms-agreement {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 25px;
            font-size: 13px;
            color: #666;
        }

        .terms-agreement input {
            width: 18px;
            height: 18px;
            cursor: pointer;
            margin-top: 2px;
        }

        .terms-agreement a {
            color: #302b63;
            font-weight: 600;
        }

        .signup-btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(48, 43, 99, 0.3);
        }

        .signup-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(48, 43, 99, 0.4);
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }

        .login-link a {
            color: #302b63;
            font-weight: 600;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 14px;
        }

        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .welcome-title {
                font-size: 24px;
            }

            .form-container {
                padding: 30px 25px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="signup-container">
        <div class="welcome-section">
            <div class="logo">
                <img src="../utilities/Logo/Logo.jpeg" alt="Fluentia Logo">
            </div>
            <div class="welcome-text">
                <h1 class="welcome-title">Join Fluentia</h1>
                <p class="welcome-subtitle">Start Your English Learning Journey Today</p>
            </div>
        </div>

        <div class="form-wrapper">
            <div class="form-container" id="formContainer">
                <h2 class="form-title" id="formTitle">Student Registration</h2>

                <?php
                if (isset($_GET['error'])) {
                    echo '<div class="error-message">';
                    if ($_GET['error'] == 'passwords_dont_match') {
                        echo 'Passwords do not match!';
                    } elseif ($_GET['error'] == 'email_exists') {
                        echo 'This email is already registered!';
                    } elseif ($_GET['error'] == 'phone_exists') {
                        echo 'This phone number is already registered!';
                    } elseif ($_GET['error'] == 'registration_failed') {
                        echo 'Registration failed. Please try again.';
                    } elseif ($_GET['error'] == 'terms_not_accepted') {
                        echo 'You must accept the terms and conditions!';
                    }
                    echo '</div>';
                }
                ?> 

                <form action="signup_process.php" method="POST" id="signupForm">
                    <input type="hidden" name="user_type" id="userType" value="student">

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">First Name <span class="required">*</span></label>
                            <input type="text" name="first_name" class="form-input" placeholder="John" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Middle Names</label>
                            <input type="text" name="middle_name" class="form-input" placeholder="Michael">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Last Name <span class="required">*</span></label>
                        <input type="text" name="last_name" class="form-input" placeholder="Smith" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email Address <span class="required">*</span></label>
                        <input type="email" name="email" class="form-input" placeholder="john.smith@email.com" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Phone Number <span class="required">*</span></label>
                        <input type="tel" name="phone" class="form-input" placeholder="+1 (555) 123-4567" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Date of Birth <span class="required">*</span></label>
                        <input type="date" name="dob" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Gender <span class="required">*</span></label>
                        <select name="gender" class="form-select" required>
                            <option value="">Select Gender</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Password <span class="required">*</span></label>
                        <div class="password-wrapper">
                            <input type="password" name="password" class="form-input" id="password" placeholder="Create a strong password" required>
                            <button type="button" class="toggle-password" onclick="togglePassword('password')">👁️</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Confirm Password <span class="required">*</span></label>
                        <div class="password-wrapper">
                            <input type="password" name="confirm_password" class="form-input" id="confirmPassword" placeholder="Re-enter your password" required>
                            <button type="button" class="toggle-password" onclick="togglePassword('confirmPassword')">👁️</button>
                        </div>
                    </div>

                    <div class="terms-agreement">
                        <input type="checkbox" name="terms" id="terms" required>
                        <label for="terms">
                            I agree to the <a href="terms.php" target="_blank">Terms and Conditions</a> and <a href="privacy.php" target="_blank">Privacy Policy</a>
                        </label>
                    </div>

                    <button type="submit" class="signup-btn">Create Account</button>

                    <div class="login-link">
                        Already have an account? <a href="login.php">Login Here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const toggleBtn = event.target;

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleBtn.textContent = '👁️‍🗨️';
            } else {
                passwordInput.type = 'password';
                toggleBtn.textContent = '👁️';
            }
        }

        document.getElementById('signupForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Passwords do not match!');
            }

            if (password.length < 6) {
                e.preventDefault();
                alert('Password must be at least 6 characters long!');
            }
        });
    </script>
</body>

</html>
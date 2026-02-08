<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['user_type'] !== 'student') {
    header("Location: ../Login/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile Form - English Institute</title>
    <link rel="stylesheet" href="style.css">
    <?php include('../utilities/db.php'); ?>
</head>
<?php
$id = $_SESSION['user_id'];
$sql = $conn->prepare("SELECT 
            s.STUDENT_ID, s.FIRST_NAME, s.MIDDLE_NAMES, s.LAST_NAME, s.PHONE_NUMBER,
            s.REGISTER_DATE AS ENROLLMENT_DATE, co.COURSE_NAME,
            CONCAT(t.TERM_START, ' - ', t.TERM_END) AS TERM,
            r.FINAL_EXAM_MARK AS MARK
        FROM STUDENT s
        LEFT JOIN REGISTRATION r ON s.STUDENT_ID = r.STUDENT_ID
        LEFT JOIN CLASS c ON r.CLASS_ID = c.CLASS_ID
        LEFT JOIN TERM t ON c.TERM_ID = t.TERM_ID
        LEFT JOIN COURSE co ON c.COURSE_ID = co.COURSE_ID
        WHERE s.STUDENT_ID = ?");
$sql->bind_param("i", $id);
$sql->execute();
$student = $sql->get_result()->fetch_assoc();
?>
<style>
    button.menu-btn {
        position: fixed;
        top: 30px;
        left: 30px;
        width: 50px;
        height: 50px;
        background: white;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 5px;
        transition: all 0.3s;
        z-index: 1001;
    }

    button.menu-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
    }

    button.menu-btn span {
        width: 25px;
        height: 3px;
        background: #302b63;
        border-radius: 2px;
        transition: all 0.3s;
        display: block;
    }

    button.menu-btn.active span:nth-child(1) {
        transform: rotate(45deg) translate(7px, 7px);
    }

    button.menu-btn.active span:nth-child(2) {
        opacity: 0;
    }

    button.menu-btn.active span:nth-child(3) {
        transform: rotate(-45deg) translate(7px, -7px);
    }


    div.sidebar-menu {
        position: fixed;
        top: 0;
        left: -300px;
        width: 300px;
        height: 100vh;
        background: white;
        box-shadow: 5px 0 20px rgba(0, 0, 0, 0.3);
        transition: left 0.3s ease;
        z-index: 1000;
        padding: 80px 0 20px 0;
    }

    div.sidebar-menu.active {
        left: 0;
    }

    div.menu-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s;
        z-index: 999;
    }

    div.menu-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    .sidebar-menu .menu-header {
        padding: 0 25px 20px;
        border-bottom: 2px solid #f0f0f0;
    }

    .sidebar-menu .menu-title {
        font-size: 20px;
        font-weight: 600;
        color: #333;
        margin-bottom: 5px;
    }

    .sidebar-menu .menu-subtitle {
        font-size: 13px;
        color: #666;
    }

    .sidebar-menu .menu-items {
        padding: 10px 0;
    }

    .sidebar-menu a.menu-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px 25px;
        text-decoration: none;
        color: #333;
        transition: all 0.3s;
        font-size: 15px;
        font-weight: 500;
    }

    .sidebar-menu a.menu-item:hover {
        background: #f8f9ff;
        color: #302b63;
    }

    .sidebar-menu a.menu-item.active {
        background: #302b63;
        color: white;
        border-left: 4px solid #0f0c29;
    }

    .sidebar-menu .menu-item-icon {
        font-size: 20px;
        width: 25px;
        text-align: center;
    }

    .sidebar-menu .menu-footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        padding: 20px 25px;
        border-top: 2px solid #f0f0f0;
    }

    @media print {

        button.menu-btn,
        div.sidebar-menu,
        div.menu-overlay {
            display: none;
        }
    }
</style>

<body>
    <button class="menu-btn" onclick="toggleMenu()">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <div class="sidebar-menu" id="sidebarMenu">
        <div class="menu-header">
            <div class="menu-title">Student Dashboard</div>
            <?php echo htmlspecialchars($student["FIRST_NAME"] . " " . $student["LAST_NAME"]); ?>
            -
            <?php echo htmlspecialchars($student["STUDENT_ID"]); ?>
        </div>
        <div class="menu-items">
            <a href=studentProfile.php class="menu-item active">
                <span class="menu-item-icon">📄</span>
                <span>My Profile</span>
            </a>
            <a href="payments.php" class="menu-item">
                <span class="menu-item-icon">💳</span>
                <span>Payments</span>
            </a>
        </div>
        <div class="menu-footer">
            <a href="logout.php" class="menu-item" style="color: #e74c3c;">
                <span class="menu-item-icon">🚪</span>
                <span>Logout</span>
            </a>
        </div>
    </div>

    <div class="menu-overlay" id="menuOverlay" onclick="toggleMenu()"></div>

    <div class="form-container">

        <div class="form-header">
            <div class="logo"><img src="../utilities/Logo/Logo.jpeg" alt=""></div>
            <div class="institute-name">FLUENTIA INTERNATIONAL INSTITUTE</div>
        </div>

        <div class="form-body">
            <div class="student-photo-section">
                <div class="photo-box">
                    <img src="" alt="Student Photo">
                </div>
                <div class="student-basic-info">
                    <div class="form-field" style="margin-bottom: 10px;">
                        <div class="field-label">Student Name</div>
                        <div class="field-value"><?php echo htmlspecialchars($student["FIRST_NAME"] . " " . $student["LAST_NAME"]); ?></div>
                    </div>
                    <div class="form-field">
                        <div class="field-label">Student ID</div>
                        <div class="field-value"><?php echo  $student["STUDENT_ID"]; ?></div>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <div class="section-title">Personal Information</div>
                <div class="form-row">
                    <div class="form-field">
                        <div class="field-label">Full Name</div>
                        <div class="field-value"><?php echo  $student["FIRST_NAME"] . " " . $student["MIDDLE_NAMES"] . " " . $student["LAST_NAME"]; ?></div>
                    </div>
                    <div class="form-field">
                        <div class="field-label">Student ID</div>
                        <div class="field-value"><?php echo  $student["STUDENT_ID"]; ?></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-field">
                        <div class="field-label">Phone Number</div>
                        <div class="field-value"><?php echo  $student["PHONE_NUMBER"]; ?></div>
                    </div>
                    <div class="form-field">
                        <div class="field-label">Date of Birth</div>
                        <div class="field-value">January 15, 1998</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-field">
                        <div class="field-label">Enrollment Date</div>
                        <div class="field-value"><?php echo $student["ENROLLMENT_DATE"]; ?></div>
                    </div>
                </div>
            </div>


            <div class="form-section">
                <div class="section-title">Academic Records & Course Marks</div>
                <table class="courses-table">
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Term</th>
                            <th style="text-align: center;">Mark</th>
                            <th style="text-align: center;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $student["COURSE_NAME"]; ?></td>
                            <td><?php echo $student["TERM"]; ?></td>
                            <td><?php echo $student["MARK"]; ?></td>
                            <td class="mark-cell"><?php if ($student["MARK"] >= 50) {
                                                        echo "Passed";
                                                    } else {
                                                        echo "Failed";
                                                    } ?></td>
                        </tr>
                    </tbody>
                </table>
                </td>

                <button class="download-btn" onclick="window.print()">Download PDF</button>

                <script>
                    function toggleMenu() {
                        const menu = document.getElementById('sidebarMenu');
                        const overlay = document.getElementById('menuOverlay');
                        const menuBtn = document.querySelector('.menu-btn');

                        menu.classList.toggle('active');
                        overlay.classList.toggle('active');
                        menuBtn.classList.toggle('active');
                    }
                </script>
</body>

</html>
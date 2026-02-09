<?php
include('../utilities/utilities.php');
	
if (!isset($_SESSION['user_id'])) {
    die("Access denied");
}

$teacher_id = $_SESSION['user_id'];

$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];
//تحقق من كلمة المرور الجديده اذا كانت متوافقه 
if ($new_password !== $confirm_password) {
    die("New passwords do not match.");
}

$stmt = $conn->prepare("SELECT PASSWORD FROM TEACHER WHERE TEACHER_ID=?");
$stmt->bind_param("i", $teacher_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
//التحقق من كلمة المرور الحاليه 
if (!password_verify($current_password, $row['PASSWORD'])) {
    die("Current password is incorrect.");
}
//تعديل كلمة المرور 
$stmt2 = $conn->prepare("UPDATE TEACHER SET PASSWORD= ? WHERE TEACHER_ID=?");
$stmt2->bind_param("si", password_hash($new_password, PASSWORD_DEFAULT), $teacher_id);
if ($stmt2->execute()) {
    echo "Password changed successfully!";
} else {
    echo "Failed to change password.";
}


?>
<?php
include('../utilities/utilities.php');
	
if (!isset($_SESSION['user_id'])) {
    die("Access denied");
}
$teacher_id=$_SESSION['user_id'];
//بيانات مستدعاه عن طريق ajax
$first_name = $_POST['first_name'];
$middle_names = $_POST['middle_names'];
$last_name = $_POST['last_name'];
$phone_number = $_POST['phone_number'];
//تعديل بيانات 
$stmt = $conn->prepare("UPDATE TEACHER SET FIRST_NAME=?, MIDDLE_NAMES=?, LAST_NAME=?, PHONE_NUMBER=? 
WHERE TEACHER_ID=?");
$stmt->bind_param("ssssi", $first_name, $middle_names, $last_name, $phone_number, $teacher_id);
if ($stmt->execute()) {
    echo "Account info updated successfully!";
} else {
    echo "Failed to update account info.";
}


?>
<?php
include('../utilities/utilities.php');

if (!isset($_SESSION['TEACHER_ID'])) {
    die("Access denied");
}
$teacher_id=$_SESSION['TEACHER_ID'];

$student_id=$_POST['student_id'];
$class_id=$_POST['class_id'];
$participation=$_POST['participation'];
$attendance=$_POST['attendance'];
$mid=$_POST['mid'];
$final=$_POST['final'];

$check=$conn->prepare("SELECT CLASS_ID FROM CLASS WHERE CLASS_ID=? AND TEACHER_ID=?");
$check->bind_param("ii",$class_id,$teacher_id);
$check->execute();

if($check->get_result()->num_rows==0) die("Access denied");

$stmt=$conn->prepare("UPDATE REGISTRATION SET
PARTICIPATION_MARK=?,
ATTENDANCE_MARK=?,
MID_EXAM_MARK=?,
FINAL_EXAM_MARK=?
WHERE STUDENT_ID=? AND CLASS_ID=?");

$stmt->bind_param("ddddii",$participation,$attendance,$mid,$final,$student_id,$class_id);
$stmt->execute();
echo "Saved";

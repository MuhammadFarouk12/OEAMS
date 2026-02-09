<?php
		$raw = file_get_contents("php://input");
		$body = json_decode($raw, true);
		// $id = $body["student_id"];
		$class_id = $body["class_id"];
		include("../utilities/db.php");
		$sql_get_students_class = $conn->prepare("
		SELECT 
		STUDENT_ID,
		CONCAT(FIRST_NAME,' ', IFNULL(MIDDLE_NAMES, ''), ' ', LAST_NAME) AS FULL_NAME,
		PHONE_NUMBER,
		REGISTRATION_ID
			FROM REGISTRATION NATURAL JOIN STUDENT WHERE CLASS_ID = ?
		");

		$sql_get_students_class->bind_param('i', $class_id);
		$sql_get_students_class->execute();
		$students_table = $sql_get_students_class->get_result();
		$students = [];

		while ($student = $students_table->fetch_assoc()) {
			$students[] = $student;
		}


	echo json_encode($students);
?>
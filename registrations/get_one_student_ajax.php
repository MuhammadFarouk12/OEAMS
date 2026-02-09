<?php
	// include("./get_students.php")

		$raw = file_get_contents("php://input");
		$body = json_decode($raw, true);
		$id = $body["student_id"];
		$name = $body["student_name"];
		$phone = $body["student_phone"];
		include("../utilities/db.php");
		$sql_get_students = $conn->prepare("
		SELECT 
		CONCAT(FIRST_NAME,' ', IFNULL(MIDDLE_NAMES, ''), ' ', LAST_NAME) AS FULL_NAME,
		PHONE_NUMBER,
		STUDENT_ID
			FROM STUDENT WHERE STUDENT_ID = ? 
			OR CONCAT(FIRST_NAME, ' ', IFNULL(MIDDLE_NAMES, ''), ' ', LAST_NAME) LIKE CONCAT('%', ?, '%')
			OR PHONE_NUMBER LIKE CONCAT('%', ?)
		");

		$sql_get_students->bind_param('iss', $id, $name, $phone);
		$sql_get_students->execute();
		$students_table = $sql_get_students->get_result();
		$students = [];

		while ($student = $students_table->fetch_assoc()) {
			$students[] = $student;
		}


	echo json_encode($students);
?>
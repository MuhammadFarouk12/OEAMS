<?php
		$raw = file_get_contents("php://input");
		$body = json_decode($raw, true);
		$student_id = (int)$body["student_id"];
		$class_id = (int)$body["class_id"];
		$price = (int)$body["price"];

		if($student_id == 0 || $class_id == 0 || $price == 0){
			die("This is a bad request");
		}

		include("../utilities/utilities.php");
		$sql_register_student = $conn->prepare("
			INSERT INTO REGISTRATION(CLASS_ID, PRICE, STUDENT_ID) VALUES(?, ?, ?)
		");
		$sql_register_student->bind_param('iii', $class_id, $price, $student_id);
		$sql_register_student->execute();
?>
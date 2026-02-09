<?php
		$raw = file_get_contents("php://input");
		$body = json_decode($raw, true);
		$id = $body["term_id"];
		include("../utilities/db.php");
		$sql_get_courses = $conn->prepare("SELECT * FROM CLASS NATURAL JOIN COURSE WHERE TERM_ID = ?");

		$sql_get_courses->bind_param('i', $id);
		$sql_get_courses->execute();
		$courses_table = $sql_get_courses->get_result();
		$courses = [];

		while ($course = $courses_table->fetch_assoc()) {
			$courses[] = $course;
		}


	echo json_encode($courses);
	// echo var_dump($courses);
?>
<?php
		$raw = file_get_contents("php://input");
		$body = json_decode($raw, true);
		$term_id = $body["term_id"];
		$course_id = $body["course_id"];
		include("../utilities/db.php");
		$sql_get_class = $conn->prepare("
			SELECT * FROM CLASS NATURAL JOIN COURSE WHERE TERM_ID = ? AND COURSE_ID = ?
		");

		$sql_get_class->bind_param('ii', $term_id, $course_id);
		$sql_get_class->execute();
		$class_table = $sql_get_class->get_result();
		$class = $class_table->fetch_assoc();

	echo json_encode($class);
?>
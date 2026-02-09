<?php
		$raw = file_get_contents("php://input");
		$body = json_decode($raw, true);
		$term_id = $body["term_id"];
		include("../utilities/db.php");
		$sql_get_classes_by_terms = $conn->prepare("
			SELECT 
				CONCAT(FIRST_NAME,' ', IFNULL(MIDDLE_NAMES, ''), ' ', LAST_NAME) AS FULL_NAME,
				COURSE_NAME,
				CLASS_ID
					FROM CLASS
					NATURAL JOIN TEACHER 
					NATURAL JOIN COURSE 
					WHERE TERM_ID = ?
		");

		$sql_get_classes_by_terms->bind_param('i', $term_id);
		$sql_get_classes_by_terms->execute();
		$classes_term_table = $sql_get_classes_by_terms->get_result();
		$classes_terms = [];

		while ($class_term = $classes_term_table->fetch_assoc()) {
			$classes_terms[] = $class_term;
		}


	echo json_encode($classes_terms);
?>
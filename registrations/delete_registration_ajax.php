<?php
		$raw = file_get_contents("php://input");
		$body = json_decode($raw, true);
		$registration_id = $body["regeistration_id"];
		include("../utilities/db.php");
		$sql_delete_registration = $conn->prepare("DELETE FROM REGISTRATION WHERE REGISTRATION_ID = ?");

		$sql_delete_registration->bind_param('i', $registration_id);
		$sql_delete_registration->execute();
		if($sql_delete_registration->error == ""){
			echo json_encode(["status" => "DELTED SUCCESSFULLY", "code" => 200]);
		} else {
			echo json_encode(["status" => "Internal Server Error", "code" => 500]);
		}
?>
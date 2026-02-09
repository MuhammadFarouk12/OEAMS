<?php
	include("../utilities/auth.php");
	go_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Teachers</title>
	<?php include('../utilities/utilities.php'); ?>
</head>

<body>
	<?php include('../utilities/nav.php'); ?>
	<h1>Teachers</h1>
	<button class="btn btn-primary mx-2" onClick="addClassTo('shown-pop-up', document.getElementById('addTeacherForm'))">Add Teacher</button>
	<form  class="pop-up-form hidden-pop-up" id="addTeacherForm" method="POST" action="teachers.php">
		<input required class="form-control" type="text" name="teacher_first_name" placeholder="First Name">
		<input class="form-control" type="text" name="teacher_middle_names" placeholder="Middle Names">
		<input required class="form-control" type="text" name="teacher_last_name" placeholder="Last Name">
		<input required class="form-control" type="text" name="teacher_phone_number" placeholder="Phone Number">
		<input required class="form-control" type="text" name="teacher_password" placeholder="Password">
		<div class="buttons">
			<button class="btn btn-success" type="submit">Add</button>
			<button type="button" class="btn btn-danger" onClick="removeClassFrom('shown-pop-up', document.getElementById('addTeacherForm'))">Cancel</button>
		</div>
	</form>
	<?php
		if($_SERVER["REQUEST_METHOD"] == "POST"){
				$teacher_first_name = is_valid($_POST["teacher_first_name"], 20);
				$teacher_middle_names = is_valid($_POST["teacher_middle_names"], 100);
				$teacher_last_name = is_valid($_POST["teacher_last_name"], 20);

				$sanitized_teacher_password = is_valid($_POST["teacher_password"], 100);
				$teacher_password = $_POST["teacher_password"];

				$sanitized_phone_number = filter_var($_POST["teacher_phone_number"], FILTER_SANITIZE_NUMBER_INT);
				$teacher_phone_number = is_valid($sanitized_phone_number, 25);

				if (!($teacher_first_name && $teacher_middle_names && $teacher_last_name && $teacher_phone_number && $sanitized_teacher_password)) {
					die("<p class='alert alert-danger w-75 mx-auto my-4'>Your data is too long or invalid</p>");
				} 
	
				if($conn->connect_error){
					die("Failed Connection") . $conn->connect_error;
				}

				$sql_insert_teacher = $conn->prepare("INSERT INTO TEACHER(FIRST_NAME, MIDDLE_NAMES, LAST_NAME, PHONE_NUMBER, password) values (?, ?, ?, ?, ?)");
				if($sql_insert_teacher){
					$sql_insert_teacher->bind_param(
						"sssss", 
						$teacher_first_name,
						$teacher_middle_names,
						$teacher_last_name,
						$teacher_phone_number,
						password_hash($teacher_password, PASSWORD_DEFAULT)
					);
					$sql_insert_teacher->execute();
					header("Location: teachers.php?success=1");
				}
				 else {
					die("<p class='alert alert-danger w-75 mx-auto my-4'>Your data is corrupter</p>");
				}
			} else {
				// GET Request 
				if(isset($_GET["success"])){
					echo ("<p class='alert alert-success w-75 mx-auto my-4'>The Teacher Was Added Successfully </p>");
				}
			}
		?>


		<!--  start Showing the data -->
		<table>
			<tr>
				<th>ID</th>
				<th>Teacher Name</th>
				<th>Teacher Number</th>
				<th>Actions</th>
			</tr>

			<?php
				$sql_select_teacher = $conn->prepare("SELECT * FROM TEACHER");
				$sql_select_teacher->execute();
				$teacher_data = $sql_select_teacher->get_result();
				while($teacher = $teacher_data->fetch_assoc()){
					$teacher_full_name = $teacher["FIRST_NAME"]. " " . $teacher["MIDDLE_NAMES"] . " " . $teacher["LAST_NAME"];
					echo "<tr>";
						echo "<td>" . $teacher["TEACHER_ID"] . "</td>";
						echo "<td>" . $teacher_full_name . "</td>";
						echo "<td>" . $teacher["PHONE_NUMBER"] . "</td>";
						echo "<td>
							<a href='./edit_teacher.php?id=$teacher[TEACHER_ID]'><button class='btn btn-secondary'>Edit</button></a>
						</td>";
					echo "<tr/>";
				}

			?>
		</table>
</body>
</html>
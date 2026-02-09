<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="./css/bootstrap.css">
	<link rel="stylesheet" href="./css/style.css">
</head>
<body>
<form  class="pop-up-form" id="addStudentForm" method="POST" action="./students/students.php">
	<input required class="form-control" type="text" name="student_first_name" placeholder="First Name">
	<input class="form-control" type="text" name="student_middle_names" placeholder="Middle Names">
	<input required class="form-control" type="text" name="student_last_name" placeholder="Last Name">
	<input required class="form-control" type="text" name="student_phone_number" placeholder="Phone Number">
	<div class="buttons">
		<button class="btn btn-success" type="submit">Add</button>
	</div>
</form>
</body>
</html>
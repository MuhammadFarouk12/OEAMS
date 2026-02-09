<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration</title>
	<?php include_once("../utilities/utilities.php"); ?>
	<?php include_once("./get_students.php"); ?>
</head>

<body>
	<?php include('../utilities/nav.php'); ?>
	<script>
	</script>

	<h2>Choose Class</h2>
	<label for="selectTerm">Choose The Term ID</label>
	<select name="term_id" id="selectTerm" class="form-control" onInput='fetchClasses()'>
		<option value="">Choose A Term</option>
		<?php
			include_once("../models/get_terms.php"); 
			foreach ($terms = get_terms() as $term) {
				echo "<option>" . $term['TERM_ID'] . "</option>";
			}
		?>
	</select>

	<label for="selectClasses" class='mt-4'>Choose the class name</label>
	<select name="select_classes" id="selectClasses" class="form-control" onInput="fetchStudents()" >
			<option value="">Choose A Class</option>
	</select>
	<label for="selectStudents" class="mt-4">Choose the student you want to delete</label>
	<select id="selectStudents" type="number" class="form-control" onInput="confirmDelete()">
		<option>Choose A Student</option>
	</select>

	<div class="alert alert-warning mt-4">
		<p class='w-50 m-0' id="deleteRegistration"></p>
	</div>
	<button class="btn btn-danger" onClick="deleteRegistration()" id="deleteRegistrationButton">Delete Student</button>
	<script>
		function fetchClasses() {
			fetch("./get_classes_term_ajax.php", {
				method: "POST",
				body: JSON.stringify({
					term_id: selectTerm.value
				})
			})
			.then(response => response.json())
			.then(classes => {
				let selectClasses = document.getElementById("selectClasses")
			selectClasses.innerHTML =  "<option>Choose A Class</option>"
				classes.forEach(_class => {
				 	let option = document.createElement("option")
				 	option.value = _class.CLASS_ID
				 	option.innerText = `${_class.COURSE_NAME} - Taught By => ${_class.FULL_NAME}`
				 	selectClasses.append(option)
				 })
			});
		}

		function fetchStudents(){
			fetch("./get_students_class_ajax.php", {
				method: "POST",
				body: JSON.stringify({
					class_id: selectClasses.value
				})
			})
			.then(response => response.json())
			.then(students => {
				console.log(students)
				let selectStudents = document.getElementById("selectStudents")
				selectStudents.innerHTML =  "<option>Choose A Student to Delete</option>"

				students.forEach(student => {
				 	let option = document.createElement("option")
				 	option.value = student.REGISTRATION_ID
				 	option.innerText = `${student.STUDENT_ID}-${student.FULL_NAME} (${student.PHONE_NUMBER})`
				 	selectStudents.append(option)
				 })
			})
		}
	let regeistration_id;
	function confirmDelete(){
		let message = "<h2>Are you sure you want to delete this record </h2>\n <h3><strong>This action is irreversible</strong></h3>"
		document.getElementById("deleteRegistration").innerHTML = 
		message +
		Array.from(selectStudents.children)
		.find(option => option.value == selectStudents.value)
		.innerText
		regeistration_id = selectStudents.value 
	}
	function deleteRegistration(){
		fetch("./delete_registration_ajax.php", {
			method: "POST",
			body: JSON.stringify({ regeistration_id })
		})
		.then(response => response.text())
		.then(data => { alert(data.status) })
		.catch(error => {alert(error.status)})
	};
	</script>

</body>
</html>
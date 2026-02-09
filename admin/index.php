<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    $valid_username = file_get_contents("./username.txt");
    $valid_password = file_get_contents("./password.txt");

	if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "INCORRECT USERNAME OR PASSWORD ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>

	<!-- <?php include("../utilities/nav.php");?> -->
	 <form class="w-25 mx-auto mt-5" method="POST">
		<div class="mt-4">
			<label for="username">Enter Username</label>
			<input class="form-control" type="text" id="username" name="username">
		</div>
		<div class="mt-4">
			<label for="password">Enter password</label>
			<input class="form-control" type="text" id="password" name="password">
		</div>
		<button type="submit" class="mt-4 btn btn-success">Log in</button>
	 </form>
	<?php 
		if(isset($error) && $_SERVER['REQUEST_METHOD'] === 'POST') {
			echo "<p class='w-50 mx-auto my-4 text-center alert alert-danger'>$error</p>";
		};
	?>

</body>
</html>
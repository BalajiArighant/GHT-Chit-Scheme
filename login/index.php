<!DOCTYPE html>
<html>
	<title>
		Login | Sign Up
	</title>

	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<link rel="stylesheet" href="../css/style.css" />
	</head>

	<body>
		<div class="login-wrapper">
			<form action="" class="form" method="POST">
				<h2> Login </h2>

				<div class="input-group">
					<input type="text" name="username" id="username" required />
					<label for="username"> Username </label>
				</div>

				<div class="input-group">
					<input type="password" name="password" id="password" required />
					<label for="password"> Password </label>
				</div>

				<input type="submit" value="Login" class="submit-btn" />
			</form>
		</div>

		<?php
			include('connectivity.php');
			$un = $_POST['username'];
			$password = $_POST['password'];
			//to prevent from mysqli injection
			$password = stripcslashes($password);
			$password = mysqli_real_escape_string($con, $password);
			$sql = "select * from users where username = '$un' and password = '$password'";
			$result = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$count = mysqli_num_rows($result);
			if($count == 1){
			$url = "../index.html";
			header("Location: $url");
			}
			else{
			echo "<h1> Login failed. Invalid username or password.</h1>";
			}
		?>

	</body>
</html>
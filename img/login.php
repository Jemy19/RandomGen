<?php

include 'server.php';

session_start();

error_reporting(0);

if (isset($_SESSION["usersId"])) {
	header("Location: index.php");
}

if(isset($_POST["signup"])){
	$usersName = mysqli_real_escape_string($conn,$_POST["signup_name"]);
	$usersEmail = mysqli_real_escape_string($conn,$_POST["signup_email"]);
	$usersPwd = mysqli_real_escape_string($conn, md5($_POST["signup_pwd"]));

	$check_email = mysqli_num_rows(mysqli_query($conn, "SELECT usersEmail FROM users WHERE usersEmail= '$usersEmail' "));
	
	if($check_email > 0){
		echo "<script> alert('email already exist.'); </script>";
	}

	else {
		$sql = "INSERT INTO users (usersName, usersEmail, usersPwd) VALUES ('$usersName','$usersEmail','$usersPwd')";
		$result = mysqli_query($conn, $sql);
		if ($result){
			$_post["signup_name"] = "";
			$_post["signup_email"] = "";
			$_post["signup_pwd"] = "";
			echo "<script> alert('users registration succesfull'); </script>";
		}
		else{
			echo "<script> alert('users registration failed'); </script>";
		}
	}
}
if(isset($_POST["signin"])){
	$email = mysqli_real_escape_string($conn,$_POST["email"]);
	$password = mysqli_real_escape_string($conn, md5($_POST["password"]));

	$check_email = mysqli_query($conn, "SELECT usersId FROM users WHERE usersEmail = '$email' AND usersPwd ='$password' ");
	
	if(mysqli_num_rows($check_email) > 0) {
		$row = mysqli_fetch_assoc($check_email);
		$_SESSION["usersId"] = $row['usersId'];
		header("location: index.php");
	}
	else{
		echo "<script> alert('login failed'); </script>";
	}
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">   
</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="" method="POST">
			<h1>Create Account</h1>
			<span>or use your email for registration</span>
			<input type="text" name="signup_name" placeholder="Name" value="<?php echo $_POST["signup_name"]; ?>"required />
			<input type="email" name="signup_email" placeholder="Email" value="<?php echo $_POST["signup_email"]; ?>" required />
			<input type="password" name="signup_pwd" placeholder="Password" value="<?php echo $_POST["signup_pwd"]; ?>" required />
			<button type="submit" name ="signup">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="" method="post">
			<h1>Sign in</h1>
			<span>or use your account</span>
			<input type="email" placeholder="Email" name = "email" value="<?php echo $_POST['email']; ?>" required />
			<input type="password" placeholder="Password" name = "password" value="<?php echo $_POST['password']; ?>" required />
			<button type="submit" name = "signin">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
<script src="trans.js"></script>
</body>
</html>
<?php
	session_start();
	if(isset($_COOKIE['login'])){
		$_SESSION['login'] = $_COOKIE['login'];
	}
	if(isset($_SESSION['login'])){
		header('Location: ../home/home.php');
	}else{
?>
<html>
	<head>
		<meta charset = "UTF-8">
		<title> Login </title>
		<link rel = "stylesheet" type = "text/css" href = "../header_footer/style.css">
		<link rel = "stylesheet" type = "text/css" href = "style/style.css">
		<script src = "../script/script.js"></script>
	</head>
	<body>
		<div class = "content">
			<div class = "header">
				<?php include('../header_footer/header.php');?>
				
			</div>
			<div id = "jam"></div>
			<div class = "middle">
				<h1> Login </h1>
				<form method = "POST" name = "login" action = "run_login.php">
					<table align = "center">
						<tr>
							<td>Username</td>
							<td><input type = "text" name = "username" value = "" required = "required"/></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type = "password" name = "password" value = "" required = "required"/></td>
						</tr>
					</table>
					<input type="checkbox" name="remember" value="yes"> Remember Me 
					<br>
					<input type = "submit" name = "login" value = "Login"/>
					<p><a href="../registration/registration.php">Don't have an account? </a></p>
				</form>
			</div>
			<div class = "footer">
				<?php include('../header_footer/footer.php');?>
			</div>
		</div>
	</body>
</html>
<?php
	}
?>
	
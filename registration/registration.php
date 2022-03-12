<?php
	session_start();
	if(isset($_SESSION['login'])){
		header('Location: ../home/home.php');
	}else{
?>
<html>
	<head>
		<meta charset = "UTF-8">
		<title> Registration </title>
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
				<h1> Registration </h1>
				<form method = "POST" name = "login" action = "run_registration.php">
					<table align = "center">
						<tr>
							<td>Nama Lengkap</td>
							<td><input type = "text" name = "nama" value = "" required = "required"/></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type = "text" name = "email" value = "" required = "required"/></td>
						</tr>
						<tr>
							<td>Username</td>
							<td><input type = "text" name = "username" value = "" required = "required"/></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type = "password" name = "password" value = "" required = "required"/></td>
						</tr>
						<tr>
							<td>Confirm Password</td>
							<td><input type = "password" name = "password2" value = "" required = "required"/></td>
						</tr>
					</table>
					<br>
					<input type = "submit" name = "Registration" value = "Registration"/>
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
	
<?php
	session_start();
	if(isset($_SESSION['login'])){
?>
<html>
	<head>
		<meta charset = "UTF-8">
		<title> Write </title>
		<link rel = "stylesheet" type = "text/css" href = "../header_footer/style.css">
		<link rel = "stylesheet" type = "text/css" href = "style/style.css">
		<script src = "script/script.js"></script>
	</head>
	<body>
		<div class = "content">
			<div class = "header">
				<?php include('../header_footer/header_loged_in.php');?>
			</div>
			<div class = "middle">
				<h1>Upload Your Own Book!</h1>
				<form name = "make" method = "POST" action = "run_upload.php" enctype = "multipart/form-data">
					<table align = "center">
						<tr>
							<td>Your Book's Title</td>
							<td><input type = "text" name = "title" value = ""/></td>
						</tr>
						<tr>
							<td>Author</td>
							<td><input type = "text" name = "author" value = ""/></td>
						</tr>
						<tr>
							<td>Your Book (.pdf)</td>
							<td><input type = "file" name = "file1"/></td>
						</tr>
						<tr>
							<td>Picture (.jpg, .jpeg, .png)</td>
							<td><input type = "file" name = "file2"/></td>
						</tr>
					</table>
					<br>
					<input type = "submit" name = "submit" value = "upload"/>
				</form>
			</div>
			<div class = "footer">
				<?php include('../header_footer/footer.php');?>
			</div>
		</div>
	</body>
</html>
<?php
	}else{
		header('Location: ../login/login.php');
	}
?>
	
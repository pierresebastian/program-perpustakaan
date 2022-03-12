<?php
	session_start();
	if(isset($_SESSION['login'])){
?>
<html>
	<head>
		<meta charset = "UTF-8">
		<title> Reading </title>
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
				<iframe src = <?php echo $_GET['file'];?> height = "500px" width = "1230px">
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
	
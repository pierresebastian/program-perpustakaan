<?php
	session_start();
	if(isset($_SESSION['login'])){
?>
<html>
	<head>
		<meta charset = "UTF-8">
		<title> about Us </title>
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
				<h1 style = 'text-align: center;'> About Us!!!</h1>
				<?php
					echo "<div class='slideshow=container'>">
					include('../connect.php');
					$sql = "SELECT * FROM biodata ORDER BY id DESC LIMIT 1";
					$result = mysqli_query($con, $sql);
					while($row = mysqli_fetch_row($result)){
						$banyak = $row[0];
					}
					$slide = ceil($banyak/2);
					$counter = 1;
					for($i = 0; $i < $slide; $i++){
						echo "<div class = 'mySlides'>";
						$margin = 0;
						for($j = 0; $j < 4; $j++){
							$sql = "SELECT * FROM biodata WHERE id = '$counter'";
							$result = mysqli_query($con, $sql);
							while($row = mysqli_fetch_row($result)){
								echo "<div class='bio'>";
								echo "<img src='" . $row[6] . "' style='width:135px; height:225px; margin-left: " . $margin . "px;'>";
									echo"<p>Nama Lengkap : " .$row[1]."</p><br>";
									echo"<p>Instagram	 : " .$row[2]."</p><br>";
									echo"<p>Line		 : " .$row[3]."</p><br>";
									echo"<p>Hobby		 : " .$row[4]."</p><br>";
									echo"<p>Email		 : " .$row[5]."</p>";
								echo "</div>";
							}
							$margin = 100;
							$counter++;
						}
						echo "</div>";
					}
				?>
				<br> 
				</div>
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
	
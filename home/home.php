<?php
	session_start();
		if(isset($_SESSION['login'])){
?>
<html>
	<head>
		<meta charset = "UTF-8">
		<title> Home </title>
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
				<h1 style = 'text-align: center;'> Hottest Book</h1>
				<?php
					echo "<div class='slideshow=container'>">
					include('../connect.php');
					$sql = "SELECT * FROM book ORDER BY id DESC LIMIT 1";
					$result = mysqli_query($con, $sql);
					while($row = mysqli_fetch_row($result)){
						$banyak = $row[0];
					}
					$slide = ceil($banyak/4);
					$counter = 1;
					for($i = 0; $i < $slide; $i++){
						echo "<div class = 'mySlides'>";
						$margin = 0;
						for($j = 0; $j < 4; $j++){
							$sql = "SELECT * FROM book WHERE id = '$counter'";
							$result = mysqli_query($con, $sql);
							while($row = mysqli_fetch_row($result)){
								echo "<a href = '../read/read2.php?file=".$row[2]."'><img src='" . $row[4] . "' style='width:135px; height:225px; margin-left: " . $margin . "px;'></a>";
								echo "<div class='text" . ($j+1) . "'><a href = '../read/read2.php?file=".$row[2]."'>" . $row[1] . "</a></div>";
							}
							$margin = 200;
							$counter++;
						}
						echo "</div>";
					}
				?>
				<br>
				<div style = 'text-align: center; margin-top: 8px;'>
					<?php
						for($i = 0; $i < $slide; $i++){
							echo "<span class='dot'></span>";
						}
					?>
				</div> 
				</div>
			</div>
			<div class = "bottom">
				<h1 style = "text-align: center">Wanna Read / Write?</h1>
				<a href = "../read/read.php"><img src = "../image/read.jpg" style = "width: 200px; height: 225px; margin-left: 200px;"></a>
				<div class = "text5"><a href = "">Read</a></div>
				<a href = "../write/write.php"><img src = "../image/write.jpg" style = "width: 200px; height: 225px; margin-left: 400px;"></a>
				<div class = "text6"><a href = "">Write</a></div>
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
	
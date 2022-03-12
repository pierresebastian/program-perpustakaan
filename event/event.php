<?php
	session_start();
	if(isset($_SESSION['login'])){
?>
<html>
	<head>
		<meta charset = "UTF-8">
		<title> Event </title>
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
				<h1 style = 'text-align: center;'>New Event</h1>
				<?php
					echo "<div class='slideshow=container'>">
					include('../connect.php');
					$sql = "SELECT * FROM lomba ORDER BY id DESC LIMIT 1";
					$result = mysqli_query($con, $sql);
					while($row = mysqli_fetch_row($result)){
						$banyak = $row[0];
					}
					$k = 1;
					$slide = ceil($banyak/4);
					$counter = 1;
					for($i = 0; $i < $slide; $i++){
						echo "<div class = 'mySlides'>";
						$margin = 0;
						for($j = 0; $j < 4; $j++){
							$sql = "SELECT * FROM lomba WHERE id = '$counter'";
							$result = mysqli_query($con, $sql);
							while($row = mysqli_fetch_row($result)){
								if($row[2] == 1){
									echo "<img src='" . $row[3] . "' style='width:135px; height:225px; margin-left: " . $margin . "px;'>";
									echo "<div class='text" . ($j+1) . "'>" . $row[1] . "</a></div>";
								}
							}
							$margin = 200;
							$k++;
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
				<h1 style = "text-align: center">Wanna Join?</h1>
				<form name = "registration" method = "POST" enctype = "multipart/form-data" action = "run_event.php">
					<table align = "center">
						<tr>
							<td>Name</td>
							<td><input type = "text" name = "name" value = ""/></td>	
						</tr>
						<tr>
							<td>Email</td>
							<td><input type = "text" name = "email" value = "" required = "required"/></td>
						</tr>
						<tr>
							<td>Your Book (.pdf)</td>
							<td><input type = "file" name = "file"/></td>
						</tr>
						<tr>
							<td>Event</td>
							<td>
								<select name = "event">
									<option disabled selected>Choose</option>
									<?php
										include("../connect.php");
										$sql = "SELECT * FROM lomba";
										$result = mysqli_query($con, $sql);
										while($row = mysqli_fetch_row($result)){
											if($row[2] == 1){
												echo "<option value = '" . $row[1] . "'>" . $row[1] . "</option>";
											}
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td style = "text-align: center" colspan = 2><input type = "submit" name = "submit" value = "Registration"/></td>
						</tr>
					</table>
					<br
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
	
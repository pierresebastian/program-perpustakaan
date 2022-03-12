<?php
	session_start();
?>
<html>
	<head>
		<meta charset = "UTF-8">
		<title> Admin </title>
		<link rel = "stylesheet" type = "text/css" href = "../style/style.css">
		<script src = "script/script.js"></script>
	</head>
	<body>
		<div class = "content">
			<div class = "header">
				<?php include('../header and footer/header.php');?>
			</div>
			<div class = "middle" style = "text-align: center">
				<?php
					echo "<h1 style = 'text-align: center'>List Users</h1>";
					include('../../connect.php');
					$sql = "SELECT * FROM users";
					$result = mysqli_query($con, $sql);
					echo "<form name = 'delete' method = 'POST' action = 'run_user.php'>";
					echo "<table align = center border = 1 style = 'text-align: center'>";
					echo "<tr>";
					echo 	"<td>ID</td>";
					echo 	"<td>Nama Lengkap</td>";
					echo 	"<td>Usename</td>";
					echo 	"<td>Email</td>";
					echo 	"<td>Delete</td>";
					echo "</tr>";
					while($row = mysqli_fetch_row($result)){
						if($row[5] == 0){
							echo "<tr>";
							echo 	"<td>" . $row[0] . "</td>";
							echo 	"<td>" . $row[1] . "</td>";
							echo 	"<td>" . $row[2] . "</td>";
							echo 	"<td>" . $row[3] . "</td>";
							echo	"<td><input type = 'checkbox' name = 'delete[]' value = '" . $row[0] . "'></td>";
							echo "</tr>";
						}
					}
					echo "</table>";
					echo "<br>";
					echo "<center><input type = 'submit' value = 'Delete Selected Data'/></center>";
					echo "</form>";
				?>
			</div>
		</div>
		<div class = "footer">
			<?php include('../header and footer/footer.php');?>
		</div>
	</body>
</html>
	

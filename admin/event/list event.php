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
				<form name = "aksi" method = "POST" action = "run_event.php">
				<?php
					echo "<h1 style = 'text-align: center'>List Event</h1>";
					include('../../connect.php');
					$sql = "SELECT * FROM lomba";
					$result = mysqli_query($con, $sql);
					echo "<table align = center border = 1 style = 'text-align: center'>";
					echo "<tr>";
					echo 	"<td>ID</td>";
					echo 	"<td>Event</td>";
					echo 	"<td>Image</td>";
					echo 	"<td>Active/Inactive</td>";
					echo	"<td>Button to Active/Inactive</td>";
					echo "</tr>";
					while($row = mysqli_fetch_row($result)){
						if($row[2] == 1){
							echo "<tr>";
							echo 	"<td>" . $row[0] . "</td>";
							echo 	"<td>" . $row[1] . "</td>";;
							echo 	"<td><img src = '../../" . $row[3] . "' width = 135px height = 225px></td>";
							echo 	"<td>Active</td>";
							echo	"<td><input type = 'checkbox' name = 'active[]' value = '" . $row[0] . "'/></td>";
							echo "</tr>";
						}else{
							echo "<tr>";
							echo 	"<td>" . $row[0] . "</td>";
							echo 	"<td>" . $row[1] . "</td>";;
							echo 	"<td><img src = '../../" . $row[3] . "' width = 135px height = 225px></td>";
							echo 	"<td>InActive</td>";
							echo 	"<td><input type = 'checkbox' name = 'inactive[]' value = '" . $row[0] . "'/></td>";
							echo "</tr>";
						}
					}
					echo "</table>";
					echo "<br>";
					echo "<center><input type = 'submit' name = 'activated' value = 'Active/InActive Event'></center>";
					$sql = "SELECT * FROM pendaftaran";
					$result = mysqli_query($con, $sql);
					echo "<h1 style = 'text-align: center'>List Participant</h1>";
					echo "<table align = center border =1 style = 'text-align: center'>";
					echo "<tr>";
					echo 	"<td>ID</td>";
					echo 	"<td>Full Name</td>";
					echo 	"<td>Email</td>";
					echo	"<td>Book</td>";
					echo 	"<td>Event</td>";
					echo 	"<td>Disqualified</td>";
					echo "</tr>";
					while($row = mysqli_fetch_row($result)){
						echo "<tr>";
						echo 	"<td>" . $row[0] . "</td>";
						echo 	"<td>" . $row[1] . "</td>";
						echo 	"<td>" . $row[2] . "</td>";
						echo 	"<td><a href = '../../" . $row[3] . "'>PDF FILE</a></td>";
						echo 	"<td>" . $row[4] . "</td>";
						echo 	"<td><input type = 'checkbox' name = 'dis[]' value = '" . $row[0] . "'/></td>";
						echo "</tr>";
					}
					echo "</table>";
					echo "<br>";
					echo "<center><input type = 'submit' name = 'disqualified' value = 'Disqualified Checked'/></center>";
				?>
				<br><br>
				</form>
			</div>
		</div>
		<div class = "footer">
			<?php include('../header and footer/footer.php');?>
		</div>
	</body>
</html>
	

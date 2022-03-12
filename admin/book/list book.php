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
			<div class = "middle">
				<?php
					echo "<h1 style = 'text-align: center'>List Book</h1>";
					include('../../connect.php');
					$sql = "SELECT * FROM book";
					$result = mysqli_query($con, $sql);
					echo "<form name = 'delete' method = 'POST' action = 'run_delete.php'>";
					echo "<table align = center border = 1 style = 'text-align: center'>";
					echo "<tr>";
					echo 	"<td>ID</td>";
					echo 	"<td>Title</td>";
					echo 	"<td>Content</td>";
					echo 	"<td>Image</td>";
					echo 	"<td>Author</td>";
					echo 	"<td>Ratting</td>";
					echo 	"<td>Delete</td>";
					echo "</tr>";
					while($row = mysqli_fetch_row($result)){
						echo "<tr>";
						echo 	"<td>" . $row[0] . "</td>";
						echo 	"<td>" . $row[1] . "</td>";
						echo 	"<td><a href = '../../" . $row[2] . "'>PDF FILE</a></td>";
						echo 	"<td><img src = '../../" . $row[4] . "' width = 135px height = 225px></td>";
						echo 	"<td>" . $row[4] . "</td>";
						echo 	"<td>" . $row[5] . "</td>";
						echo	"<td><input type = 'checkbox' name = 'delete[]' value = '" . $row[0] . "'></td>";
						echo "</tr>";
					}
					echo "</table>";
					echo "<br>";
					echo "<center><input type = 'submit' value = 'Delete Selected Data'/></center>";
					echo "</form>";
				?>
			</div>
			<br><br>
		</div>
		<div class = "footer">
			<?php include('../header and footer/footer.php');?>
		</div>
	</body>
</html>
	

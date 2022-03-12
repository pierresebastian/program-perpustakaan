<?php
	session_start();
	if(isset($_SESSION['login'])){
?>
<html>
	<head>
		<meta charset = "UTF-8">
		<title> Edit </title>
		<link rel = "stylesheet" type = "text/css" href = "../header_footer/style.css">
		<link rel = "stylesheet" type = "text/css" href = "style/style.css">
		<script src = "script/script.js"></script>
	</head>
	<body>
		<div class = "content">
			<div class = "header">
				<?php include('../header_footer/header_loged_in.php');?>
			</div>
		<?php
		include('../connect.php');
			//ambil data di URL
		$users = $_GET['id'];

		//query
		function query($query) {
			global $con;
			$result = mysqli_query($con, $query);
			$rows = [];
			while ($row = mysqli_fetch_row($result)) {
				$rows[] = $row;
			}
			return $rows;
		}

		//query user berdasarkan id
		$users = query("SELECT * FROM users")[0];

		//cek tekan tombol edit
		if(isset($_POST['edit'])) {

			//ubah
			function ubah($data){
				global $con;
				//ambil data dari tiap elemeen form
				$id = $data['id'];
				$name = $data['name'];
				$username = $data['username'];
				$password = $data['password'];
				$email = $data['email'];
				
				//query insert data
				$query = "UPDATE users SET
						nama_lengkap = '$name',
						username = '$username',
						password = '$password',
						email = '$email',						
						WHERE id = '$id'
				";
				$result = mysqli_query($con, $query);
				return mysqli_affected_rows($con);
			}
			
			//cek apakah data berhasil di ubah atau tidak
			if (ubah($_POST) > 0) {
				echo "
					<script>
						alert('data berhasil di ubah');
						document.location.href = 'home.php';
					</script>
				";
			} else {
				echo "
					<script>
						alert('data gagal di ubah');
						document.location.href = 'home.php';
					</script>
				";
			}
		}
	?>
	<h1>Edit</h1>
	<form action="" method="Post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $users['id'] ?>"><br>

		<label>Nama Lengkap</label><br>
		<input type="text" name="name" value="<?php echo $users['nama_lengkap']; ?>"><br>

		<label>Username</label><br>
		<input type="text" name="username" value="<?php echo $users['username']; ?>"><br>

		<label>Password</label><br>
		<input type="text" name="password" value="<?php echo $users['password']; ?>"><br>

		<label>Email</label><br>
		<input type="email" name="email" value="<?php echo $users['email']; ?>"><br>

		<button type="submit" name="edit">Save</button>
	</form>
				<br> 
		
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
	
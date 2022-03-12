<?php
	include('../connect.php');
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$password2 = md5($_POST['password2']);
	
	$sql = "SELECT * FROM users";
	$result = mysqli_query($con, $sql);
	$userMatch = false;
	while(($row = mysqli_fetch_row($result)) and (!$userMatch)){
		if($username == $row[2]){
			$userMatch = true;
		}
	}
	if($userMatch){
		echo "<script>alert('Username Already Used!');document.location = 'javascript:history.back(0);'</script>";
	}else{
		if($password != $password2){
			echo "<script>alert('Password Not Match!');document.location = 'javascript:history.back(0);'</script>";
		}else{
			$sql = "INSERT INTO users(nama_lengkap, username, password, email)
					VALUE('$nama', '$username', '$password', '$email')";
			if(mysqli_query($con, $sql)){
				echo "<script>alert('Registration Success!');document.location = '../home/home.php';</script>";
			}
		}
	}
?>
<?php
	if(isset($_POST['login'])){
		include('../connect.php');
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		
		$sql = "SELECT * FROM users";
		$result = mysqli_query($con, $sql);
		$final = false;
		while(($row = mysqli_fetch_row($result)) and (!$final)){
			if(($username == $row[2]) and ($password == $row[3])){
				$final = true;
				$_SESSION['login'] = true;
				$_SESSION['id'] = $row[0];
				$_SESSION['username'] = $row[2];
				$_SESSION['nama'] = $row[1];
				$type = $row[5];
				setcookie('login', 'true', time()+3600);
				if(isset($_POST['remember'])){
					setcookie('id', $row[0], time()+3600);
					setcookie('username', $row[2], time()+3600);
				}
			}
		}
		if($final){
			if($type == 1){
				echo "<script>alert('Welcome Admin " . $_SESSION['nama'] . "!');document.location = '../admin//admin/admin.php';</script>";
			}else if($type == 0){
				echo "<script>alert('Welcome " . $_SESSION['nama'] . "!');document.location = '../home/home.php';</script>";
			}
		}else if(!$final){
			echo "<script>alert('Invalid Username or Password');document.location = 'javascript:history.back(0);'</script>";
		}
	}
?>
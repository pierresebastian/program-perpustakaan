<?php
	session_start();
	include("../connect.php");
	$extentionWrite = array("pdf");
	$name = $_POST['name'];
	$email = $_POST['email'];
	$event = $_POST['event'];
	
	$nameWrite = $_FILES['file']['name'];
	$x = explode('.', $nameWrite);
	$extention = strtolower(end($x));
	$file_temp = $_FILES['file']['tmp_name'];
	
	if(in_array($extention, $extentionWrite)){
		move_uploaded_file($file_temp, '../buku lomba/' . $nameWrite);
			$file = "../buku lomba/" . $nameWrite;
			
			$sql = "INSERT INTO pendaftaran(nama_lengkap, email, Book, nama_lomba)
					VALUE('$name', '$email', '$file', '$event')
					";
			if(mysqli_query($con, $sql)){
				echo "<script>alert('Upload Success!');document.location = 'event.php';</script>";
			}else{
				echo "<script>alert('Upload Failure!');document.location = 'javascript:history.back(0);'</script>";
			}
		}else{
			echo "<script>alert('Invalid Book Extention');document.location = 'javascript:history.back(0);'</script>";
		}
?>
	
	
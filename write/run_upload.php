<?php
	session_start();
	include("../connect.php");
	$extentionWrite = array("pdf");
	$extentionPicture = array("jpg", "jpeg", "png");
	
	$nameWrite = $_FILES['file1']['name'];
	$x = explode('.', $nameWrite);
	$extention1 = strtolower(end($x));
	$file_temp1 = $_FILES['file1']['tmp_name'];
	
	$namePicture = $_FILES['file2']['name'];
	$x = explode('.', $namePicture);
	$extention2 = strtolower(end($x));
	$file_temp2 = $_FILES['file2']['tmp_name'];
	
	if(in_array($extention1, $extentionWrite)){
		if(in_array($extention2, $extentionPicture)){
			move_uploaded_file($file_temp1, '../buku/' . $nameWrite);
			move_uploaded_file($file_temp2, '../image/' . $namePicture);
			$file1 = "../buku/" . $nameWrite;
			$file2 = "../image/" . $namePicture;
			$title = $_POST['title'];
			$author = $_POST['author'];
			
			$sql = "INSERT INTO book(judul, isi, foto, author, ratting)
					VALUE('$title', '$file1', '$file2', '$author', '0')
					";
			if(mysqli_query($con, $sql)){
				echo "<script>alert('Upload Success!');document.location = 'write.php';</script>";
			}else{
				echo "<script>alert('Upload Failure!');document.location = 'javascript:history.back(0);'</script>";
			}
		}else{
			echo "<script>alert('Invalid Image Extention');document.location = 'javascript:history.back(0);'</script>";
		}
	}else{
		echo "<script>alert('Invalid Book Extention');document.location = 'javascript:history.back(0);'</script>";
	}
?>
	
	
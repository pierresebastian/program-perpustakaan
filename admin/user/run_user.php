<?php
	include("../../connect.php");
	$delete = $_POST['delete'];
	foreach($delete as $x){
		$sql = "DELETE FROM users WHERE id = '$x'";
		$sql = mysqli_query($con, $sql);
	}
	if($sql){
		echo "<script>alert('Delete Successful!');document.location = 'list user.php';</script>";
	}else{
		echo "<script>alert('Delete Unsuccessful!');document.location = 'javascript:history(0);'</script>";
	}
?>
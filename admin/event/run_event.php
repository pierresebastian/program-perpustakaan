<?php
	include("../../connect.php");
	if(isset($_POST['activated'])){
		$active = $_POST['inactive'];
		$inactive = $_POST['active'];
		foreach($active as $x){
			$sql = "UPDATE lomba SET active_inactive = '1' WHERE lomba.id = $x";
			$sql = mysqli_query($con, $sql);
		}
		foreach($inactive as $x){
			$sql = "UPDATE lomba SET active_inactive = '0' WHERE lomba.id = $x";
			$sql = mysqli_query($con, $sql);
		}
		if($sql){
			echo "<script>alert('Set Successfully!');document.location = 'list event.php';</script>";
		}
	}else if(isset($_POST['disqualified'])){
		$dis = $_POST['dis'];
		foreach($dis as $x){
			$sql = "DELETE FROM pendaftaran WHERE id = '$x'";
			$sql = mysqli_query($con, $sql);
		}
		if($sql){
			echo "<script>alert('Disqualified!');document.location = 'list event.php';</script>";
		}
	}
?>
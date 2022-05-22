<?php
	$db_user = "root";
	$db="jd";
	$db_pass = "root";
	$con=mysqli_connect("localhost:3306",$db_user,$db_pass,$db);
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>
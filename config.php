<?php
	$conn = mysqli_connect("localhost","root","","curenation");//hostname, username, password, databasename
	if(!$conn){
		echo "DB not connected";
	}

?>
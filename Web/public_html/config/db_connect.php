<?php 

	// connect to the database
	$conn = mysqli_connect('localhost', 'tuanpham', 'test1234', 'Housing');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

?>
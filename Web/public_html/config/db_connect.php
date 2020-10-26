<?php 

	// connect to the database
	$conn = new mysqli('localhost','group19','pXHcA0', 'group19');
	// $link = ('localhost','group9','xNs1UQ', 'group9');
	if($conn->connect_error) {
		echo '<span style="color:red;">Could not connect to database server:</span><br>';
		echo '<span style="color:red;">'. $link->connect_error .'</span><br>';
	}
	if (!session_id()) {
		session_start();
	}

?>
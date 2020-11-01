<?php

	include('../../config/db_connect.php');

	$floor = '';
	
	$errors = array('floor' => '');
	if(isset($_POST['submit'])){
		
		// check floor
		if (empty($_POST['floor'])) {
			$errors['floor'] = 'A floor number is required';
		} else {
			$floor = $_POST['floor'];
			if (!preg_match('/^[1-3]$/D', $floor)) {
				$errors['floor'] = 'Floor number one-digit number only';
			}
		}
	
		// if(array_filter($errors)){
		// 	//echo 'errors in form';
		// } else {
		// 	// escape sql chars
		// 	$address = mysqli_real_escape_string($conn, $_POST['address']);
		// 	$name = mysqli_real_escape_string($conn, $_POST['name']);

		// 	// create sql
		// 	$sql = "INSERT INTO Colleges(name,address) VALUES('$name','$address')";

		// 	// save to db and check
		// 	if(mysqli_query($conn, $sql)) {
		// 		header('Location: http://clabsql.clamv.jacobs-university.de/~tpham/maintenance/insert/feedback.php');
		// 		$_SESSION['msg'] = $name . ' inserted into the database.';
				
				
		// 	} else {
		// 		header('Location: http://clabsql.clamv.jacobs-university.de/~tpham/maintenance/insert/feedback.php');
		// 		$_SESSION['flag'] = 1;
		// 		$_SESSION['msg'] = 'Failed to insert ' . $name . ': ' . $conn->error;
		// 	}
		// }

	} // end POST check

?>



<!DOCTYPE html>
<html>

<head>

    <title>Search 2</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type='text/css' media='screen' href='../../CSS/main.css'>
</head>


<body>


    <?php include('../../maintenance/templates/header.php'); ?>

    <section class="container">
        <h4 class="">Search for all students who live in a specific floor</h4>
        <form class="form-custom" action="result2.php" method="POST">

            <div class="form-group">
                <label>Floor</label>
                <input type="text" class="form-control" name="floor" value="<?php echo htmlspecialchars($floor) ?>">
                <div class=""><?php echo $errors['floor']; ?></div>
            </div>

            <div class="">
                <button type="submit" name="submit" value="Submit" class="btn btn-primary"> Search
            </div>
        </form>
    </section>



    <?php include('../../maintenance/templates/footer.php'); ?>

</body>

</html>
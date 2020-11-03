<?php

	include('../../config/db_connect.php');

	$name = '';
	
	$errors = array('address' => '', 'name' => '');
	if(isset($_POST['submit'])){
		
		// check name
		if(empty($_POST['name'])){
			$errors['name'] = 'A name is required';
		} else{
			$name = $_POST['name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
				$errors['name'] = 'Name must be letters and spaces only';
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

    <title>Search 3</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type='text/css' media='screen' href='../../CSS/main.css'>
</head>


<body>


<?php include('../templates/header.php'); ?>
    <section class="container">
        <h4 class="">Search for available room in a college</h4>
        <form class="form-custom" action="result3.php" method="POST">

            <div class="form-group">
                <label>College Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($name) ?>">
                <div class=""><?php echo $errors['name']; ?></div>
            </div>

            <div class="">
                <button type="submit" name="submit" value="Submit" class="btn btn-primary"> Search
            </div>
        </form>
    </section>



    <?php include('../templates/footer.php'); ?>

</body>

</html>
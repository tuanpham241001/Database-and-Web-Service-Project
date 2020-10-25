<?php

	include('config/db_connect.php');

	$address = $name = $ingredients = '';
	$errors = array('address' => '', 'name' => '', 'ingredients' => '');

	if(isset($_POST['submit'])){
		
		// check address
		if(empty($_POST['address'])){
			$errors['address'] = 'An address is required';
		} else{
			$address = $_POST['address'];
			// if(!filter_var($address, FILTER_VALIDATE_address)){
			// 	$errors['address'] = 'address must be a valid address address';
			// }
		}

		// check name
		if(empty($_POST['name'])){
			$errors['name'] = 'A name is required';
		} else{
			$name = $_POST['name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
				$errors['name'] = 'name must be letters and spaces only';
			}
		}

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
			$address = mysqli_real_escape_string($conn, $_POST['address']);
			$name = mysqli_real_escape_string($conn, $_POST['name']);
	

			// create sql
			$sql = "INSERT INTO Colleges(name,address) VALUES('$name','$address',)";

			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: success.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}

		}

	} // end POST check

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<section class="container ">
		<h4 class="">Add a College</h4>
		<form class="" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			<label>College Address</label>
			<input type="text" name="address" value="<?php echo htmlspecialchars($address) ?>">
			<div class="red-text"><?php echo $errors['address']; ?></div>
			<label>College Name</label>
			<input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
			<div class="red-text"><?php echo $errors['name']; ?></div>
			<label>Ingredients (comma separated)</label>
			<input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
			<div class="red-text"><?php echo $errors['ingredients']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>
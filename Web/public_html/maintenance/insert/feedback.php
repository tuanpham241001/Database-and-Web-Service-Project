<!DOCTYPE html>
<html>

<head>

	<title>Response</title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type='text/css' media='screen' href='../../CSS/main.css'>
</head>


<body>

	<?php include('../templates/header.php'); ?>
	<div class="alert alert-info" role="alert">
		<a href="../maintenance.php" class=>Back to maintenance page</a>
	</div>

	<section>
		<?php

		session_start();
		if ($_SESSION['flag'] == 1 && isset($_SESSION['msg'])) {
			echo '<h1>Failure!</h1>';
			echo '<span style = "color:red;">' . $_SESSION['msg'] . '</span>';
		}
		if ($_SESSION['flag'] == 0 && isset($_SESSION['msg'])) {
			echo '<h1>Success!</h1>';
			echo '<span style = "color:green;">' . $_SESSION['msg'] . '</span>';
		}
		if (session_id()) {
			session_unset();
			session_destroy();
		}
		?>
	</section>
	<?php include('../templates/footer.php'); ?>

</body>

</html>
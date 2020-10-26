<?php

include('../../config/db_connect.php');

$name = $mat_num = $birthday =  $rid = "";
$rsid = NULL;

$errors = array('name' => '', 'mat_num' => '', 'rsid' => '', 'birthday' => '', 'rid' => '');

if (isset($_POST['submit'])) {





    //Check name
    if (empty($_POST['name'])) {
        $errors['name'] = 'A name is required';
    } else {
        $name = $_POST['name'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
            $errors['name'] = 'Name must be letters and spaces only';
        }
    }

    //Check birthday
    if (empty($_POST['birthday'])) {
        $errors['birthday'] = 'A birthday is required';
    } else {
        $birthday = $_POST['birthday'];
        if (!preg_match('/^[0-9]+$/', $birthday)) {
            $errors['birthday'] = 'Birthday must be number only';
        }
    }

    //Check matriculation number
    if (empty($_POST['mat_num'])) {
        $errors['mat_num'] = 'A matriculation number is required';
    } else {
        $mat_num = $_POST['mat_num'];
        if (!preg_match('/^[0-9\s]+$/', $mat_num)) {
            $errors['mat_num'] = 'Matriculation number must be number only';
        }
    }

    if (array_filter($errors)) {
        //echo 'errors in form';
    } else {
        // escape sql chars
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $mat_num = mysqli_real_escape_string($conn, $_POST['mat_num']);
        $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
        $rid = mysqli_real_escape_string($conn, $_POST['rid']);

        if ($_POST['rsid'] === '') {
            // create sql without rsid
            $sql = "INSERT INTO Students(name, mat_num, birthday, rid) VALUES ('$name', '$mat_num', '$birthday', '$rid')";
        } else {
            $rsid = mysqli_real_escape_string($conn, $_POST['rsid']);
            // create sql with rsid
            $sql = "INSERT INTO Students(name, mat_num, birthday, rsid, rid) VALUES ('$name', '$mat_num', '$birthday', '$rsid', '$rid')";
        }
        
        // save to db and check
        if (mysqli_query($conn, $sql)) {
            // success
            header('Location: ../success.php');
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
    }
} // end POST check

?>

<!DOCTYPE html>
<html>

<head>

    <title>Add Students</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type='text/css' media='screen' href='../../CSS/main.css'>
</head>


<body>

    <?php include('../../templates/header.php'); ?>

    <section class="container ">
        <h4 class="">Add a Student</h4>

        <form class="" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <label>Student Name</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
            <div class=""><?php echo $errors['name']; ?></div>


            <label>Student Matriculation Number</label>
            <input type="text" name="mat_num" value="<?php echo htmlspecialchars($mat_num) ?>">
            <div class=""><?php echo $errors['mat_num']; ?></div>

            <label>Student Birthday</label>
            <input type="text" name="birthday" value="<?php echo htmlspecialchars($birthday) ?>">
            <div class=""><?php echo $errors['birthday']; ?></div>




            <!-- Choices for Roommates -->
            <label for="Roomates">You can choose a roommate</label>
            <select name="rsid">

                <?php
                // write query for all students
                $sql = 'SELECT * FROM Students';
                // get the result set (set of rows)
                $result = mysqli_query($conn, $sql);
                // fetch the resulting rows as an array
                $students = mysqli_fetch_all($result, MYSQLI_ASSOC);
                // free the $result from memory (good practise)
                mysqli_free_result($result);
                ?>

                <!-- Display the options -->
                <?php echo "<option value=''> NO </option>" ?>;
                <?php
                foreach ($students as $student) :
                ?>
                    <?php
                    $s_rsid = $student['sid'];
                    $s_name = $student['name'];
                    echo "<option value='$s_rsid'> $s_name </option>"; ?>
                <?php endforeach; ?>
            </select>




            <!-- Choices for Rooms -->
            <label for="Rooms">You must choose a room</label>
            <select name="rid" require>

                <?php
                // write query for all rooms
                $sql = 'SELECT * FROM Rooms';
                // get the result set (set of rows)
                $result = mysqli_query($conn, $sql);
                // fetch the resulting rows as an array
                $rooms = mysqli_fetch_all($result, MYSQLI_ASSOC);
                // free the $result from memory (good practise)
                mysqli_free_result($result);
                ?>

                <!-- Display the options -->
                <?php
                foreach ($rooms as $room) :
                ?>
                    <?php
                    $r_rid = $room['rid'];
                    $r_rnumber = $room['rnumber'];
                    echo "<option value='$r_rid' > $r_rnumber </option>"; ?>
                <?php endforeach; ?>
            </select>

            <div class="">
                <input type="submit" name="submit" value="Submit" class="">
            </div>
        </form>
    </section>

    <?php include('../../templates/footer.php'); ?>

</body>

</html>
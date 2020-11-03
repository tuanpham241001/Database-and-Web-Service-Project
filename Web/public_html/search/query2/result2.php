<?php

include('../../config/db_connect.php');

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


<?php include('../templates/header.php'); ?>

    <h1>Result page</h1>
    <?php
    if (isset($_POST['submit'])) {
        $floor = mysqli_real_escape_string($conn, $_POST['floor']);
        $sql = "SELECT S.sid,
        S.name,
        S.mat_num,
        S.birthday,
        R.rnumber
        FROM Students S
        INNER JOIN Rooms R ON S.rid = R.rid AND R.floor = $floor";

        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        if ($queryResult > 0) {
            echo "<table style='width:100%' class='table table-striped table-hover'>";
            echo "<thead class='thead-dark'>
            <tr>
              <th scope='col'>Student's Name</th>
              <th scope='col'>Student's Birthday</th>
              <th scope='col'>Student's Matriculation Number</th>
              <th scope='col'>Room's Number</th>
              <th scope='col'>Link to more information</th>
            </tr>
            </thead>";
            while ($row = mysqli_fetch_assoc(($result))) {

                echo " 
                <tr>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['birthday'] . "</td>
                    <td>" . $row['mat_num'] . "</td>
                    <td>" . $row['rnumber'] . "</td>
                    <td> <a href='detail2.php?title=" . $row['sid'] . "'>More information</a> </td>
                </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>There are no results matching your search</p>";
        }

        mysqli_free_result($result);
    }




    ?>
    <?php include('../templates/footer.php'); ?>


</body>

</html>
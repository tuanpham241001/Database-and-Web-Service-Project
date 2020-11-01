<?php

include('../../config/db_connect.php');

?>


<!DOCTYPE html>
<html>

<head>

    <title>Detail Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type='text/css' media='screen' href='../../CSS/main.css'>
</head>


<body>


    <?php include('../../maintenance/templates/header.php'); ?>

    <div class="">
        <?php
        $rid = mysqli_real_escape_string($conn, $_GET['title']);
        $sql = "SELECT * 
        FROM Rooms R
        INNER JOIN Colleges C ON C.cid = R.cid
        WHERE R.rid = $rid";

        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        if ($queryResult > 0) {
            $row = mysqli_fetch_assoc(($result));
            echo "<h1>Room's Information</h1>";
            echo " <table class='table table-striped table-hover'>
                <tr scope='row'> 
                <td scope='col'>Room's Number</td>
                <td scope='col'>" . $row['rnumber'] . " </td>
                </tr>
                <tr> 
                <td>Floor </td>
                <td>" . $row['floor'] . "</td>
                </tr>
                <tr> 
                <td>Mailbox </td>
                <td>" . $row['mailbox'] . "</td>
                </tr>
                <tr> 
                <td>Availability </td>
                <td>" . $row['availability'] . "</td>
                </tr>
                <tr>
                <td>College </td>
                <td>" . $row['name'] . "</td>
                </tr>
                </table>";
        } else {
            echo "<p>There are no results matching your search</p>";
        }

        mysqli_free_result($result);
        ?>

    </div>



    <?php include('../../maintenance/templates/footer.php'); ?>

</body>

</html>
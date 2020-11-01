<?php

include('../../config/db_connect.php');

?>

<!DOCTYPE html>
<html>

<head>

    <title>Search 1</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type='text/css' media='screen' href='../../CSS/main.css'>
</head>


<body>


    <?php include('../../maintenance/templates/header.php'); ?>

    <h1>Result page</h1>
    <?php
    if (isset($_POST['submit'])) {
        $cname = mysqli_real_escape_string($conn, $_POST['name']);
        $sql = "SELECT C.cid AS ccid, 
        C.name AS cname, 
        M.mgid AS mmgid, 
        M.name AS mname 
        FROM Managers M 
        INNER JOIN RA ON RA.mgid = M.mgid 
        INNER JOIN Colleges C ON C.name 
        LIKE '%$cname%' AND C.cid = M.cid";

        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        if ($queryResult > 0) {
            echo "<table style='width:100%' class='table table-striped table-hover'>";
            echo "<thead class='thead-dark'>
            <tr>
              <th scope='col'>Manager's Name</th>
              <th scope='col'>College</th>
              <th scope='col'>Link to more information</th>
            </tr>
            </thead>";
            while ($row = mysqli_fetch_assoc(($result))) {

                echo " 
                <tr>
                    <td>" . $row['mname'] . "</td>
                    <td>" . $row['cname'] . "</td>
                    <td> <a href='detail1.php?title=" . $row['mmgid'] . "'>More information</a> </td>
                </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>There are no results matching your search</p>";
        }

        mysqli_free_result($result);
    }




    ?>
    <?php include('../../maintenance/templates/footer.php'); ?>



</body>

</html>
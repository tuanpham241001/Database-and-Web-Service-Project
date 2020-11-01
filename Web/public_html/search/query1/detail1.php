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
        $mmgid = mysqli_real_escape_string($conn, $_GET['title']);
        $sql = "SELECT * 
    FROM Managers M
    WHERE M.mgid = $mmgid";

        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        if ($queryResult > 0) {
            $row = mysqli_fetch_assoc(($result));
            echo "<h1>Manager's Information</h1>";
            echo " <table class='table table-striped table-hover'>
                <tr scope='row'> 
                <td scope='col'>Name</td>
                <td scope='col'>" . $row['name'] . " </td>
                </tr>
                <tr> 
                <td>Age </td>
                <td>" . $row['age'] . "</td>
                </tr>
                <tr> 
                <td>Contact Number </td>
                <td>" . $row['contact_num'] . "</td>
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
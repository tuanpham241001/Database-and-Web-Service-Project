<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type='text/css' media='screen' href='../CSS/main.css'>
</head>

<body>
    <section id="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="../index.php">
                <img src="../img/saturn_blue.png" width="30" height="30" class="d-inline-block align-top " alt="logo">
                Saturn
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../imprint.php">Imprint</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Colleges
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../krupp.php">Krupp</a>
                            <a class="dropdown-item" href="../mercator.php">Mercator</a>
                            <a class="dropdown-item" href="../college3.php">College3</a>
                            <a class="dropdown-item" href="../nordmetall.php">Nordmetall</a>
                        </div>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="./maintenance.php">Maintenance Page</a>
                </li>
                </ul>
                
                <!-- <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
            </div>
        </nav>
    </section>



    <div class="list-group maintenance">
        <a href="insert/colleges.php" class="list-group-item list-group-item-action">Add Colleges</a>
        <a href="insert/students.php" class="list-group-item list-group-item-action">Add Students</a>
        <a href="insert/students_with_special_need" class="list-group-item list-group-item-action">Add Students with special need (On existing Students)</a>
        <a href="insert/rooms.php" class="list-group-item list-group-item-action">Add Rooms</a>
        <a href="insert/double_rooms.php" class="list-group-item list-group-item-action">Add Double Rooms(On existing Rooms)</a>
        <a href="insert/managers.php" class="list-group-item list-group-item-action">Add Managers</a>
        <a href="insert/ra.php" class="list-group-item list-group-item-action">Add RA (On existing Managers)</a>
        <a href="insert/rm.php" class="list-group-item list-group-item-action">Add RM (On existing Managers)</a>
    </div>

    <?php include 'templates/footer.php' ?>
</body>

</html>
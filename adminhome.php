<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    elseif($_SESSION['usertype'] == 'student')
    {
        header("location:login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<header class="header">
        <a href="">Admin Dashboard</a>

        <div class="logout">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
</header>

<aside>
    <ul>
        <li><a href="">Admission</a></li>
        <li><a href="">Add Student</a></li>
        <li><a href="">View Students</a></li>
        <li><a href="">Add Teachers</a></li>
        <li><a href="">View Teachers</a></li>
        <li><a href="">Add Courses</a></li>
        <li><a href="">View Courses</a></li>
    </ul>
</aside>

<div class="content">
    <h1>Sidebar Example</h1>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores sapiente officiis placeat iusto temporibus, nostrum possimus ipsam alias iste odit voluptas pariatur voluptatem eaque itaque praesentium molestias expedita, ea nemo?
        Dolores nesciunt architecto consequatur facilis fuga sunt nulla. Quibusdam recusandae distinctio ut quaerat velit sit tempora voluptate itaque, modi suscipit quas porro vero repellendus adipisci doloribus cum, fuga facilis error.
        Facilis expedita voluptatem animi totam, doloremque sed esse earum aperiam ipsam error at architecto atque necessitatibus odit harum iure eos, numquam repellendus eligendi sapiente, consectetur alias quasi cum. Aliquid, ea?
    </p>
</div>
</body>
</html>
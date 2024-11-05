<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    elseif($_SESSION['usertype'] == 'student')
    {
        header("location:login.php");
    }

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'school_project';

    $data = mysqli_connect($host, $user, $password, $db);

    if(!$data)
    {
        die('Connection failed');
    }

    $sql = "SELECT * FROM admission";
    $result = mysqli_query($data, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php include('admin_css.php'); ?>
</head>
<body>
<?php include('admin_sidebar.php'); ?>

<div class="content">
    <center> 
    <h1>Applied For Admission</h1><br><br>
    <table class="table table-bordered" style="width: 80%;">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Message</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        while($info = $result->fetch_assoc())
        {
    ?>
    <tr>
      <td><?php echo "{$info['name']}"; ?></th>
      <td><?php echo "{$info['email']}"; ?></td>
      <td><?php echo "{$info['phone']}"; ?></td>
      <td><?php echo "{$info['message']}"; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</center>
</div>
</body>
</html>
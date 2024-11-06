<?php
    error_reporting(0);
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

    $sql = "SELECT * FROM user WHERE usertype = 'student'";
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
<?php
    include('admin_sidebar.php');
?>

<div class="content">
    <center> 
    <h1>Students Data</h1>
    <?php 
        if($_SESSION['message'])
        {
            echo $_SESSION['message'];
        }
        unset($_SESSION['message']);
    ?>
    <br><br>
    <table class="table table-bordered" style="width: 80%;">
  <thead>
    <tr>
      <th scope="col">Username</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        while($info = $result->fetch_assoc())
        {
    ?>
    <tr>
      <td><?php echo "{$info['username']}"; ?></th>
      <td><?php echo "{$info['phone']}"; ?></td>
      <td><?php echo "{$info['email']}"; ?></td>
      <td><?php echo "{$info['password']}"; ?></td>
      <td><?php echo "<a onClick = \" javascript:return confirm('Are you sure you want to delete this?') \"
      href='delete.php?student_id={$info['id']}' class='btn btn-danger sm'>Delete</a>" ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</center>
</div>
</body>
</html>
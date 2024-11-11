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

    $sql = "SELECT * FROM teacher";
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
    <h1>Teachers Data</h1>
    <?php 
        if($_SESSION['message'])
        {
            echo "<div class='alert alert-success' role='alert'>
                <strong>Done!</strong>". $_SESSION['message']."
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button></div>";
        }
        unset($_SESSION['message']);
    ?>
    <br><br>
    <table class="table table-bordered" style="width: 80%;">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        while($info = $result->fetch_assoc())
        {
    ?>
    <tr>
      <td><?php echo "{$info['name']}"; ?></th>
      <td><?php echo "{$info['description']}"; ?></td>
      <td><img src="<?php echo "{$info['image']}"; ?>" width="100px" height="100px"></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</center>
</div>
</body>
</html>
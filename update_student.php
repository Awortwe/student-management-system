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

    $data = mysqli_connect($host,$user,$password,$db);
    if(!$data)
    {
        die('Connection failed');
    }

    $user_id = $_GET['student_id'];

    $sql = "SELECT * FROM user WHERE id = '$user_id'";

    $result = mysqli_query($data, $sql);

    $info = $result->fetch_assoc();

    $success_message = '';
    $error_message = '';

    if(isset($_POST['update']))
    {
        $name = $_POST['username'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "UPDATE user SET username='$name', phone='$phone', email='$email', password='$password'
        WHERE id='$user_id'";

        $result2 = mysqli_query($data, $query);

        if($result2)
        {
            header('location:view_student.php');
        }
        else
        {
            $error_message = "Error updating message";
        }
    }

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

<div class="content" style="width: 60%;">
        <h1>Update Student</h1><br><br>
        <?php if($error_message){ ?>
            <div class="alert alert-danger" role="alert">
                <strong>Error!</strong> <?php echo $error_message; ?>..
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
        <?php if($error_message){ ?>
            <div class="alert alert-danger" role="alert">
                <strong>Error!</strong> <?php echo $error_message; ?>..
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
        <form action="#" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" 
                    name="username" value="<?php echo "{$info['username']}"; ?>" 
                    placeholder="Enter username" required>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" value="<?php echo "{$info['phone']}"; ?>" 
                name="phone"  placeholder="Enter phone" required>
            </div>
            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" value="<?php echo "{$info['email']}"; ?>" 
                name="email"  placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" value="<?php echo "{$info['password']}"; ?>" 
                name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update Student</button>
        </form>
    
</div>
<!-- Add Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
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

    $success_message = '';
    $error_message = '';

    if(isset($_POST['add_student']))
    {
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $usertype = "student";
        $password = $_POST['password'];

        // $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $check = "SELECT * FROM user WHERE username='$username'";
        $check_user = mysqli_query($data,$check);
        $row_count = mysqli_num_rows($check_user);

        if($row_count == 1)
        {
            $error_message = "Username already exists";
        }
        else
        {
            $sql = "INSERT INTO user(username,phone,email,usertype,password) 
                    VALUES('$username','$phone','$email','$usertype','$password')";

            $result = mysqli_query($data,$sql);

            if($result)
            {
                $success_message = "Data uploaded successfully";
            }
            else
            {
                $error_message = "Error uploading message";
            }
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
        <h1>Add Student</h1><br><br>
        <?php if($success_message){ ?>
            <div class="alert alert-success" role="alert">
                <strong>Done!</strong> <?php echo $success_message; ?>.
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
                <input type="text" class="form-control" name="username"  placeholder="Enter username" required>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone"  placeholder="Enter phone" required>
            </div>
            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" name="email"  placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="add_student" class="btn btn-primary">Add Student</button>
        </form>
    
</div>
<!-- Add Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
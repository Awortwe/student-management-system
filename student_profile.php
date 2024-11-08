<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    elseif($_SESSION['usertype'] == 'admin')
    {
        header("location:login.php");
    }

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'school_project';

    $data = mysqli_connect($host, $user, $password, $db);

    

    $name = $_SESSION['username'];

    $sql = "SELECT * FROM user WHERE username = '$name'";
    $result = mysqli_query($data,$sql);

    $info = mysqli_fetch_assoc($result);

    $success_message = '';
    $error_message = '';

    if(isset($_POST['update_profile']))
    {
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql2 = "UPDATE user SET phone='$phone', email='$email', password='$password' WHERE username='$name'";
        $result2 = mysqli_query($data,$sql2);

        if($result2)
        {
            $success_message = "Profile updated successfully";
        }
        else{
            $error_message = "Error updating profile";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
   <?php
    include('student_css.php');
   ?>
<body>
    <?php
        include('student_sidebar.php');
    ?>

<div class="content" style="width: 60%;">
        <?php if($success_message){ ?>
            <div class="alert alert-success" role="alert">
                <strong>Done!</strong> <?php echo $success_message; ?>..
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
                    <label>Phone</label>
                    <input type="text" class="form-control"  value="<?php echo "{$info['phone']}"; ?>" 
                        name="phone"  required>
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control"  value="<?php echo "{$info['email']}"; ?>" 
                        name="email"  required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control"  value="<?php echo "{$info['password']}"; ?>" 
                        name="password" required>
                </div>
                <button type="submit" name="update_profile" class="btn btn-primary">Update Profile</button>
        </form>
    
</div>
<!-- Add Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
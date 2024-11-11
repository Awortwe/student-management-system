<?php
    session_start();
    error_reporting(0);
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

    if($_GET['teacher_id'])
    {
        $t_id = $_GET['teacher_id'];
        $sql = "SELECT * FROM teacher WHERE id = '$t_id'";
        $result = mysqli_query($data,$sql);
        $info = $result->fetch_assoc();
    }

    if(isset($_POST['update_teacher']))
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $file = $_FILES['image']['name'];
        $file_extension = pathinfo($file, PATHINFO_EXTENSION);
    
        // Generate a unique file name with the extension
        $new_filename = uniqid() . '.' . $file_extension;
        $dst = "./teacher_images/" . $new_filename;
        $dst_db = "teacher_images/" . $new_filename;

        // Move the file to the destination folder
        move_uploaded_file($_FILES['image']['tmp_name'], $dst);

        if($file)
        {
            $sql2 = "UPDATE teacher SET name='$name', description='$description', 
                    image='$dst_db' WHERE id = '$id'";
        }
        else
        {
            $sql2 = "UPDATE teacher SET name='$name', description='$description'
            WHERE id = '$id'";
        }

        
        $result2 = mysqli_query($data,$sql2);

        if($result2)
        {
            header('location:admin_view_teacher.php');
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
    <h1>Update Teachers</h1>

    <form action="#" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo "{$info['id']}" ?>">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" value="<?php echo "{$info['name']}" ?>"
                    name="name"   required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" value="<?php echo "{$info['description']}" ?>"
                    name="description"   required>
            </div>
            <div>
                <label>Teacher Old Image</label><br>
                <img src="<?php echo "{$info['image']}" ?>" alt="" width="200px" height="200px">
            </div><br>
            <div class="form-group">
                <label>Teacher New Image</label>
                <input type="file" class="form-control" name="image">
            </div>
            <button type="submit" name="update_teacher" class="btn btn-primary">Update Teacher</button>
    </form>
</div>
</body>
</html>
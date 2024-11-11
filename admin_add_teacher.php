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

    if(isset($_POST['add_teacher']))
    {
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

        // Insert the information into the database
        $sql = "INSERT INTO teacher(name, description, image) VALUES('$name', '$description', '$dst_db')";
        $result = mysqli_query($data, $sql);

        if($result)
        {
            header('location:admin_add_teacher.php');
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
    <h1>Add Teachers</h1>

    <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name"  placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" name="description"  placeholder="Enter description" required>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control" name="image" required>
            </div>
            <button type="submit" name="add_teacher" class="btn btn-primary">Add Teacher</button>
    </form>
</div>
</body>
</html>
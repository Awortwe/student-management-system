<?php
    session_start();

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'school_project';

    $data = mysqli_connect($host, $user, $password, $db);

    if(!$data)
    {
        die('Connection error');
    }

    if(isset($_POST['apply']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        $sql = "INSERT INTO admission(name, email, phone, message) VALUES('$name','$email','$phone','$message')";

        $result = mysqli_query($data,$sql);

        if($result)
        {
            $_SESSION['message'] = 'Your application was sent successfully';
            header("location:index.php");
        }
        else
        {
            echo "Apply failed";
        }
    }

?>
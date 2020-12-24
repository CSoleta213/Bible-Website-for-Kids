<?php
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $birthdate = $_POST['birthdate'];

    //Database connection
    $conn = new mysqli('localhost', 'root', '', 'userlogin');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into registration(fname, lname, email, password, birthdate)
        values(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $fname, $lname, $email, $password, $birthdate);
        $stmt->execute();
        echo "<script type='text/javascript'>
                alert ('Your account was created successfully! Please log in your account!')</script>";
                echo file_get_contents("log-in.html");
        $stmt->close();
        $conn->close();
    }
?>
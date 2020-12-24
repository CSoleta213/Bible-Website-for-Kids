<?php
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection
    $con = new mysqli('localhost', 'root', '', 'userlogin');
    if($con->connect_error){
        die('Connection Failed : '.$con->connect_error);
    } else {
        $stmt = $con->prepare("select * from registration where email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password) {
                echo "<script type='text/javascript'>
                alert ('You have logged in successfully!')</script>";
                echo file_get_contents("index2.html");
            } else {
                echo file_get_contents("invalid.html");
            }
        } else {
            echo file_get_contents("invalid.html");
        }
    }
?>
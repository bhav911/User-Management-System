<?php
    session_start();
    $server = "localhost";
    $db_username = "root";
    $password = "";
    $database = "project_db";

    $conn = new mysqli($server, $db_username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];
    $state = $_POST['state'];
    $gender = $_POST['sex'];


    $sql = "UPDATE `users` SET `name`='$name',`password`='$password',`email`='$email',`mobile`='$mobile',`birthdate`='$birthdate',`state`='$state',`gender`='$gender' WHERE username='$username'";
    $result = $conn->query($sql);
    header('Location: admin_interface.php');
    exit();
?>
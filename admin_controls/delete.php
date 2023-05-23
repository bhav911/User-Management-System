<?php
    session_start();
    $username = $_POST['username'];

    $server = "localhost";
    $db_username = "root";
    $password = "";
    $database = "project_db";

    $conn = new mysqli($server, $db_username, $password, $database);
    if($conn->connect_error){
        die("connection failed : " . $conn->connect_error);
    }

    $sql = "DELETE FROM users WHERE username = '$username'";
    $result = $conn->query($sql);   
    exit(); 
?>
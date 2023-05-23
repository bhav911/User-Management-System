<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$database = "project_db";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $role = $_POST['role'];
    $table = '';
    if ($role === "admin") {
        $table = 'admin';
    } else {
        $table = 'users';
    }
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM $table WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows <= 0) {
        $errorMessage = "Invalid username or password. Please try again.";
        header("Location: home.php?error=" . urlencode($errorMessage));
        exit();
    } else if($role == 'admin'){
        header("Location: admin_controls\admin_interface.php");
        echo ("Logged in successfully");
        $_SESSION['username'] = $username;
        exit();
    } else{
        echo ("Logged in successfully");
        $_SESSION['username'] = $username;
        exit();
    }
    $conn->close();
}
?>
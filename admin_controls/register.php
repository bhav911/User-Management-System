<!-- this code register new users to database -->

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $username = "@" . $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $birthdate = $_POST['birthdate'];
    $state = $_POST['state'];
    $gender = $_POST['sex'];

    $sql = "INSERT INTO users (name, username, password, email, mobile, birthdate, state, gender) VALUES ('$name', '$username', '$password', '$email', '$mobile', '$birthdate', '$state', '$gender')";
    if ($conn->query($sql) === TRUE) {
        echo "customer added successfully";
        header('Location: admin_interface.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
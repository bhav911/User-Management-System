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

    $sql = "SELECT * FROM admin WHERE username='$_SESSION[username]'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin control</title>
    <link rel="stylesheet" href="admin_interface.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <p> <?php echo "Welcome " . $row["name"] . "<br>";?></p>
    <button id="display_btn">Show User Table</button>
    <div id="hidden_tbl">
        <form method="post" id="search_bar" name="form">
            <input type="text" placeHolder="search" id="search_inp" name="query_inp">
            <select name="column" id="sel_col">
                <option value="all">All</option>
                <option value="name">Name</option>
                <option value="username">Username</option>
                <option value="password">Password</option>
                <option value="email">Email</option>
                <option value="mobile">Mobile Number</option>
                <option value="birthdate">Birthdate</option>
                <option value="state">State</option>
                <option value="gender">Gender</option>
            </select>
            <input id="search_btn" type="submit" value="Search" name="submit">
        </form>
        <div id="add_btn">            
            <input type="file" id="file_add" accept=".csv">
            <input type="button" value="+ADD" id="man_add">
        </div>
        <table id="data_table">
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Birthdate</th>
                <th>State</th>
                <th>Gender</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['password'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['mobile'] . "</td>";
                        echo "<td>" . $row['birthdate'] . "</td>";
                        echo "<td>" . $row['state'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";
                        echo '<td><button class="edit_btn" value="'.$row['username'].'">Edit</button></td>';
                        echo '<td><button class="dlt_btn" value="'.$row['username'].'">Delete</button></td>';
                        echo "</tr>";
                    }
                }
            ?>
        </table>
    </div>
    <script src="admin_table_display.js"></script>
</body>
</html>
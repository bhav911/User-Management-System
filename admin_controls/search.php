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
    if(isset($_POST['data'])){
        $serializedData = $_POST['data'];
        // Decode the serialized data into an associative array
        $formData = urldecode($serializedData); //this step not actually needed
        parse_str($formData, $formFields);

        // Access individual form field values
        $query_inp = $formFields['query_inp'];
        $column = $formFields['column'];
        if($column != "all")
            $sql = "SELECT * FROM users WHERE $column = '$query_inp'";
        else
            $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        $html;
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $html.="<tr>";
                $html.="<td>".$row['name']."</td>";
                $html.="<td>".$row['username']."</td>";
                $html.="<td>".$row['password']."</td>";
                $html.="<td>".$row['email']."</td>";
                $html.="<td>".$row['mobile']."</td>";
                $html.="<td>".$row['birthdate']."</td>";
                $html.="<td>".$row['state']."</td>";
                $html.="<td>".$row['gender']."</td>";
                $html.='<td><button class="edit_btn" value="'.$row['username'].'">Edit</button></td>';
                $html.='<td><button class="dlt_btn" value="'.$row['username'].'">Delete</button></td>';
                $html.='</tr>';
            }
        }
        echo $html;
    }
?>
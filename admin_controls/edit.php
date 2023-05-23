<?php
    session_start();
    $server = "localhost";
    $db_username = "root";
    $password = "";
    $database = "project_db";
    $username = $_GET['username'];

    $conn = new mysqli($server, $db_username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE username= '$username'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
<!-- this code shows a form to website from where new user can register themselves -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .radio{
          margin-left: 50px;
        }
        .radio label{
          font-weight:500;
        }
        #inputState{
            width: 90%;
            margin: auto;
            border: 1px solid rgb(168, 168, 168);
        }
        .rowg-3{
          background-color: #f2f2f2;
            width: 50%;
            border: 2px solid rgb(168, 168, 168);
            border-radius: 10px;
            margin: 40px auto;
        }
        .form-control{
            width: 90%;
            margin: auto;
            border: 1px solid rgb(168, 168, 168);
        }
        .form-label{
            width: 70%;
            margin-left: 26px;
            /* font-size: 20px; */
        }
        .col-md-6, .col-12, .col-md-2, .col-md-4{
            width: 90%;
            margin: 5px auto;
        }
        .form-check, .btn-primary{
            margin-left: 26px;
        }
        #submit{
          background-color: #4CAF50;
          border: 1px solid #4CAF50;
        }
    </style>
</head>
<body>
    <form method="post" action="update.php" class="rowg-3" >
        <div class="col-md-6">
          <label for="inputName" class="form-label">Name:</label>
          <input type="text" name="name" class="form-control" id="inputName" value="<?php echo($row['name'])?>">
        </div>
        <div class="col-md-6">
          <label for="inputUserName" class="form-label">Username:</label>
          <input type="text" name="username" class="form-control" id="inputUserName" value="<?php echo($row['username'])?>">
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Email:</label>
          <input type="email" name="email" class="form-control" id="inputEmail4" value="<?php echo($row['email'])?>">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Password:</label>
          <input type="password" name="password" class="form-control" id="inputPassword4" value="<?php echo($row['password'])?>">
        </div>
        <div class="col-md-2">
          <label class="form-label">Gender:</label> <br>
          <div class="radio">
            <input type="radio" name="sex" id="SexMale" value="Male" checked> 
            <label for="SexMale">Male</label> <br>
            <input type="radio" name="sex" id="SexFemale" value="Female">
            <label for="SexFemale">Female</label> <br>
            <input type="radio" name="sex" id="SexOther" value="Others"> 
            <label for="SexOther">Others</label>
          </div>
        </div>
        <div class="col-12">
          <label for="inputnumber" class="form-label">Contact Number:</label>
          <input type="number" name="mobile" class="form-control" id="inputnumber" value="<?php echo($row['mobile'])?>">
        </div>
        <div class="col-12">
          <label for="inputAddress2" class="form-label">Birth-Date:</label>
          <input type="date" name="birthdate" class="form-control" id="inputAddress2" value="<?php echo($row['birthdate'])?>">
        </div>
        <div class="col-md-4">
          <label for="inputState" class="form-label">State:</label>
          <select id="inputState" name="state" class="form-select" value="<?php echo($row['state'])?>">
            <option selected>Choose...</option>
            <option value="Andhra Pradesh">Andhra Pradesh</option>
            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
            <option value="Assam">Assam</option>
            <option value="Bihar">Bihar</option>
            <option value="Chandigarh">Chandigarh</option>
            <option value="Chhattisgarh">Chhattisgarh</option>
            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
            <option value="Daman and Diu">Daman and Diu</option>
            <option value="Delhi">Delhi</option>
            <option value="Lakshadweep">Lakshadweep</option>
            <option value="Puducherry">Puducherry</option>
            <option value="Goa">Goa</option>
            <option value="Gujarat" selected>Gujarat</option>
            <option value="Haryana">Haryana</option>
            <option value="Himachal Pradesh">Himachal Pradesh</option>
            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
            <option value="Jharkhand">Jharkhand</option>
            <option value="Karnataka">Karnataka</option>
            <option value="Kerala">Kerala</option>
            <option value="Madhya Pradesh">Madhya Pradesh</option>
            <option value="Maharashtra">Maharashtra</option>
            <option value="Manipur">Manipur</option>
            <option value="Meghalaya">Meghalaya</option>
            <option value="Mizoram">Mizoram</option>
            <option value="Nagaland">Nagaland</option>
            <option value="Odisha">Odisha</option>
            <option value="Punjab">Punjab</option>
            <option value="Rajasthan">Rajasthan</option>
            <option value="Sikkim">Sikkim</option>
            <option value="Tamil Nadu">Tamil Nadu</option>
            <option value="Telangana">Telangana</option>
            <option value="Tripura">Tripura</option>
            <option value="Uttar Pradesh">Uttar Pradesh</option>
            <option value="Uttarakhand">Uttarakhand</option>
            <option value="West Bengal">West Bengal</option>
          </select>
        </div>
        <div class="col-12">
          <button type="submit" name="register" id="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
</body>
</html>
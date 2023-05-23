<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Home</title>
    <style>
        .form-container {        
          max-width: 400px;
          margin: 00px auto;
          padding: 20px;
          background-color: #f2f2f2;
          border-radius: 5px;
        }
        h3{
            text-align: center;
            margin: 20px auto;
        }
        .form-container label {
          display: block;
          margin-bottom: 10px;
        }
      
        .form-container input[type="text"],
        .form-container input[type="password"] {
          width: 100%;
          padding: 10px;
          margin-bottom: 20px;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
        }
      
        .form-container input[type="submit"] {
          background-color: #4CAF50;
          color: white;
          padding: 10px 20px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }
      
        .form-container input[type="submit"]:hover {
          background-color: #45a049;
        }
        .new_acc{
            margin-top: 15px;
        }
        .error-message {
          color: red;
          font-size: 13px;
        }
      </style>
</head>
<body>
        <h3>Welcome!</h3>
      <div class="form-container">
        <form method="POST" action="login.php">
          <p class="error-message">
            <?php echo isset($_GET['error']) ? $_GET['error'] : ''; ?>
          </p>
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required>
      
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>

          <label for="dropdown" style="display: inline;">Role:</label>
          <select name="role" id="dropdown">
            <option value="user" name="user">User</option>
            <option value="admin" name="admin">Admin</option>
          </select>
      
          <input type="submit" name="submit" value="Log in" style="display: block; margin-top: 20px;">
          <div class="new_acc">
            <label style="display: inline;">No account?</label>
            <a href="CreateNewAccount.html">create one</a>
          </div>
        </form>
      </div>
      
</body>
</html>
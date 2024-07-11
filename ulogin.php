<?php

session_start();
include "connection.php";

if (isset($_POST["bt1"])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $query = "SELECT * FROM user WHERE email='$email' AND password='$pass'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) == 0) {
        // No matching user found
        // You can display an error message or redirect to a login page
        header('Location: http://localhost/gymproject/flogin.php');
    } else {
        // User found, set session variables and redirect
        $ret = mysqli_fetch_array($result);
        $_SESSION['userid'] = $ret['id'];
        $_SESSION['name'] = $ret['name'];
        header('Location: http://localhost/gymproject/uhome.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>user login</title>
  </head>
  <body>
    <div class="container">
      <div class="log_in">
        <h2>Welcome to Fitness World</h2><br>
        <h2>User Login</h2>
        <form action="#" method="POST">
          

          <div class="input_box">
            <input type="email" name="email" required autocomplete="off"/>
            <label>Email</label>
          </div>

          <div class="input_box">
            <input type="password" name="pass" required />
            <label>Password</label>
          </div>
          

          <button type="submit" class="btn" name="bt1">SUBMIT</button>
          <div class="sign_up">
            <a href="adduser.php">Sign_Up</a> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="alogin.php">Admin Login</a>

            <br><br><a href="index.html">Home</a>

            &nbsp;&nbsp;
          </div>
          
        </form>
      </div>
     
  </body>
</html>
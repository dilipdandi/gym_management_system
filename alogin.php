
<?php

session_start();
include "connection.php";
if(isset($_POST["bt1"]))
{
  $email=$_POST['email'];
  $pass=$_POST['pass'];
$query = "SELECT * FROM alogin WHERE email='$email' AND password='$pass'";

$result=mysqli_query($conn,$query);
        if($row=mysqli_num_rows($result)==1)
        {
if(isset($_SESSION))
{
  $_SESSION['username'] = $_POST['email'];



  
  header('Location:http://localhost/gymproject/ahome.php');
}
else
{
  header('Location:http://localhost/gymproject/alogin.php');
  
}

}
  else
  {
   
   header('Location:http://localhost/gymproject/flogin.php');
  }
    }
   
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="style.css" />
    <title>alogin</title>
  </head>
  <body>
    <div class="container">
      <div class="log_in">
        <h2>Welcome to Fitness World</h2><br>
        <h2>Admin Login</h2>
        <form action="#" method="POST">
          

          <div class="input_box">
            <input type="email" name="email" required autocomplete="off" />
            <label>Email</label>
          </div>

          <div class="input_box">
            <input type="password" name="pass" required />
            <label>Password</label>
          </div>
          

          <button type="submit" class="btn" name="bt1">SUBMIT</button>
          <div class="sign_up">
            <a href="ulogin.php">User login</a> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.html">Home</a>
          
            
            
            &nbsp;&nbsp;

          </div>
        </form>
      </div>
     
  </body>

</html>
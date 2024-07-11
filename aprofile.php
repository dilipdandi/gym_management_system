<?php

include "connection.php";
session_start();
$u=$_SESSION['username'];
if(isset($_POST["btn"]))
{
 

  $email=$_POST['Email'];
  
  $pass=$_POST['Pass'];

  $query="UPDATE `alogin` set `email`='$email',
          `password`='$pass' where `email`='$u'";

  $run=mysqli_query($conn,$query);
  if($run)
  {

    header('Location:http://localhost/gymproject/ahome.php');
  }
  else
  {
    echo 'failed';
  }
}
?>

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="css/navbar.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<!--- Form Code Begins-->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header" >
    <a class="navbar-brand " href="index.html" style="color:#0ef;"> <span class="glyphicon glyphicon-home"> </span> Fitness World<i class='fas fa-heartbeat' style="color:#0ef;"></i></a>
    </div>
    
    <ul class="nav navbar-nav navbar-right">
    
    <li><a href="ulogout.php" style="color:#0ef;"><span class="glyphicon glyphicon-log-out"> </span>LogOut</a></li>
    </ul>
   
  </div>
</nav>
<br>
<h1 class="font-weight-bold text-center">Admin Form</h1>
<br>
<div class="container p-3 my-3 border">
<form method="post">
 
<?php
        include "connection.php";
        
        $email=$_SESSION['username'];
        $query="SELECT * FROM `alogin` WHERE `email`='$email'";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($result))
           {
            
        ?>

    <div class="form-group col-md-6">
      <label for="inputEmail4" class="font-weight-bold h5" style="font-size:20px;">Email</label>
      <input type="email" class="form-control" id="inputEmail4" name="Email" value="<?php echo $row['email'];?>" required>
    </div>

  
    
  
  <div class="form-group col-md-6">
      <label for="inputName4" class="font-weight-bold h5" style="font-size:20px;">Password</label>
      <input type="password" class="form-control" id="inputEmail4" name="Pass"required value="<?php echo $row['password'];?>">
    </div>
   
  

  <?php } ?>
    
    <div class="form-group col-md-9">

  <button type="submit" class="btn btn-primary" name="btn" style="color:#0ef;">Update</button>
</div>
</form>
  
<!--- Form Code Ends-->



    
<link rel="javascript" href="bootstrap/js/bootstrap.min.js">
<link rel="javascript" href="bootstrap/js/bootstrap.bundle.js">
</body>
</html>
<?php

include "connection.php";
$no=$_GET['Id'];
if(isset($_POST["btn"]))
{
 
  $month=$_POST['month'];
  $price=$_POST['price'];
  $desc=$_POST['desc'];
  $query="UPDATE `plan` set `month`='$month',`price`='$price' ,`des`='$desc' where `Id`=$no";

  $run=mysqli_query($conn,$query);
  if($run)
  {

      
      header("Location:http://localhost/gymproject/showplan.php");
  }
  else
  {
    header("Location:http://localhost/gymproject/showplan.php");
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
</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header" >
    <a class="navbar-brand " href="ahome.php" style="color:#0ef;"> <span class="glyphicon glyphicon-home"> </span> Fitness World<i class='fas fa-heartbeat' style="color:#0ef;"></i></a>
    </div>
    
    <ul class="nav navbar-nav navbar-right">
      
    <li><a href="aprofile.php" style="color:#0ef;"><span class="glyphicon glyphicon-user"> </span>Profile</a></li>
    <li>...</li>
    <li><a href="alogout.php" style="color:#0ef;"><span class="glyphicon glyphicon-log-out"> </span>LogOut</a></li>
    </ul>
    
  </div>
</nav>

<br>
<div class="container p-3 my-3 border">
<form method="post" onsubmit="return validateForm();"> <div class="form-row">

<?php
        include "connection.php";
        $Id=$_GET['Id'];
        $query="SELECT * FROM `plan` WHERE `id`=$Id";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($result))
           {
            
        ?>

<h1 class="font-weight-bold text-center">Update Plan Details</h1>
<br>

<div class="form-group col-md-6">
      <label for="inputName4" class="font-weight-normal h5" >Month</label>
      <input type="text" class="form-control" id="inputEmail4" name="month" value="<?php echo $row['month'];?>" required>
    </div>

    <div class="form-group col-md-6">
      <label for="inputEmail4" class="font-weight-normal h5">Price</label>
      <input type="text" class="form-control" id="inputEmail4" name="price" value="<?php echo $row['price'];?>" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4" class="font-weight-normal h5">Description</label>
      <textarea class="form-control" rows="5" name="desc" value="<?php echo $row['des'];?>" required></textarea>
    </div>
    
  </div>
  
  <button type="submit" class="btn btn-primary w-25" name="btn">Update</button>
  <h4 id="success" class="font-weight-normal text-center"></h4>
</form>
  <?php } ?>
<!--- Form Code Ends-->


<!--- Form Code Ends-->
<script type="text/javascript">
function validateForm() {
    var month = document.getElementsByName('month')[0].value;
    var price = document.getElementsByName('price')[0].value;
    var desc = document.getElementsByName('desc')[0].value;

    if (isNaN(month) || month <= 0) {
        alert("Month must be a positive number");
        return false;
    }

    if (isNaN(price) || price <= 0) {
        alert("Price must be a positive number");
        return false;
    }

    if (month === "") {
        alert("Month must be filled out");
        return false;
    }
    if (price === "") {
        alert("Price must be filled out");
        return false;
    }
    if (desc === "") {
        alert("Description must be filled out");
        return false;
    }
    return true; // Form is valid
}
</script>
<!--- Form Code Ends-->

    
<link rel="javascript" href="bootstrap/js/bootstrap.min.js">
<link rel="javascript" href="bootstrap/js/bootstrap.bundle.js">
</body>
</html>
<?php
include "connection.php";
session_start();
$n="";
if(isset($_SESSION["username"])){
  $n = $_SESSION['username'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Buy Plan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="css/navbar.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #1f293a;">
<form method="post" action="buyplan.php">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header" >
      <a class="navbar-brand" href="index.html" style="color:#0ef;">
        <span class="glyphicon glyphicon-home"></span> Fitness World
        <i class='fas fa-heartbeat' style="color:#0ef;"></i>
      </a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="uprofile.php" style="color:#0ef;"><span class="glyphicon glyphicon-user"></span> <?php echo $n; ?></a></li>
      <li><a href="ulogout.php" style="color:#0ef;"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
    </ul>
  </div>
</nav>
  
<div class="container"> 
  <table class="table" style="color:#0ef;">
    <thead>
      <tr>
        <th style="color:#0ef; font-size:30px;">Sr no</th>
        <th style="color:#0ef; font-size:30px;">Month</th>
        <th style="color:#0ef; font-size:30px;">Price</th>
        <th style="color:#0ef; font-size:30px;">Plan Name</th>
        <th style="color:#0ef; font-size:30px;">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $srno = 1;
        $query = "SELECT * FROM plan";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
    ?>
    <tr class="font-weight-bold">
        <th scope="row"><?php echo $srno++ ?></th>
        <td><?php echo $row['month']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['des']; ?></td>
        <td>
        <?php  
               if($row['id']!=null){?>
            <button class="btn btn-primary w-35" name="buy">
            
                <a href="buyplan.php?Id=<?php echo $row['id']; ?>" style="color:#0ef;">Buy</a>

            </button>
            <?php } ?>
        </td>
    </tr>
    <?php
            }
        }
    ?>
    </tbody>
  </table>
</div>
</form>
</body>
</html>

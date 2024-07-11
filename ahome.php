<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Home</title>
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
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header" >
    <a class="navbar-brand " href="index.html" style="color:#0ef;"> <span class="glyphicon glyphicon-home"> </span> Fitness World<i class='fas fa-heartbeat' style="color:#0ef;"></i></a>
    </div>
    
    <ul class="nav navbar-nav navbar-right">
      
    <li><a href="aprofile.php" style="color:#0ef;"><span class="glyphicon glyphicon-user"> </span>Profile</a></li>
      <li><a href="alogout.php" style="color:#0ef;"><span class="glyphicon glyphicon-log-out"> </span> Admin LogOut</a></li>
    </ul>
   
  </div>
</nav>
  
<div class="container"> 
<table class="table" style="color:#0ef;">
    <thead>
      <tr>
        <th style="color:#0ef; font-size:30px;">Trainer</th>
        <th style="color:#0ef;  font-size:30px;">Plan</th>
        <th style="color:#0ef;  font-size:30px;">Report</th>
        <th style="color:#0ef;  font-size:30px;">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><a href="addtrainer.php" class="btn btn-info" role="button">Add Trainer</a></td>
        <td><a href="plan.php" class="btn btn-info" role="button">Add Plan</a></td>
        <td><a href="ureport.php" class="btn btn-info" role="button">User Report</a></td>
        <td><a href="request.php" class="btn btn-info" role="button">Request</a></td>
        
      </tr>
      
      <tr>
      <td><a href="showtrainer.php" class="btn btn-info" role="button">Show Trainer</a></td>
      <td><a href="showplan.php" class="btn btn-info" role="button">Show Plan</a></td>
      <td><a href="payreport.php" class="btn btn-info" role="button">Payment Report</a></td>
        
     
     
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>

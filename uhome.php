<?php

session_start();
$n=$_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
    <a class="navbar-brand " href="#" style="color:#0ef;"> Fitness World&nbsp;<span class="glyphicon glyphicon-globe "></span></a>&nbsp;&nbsp;
    
    <a class="navbar-brand " href="viewplan.php" style="color:#0ef;">Classess</a>
    </div>
    
   
    <ul class="nav navbar-nav navbar-right">
    <li><a href="history.php" style="color:#0ef;">Purchase History</a></li>
    <li><a href="uprofile.php" style="color:#0ef;"><span class="glyphicon glyphicon-user"> </span><?php echo $n; ?></a></li>
      <li><a href="ulogout.php" style="color:#0ef;"><span class="glyphicon glyphicon-log-out"> </span>  LogOut</a></li>
    </ul>
  </div>
</nav>
  

  
    
<br><br>
<h1 style="color:#0ef; text-align: center;"><b>Member Exprience</b></h1>
<div class="row text-center">
  <div class="col-sm-4">
    <div class="thumbnail">
      <img src="img/g3.jpeg" alt="Paris" width="400" height="300"><br><br>
      <p><strong>EXPERT PERSONAL TRAINING</strong></p>
      <p>Gyms has the best personal training program in the Port Saint Lucie area. Our certified personal trainers are experts in their craft. We create the perfect programs to help you reach your goals. Everything begins with our energy and figuring out how to evolve that, then the journey begins.</p>
      
    </div>
  </div>
  <div class="col-sm-4">
    <div class="thumbnail">
      <img src="img/g1.jpeg" alt="New York" width="400" height="300"><br>
      <p><strong>The Exprience</strong></p>
      <p>Cleanliness & Friendliness, Guaranteed. Fitness World carries the latest and greatest cardio and strength training equipment available, Personal Training, Tanning, Cryo-Therapy, Hydromassage,  and the greatest atmosphere in the city.
        Our gym is almost at capacity for monthly members because we want to make sure we don't get overcrowded.</p>
     
    </div>
  </div>
  <div class="col-sm-4">
    <div class="thumbnail">
      <img src="img/g2.jpeg" alt="San Francisco" width="400" height="300">
      <p><strong>ATMOSPHERE</strong></p>
      <p>Our members tell us that they love our gym and the competitive atmosphere to be better. We are a gym for people that are serious about their health and fitness. </p>
      <br>
    </div>
  </div>
</div>
<!-- Container (Contact Section) -->
<div class="container">
  <h3 class="text-center">Contact</h3>
  <p class="text-center"><em>We love our fans!</em></p>

  <div class="row">
    <div class="col-md-4">
      <p style="color:#0ef;">Any Query? Drop a note.</p>
      <p style="color:#0ef;"><span class="glyphicon glyphicon-map-marker"></span>A1,Kanna Chowk, Solapur</p>
      <p style="color:#0ef;"><span class="glyphicon glyphicon-phone"></span>Phone: +91 9378654531</p>
      <p style="color:#0ef;"><span class="glyphicon glyphicon-envelope"></span>Email: fitnessworld@gmail.com</p>
    </div>
    
  </div>
  <br>
  

  

<!-- Image of location/map -->
<img src="img/map.jpg" class="img-responsive" style="width:100%">

</body>
</html>

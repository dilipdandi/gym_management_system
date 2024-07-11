<?php

include "connection.php";
if(isset($_POST["btn"]))
{
  $name=$_POST['Fname'];
  $email=$_POST['Email'];
  $gender=$_POST['gen'];
  $salary=$_POST['Salary'];
  $batch=$_POST['Batch'];
  $contact=$_POST['Contact'];
  

  $query="INSERT INTO `trainer`(`name`,`email`,`gender`,`salary`,`batch`,`mobile`)
          VALUES('$name','$email','$gender',$salary,'$batch','$contact')";

  $run=mysqli_query($conn,$query);
  if($run)
  {

    header('Location:http://localhost/gymproject/showtrainer.php');

  }
  else
  {
      echo "Failed !!";
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
<h1 class="font-weight-bold text-center">Trainer Registration Form</h1>
<br>
<div class="container p-3 my-3 border">
<form method="post" onsubmit="return validateForm();">
  
<div class="form-group col-md-6">
      <label for="inputEmail4" class="font-weight-bold h5" style="font-size:20px;">Name</label>
      <input type="text" class="form-control" id="inputEmail4" name="Fname" required autocomplete="off">
    </div>

    <div class="form-group col-md-6">
      <label for="inputEmail4" class="font-weight-bold h5" style="font-size:20px;">Email</label>
      <input type="email" class="form-control" id="inputEmail4" name="Email" required autocomplete="off">
    </div>

  
    <div class="form-group col-md-6">
  <label class="form-check-label font-weight-bold h5 form-row mt-4" for="Gender" style="font-size:20px;">Gender :</label>
    <div class="form-check form-check-inline "> 

    <input class="form-check-input form-row mt-3" style="margin:15px;" type="radio" name="gen" id="maleBtn" value="Male">
        <label class="form-check-label font-weight-normal " for="inlineRadio1">Male</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input " type="radio" name="gen" id="femaleBtn" value="Female" style="margin:15px;">
        <label class="form-check-label " for="inlineRadio2"  >Female</label><br>
    </div>
    
</div>

  
    
    <div class="form-group col-md-6">
      <label for="inputState" class="font-weight-bold h5 " style="font-size:20px;">Batch</label><br>
      <select id="inputState" class="form-control" name="Batch"  require>
        <option selected>Choose...</option>
        <option value="Morning" >Morning</option>
        <option value="Afternoon">Afternoon</option>
        <option value="Evening">Evening</option>
      </select>
  
</div>
    <div class="form-group col-md-6">
        
      <label for="inputName4" class="font-weight-bold h5 " style="font-size:20px;">Salary</label>
      <input type="text" class="form-control" id="inputCity" name="Salary" required autocomplete="off">

    </div>
    
  

    
  <div class="form-group col-md-6">
      <label for="inputName4" class="font-weight-bold h5" style="font-size:20px;">Contact</label>
      <input type="text" class="form-control" id="inputSalary" name="Contact" required autocomplete="off">
  </div>      

 

  
    
    <div class="form-group col-md-9">

  <button type="submit" class="btn btn-primary" name="btn" style="color:#0ef;">Insert</button>
</div>
</form>
  
<!--- Form Code Ends-->



<script type="text/javascript">
function validateForm() {
    var name = document.getElementsByName('Fname')[0].value;
    var email = document.getElementsByName('Email')[0].value;
    var gender = document.getElementsByName('gen')[0].value;
    var salary = document.getElementsByName('Salary')[0].value;
    var batch = document.getElementsByName('Batch')[0].value;
    var contact = document.getElementsByName('Contact')[0].value;
  
   

    var contactRegex = /^[0-9]+$/; // Regular expression to match only digits

    if (!contact.match(contactRegex) || contact.length !== 10) {
        alert("Contact must be a 10-digit number");
        return false;
    }
    if (!gender) {
        alert("Gender must be selected");
        return false;
    }
    if (isNaN(salary) || salary <= 0) {
        alert("salary must be a positive number");
        return false;
    }
    if (!/^[A-Za-z\s]+$/.test(name)) {
    alert("Name can only contain alphabets and spaces");
    return false;
}


    if (name === "") {
        alert("Name must be filled out");
        return false;
    }
    if (email === "") {
        alert("Email must be filled out");
        return false;
    }
    if (gender === "") {
        alert("Gender must be selected");
        return false;
    }
    if (salary === "") {
        alert("Weight must be filled out");
        return false;
    }
    if (batch === "") {
        alert("Batch must be selected");
        return false;
    }
    
   
}
</script>
    
<link rel="javascript" href="bootstrap/js/bootstrap.min.js">
<link rel="javascript" href="bootstrap/js/bootstrap.bundle.js">
</body>
</html>
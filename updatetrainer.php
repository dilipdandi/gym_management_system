<?php

include "connection.php";
$no=$_GET['Id'];
if(isset($_POST["btn"]))
{
 
  $name=$_POST['name'];
  $email=$_POST['email'];
  $gender=$_POST['gen'];
  $batch=$_POST['Batch'];
  $salary=$_POST['Salary'];
  $contact=$_POST['Contact'];
  

  $query="UPDATE `trainer` set `name`='$name',`email`='$email',`gender`='$gender',`salary`='$salary', `batch`='$batch',`mobile`='$contact' where `id`=$no";

  $run=mysqli_query($conn,$query);
  if($run)
  {

      echo "Updated Successfully!!";
      header("Location:http://localhost/gymproject/showtrainer.php");
  }
  else
  {
    echo "Failed: " . mysqli_error($conn);
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


<div class="container p-3 my-3 border">
<form method="post" onsubmit="return validateForm();"> <div class="form-row">
<?php
        include "connection.php";
        $Id=$_GET['Id'];
        $query="SELECT * FROM `trainer` WHERE `Id`=$Id";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($result))
           {
            
        ?>



<h1 class="font-weight-bold text-center">Update Trainer Details</h1>
<br>

<div class="form-group col-md-6">
      <label for="inputName4" class="font-weight-normal h5" >Name</label>
      <input type="text" class="form-control" id="inputEmail4" name="name" value="<?php echo $row['name'];?>" required>
    </div>

    <div class="form-group col-md-6">
      <label for="inputEmail4" class="font-weight-normal h5">Email</label>
      <input type="email" class="form-control" id="inputEmail4" name="email" value="<?php echo $row['email'];?>" required>
    </div>
    
    <div class="form-group col-md-6">
  <label class="form-check-label font-weight-bold h5 form-row mt-4" for="Gender" style="font-size:20px;">Gender :</label>
    <div class="form-check form-check-inline "> 

    <input class="form-check-input form-row mt-3" style="margin:15px;" type="radio" name="gen" id="maleBtn" value="Male" required>
        <label class="form-check-label font-weight-normal " for="inlineRadio1">Male</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input " type="radio" name="gen" id="femaleBtn" value="Female" style="margin:15px;" required>
        <label class="form-check-label " for="inlineRadio2" >Female</label><br>
    </div>
    
</div>

  
    
    <div class="form-group col-md-6">
      <label for="inputState" class="font-weight-bold h5 " style="font-size:20px;">Batch</label><br>
      <select id="inputState" class="form-control" name="Batch"  required >
        <option selected><?php echo $row['batch']; ?> </option>
        <option value="Morning" >Morning</option>
        <option value="Afternoon">Afternoon</option>
        <option value="Evening">Evening</option>
      </select>
  
</div>
    <div class="form-group col-md-6">
        
      <label for="inputName4" class="font-weight-bold h5 " style="font-size:20px;">Salary</label>
      <input type="text" class="form-control" id="inputCity" name="Salary" required value="<?php echo $row['salary'];?>">

    </div>
     
  

    <div class="form-group col-md-6">
    <label for="inputName4" class="font-weight-bold h5" style="font-size:20px;">Contact</label>
    <input type="text" class="form-control" id="inputSalary" name="Contact" required value="<?php echo $row['mobile'];?>">
</div>
    


<div class="form-group col-md-6">
 
  
  <button type="submit" class="btn btn-primary w-25" name="btn">Update</button>
</div>
  <h4 id="success" class="font-weight-normal text-center"></h4>
</form>
  <?php } ?>
<!--- Form Code Ends-->

<script type="text/javascript">
function validateForm() {
    var name = document.getElementsByName('name')[0].value;
    var email = document.getElementsByName('email')[0].value;
    var gender = document.querySelector('input[name="gen"]:checked');
    var salary = document.getElementsByName('Salary')[0].value;
    var batch = document.querySelector('select[name="Batch"]').value;
    var contact = document.getElementsByName('Contact')[0].value;

    var nameRegex = /^[A-Za-z\s]+$/; // Regular expression to match only alphabets and spaces
    var contactRegex = /^[0-9]+$/; // Regular expression to match only digits

    // Check if the name contains only alphabets and spaces
    if (!name.match(nameRegex)) {
        alert("Name can only contain alphabets and spaces");
        return false;
    }

    // Check if the email is valid
    if (!validateEmail(email)) {
        alert("Invalid email format");
        return false;
    }

    // Check if a gender option is selected
    if (!gender) {
        alert("Gender must be selected");
        return false;
    }

    // Check if a batch option is selected
    if (batch === "") {
        alert("Batch must be selected");
        return false;
    }

    // Check if salary is a positive number
    if (isNaN(salary) || salary <= 0) {
        alert("Salary must be a positive number");
        return false;
    }

    // Check if contact contains only numbers and is 10 digits long
    if (!contact.match(contactRegex) || contact.length !== 10) {
        alert("Contact must be a 10-digit number");
        return false;
    }

    return true;
}

// Function to validate email format
function validateEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}
</script>


    
<link rel="javascript" href="bootstrap/js/bootstrap.min.js">
<link rel="javascript" href="bootstrap/js/bootstrap.bundle.js">
</body>
</html>
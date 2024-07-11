<?php

include "connection.php";

if(isset($_POST["btn"]))
{
  $name=$_POST['Fname'];
  $email=$_POST['Email'];
  $gender=$_POST['gen'];
  $desig=$_POST['Desig'];
  $salary=$_POST['Salary'];
  $dept=$_POST['Dept'];
  $contact=$_POST['Contact'];
  $pass=$_POST['Pass'];

  $query="INSERT INTO `emp`(`name`,`email`,`gender`,`designation`,`salary`,`dept`,`contact`,`password`)
          VALUES('$name','$email','$gender','$desig',$salary,'$dept',$contact,'$pass')";

  $run=mysqli_query($conn,$query);
  if($run)
  {

      echo "<script>document.getElementById('success').innerHTML='Record Added Successfully!!';</script>";

  }
  else
  {
      echo "Failed !!";
  }


}

?>

<html>
<head>
    <title>Registration From</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css"> 
</head>

<body>

<!--- Form Code Begins-->

<br>
<h1 class="font-weight-bold text-center">Customer Registration Form</h1>
<br>
<form method="post"  class="w-50 m-auto shadow-lg" style="border:2px solid black;padding:50px;border-radius:30px">
  <div class="form-row">
  
  <div class="form-group col-md-6">
      <label for="inputName4" class="font-weight-normal h5" >Name</label>
      <input type="text" class="form-control" id="inputEmail4" name="Fname">
    </div>

    <div class="form-group col-md-6">
      <label for="inputEmail4" class="font-weight-normal h5">Email</label>
      <input type="email" class="form-control" id="inputEmail4" name="Email">
    </div>

  
  
  <label class="form-check-label font-weight-normal h5" for="Gender">Gender :</label>
    <div class="form-check form-check-inline"> 

    <input class="form-check-input " style="margin:10px;" type="radio" name="gen" id="maleBtn" value="Male">
        <label class="form-check-label font-weight-normal" for="inlineRadio1">Male</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input " type="radio" name="gen" id="femaleBtn" value="Female">
        <label class="form-check-label font-weight-normal" for="inlineRadio2">Female</label>
    </div>
    
  
  <div class="form-row mt-3">
  
     <div class="form-group col-md-5">
        
      <label for="inputState" class="font-weight-normal h5">Plan</label>
      <select id="inputState" class="form-control" name="Desig" >
        <option selected>Choose...</option>
        <option value="Programer" >Programer</option>
        <option value="HR">HR</option>
        <option value="Finance">Finance</option>
      </select>
    </div>
  
    <div class="form-group col-md-3">
        
      <label for="inputSalary" class="font-weight-normal h5">Salary</label>
      <input type="text" class="form-control" id="inputCity" name="Salary">

    </div>
    <div class="form-group col-md-4">
      <label for="inputZip" class="font-weight-normal h5">Department</label>
      <input type="text" class="form-control" id="inputZip" name="Dept">
    </div>
  </div>

    
  <div class="form-group col-md-6">
      <label for="inputName4" class="font-weight-normal h5" >Contact</label>
      <input type="text" class="form-control" id="inputSalary" name="Contact">
  </div>      

 <div class="form-group col-md-6">
      <label for="inputPassword4" class="font-weight-normal h5">Password</label>
      <input type="password" class="form-control" id="inputPassword4" name="Pass">
    </div>

  </div>   
  </div>

  <button type="submit" class="btn btn-primary w-25" name="btn">Insert</button>
  <h4 id="success" class="font-weight-normal text-center">..</h4>
</form>
  
<!--- Form Code Ends-->



    
<link rel="javascript" href="bootstrap/js/bootstrap.min.js">
<link rel="javascript" href="bootstrap/js/bootstrap.bundle.js">
</body>
</html>
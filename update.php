<?php

include "connection.php";
$no=$_GET['Id'];
if(isset($_POST["Updatebtn"]))
{
 
  $name=$_POST['Fname'];
  $email=$_POST['Email'];
  $gender=$_POST['gen'];
  $desig=$_POST['Desig'];
  $salary=$_POST['Salary'];
  $dept=$_POST['Dept'];
  $contact=$_POST['Contact'];
  $pass=$_POST['Pass'];

  $query="UPDATE `emp` set `name`='$name',`email`='$email',`gender`='$gender',
          `designation`='$desig',`salary`=$salary,`dept`='$dept',`contact`=$contact,
          `password`='$pass' where `Id`=$no";

  $run=mysqli_query($conn,$query);
  if($run)
  {

      echo "Updated Successfully!!";
      header("Location:http://localhost/phpExamples/show.php");
  }
  else
  {
      echo "Failed !!";
  }


}

?>

<html>
<head>
    <title>Update Employee</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css"> 
</head>

<?php
        include "connection.php";
        $Id=$_GET['Id'];
        $query="SELECT * FROM `EMP` WHERE `Id`=$Id";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($result))
           {
            
        ?>

<body>

<!--- Form Code Begins-->

<br>
<h1 class="font-weight-bold text-center">Update Employee Details</h1>
<br>
<form method="post"  class="w-50 m-auto shadow-lg" style="border:2px solid black;padding:50px;border-radius:30px">
  <div class="form-row">
  
  <div class="form-group col-md-6">
      <label for="inputName4" class="font-weight-normal h5" >Name</label>
      <input type="text" class="form-control" id="inputEmail4" name="Fname" value="<?php echo $row['name'];?>" required>
    </div>

    <div class="form-group col-md-6">
      <label for="inputEmail4" class="font-weight-normal h5">Email</label>
      <input type="email" class="form-control" id="inputEmail4" name="Email" value="<?php echo $row['email'];?>" required>
    </div>

  
  
    <?php
          $gender=$row['gender'];
          $flagM='unchecked';
          $flagF='unchecked';
          if($gender=="Male")
          {
              $flagM='checked';
              
          }
          else if($gender=="Female")
          { 
              $flagF='checked';
             
          }
    ?>  
  <label class="form-check-label font-weight-normal h5" for="Gender">Gender :</label>
    <div class="form-check form-check-inline"> 

        <input class="form-check-input " style="margin:10px;" type="radio" name="gen" id="maleBtn" value="Male" <?php echo $flagM; ?>>
        <label class="form-check-label font-weight-normal" for="inlineRadio1">Male</label>
    </div>

    
    <div class="form-check form-check-inline">  
        <input class="form-check-input " type="radio" name="gen" id="femaleBtn" value="Female" <?php echo $flagF; ?>>
        <label class="form-check-label font-weight-normal" for="inlineRadio2">Female</label>
    </div>
    
  
  <div class="form-row mt-3">
  
     <div class="form-group col-md-5">
        
      <label for="inputState" class="font-weight-normal h5">Designation</label>
      <select id="inputState" class="form-control" name="Desig" >
        <option selected><?php echo $row['designation']; ?></option>
        <option value="Programer">Programer</option>
        <option value="HR">HR</option>
        <option value="Finance">Finance</option>
      </select>
    </div>
  
    <div class="form-group col-md-3">
        
      <label for="inputSalary" class="font-weight-normal h5">Salary</label>
      <input type="text" class="form-control" id="inputCity" name="Salary" value="<?php echo $row['salary']; ?>">

    </div>
    <div class="form-group col-md-4">
      <label for="inputZip" class="font-weight-normal h5">Department</label>
      <input type="text" class="form-control" id="inputZip" name="Dept" value="<?php echo $row['dept']; ?>">
    </div>
  </div>

    
  <div class="form-group col-md-6">
      <label for="inputName4" class="font-weight-normal h5" >Contact</label>
      <input type="text" class="form-control" id="inputSalary" name="Contact" value="<?php echo $row['contact']; ?>">
  </div>      

 <div class="form-group col-md-6">
      <label for="inputPassword4" class="font-weight-normal h5">Password</label>
      <input type="password" class="form-control" id="inputPassword4" name="Pass" value="<?php echo $row['password']; ?>">
    </div>

  </div>   
  </div>

  <button type="submit" class="btn btn-warning w-25" name="Updatebtn">Update</button>
  <h4 id="success" class="font-weight-normal text-center">..</h4>
</form>
<?php
           }
?>
  
<!--- Form Code Ends-->



    
<link rel="javascript" href="bootstrap/js/bootstrap.min.js">
<link rel="javascript" href="bootstrap/js/bootstrap.bundle.js">
</body>
</html>
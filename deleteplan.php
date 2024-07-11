<!DOCTYPE html>
<html>
<head>
    <title>Delete</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css"> 

</head>


<body>

<?php
    include "connection.php";
    $Id=$_GET['Id'];
    $query="delete  FROM `plan` WHERE `Id`=$Id";
    $result=mysqli_query($conn,$query);
    if($result)
    {
      header("Location:http://localhost/gymproject/showplan.php");
    }
    else
    {
        echo "<h3 class='font-weight-normal text-center mt-5' >Unable to delete the Record</h3>";
    }



?>

</body>
</html>
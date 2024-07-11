

<html>
<head>
    <title>user Details</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css"> 
</head>

<body>

<!--- Table Code Begins-->

<h2 class="font-weight-normal text-center mt-2">User Details</h2>
<br>
<table class="table table-sm">
  <thead>
    <tr class="bg-dark text-white">
      <!---th scope="col">Sr no</th-->
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email ID</th>
      <th scope="col">Gender</th>
      <th scope="col">Batch</th>
      <th scope="col">Weight</th>
      <th scope="col">Contact</th>
      
      <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>

    <?php
        include "connection.php";
        $srno=1;
        $query="SELECT * FROM user";
        $result=mysqli_query($conn,$query);
        if($row=mysqli_num_rows($result)>0)
            {
                while($row=mysqli_fetch_array($result))
                {
            
        ?>
    
    
    <tr class="font-weight-bold">
    <!--th scope="row"><?php echo $srno++ ?></th-->
    <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>

      <td><?php echo $row['gender']; ?></td>
      <td><?php echo $row['batch']; ?></td>
      <td><?php echo $row['weight']; ?></td>

      
      <td><?php echo $row['mobile']; ?></td>
      

      
      <td><button type="button" class="btn btn-danger" name="btnDelete"><a href="deletetuser.php?Id=<?php echo $row['id'];?>">Delete</a></button></td>
      
    </tr>

    
    <?php
        }
    
    ?>




<!--Closed--->


</tbody>
</table>


<!--- Table Code Ends-->

<!---Modal Code--->



<?php } ?>
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="javascript" href="bootstrap/js/bootstrap.bundle.js">
</body>
</html>
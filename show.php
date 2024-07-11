

<html>
<head>
    <title>Registration From</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css"> 
</head>

<body>

<!--- Table Code Begins-->

<h2 class="font-weight-normal text-center mt-2">Employee Details</h2>
<br>
<table class="table table-sm">
  <thead>
    <tr class="bg-dark text-white">
      <!---th scope="col">Sr no</th-->
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email ID</th>
      <th scope="col">Gender</th>
      <th scope="col">Designation</th>
      <th scope="col">Salary</th>
      <th scope="col">Department</th>
      <th scope="col">Contact</th>
      <th scope="col">Password</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>

    <?php
        include "connection.php";
        $srno=1;
        $query="SELECT * FROM EMP";
        $result=mysqli_query($conn,$query);
        if($row=mysqli_num_rows($result)>0)
            {
                while($row=mysqli_fetch_array($result))
                {
            
        ?>
    
    
    <tr class="font-weight-bold">
    <!--th scope="row"><?php echo $srno++ ?></th-->
    <td><?php echo $row['Id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>

      <td><?php echo $row['gender']; ?></td>
      <td><?php echo $row['designation']; ?></td>
      <td><?php echo $row['salary']; ?></td>

      <td><?php echo $row['dept']; ?></td>
      <td><?php echo $row['contact']; ?></td>
      <td><?php echo md5($row['password']); ?></td>

      <td><button class="btn btn-primary w-35"  name="update"><a href="update.php?Id=<?php echo $row['Id'];?>" style="color:black;">Update</a></button></td>
      <td><button class="btn btn-danger w-30" name="delete" data-toggle="modal" data-target="#myModal">Delete</button></td>
      
    </tr>

    
    <?php
        }
    
    ?>


<!-- The Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Conformation !!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete all the record ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
  
        <button type="button" class="btn btn-danger" name="btnDelete"><a href="delete.php?Id=<?php echo $row['Id'];?>">Delete</a></button>
      
      </div>
    </div>
  </div>
</div>


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
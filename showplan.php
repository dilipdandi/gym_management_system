

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="css/navbar.css" />
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="ahome.php" style="color:#0ef;">
                    <span class="glyphicon glyphicon-home"></span> Fitness World
                    <i class='fas fa-heartbeat' style="color:#0ef;"></i>
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="aprofile.php" style="color:#0ef;"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                <li>...</li>
                <li><a href="alogout.php" style="color:#0ef;"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
            </ul>
        </div>
    </nav>
    
<!--- Table Code Begins-->

<h2 class="font-weight-normal text-center mt-2">Plan Details</h2>
<br>
<table class="table table-sm">
  <thead>
    <tr class="bg-dark text-white">
      <!---th scope="col">Sr no</th-->
      <th scope="col">Id</th>
      <th scope="col">Month</th>
      <th scope="col">Price</th>
      <th scope="col">Plan Name</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>

    <?php
        include "connection.php";
        $srno=1;
        $query="SELECT * FROM plan";
        $result=mysqli_query($conn,$query);
        if($row=mysqli_num_rows($result)>0)
            {
                while($row=mysqli_fetch_array($result))
                {
            
        ?>
    
    
    <tr class="font-weight-bold">
    <!--th scope="row"><?php echo $srno++ ?></th-->
    <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['month']; ?></td>
      <td><?php echo $row['price']; ?></td>
      <td><?php echo $row['des']; ?></td>

      

      <td><button class="btn btn-primary w-35"  name="update"><a href="updateplan.php?Id=<?php echo $row['id'];?>" style="color:#0ef;"><span class="glyphicon glyphicon-edit" style="color:#0ef;"></span>Update</a></button></td>
      <td><button type="button" class="btn btn-danger" name="btnDelete"><a href="deleteplan.php?Id=<?php echo $row['id'];?>" style="color:#0ef;"><span class="glyphicon glyphicon-trash" style="color:#0ef;"></span>Delete</a></button></td>
      
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
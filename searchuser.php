<html>
<head>
    <title>Search</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css"> 
</head>
    <body>
        <!--- Table Code Begins-->
<br>
    
  <form method="post">
    <div class="border p-2 bg-dark">    
      <label for="inputState" class="font-weight-normal h5 ml-3 text-white">Search</label>
      <select id="inputState" class="rounded" name="search"  >
        <option selected >Choose...</option>
        <option value="name" >Name</option>
        <option value="dept">Department</option>
        <option value="salary">Salary Greater than</option>
      </select>
      <input type="text" name="searchFeild" class="rounded" placeholder="Enter Data.." />
      <input type="submit" name="btnSearch" class="btn btn-primary btn-sm" />
    </div>
</form>
    

<br>
<table class="table table-lg">
  <thead>
    <tr class="bg-danger text-white">
      
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email ID</th>
      <th scope="col">Gender</th>
      <th scope="col">Designation</th>
      <th scope="col">Salary</th>
      <th scope="col">Department</th>
      <th scope="col">Contact</th>
      <th scope="col">Password</th>
    </tr>
    </thead>
    <tbody class="bg-dark text-white">

    <?php
        include "connection.php";
        
        if(isset($_POST['btnSearch']))
        {
          $searchFeild=$_POST['searchFeild'];
          $option=$_POST['search'];
          $query="";
          if($option=="name")
          {
            $query="SELECT * FROM EMP where $option LIKE '$searchFeild%'";
          }
          else if($option=="dept")
          {
            $query="SELECT * FROM EMP where $option LIKE '$searchFeild%'";
          }
          else if($option=="salary")
          {
            $query="SELECT * FROM EMP where $option>=$searchFeild";
          }
          $result=mysqli_query($conn,$query);    
          if(mysqli_num_rows($result)>0)
              {
                  while($row=mysqli_fetch_array($result))
                  {
              
          ?>
      
    
    <tr class="font-weight-bold">
    <td><?php echo $row['Id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>

      <td><?php echo $row['gender']; ?></td>
      <td><?php echo $row['designation']; ?></td>
      <td><?php echo $row['salary']; ?></td>

      <td><?php echo $row['dept']; ?></td>
      <td><?php echo $row['contact']; ?></td>
      <td><?php echo md5($row['password']); ?></td> 
      
    </tr>
    <?php
        }
      }
    }
    ?>
  </tbody>
</table>

<!--- Table Code Ends-->




    
    <link rel="javascript" href="bootstrap/js/bootstrap.min.js">
    <link rel="javascript" href="bootstrap/js/bootstrap.bundle.js">
    </body>
</html>
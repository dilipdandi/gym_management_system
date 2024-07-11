<?php
include "connection.php";
session_start();
$n = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title> Pament Report</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="css/navbar.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .status-container {
            background-color: #0ef;
            color: #fff;
            padding: 10px;
            margin: 10px;
            text-align: center;
            border-radius: 5px;
            color: black;
        }
        .table {
      border: 1px solid #0ef;
      border-collapse: collapse;
      width: 100%;
    }

    .table th, .table td {
      border: 1px solid #0ef;
      padding: 8px;
      text-align: center;
      font-size: 14px;
    }
    .table th {
      border: 1px solid #0ef;
      padding: 8px;
      text-align: center;
    }
   
    .table th {
      background-color: #1f293a;
      color: white;
      font-size: 16px;
    }
</style>

</head>
<body style="background-color: #1f293a;">

<form method="post">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html" style="color:#0ef;">
        <span class="glyphicon glyphicon-home"></span> Fitness World
        <i class='fas fa-heartbeat' style="color:#0ef;"></i>
      </a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="uprofile.php" style="color:#0ef;"><span class="glyphicon glyphicon-user"></span> <?php echo $n; ?></a></li>
      <li><a href="ulogout.php" style="color:#0ef;"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
    </ul>
  </div>
</nav>

<form method="post">
  <!-- ... Navbar and title ... -->
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          <label for="start_date" style="color: #0ef;">Start Date:</label>
          <input type="date" class="form-control" id="start_date" name="start_date">
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for "end_date" style="color: #0ef;">End Date:</label>
          <input type="date" class="form-control" id="end_date" name="end_date">
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label style="color: #0ef;">&nbsp;</label>
          <button type="submit" class="btn btn-primary form-control">Filter</button>
        </div>
      </div>
    </div>
  </div>
<center><h1 style="color: #0ef;">Payment Report</h1></center>
  <!-- Table to display payment report -->
  <div class="container">
    <table class="table" style="color: #0ef;">
      <thead>
        <tr>
          <th style="color: #0ef; font-size: 30px;">Sr no</th>
          <th style="color: #0ef; font-size: 30px;">Name</th>
          <th style="color: #0ef; font-size: 30px;">Month</th>
          <th style="color: #0ef; font-size: 30px;">Price</th>
          <th style="color: #0ef; font-size: 30px;">Plan Name</th>
          <th style="color: #0ef; font-size: 30px;">Booked Date</th>
          <th style="color: #0ef; font-size: 30px;">Paid Date</th>
          <th style="color: #0ef; font-size: 30px;">Exp Date</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $srno = 1;
        $totalAmount = 0; // Initialize total amount
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $start_date = $_POST['start_date'];
          $end_date = $_POST['end_date'];
          
          $query = "SELECT b.*, p.*, u.*, t.* FROM bill b 
            INNER JOIN plan p ON b.pid = p.id 
            INNER JOIN user u ON b.uid = u.id 
            INNER JOIN tempbill t ON b.tid = t.tid
            WHERE b.status = 'Approved' 
            AND b.actiondate BETWEEN '$start_date' AND '$end_date'
            GROUP BY u.id";
            
          $result = mysqli_query($conn, $query);
          
          while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr class="font-weight-bold">
              <th scope="row"><?php echo $srno++ ?></th>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['month']; ?></td>
              <td><?php echo $row['price']; ?></td>
              <td><?php echo $row['des']; ?></td>
              <td><?php echo $row['dates']; ?></td>
              <td><?php echo $row['actiondate']; ?></td>
              <td><?php echo $row['exp']; ?></td>
            </tr>
            <?php
            // Add the price to the total amount
            $totalAmount += $row['price'];
          }
        }
        ?>
      </tbody>
    </table>
  </div>
  
  <!-- Total Amount -->
  <div class="container">
    <div class="row">
      <div class="col-sm-">
        <div class="status-container">
          <h4>Total Amount:</h4>
          <p><?php echo $totalAmount; ?></p>
        </div>
      </div>
    </div>
  </div>
</form>
</body>
</html>
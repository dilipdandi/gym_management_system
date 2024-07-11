<?php
session_start();
$n = $_SESSION['username'];

include "connection.php";

// Initialize user counts
$totalUserCount = 0;
$activeUserCount = 0;
$expiredUserCount = 0;
$inProgressUserCount = 0;

// Calculate user counts
$queryTotalUserCount = "SELECT COUNT(DISTINCT id) AS userCount FROM user";
$resultTotalUserCount = mysqli_query($conn, $queryTotalUserCount);

if ($resultTotalUserCount) {
    $totalUserCountRow = mysqli_fetch_assoc($resultTotalUserCount);
    $totalUserCount = $totalUserCountRow['userCount'];
}

// Calculate active, expired, and in-progress user counts
$query = "SELECT t.*, u.name, u.email, p.month, p.price, p.des, t.exp, t.status
    FROM tempbill t
    JOIN user u ON t.uid = u.id
    JOIN plan p ON t.pid = p.id group by u.id";
$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = mysqli_fetch_array($result)) {
        $membershipStatus = getMembershipStatus($row['exp'], $row['status']);
        if ($membershipStatus == 'Active') {
            $activeUserCount++;
        } elseif ($membershipStatus == 'Rejected') {
            $expiredUserCount++;
        } elseif ($membershipStatus == 'In Progress') {
            $inProgressUserCount++;
        }
    }
}

function getMembershipStatus($expDate, $status) {
    $currentDate = date('Y-m-d');
    if ($status == 'Approved' && $expDate >= $currentDate) {
        return 'Active';
    } elseif ($status == 'Approved' && $expDate < $currentDate) {
        return 'Expired';
    } elseif ($status == 'Rejected') {
        return 'Rejected';
    } else {
        return 'In Progress';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Buy Plan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="css/navbar.css" />
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
        
    </style>
</head>
<body style="background-color: #1f293a;">
<form method="post" action="buyplan.php">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class "navbar-header">
    <a class="navbar-brand" href="index.html" style="color:#0ef;">
        <span class="glyphicon glyphicon-home"></span> Fitness World
        <i class='fas fa-heartbeat' style="color:#0ef;"></i>
    </a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="aprofile.php" style="color:#0ef;"><span class="glyphicon glyphicon-user"></span><?php echo $n; ?></a></li>
      <li><a href="ulogout.php" style="color:#0ef;"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
    </ul>
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <div class="status-container">
                <h4>Total Users</h4>
                <p><?php echo $totalUserCount; ?></p>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="status-container">
                <h4>Total Active Users</h4>
                <p><?php echo $activeUserCount; ?></p>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="status-container">
                <h4>Total Expired Users</h4>
                <p><?php echo $expiredUserCount; ?></p>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="status-container">
                <h4>Application in Progress</h4>
                <p><?php echo $inProgressUserCount; ?></p>
            </div>
        </div>
    </div>
</div>

<div class="container"> 
<table class="table" style="color:#0ef;">
    <thead>
      <tr>
        <th style="color:#0ef; font-size:30px;">Sr no</th>
        <th style="color:#0ef; font-size:30px;">Name</th>
        <th style="color:#0ef; font-size:30px;">email</th>
        <th style="color:#0ef; font-size:30px;">Month</th>
        <th style="color:#0ef; font-size:30px;">Price</th>
        <th style="color:#0ef; font-size:30px;">Membership Status</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $srno = 1;
        $query = "SELECT t.*, u.name, u.email, p.month, p.price, p.des, t.exp, t.status
        FROM tempbill t
        JOIN user u ON t.uid = u.id
        JOIN plan p ON t.pid = p.id group by u.id";
    
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr class="font-weight-bold">
                    <th scope="row"><?php echo $srno++ ?></th>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['month']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo getMembershipStatus($row['exp'], $row['status']); ?></td>
                <?php
            }
        }
    ?>
    </tbody>
  </table>
</div>
</form>
</body>
</html>

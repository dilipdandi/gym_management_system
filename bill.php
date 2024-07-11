<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabcart</title>
    <style>
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>
</head>
<body>
<?php
session_start();
$tid=$_GET['tid'];
// Check if the session variable is set and not empty
if (isset($_SESSION["userid"]) && !empty($_SESSION["userid"])) {
    $u = $_SESSION["userid"];

    // Continue with your code that uses $u here
    // ...
} else {
    // Handle the case when the session variable is not set
    echo "Session user ID is not set.";
}
?>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">FITNESS WORLD</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white">Dilip Dandi</p>
                        <p class="text-white">Sushant Patil</p>
                        <p class="text-white">+91 9378654531</p>
                    </div>
                </div>
            </div>
        </div>
               
    <?php
        include "connection.php";
        $srno=1;
        
        $query = "SELECT t.*, u.name, u.email, u.addr, u.mobile, p.month, p.price, p.des FROM tempbill t INNER JOIN user u ON t.uid = u.id INNER JOIN plan p ON t.pid = p.id WHERE tid = '$tid'";

        $result=mysqli_query($conn,$query);
                if($row=mysqli_num_rows($result)==1)
                {
                while($row=mysqli_fetch_array($result))
                {
            
        ?>
        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <!-- <h2 class="heading">Invoice No.: 001</h2> -->
                    <!-- <p class="sub-heading">Order Date: 20-20-2021 </p> -->
                    <p class="sub-heading">Full Name: <?php echo $row['name']; ?></p>
                    <p class="sub-heading">Phone Number: <?php echo $row['mobile']; ?> </p>
                    <p class="sub-heading">Address: <?php echo $row['addr']; ?> </p>
                    <p class="sub-heading">Email Address: <?php echo $row['email']; ?> </p>
                </div>
                <div class="col-6">
                   
                
                  
                </div>
            </div>
        </div>
   
   <div class="body-section">
    <h3 class="heading">Ordered Items</h3>
    <br>
    <table class="table-bordered">
        <thead>
            <tr>
                <th>Months</th>
                <th class="w-20">Price</th>
                <th class="w-20">Description</th>
                <th class="w-20">Grandtotal</th>
            </tr>
        </thead>
        <tbody>
          
                <tr>
                <td><?php echo $row['month']; ?></td>
               
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['des']; ?></td>
               
            </tr>
       
           
            <?php if (isset($row)) { ?>
                <tr>
                    <td colspan="3" class="text-right">Grand Total</td>
                    <td> <?php echo $row['price']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <h3 class="heading">Payment Mode: Cash </h3>
</div>

<?php }} ?>
        <div class="body-section">
            <p>&copy; Copyright 2023 - FITNESS World All rights reserved. 
                <a href="uhome.php" class="float-right">WWW .FITNESSWORLD.COM</a>
            </p>
        </div>      
    </div>      

</body>
</html>

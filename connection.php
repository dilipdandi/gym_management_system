<?php 

$servername="localhost";
$username="root";
$password="";
$databse="gymproject_db";

$conn=mysqli_connect($servername,$username,$password,$databse);

if(!$conn)
{
    echo "<h5 style='color:red';>PHP & MYSQL Connection Failed !!</h5>";
}

?>
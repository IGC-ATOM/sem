<?php

$mobil=$_POST['mobil'];
$password=$_POST['password'];

$con=mysqli_connect("localhost:3306","root","","parth") or die(mysqli_connect_error());
$sql="insert into signup values($mobil,'$password')";
$cmd=mysqli_query($con,$sql) or die(mysqli_error($con));
echo"Data inserted Successfully.";
mysqli_close($con);
?>
<?php
$id=$_POST['num'];
$name=$_POST['name'];
$desc=$_POST['desc'];
$price=$_POST['price'];


$con=mysqli_connect("localhost:3306","root","","parth") or die(mysqli_connect_error());
$sql="insert into perfume values($id,'$name','$desc',$price)";
$cmd=mysqli_query($con,$sql) or die(mysqli_error($con));
echo "<script> alert ('Perfume Added Successfully');</script>";
echo '<script> windows.location.href = "egadminadd.php"; </script>';
?>


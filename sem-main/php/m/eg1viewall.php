<?php

$con=mysqli_connect("localhost:3306","root","","parth") or die(mysqli_connect_error());
$sql="select * from perfume";
$cmd=mysqli_query($con,$sql) or die(mysqli_error($con));

echo "<h3> ALL PERFUMES</h3>";
echo "<table border=3 solid>
<tr>
<td>ID</td>
<td>NAME</td>
<td>DESCRIPTION</td>
<td>PRICE</td>
<tr>";

while($rset=mysqli_fetch_array($cmd))
{
    echo "<tr>";
    echo "<td>" .$rset['id']. "</td>";
	echo "<td>" .$rset['name']. "</td>";
    echo "<td>" .$rset['discription']. "</td>";
    echo "<td>" .$rset['price']. "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
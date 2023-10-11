<?php

$con=mysqli_connect("localhost:3306","root","","parth") or die(mysqli_connect_error());
$sql="select * from signup";
$cmd=mysqli_query($con,$sql) or die(mysqli_error($con));

echo "<h3> Sign up</h3>";
echo "<table border=3 solid>
<tr>
<td>MOBILE NO</td>
<td>PASSWORD</td>
<tr>";

while($rset=mysqli_fetch_array($cmd))
{
    echo "<tr>";
    echo "<td>" .$rset['mobil']. "</td>";
    echo "<td>" .$rset['password']. "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
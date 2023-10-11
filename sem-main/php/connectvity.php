<style>
	body{
		background-color:grey;
	}
	table{
		margin-top:50;
		border:3px solid cyan;
	}
	td{
		padding:7;
		background-color: mediumaquamarine;
	}
	#t{
		color:blue;
	}
	#id{
		color:red;
	}
	input{
		margin:5;
	}
</style>

<?php
	$server="localhost:3308";
	$username="root";
	$password="";
	$dbname="tybca106";
	
	$con=mysqli_connect($server,$username,$password,$dbname);
	
	$query="";
	$cmd;
	
	echo "<center><table border='3'";
	echo "<tr>";
	echo "<td colspan='4' id='t'><center><h3>PHP Connectivity</h3></center></td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td id='t'>ID</td>";
	echo "<td id='t'>Name</td>";
	echo "<td id='t'>Age</td>";
	echo "<td id='t'>City</td>";
	echo "</tr>";
	
	function ViewAllRecords(){
		
		global $con;
		$query="select * from Employee";
		$cmd=mysqli_query($con,$query);
		while($set=mysqli_fetch_array($cmd)){
			echo "<tr>";
			echo "<td id='id'>".$set['ID']."</td>";
			echo "<td>".$set['Name']."</td>";
			echo "<td>".$set['Age']."</td>";
			echo "<td>".$set['City']."</td>";
			echo "</tr>";
		}
		
		echo "Yes";
	}
	
	if(isset($_POST['Select'])){
		ViewAllRecords();
		
	}elseif(isset($_POST['Insert'])){
		$id=$_POST['InsertID'];
		$Name=$_POST['InsertName'];
		$Age=$_POST['InsertAge'];
		$City=$_POST['InsertCity'];
		
		$query="insert into Employee values($id,'$Name',$Age,'$City')";
		$cmd=mysqli_query($con,$query);
		ViewAllRecords();
		
	}elseif(isset($_POST['Update'])){
		$id=$_POST['UpdateID'];
		$Name=$_POST['UpdateName'];
		$Age=$_POST['UpdateAge'];
		$City=$_POST['UpdateCity'];
		
		$query="update Employee set Name='$Name',Age=$Age,City='$City' where ID=$id";
		$cmd=mysqli_query($con,$query);
		ViewAllRecords();
		
	}
	elseif(isset($_POST['Delete'])){
		$id=$_POST['DeleteID'];
		
		$query="delete from Employee where ID=$id";
		$cmd=mysqli_query($con,$query);
		ViewAllRecords();
		
	}
	
	echo "<tr>";
	echo "<form action='' method='POST'>";
	echo "<td colspan='4'><center><button type='submit' name='Select'>View all records</button></td></center>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td id='t'>ID:<input type='text' name='InsertID' size='1'></td>";
	echo "<td id='t'>Name:<input type='text' name='InsertName' size='4'></td>";
	echo "<td id='t'>Age:<input type='text' name='InsertAge' size='1'></td>";
	echo "<td id='t'>City:<input type='text' name='InsertCity' size='3'>";
	echo "<button type='submit' name='Insert'>Insert Records</button></td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td id='t'>ID:<input type='text' name='UpdateID' size='1'></td>";
	echo "<td id='t'>Name:<input type='text' name='UpdateName' size='4'></td>";
	echo "<td id='t'>Age:<input type='text' name='UpdateAge' size='1'></td>";
	echo "<td id='t'>City:<input type='text' name='UpdateCity' size='3'>";
	echo "<button type='submit' name='Update'>Update Records</button></td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td colspan='2' id='t'><center>ID:<input type='text' name='DeleteID' size='1'></td></center>";
	echo "<td colspan='2' id='t'><center><button type='submit' name='Delete'>Delete Records</button></td></center>";
	echo "</tr>";
	
	echo "</from>";
	echo "</table></center>";
	
	mysqli_close($con);
?>
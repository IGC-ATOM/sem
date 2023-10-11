<!DOCTYPE html>
<html lang="en">
<body>
    <div class="form">
        <form action="" method="POST">
            <table>
            <tr>
                <td><label for="ID">ID:</label></td>
                <td><input type="number" name="ID" placeholder="Enter ID"></td>
            </tr>

            <tr>
                <td><label for="Name">Name:</label></td>
                <td><input type="text" name="Name" placeholder="Enter Name"></td>
            </tr>

            <tr>
                <td><label for="City">City:</label></td>
                <td><input type="text" name="City" placeholder="Enter City"></td>
            </tr>

            <tr>
                <td>
                    <button type="submit" name="View">View</button>
                    <button type="submit" name="Insert">Insert</button>
                    <button type="submit" name="Update">Update</button>
                    <button type="submit" name="Delete">Delete</button>
                    <button type="submit" name="Search">Search</button>
                </td>
            </tr>
            </table>
        </form>
    </div>
</body>
</html>

<?php
$ID = $_POST['ID'];
$Name = $_POST['Name'];
$City = $_POST['City'];

$con = new mysqli('localhost', 'root', '', 'emp');

if (isset($_POST['View'])) {
    $query = "SELECT * FROM edetail";
    $cmd = mysqli_query($con, $query);

    while ($set = mysqli_fetch_array($cmd)) {
        echo "<table>";
        echo "<tr>";
        echo "<td>".$set['ID']."</td>";
        echo "<td>".$set['Name']."</td>";
        echo "<td>".$set['City']."</td>";
        echo "</tr>";
        echo "</table>";
    }
} elseif (isset($_POST['Insert'])) {
    $query = "INSERT INTO edetail VALUE ($ID, '$Name', '$City')";
    $cmd = mysqli_query($con, $query);
} elseif (isset($_POST['Update'])) {
    $query = "UPDATE edetail SET Name='$Name', City='$City' WHERE ID=$ID";
    $cmd = mysqli_query($con, $query);
} elseif (isset($_POST['Delete'])) {
    $query = "DELETE FROM edetail WHERE ID='$ID'";
    $cmd = mysqli_query($con, $query);
}elseif (isset($_POST['Search'])) {
    $searchID = $_POST['ID'];

    $query = "SELECT * FROM edetail WHERE ID = $searchID";
    $cmd = mysqli_query($con, $query);

    if ($cmd) {
        while ($set = mysqli_fetch_array($cmd)) {
            echo "<table>";
            echo "<tr>";
            echo "<td>".$set['ID']."</td>";
            echo "<td>".$set['Name']."</td>";
            echo "<td>".$set['City']."</td>";
            echo "</tr>";
            echo "</table>";
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
}


mysqli_close($con);
?>

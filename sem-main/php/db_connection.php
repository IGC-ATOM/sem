<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ex";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert student
function insertStudent($name, $course_id, $contact_no, $address) {
    global $conn;
    $sql = "INSERT INTO student (Stud_name, Course_id, Contact_no, Address) VALUES ('$name', $course_id, '$contact_no', '$address')";
    return $conn->query($sql);
}

// Update student
function updateStudent($id, $name, $course_id, $contact_no, $address) {
    global $conn;
    $sql = "UPDATE student SET Stud_name='$name', Course_id=$course_id, Contact_no='$contact_no', Address='$address' WHERE Stud_id=$id";
    return $conn->query($sql);
}

// Delete student
function deleteStudent($id) {
    global $conn;
    $sql = "DELETE FROM student WHERE Stud_id=$id";
    return $conn->query($sql);
}

// Search students by Course
function searchStudentsByCourse($course_id) {
    global $conn;
    $sql = "SELECT * FROM student WHERE Course_id = $course_id";
    return $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Academic Institute</title>
</head>
<body>
    <h1>Academic Institute</h1>

    <!-- Form for inserting a new student -->
    <h2>Add Student</h2>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="course_id">Course ID:</label>
        <input type="number" name="course_id" required><br>

        <label for="contact_no">Contact No:</label>
        <input type="text" name="contact_no" required><br>

        <label for="address">Address:</label>
        <textarea name="address" required></textarea><br>

        <input type="submit" name="Insert" value="Insert">
    </form>

    <!-- Table to display student records -->
    <h2>Student Records</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Course ID</th>
            <th>Contact No</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        <?php
        if (isset($_POST['Select'])) {
            $course_id = $_POST['course_id'];

            $result = searchStudentsByCourse($course_id);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['Stud_id'] . "</td>";
                    echo "<td>" . $row['Stud_name'] . "</td>";
                    echo "<td>" . $row['Course_id'] . "</td>";
                    echo "<td>" . $row['Contact_no'] . "</td>";
                    echo "<td>" . $row['Address'] . "</td>";
                    echo "<td>Edit | <a href='?delete_id=" . $row['Stud_id'] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No students found for this course.</td></tr>";
            }
        }
        ?>
    </table>

    <!-- Form for searching students by course -->
    <h2>Search Students by Course</h2>
    <form action="" method="post">
        <label for="course_id">Select Course:</label>
        <input type="number" name="course_id" required>
        <input type="submit" name="Select" value="Search">
    </form>
</body>
</html>

<?php
if (isset($_POST['Insert'])) {
    $name = $_POST['name'];
    $course_id = $_POST['course_id'];
    $contact_no = $_POST['contact_no'];
    $address = $_POST['address'];

    insertStudent($name, $course_id, $contact_no, $address);
}

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    deleteStudent($id);
}

$conn->close();
?>

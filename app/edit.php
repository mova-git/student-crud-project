<?php
include 'db.php';

// Check if ID is passed
if (!isset($_GET['id'])) {
    die("Student ID not found.");
}

$id = $_GET['id'];

// Fetch student details
$sql = "SELECT * FROM students WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Student not found.");
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Edit Student</h1>

    <form action="update.php" method="POST">

        <label>Student ID</label>
        <input type="number"
               name="id"
               value="<?php echo $row['id']; ?>"
               readonly>

        <label>Student Name</label>
        <input type="text"
               name="name"
               value="<?php echo $row['name']; ?>"
               required>

        <label>Department</label>
        <input type="text"
               name="department"
               value="<?php echo $row['department']; ?>"
               required>

        <label>Age</label>
        <input type="number"
               name="age"
               value="<?php echo $row['age']; ?>"
               required>

        <label>Email</label>
        <input type="email"
               name="email"
               value="<?php echo $row['email']; ?>"
               required>

        <button type="submit">Update Student</button>

    </form>

    <br>

    <a href="view.php">
        <button>Back</button>
    </a>

</div>

</body>
</html>

<?php
$conn->close();
?>
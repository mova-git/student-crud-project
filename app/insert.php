<?php
include 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    // Insert query
    $sql = "INSERT INTO students (id, name, department, age, email)
            VALUES ('$id', '$name', '$department', '$age', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Student Added Successfully!');
                window.location='index.php';
              </script>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
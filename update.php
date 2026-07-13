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

    // Update query
    $sql = "UPDATE students
            SET
                name = '$name',
                department = '$department',
                age = '$age',
                email = '$email'
            WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {

        echo "<script>
                alert('Student Updated Successfully!');
                window.location='view.php';
              </script>";

    } else {

        echo "Error: " . $conn->error;

    }

    $conn->close();
}
?>
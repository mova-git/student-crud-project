<?php
include 'db.php';

// Check if ID is received
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // Delete query
    $sql = "DELETE FROM students WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {

        echo "<script>
                alert('Student Deleted Successfully!');
                window.location='view.php';
              </script>";

    } else {

        echo "Error: " . $conn->error;

    }

} else {

    echo "Invalid Request!";

}

$conn->close();
?>
<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Student Records</h1>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Age</th>
            <th>Email</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>

        <?php

        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {

                echo "<tr>";

                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['department']."</td>";
                echo "<td>".$row['age']."</td>";
                echo "<td>".$row['email']."</td>";

                echo "<td>
                        <a href='edit.php?id=".$row['id']."'>
                            <button>Edit</button>
                        </a>
                      </td>";

                echo "<td>
                        <a href='delete.php?id=".$row['id']."'
                        onclick=\"return confirm('Are you sure you want to delete this student?');\">
                            <button>Delete</button>
                        </a>
                      </td>";

                echo "</tr>";

            }

        } else {

            echo "<tr>";
            echo "<td colspan='7'>No Students Found</td>";
            echo "</tr>";

        }

        $conn->close();

        ?>

    </table>

    <br>

    <a href="index.php">
        <button>Add New Student</button>
    </a>

</div>

</body>
</html>
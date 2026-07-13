<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>Student Management System</h1>

    <form action="insert.php" method="POST">

        <label>Student ID</label>
        <input type="number" name="id" placeholder="Enter Student ID" required>

        <label>Student Name</label>
        <input type="text" name="name" placeholder="Enter Student Name" required>

        <label>Department</label>
        <input type="text" name="department" placeholder="Enter Department" required>

        <label>Age</label>
        <input type="number" name="age" placeholder="Enter Age" required>

        <label>Email</label>
        <input type="email" name="email" placeholder="Enter Email" required>

        <button type="submit">Add Student</button>

    </form>

    <hr>

    <div class="actions">

        <a href="view.php">
            <button>View Students</button>
        </a>

    </div>

</div>

</body>
</html>
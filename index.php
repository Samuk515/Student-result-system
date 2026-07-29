<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result System</title>
    <link rel="Stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
       <h1>Student Result System</h1>
       <a href="add_student.php" class="btn">Add Student</a>
       <h2> All students</h2>
         <table>
            <tr>
                <th>Roll No</th>
                <th>Name</th>
                <th>Class</th>
                <th>Actions</th>
            </tr>
            <?php
            $_result = mysqli_query($conn, "SELECT * FROM students");
            while ($row = mysqli_fetch_assoc($_result)) {
                echo "<tr>";
                echo "<td>" . $row['roll_no'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['class'] . "</td>";
                echo "<td>";
                echo "<a href='view_result.php?id=" . $row['id'] . "'>View Results</a> | ";
                echo "<a href='add_result.php?id=" . $row['id'] . "'>Add Result</a> | ";
                echo "<a href='delete_student.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
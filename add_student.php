<?php include 'db.php'; 
if ($_SERVER['REQUEST_METHOD']== 'POST'){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $roll_no = mysqli_real_escape_string($conn, $_POST['roll_no']);
    $class = mysqli_real_escape_string($conn, $_POST['class']);

    $sql = "INSERT INTO students (name, roll_no, class) VALUES ('$name', '$roll_no', '$class')";
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="Stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Add Student</h1>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="text" name="roll_no" placeholder="Roll Number" required>
            <input type="text" name="class" placeholder="Class" required>
            <button type="submit">Add Student</button>
        </form>
        <a href="index.php" class="btn">Back to Home</a>
    </div>
</body>
</html>
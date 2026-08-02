<?php include 'db.php'; 
$student_id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD']== 'POST'){
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $marks = mysqli_real_escape_string($conn, $_POST['marks']);

    if($marks >= 90 ) $grade = 'A';
    elseif($marks >= 75) $grade = 'B';
    elseif($marks >= 60) $grade = 'C';
    elseif($marks >= 40) $grade = 'D';
    else $grade = 'F';

    $sql = "INSERT INTO results (student_id, subject, marks, grade) VALUES ('$student_id', '$subject', '$marks', '$grade')";

    if (mysqli_query($conn, $sql)) {
        header("Location: view_result.php?id=$student_id");
        exit();
    } 
    $student = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students WHERE id = '$student_id'"));
}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Result</title>
    <link rel="Stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1> Add Result for <?php echo $student['name']; ?></h1>
        <form method="POST" action="">
            <input type="text" name="subject" placeholder="Subject" required>
            <input type="number" name="marks" placeholder="marks(0-100)" min="0" max="100" required>
            <button type="submit">Add Result</button>
            <a href="view_result.php?id=<?php echo $student_id; ?>" class="btn">Back to Results</a>
        </form>
    </div>
    
</body>
</html>
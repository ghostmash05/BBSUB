<?php
session_start();
include 'db_conn.php';

if (isset($_SESSION['Student_ID'])) {
    $studentID = $_SESSION['Student_ID'];

    
    $query = "SELECT switchState FROM students WHERE Student_ID = '$studentID'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $switchState = $row['switchState'];

        
        echo $switchState;
    } else {
        echo "Switch state not found in the database.";
    }
} else {
    echo "Student ID not found in the session.";
}

mysqli_close($conn);
?>

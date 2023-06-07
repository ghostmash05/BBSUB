<?php
session_start();
include 'db_conn.php';

if (isset($_POST['switchState'])) {
    $switchState = $_POST['switchState'];
    $studentID = $_SESSION['Student_ID'];

    
    $updateQuery = "UPDATE students SET switchState = '$switchState' WHERE Student_ID = '$studentID'";
    if (mysqli_query($conn, $updateQuery)) {
        echo "Switch state updated successfully.";
    } else {
        echo "Error updating switch state: " . mysqli_error($conn);
    }

} else {
    echo "Switch state not provided.";
}

mysqli_close($conn);
?>

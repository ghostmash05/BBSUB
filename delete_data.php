<?php
include 'db_conn.php';

if (isset($_POST['switchState']) && $_POST['switchState'] == 'off') {

    session_start();
    $student_id = $_SESSION['Student_ID'];

    $delete_query = "DELETE FROM donor_list WHERE Student_ID='$student_id'";
    mysqli_query($conn, $delete_query);
}

mysqli_close($conn);

?>

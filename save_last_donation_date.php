<?php
include 'db_conn.php';

session_start();
$last_donation_date_html = $_POST['lastdonate'];
$last_donation_date_mysql = date('Y-m-d', strtotime($last_donation_date_html));

$student_id = $_SESSION['Student_ID'];

$select_query = "SELECT * FROM donor_list WHERE Student_ID='$student_id'";
$result = mysqli_query($conn, $select_query);

if (mysqli_num_rows($result) > 0) {
    
    $update_query = "UPDATE donor_list SET Last_Donation_Date='$last_donation_date_mysql' WHERE Student_ID='$student_id'";
    mysqli_query($conn, $update_query);
    
    $insert_query = "INSERT INTO donor_list (Student_ID, Last_Donation_Date) VALUES ('$student_id', '$last_donation_date_mysql')";
    mysqli_query($conn, $insert_query);
}

mysqli_close($conn);

?>

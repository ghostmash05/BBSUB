<?php
include 'db_conn.php';

if (isset($_POST['switchState']) && $_POST['switchState'] == 'on') {
    
    session_start();
    $student_id = $_SESSION['Student_ID'];

    $query = "SELECT Student_ID, Department ,Name, Contact_Num, Address, Email, Gender, Blood_Group FROM students WHERE Student_ID = '$student_id'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['Name'];
        $dept = $row['Department'];
        $contact_num = $row['Contact_Num'];
        $address = $row['Address'];
        $email = $row['Email'];
        $gender = $row['Gender'];
        $blood_group = $row['Blood_Group'];

  
        $insert_query = "INSERT INTO donor_list (Student_ID, Department, Name, Contact_Num, Address, Email, Gender, Blood_Group) VALUES ('$student_id', '$dept', '$name', '$contact_num', '$address', '$email', '$gender', '$blood_group')";
        mysqli_query($conn, $insert_query);
    }
}

mysqli_close($conn);

?>
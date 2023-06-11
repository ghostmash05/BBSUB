<?php
session_start();
include 'db_conn.php';
$userID = $_SESSION['Student_ID'];

$query = "SELECT Name, Address, Contact_Num, Email, Blood_Group, Department  FROM students WHERE Student_ID = '$userID'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $Name = $row['Name'];
    $Address = $row['Address'];
    $Contact_Num = $row['Contact_Num'];
    $Email = $row['Email'];
    $Blood_Group = $row['Blood_Group'];
    $Dept = $row['Department'];
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="update.css">
    <title>BBSUB - Update Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <section>
    <h2>Update Information</h2>
    <form action="updateinfo.php" method="POST">

        <label for="Name">Name:</label>
        <input type="text" name="Name" id="Name" value="<?php echo $Name; ?>" required><br><br>

        <label for="dept">Department:</label>
        <select name="dept" id="dept" required>
            <option value="CSE"<?php if ($Dept === 'CSE') echo 'selected'; ?>>CSE</option>
            <option value="Law"<?php if ($Dept === 'Law') echo 'selected'; ?>>Law</option>
            <option value="Pharmacy"<?php if ($Dept === 'Pharmacy') echo 'selected'; ?>>Pharmacy</option>
            <option value="Public Health"<?php if ($Dept === 'Public Health') echo 'selected'; ?>>Public Health</option>
            <option value="FET"<?php if ($Dept === 'FET') echo 'selected'; ?>>FET</option>
            <option value="JCMS"<?php if ($Dept === 'JCMS') echo 'selected'; ?>>JCMS</option>
            <option value="Architecture"<?php if ($Dept === 'Architecture') echo 'selected'; ?>>Architecture</option>
            <option value="Business Studies"<?php if ($Dept === 'Business Studies') echo 'selected'; ?>>Business Studies</option>
            <option value="English Studies"<?php if ($Dept === 'English Studies') echo 'selected'; ?>>English Studies</option>
            <option value="Enviromental Science"<?php if ($Dept === 'Enviromental Science') echo 'selected'; ?>>Enviromental Science</option>
        </select><br><br>
        
        <label for="Contact">Contact Number:</label>
        <input type="text" name="Contact" id="Contact" value="<?php echo $Contact_Num; ?>" required><br><br>
        
        <label for="Address">Address:</label>
        <input type="text" name="Address" id="Address" value="<?php echo $Address; ?>" required><br><br>
        
        <label for="Email">Email:</label>
        <input type="email" name="Email" id="Email" value="<?php echo $Email; ?>" required><br><br>
        
        <label for="Blood_group">Blood Group:</label>
        <select name="Blood_group" id="Blood_group" required>
            <option value="A+"<?php if ($Blood_Group === 'A+') echo 'selected'; ?>>A+</option>
            <option value="A-"<?php if ($Blood_Group === 'A-') echo 'selected'; ?>>A-</option>
            <option value="B+"<?php if ($Blood_Group === 'B+') echo 'selected'; ?>>B+</option>
            <option value="B-"<?php if ($Blood_Group === 'B-') echo 'selected'; ?>>B-</option>
            <option value="AB+"<?php if ($Blood_Group === 'AB+') echo 'selected'; ?>>AB+</option>
            <option value="AB-"<?php if ($Blood_Group === 'AB-') echo 'selected'; ?>>AB-</option>
            <option value="O+"<?php if ($Blood_Group === 'O+') echo 'selected'; ?>>O+</option>
            <option value="O-"<?php if ($Blood_Group === 'O-') echo 'selected'; ?>>O-</option>
        </select><br><br>

        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required><br>

        <label for="confirm_password">Confirm New Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br>
        
        <input type="submit" value="Update">
        <a href="Profile.php"><input type="button" value="Cancel"></a>
    </form>
    </section>
</body>
</html>




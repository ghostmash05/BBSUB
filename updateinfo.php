<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
*{
    margin: 0;
    padding: 0;
    font-family: 'poppins',sans-serif;
    background-color: black;

}

.message-container {
  text-align: center;
  margin-top: 60px;
  color: #fff;
  font-size: x-large ;
  font-weight: bolder;
  margin-bottom: 40px;
  margin-block-end: 30px;
  margin-top: 20%;
}

.button-link {
  display: inline-block;
  background-color: #007bff;
  color: #fff;
  padding: 10px 20px;
  margin-top: 15px ;
  text-decoration: none;
  border-radius: 5px;
}

.button-link:hover {
  background-color: #3e8e41;
}

</style>


<?php

include 'db_conn.php';
session_start();

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$Student_Id = $_SESSION['Student_ID'];
$Name = validate($_POST['Name']);
$Dept = validate($_POST['dept']);
$Contact = validate($_POST['Contact']);
$Address = validate($_POST['Address']);
$Blood_group = validate($_POST['Blood_group']);
$Email = validate($_POST['Email']);
$newPassword = validate($_POST["new_password"]);
$confirmPassword = validate($_POST["confirm_password"]);

$encrypted_newpwd=md5($newPassword);
$encrypted_confirmpwd=md5($confirmPassword);

$update_query = "UPDATE students SET 
                Name = '$Name',
                Department = '$Dept',
                Contact_Num = '$Contact',
                Address = '$Address',
                Email = '$Email',
                Blood_Group = '$Blood_group'
                WHERE Student_ID = '$Student_Id'";

$update_query2 = "UPDATE donor_list SET 
                Name = '$Name',
                Department = '$Dept',
                Contact_Num = '$Contact',
                Address = '$Address',
                Email = '$Email',
                Blood_Group = '$Blood_group'
                WHERE Student_ID = '$Student_Id'";

                
if ($encrypted_newpwd === $encrypted_confirmpwd) 
{
    
    $update_query .= "AND Pass = '$encrypted_newpwd'";

  }                

if (mysqli_query($conn, $update_query) && mysqli_query($conn, $update_query2)) {
    
    echo "<div class='message-container'>";
    echo "Information updated successfully, Login again to see changes";
    $link_address = "Logout.php";
    echo "<br><a href='".$link_address."' class='button-link'>Log out</a></br>";
    echo "</div>";
}

else {

    echo "<div class='message-container'>";
    echo "Error updating information, Please try again";
    $link_address = "updateinfo.php";
    echo "<br><a href='".$link_address."' class='button-link'>Try Again</a></br>";
    echo "</div>";


}

mysqli_close($conn);
?>
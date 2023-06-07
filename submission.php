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
  padding: 8px 15px;
  margin-top: 15px ;
  text-decoration: none;
  border-radius: 5px;
}

.button-link:hover {
  background-color: #3e8e41;
}

</style>

<?php

if (isset($_POST['Student_ID']) && isset($_POST['Name']) && isset($_POST['Contact']) && isset($_POST['Address']) 
     && isset($_POST['blood_group']) && isset($_POST['email']) && isset($_POST['gender']) && isset($_POST['Pass']) && isset($_POST['Confirm_Pass']))

{
    include 'db_conn.php';

    
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Student_ID = validate($_POST['Student_ID']);
    $Name = validate($_POST['Name']);
    $Contact = validate($_POST['Contact']);
    $Address = validate($_POST['Address']);
    $Blood_group = validate($_POST['blood_group']);
    $Email = validate($_POST['email']);
    $Gender = validate($_POST['gender']);
    $Pass = validate($_POST['Pass']);
    $Confirm_Pass = validate($_POST['Confirm_Pass']);
    $encrypted_pwd= md5($Pass);
    $encrypted_pwd_confirm = md5($Confirm_Pass);

    if (empty($Student_ID) || empty($Name) || empty($Contact) || empty($Address) || empty($Blood_group) || empty($Email) || empty($Gender) || empty($Pass) || empty($Confirm_Pass))
    {
        header("Location : Signup.html");
    }

    else
    {
      if($encrypted_pwd != $encrypted_pwd_confirm){
        echo "<div class='message-container'>";
        echo "Passwords do not match!";
        $link_address = "signup.html";
        echo "<br><a href='".$link_address."' class='button-link'>Try Again</a></br>";
        echo "</div>";
        exit();
      }
      else
      {

        $sql = "INSERT INTO students(Student_ID, Name, Contact_num, Address, Email, Gender, Blood_Group, Pass) 
                VALUES('$Student_ID','$Name','$Contact','$Address','$Email','$Gender','$Blood_group','$encrypted_pwd')";

        $res = mysqli_query($conn, $sql);

        if ($res)
        {
            echo "<div class='message-container'>";
            echo "Congratulations! You've Successfully Registered!";
            $link_address = "index.html";
            echo "<br><a href='".$link_address."' class='button-link'>Sign In</a></br>";
            echo "</div>";            
            
		    }
        else 
        {
			      echo "<div class='message-container'>";
            echo "You had one job, only one job! Can't even do that right! You Dissapoint Me!!";
            $link_address = "signup.html";
            echo "<br><a href='".$link_address."' class='button-link'>Try Again</a></br>";
            echo "</div>";
		    }
    }
  }
}
else
{
    header("Location : Signup.html");
}



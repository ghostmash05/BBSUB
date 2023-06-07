<?php 

session_start(); 

include "db_conn.php";

if (isset($_POST['Student_ID']) && isset($_POST['Pass'])) 
{

    function validate($data)
    {

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $Student_ID = validate($_POST['Student_ID']);

    $Pass = validate($_POST['Pass']);
    $encrpyted_pwd=md5($Pass);

        $sql = "SELECT * FROM students WHERE Student_ID='$Student_ID' AND Pass='$encrpyted_pwd'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1)
        {

            $row = mysqli_fetch_assoc($result);

            if ($row['Student_ID'] === $Student_ID && $row['Pass'] === $encrpyted_pwd) 
            {

                header("Location: Home.html");
                $_SESSION['Student_ID'] = $row['Student_ID'];
                $_SESSION['Pass'] = $row['Pass'];
                $_SESSION['Name'] = $row['Name'];
                $_SESSION['Email'] = $row['Email'];
                $_SESSION['Contact_Num'] = $row['Contact_Num'];
                $_SESSION['Blood_Group'] = $row['Blood_Group'];
               


            }
            else if ($row['Student_ID'] !== $Student_ID || $row['Pass'] !== $encrpyted_pwd) 
            {

                header("Location: failedlogin.php");

            }

        }

        else
        {
            header("Location: failedlogin.php");

        }


    }

    else
    {
        header("Location: failedlogin.php");

    }

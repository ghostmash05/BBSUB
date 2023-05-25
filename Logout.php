<?php
session_start();
unset($_SESSION["Student_ID"]);
unset($_SESSION["Name"]);
unset($_SESSION["Email"]);
unset($_SESSION["Contact_Num"]);
unset($_SESSION["Blood_Group"]);
header("Location: index.html");
?>
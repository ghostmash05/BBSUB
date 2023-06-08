<?php
session_start();

if (!isset($_SESSION['Student_ID']) || empty($_SESSION['Student_ID'])){
   
    header('Location: index.html');
    exit(); 
}
?>

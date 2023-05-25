<?php
session_start();
$username = $_SESSION['Student_ID'];
$name = $_SESSION['Name'];
$bloodgroup = $_SESSION['Blood_Group'];
$phone = $_SESSION['Contact_Num'];
$email = $_SESSION['Email'];

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
        <title>Profile Card-BBSUB</title>
        <link rel="stylesheet" href="Profile.css">
    </head>
    <body>
        <div class="container">
            <div class="profile-box">
                <a href="Home.html">
                <img src="images/home.svg" class="menu-icon">
                </a>
                <a href="update.html">
                <img src="images/settings.svg" class="setting2-icon">
                </a>
                <h3 id="Username"><?php echo $username; ?></h3>
                <p id="name">Name:&nbsp;<?php echo $name; ?> </p>
                <p id="bloodgroup">Blood Group:&nbsp;<?php echo $bloodgroup ?> </p>
                <p id="phone">Phone:&nbsp;<?php echo $phone ; ?></p>
                <p id="email">Email:&nbsp;<?php echo $email ; ?></p>

                
                <label class="switch">
                    <input id="mySwitch" type="checkbox" class="btn" onclick="openPopup()">
                    <span class="slider"></span>
                    <span class="on">Can't Donate Now</span>
                    <span class="off">Can Donate Now</span>

                </label>
                <div class="popup" id="popup">
                    <p>Your Last Donation Date:</p>
                    <input type="date" name="lastdonate" id="lastdonate">
                    <div class="button-container">
                        <button class="save-button" onclick="savePopup()">Save</button>
                        <button class="close-button" onclick="closePopup()">Close</button>
                    </div>
                </div>
                
                    

                
            </div>
        </div>
        <script>
            
        let popup = document.getElementById("popup");

        function openPopup() {
        let switchState = document.getElementById("mySwitch").checked;
        if (switchState) {
        popup.classList.add("open-popup");
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
         }
         }; 
        xhttp.open("POST", "insert_data.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("switchState=on");
        } else {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        }
        };
        xhttp.open("POST", "delete_data.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("switchState=off");
        }
        }

        let mySwitch = document.getElementById("mySwitch");
        let switchStateCookie = getCookie("switchState");

        if (switchStateCookie === "on") {
        mySwitch.checked = true;
        } else if (switchStateCookie === "off") {
        mySwitch.checked = false;
        }
        mySwitch.addEventListener("change", function() {
        if (this.checked) {
        setCookie("switchState", "on", 365);
        } else {
        setCookie("switchState", "off", 365);
        }
        });

        function setCookie(name, value, days) {
        let expires = "";
        if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
        }

        function getCookie(name) { 
        let nameEQ = name + "=";
        let ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
        }

        function closePopup() {
        popup.classList.remove("open-popup");
        }

        function savePopup() {
        popup.classList.remove("open-popup");
        let lastdonate = document.getElementById("lastdonate").value;

        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
        };
        xhttp.open("POST", "save_last_donation_date.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("lastdonate=" + lastdonate);
        }

       </script>

    </body>
</html>

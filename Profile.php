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
                <a href="update.php">
                <img src="images/settings.svg" class="setting2-icon">
                </a>
                <h3 id="Username"><?php echo $username; ?></h3>
                <p id="name">Name:&nbsp;<?php echo $name; ?> </p>
                <p id="bloodgroup">Blood Group:&nbsp;<?php echo $bloodgroup ?> </p>
                <p id="phone">Phone:&nbsp;<?php echo $phone ; ?></p>
                <p id="email">Email:&nbsp;<?php echo $email ; ?></p>
               
                
                <label class="switch" id="switchState">
                    <input id="mySwitch" type="checkbox" class="btn" onclick="openPopup()">
                    <span class="slider"></span>
                    <span class="on" value="on">Can't Donate Now</span>
                    <span class="off" value="off">Can Donate Now</span>

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
        let userID = "<?php echo $username; ?>";

        function fetchSwitchState() {
        let xhr = new XMLHttpRequest();
    

        xhr.open("POST", "fetch_switch_state.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
 
        xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
               
                let switchState = xhr.responseText;
                mySwitch.checked = (switchState === "on");
            } else {
                
                console.error("Request error:", xhr.status);
            }
        }
        };
        
        xhr.send("userID=" + userID);
        }


        fetchSwitchState();


        mySwitch.addEventListener("change", function() {
        let switchState = this.checked ? "on" : "off";
    
        let xhr = new XMLHttpRequest();
    
        xhr.open("POST", "update_switch_state.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
            } else {
                console.error("Request error:", xhr.status);
            }
         }
         };
    
        xhr.send("switchState=" + switchState + "&userID=" + userID);
        });


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

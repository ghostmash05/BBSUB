<?php
include 'check_auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" contents="IE=edge" />
    <meta name="viewport" contents="width=device-width,initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="Home.css" />

    <title>Blood Bank of State University of Bangladesh (BBSUB)</title>
</head>
<body>

    <header>
            <div class="navbar">
            <div class="logo"><a href="Home.html">BBSUB</a></div>

            <ul class="links">
                <li><a href="Profile.php">Profile</a></li>
                <li><a href="https://www.facebook.com/BadassMashrafe" target="_blank">Contact Admin</a></li>
                <li><a href="https://www.hostwithbros.com" target="_blank">Host your own Website!</a></li>           
            </ul>
            <a href="Logout.php" class="action_btn">Log out</a>
            <div class="toggle_btn">
                <i class="fa-solid fa-bars"></i>
            </div>
            </div>

         <div class="dropdown_menu">
            <ul>
                <li><a href="Profile.php">Profile</a></li>
                <li><a href="https://www.facebook.com/BadassMashrafe" target="_blank">Contact Admin</a></li>
                <li><a href="https://www.hostwithbros.com" target="_blank">Host your own Website!</a></li>
                <li><a href="Logout.php" class="action_btn">Log out</a></li>
            </ul>
         </div>

        </div>
        </div>

        <div class="container">
            <div class="banner">
            <div class="banner-text">
                <h1>Blood Bank of State University of Bangladesh</h1>
                <p>Donate Blood, Save Lives</p>
            </div>
            </div>

        <div class="container">
            <form method="get" action="Search.php">
            <div class="search-bar">                   
                <div id="select" class="select">
                    <p id="selectText" name="selectText" value="selectText">Select Blood Group</p>
                    <img src="images/free-arrow-down-icon-3101-thumb.png">
                    <ul id="list">
                        <li class="options" value="A+">A+</li>
                        <li class="options" value="A-">A-</li>
                        <li class="options" value="B+">B+</li>
                        <li class="options" value="B-">B-</li>
                        <li class="options" value="O+">O+</li>
                        <li class="options" value="O-">O-</li>
                        <li class="options" value="AB+">AB+</li>
                        <li class="options" value="AB-">AB-</li>
                    </ul>
                    <input type="hidden" name="bloodGroup" id="bloodGroup">
                </div>
                <div id="select2" class="select2">
                    <p id="selectText2" name="selectText2" value="selectText2">Select Gender</p>
                    <img src="images/free-arrow-down-icon-3101-thumb.png">
                    <ul id="list2">
                        <li class="options2" value="Male">Male</li>
                        <li class="options2" value="Female">Female</li>
                        <li class="options2" value="Both">Both</li>
                    </ul> 
                    <input type="hidden" name="gender" id="gender">    
                </div>
                <input name="location" id="location" type="text" placeholder="Location">


            </div>
            </form> 
        </div>

    </header>
    
<script>
    
let select = document.getElementById("select");
let list = document.getElementById("list");
let select2 = document.getElementById("select2");
let list2 = document.getElementById("list2");
let selectText = document.getElementById("selectText");
let selectText2 = document.getElementById("selectText2");
let options =  document.getElementsByClassName("options");
let options2 =  document.getElementsByClassName("options2");

select.onclick = function() {
    list.classList.toggle("open");
}

select2.onclick = function() {
    list2.classList.toggle("open2");
}

for (option of options) {
    option.onclick = function() {
        selectText.innerHTML = this.innerHTML;
       
    }
}
for (option of options2) {
    option.onclick = function() {
        selectText2.innerHTML = this.innerHTML;
        
    }
}

var bloodGroupSelect = document.querySelector('#select ul');
var bloodGroupHiddenInput = document.querySelector('#bloodGroup');
  
  bloodGroupSelect.addEventListener('click', function(event) {
    var target = event.target;
    if (target.tagName === 'LI') {
      var selectedText = target.textContent;
      var selectedValue = target.getAttribute('value');
      document.querySelector('#selectText').textContent = selectedText;
      bloodGroupHiddenInput.value = selectedValue;
    }
  });

var genderSelect = document.querySelector('#select2 ul');
var genderHiddenInput = document.querySelector('#gender');

genderSelect.addEventListener('click', function(event) {
  var target = event.target;
  if (target.tagName === 'LI') {
    var selectedText = target.textContent;
    var selectedValue = target.getAttribute('value');
    document.querySelector('#selectText2').textContent = selectedText;
    genderHiddenInput.value = selectedValue;
  }
});


const toggleBtn = document.querySelector('.toggle_btn');
const toggleBtnIcon = document.querySelector('.toggle_btn i');
const dropdownMenu = document.querySelector('.dropdown_menu');

toggleBtn.onclick = function()
{
    dropdownMenu.classList.toggle('open');
    const isOpen = dropdownMenu.classList.contains('open')

    toggleBtnIcon.classList = isOpen
    ? 'fa-solid fa-xmark'
    : 'fa-solid fa-bars'
  
}

var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

if (isMobile) {
  window.addEventListener('DOMContentLoaded', function() {
    var paragraph = document.getElementById("selectText");
    paragraph.textContent = "Blood Group";

    var paragraph2 = document.getElementById("selectText2");
    paragraph2.textContent = "Gender";

    
  });
}

</script>

</body>
</html>
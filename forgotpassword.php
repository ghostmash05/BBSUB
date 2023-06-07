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

echo "<div class='message-container'>";
echo "Upps! You forgot your password? Nothing to worry about!!<br>Just contact me at <a href='mailto:mashrafi.cse.56016@sub.ac.bd'> mashrafi.cse.56016@sub.ac.bd </a> and i will help you out!";
$link_address = "index.html";
echo "<br><a href='".$link_address."' class='button-link'>Hold Up For Now</a></br>";
echo "</div>";

?>
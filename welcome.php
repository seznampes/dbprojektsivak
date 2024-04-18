<?php
session_start(); //otvorenie session

//zistenie ci je session nastavene
if(isset($_SESSION['meno']) ) {
     
    echo 'Welcome '.$_SESSION['meno'].'<br>';

    echo 'Click here to <a href = "index.php" tite = "Logout">logout.';//odkaz na odhlasenie
}
?>
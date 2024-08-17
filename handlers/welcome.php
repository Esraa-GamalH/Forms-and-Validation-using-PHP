<?php
session_start();

if (isset($_SESSION['name'])){

    echo "<h1> Welcome " . $_SESSION['name'] . "</h1>";
}
else{
    header("location: login.php");
}


?>
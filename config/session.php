<?php
session_start();

if(isset($_SESSION['id']) && empty($_SESSION['id']) == false) {

    
} else {
     header("Location: login.php");
}

?>
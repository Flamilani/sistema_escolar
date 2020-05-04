<?php 
if(empty($_SESSION['cLogado'])) {
    header("Location: login.php");
    exit;
}

?>
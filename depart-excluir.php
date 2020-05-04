<?php
session_start();

require_once('session.php');
require('config.php');
require('classes/departamentos.class.php');
$depart = new Departamentos();

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $depart->deleteDepartamento($_GET['id']);
}

header("Location: departamentos.php");
?>
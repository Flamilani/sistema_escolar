<?php
require('config.php');
require_once('session.php');

require('classes/usuarios.class.php');
$usu = new Usuarios();

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $info = $usu->getProfessor($_GET['id']);

    if($info['status'] == 1) {
        $usu->activeUsuario(0, $_GET['id']);
    } else {
        $usu->activeUsuario(1, $_GET['id']);
    }
   
}

header("Location: professores.php");
?>
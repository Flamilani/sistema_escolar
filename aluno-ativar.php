<?php
require('config.php');
require_once('session.php');

require('classes/alunos.class.php');
$alu = new Alunos();

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $info = $alu->getAluno($_GET['id']);

    if($info['status'] == 1) {
        $alu->activeAluno(0, $_GET['id']);
    } else {
        $alu->activeAluno(1, $_GET['id']);
    }
   
}

header("Location: alunos.php");
?>
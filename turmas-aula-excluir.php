<?php
require('config.php');
require_once('session.php');

require('classes/turmas.class.php');
$turma = new Turmas();

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $dado = $turma->getPlanoAulaPorId($_GET['id']);
    $turma->deleteAula($_GET['id']);
}

header("Location: turmas-aulas.php?id=" . $dado['turma_id']);
?>
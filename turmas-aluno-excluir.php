<?php
require('config.php');
require_once('session.php');

require('classes/alunos.class.php');
$aluno = new Alunos();

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $dado = $aluno->getAlunoTurma($_GET['id']);
    $aluno->deleteTurmaAluno($_GET['id']);
}

header("Location: turmas-alunos.php?id=" . $dado['turma_id']);
?>
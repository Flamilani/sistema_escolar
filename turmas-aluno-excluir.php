<?php
require('config.php');
require_once('session.php');

require('classes/alunos.class.php');
$aluno = new Alunos();

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $dado = $aluno->getAlunoTurma($_GET['id']);
    $aluno->deleteTurmaAluno($_GET['id']);
}
$_SESSION['turma_aluno_del'] = '<div class="text-center alert alert-danger" role="alert">
Aluno removido com sucesso!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button></div>';
header("Location: turmas-alunos.php?id=" . $dado['turma_id']);
?>
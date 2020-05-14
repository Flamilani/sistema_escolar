<?php require("config.php"); ?>
<?php require_once('inc/header.php'); ?> 
<?php require_once('session.php'); ?>
<?php require('helper/functions.php') ?>
<?php require_once('inc/navbar.php'); ?> 

<main class="container">
<?php 
require('classes/alunos.class.php');           
$alunos = new Alunos();

if(isset($_POST['aluno_id']) && !empty($_POST['aluno_id'])) {
  $aluno_id = addslashes($_POST['aluno_id']);
  $turma_id = $_GET['id'];

    $alunos->addAlunoTurma($aluno_id, $turma_id); ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Aluno inserido com sucesso             
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?php } 

require('classes/turmas.class.php');           
$tur = new Turmas();

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $turma = $tur->getTurma($_GET['id']);
} else {
    header("Location: turmas.php");
}

?>
<div class="card">
  <h5 class="card-header">
  <a data-toggle="tooltip" title="Voltar para Turmas" href="<?= BASE; ?>/turmas.php" class="btn btn-primary">
  <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
</a> Turma <?php echo $turma['titulo']; ?> - 
Adicionar Alunos</h5>
  <div class="card-body">
    <div class="card-text">
    <form method="POST">
      <div class="row">
        <div class="col-6 col-md-4">
        <div class="form-group">
    <label for="exampleFormControlSelect1">Alunos</label>
    <select class="form-control" id="aluno_id" name="aluno_id">
    <option value="">Selecione</option>
    <?php $selectAlunos = $alunos->getAlunosSelecionados();
          foreach($selectAlunos as $alu): ?>
      <option value="<?php echo $alu['id']; ?>"><?php echo $alu['nome']; ?> <?php echo $alu['sobrenome']; ?></option>
      <?php endforeach; ?>   
    </select>
  </div>
        </div>      
      </div>
 
      <br />
      <input type="submit" class="btn btn-success" value="Adicionar" />
      </form>
    </div>

  </div>
</div>
<br />
<div class="row">
 <?php 
      $listarAlunos = $alunos->getAlunosPorTurma($_GET['id']);
      foreach($listarAlunos as $alu): ?>    
  <div class="col-sm-3">
    <div class="card mb-3">
  <h5 class="card-header"><?php echo $alu["nome"]; ?>   
     <a onclick="return confirmDelete()" 
     data-toggle="tooltip" title="Remover <?php  echo $alu["nome"]; ?>" class="btn btn-danger btn-sm pull-right" 
     href="turmas-aluno-excluir.php?id=<?php echo $alu["aluno_turma_id"]; ?>" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a> 
     <a data-toggle="tooltip" title="Editar <?php  echo $alu["nome"]; ?>" class="btn btn-info btn-sm pull-right mr-2" 
     href="aluno-editar.php?id=<?php echo $alu["id"]; ?>" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
    </h5>    
     <div class="card-body text-center">
     <div class="border mx-auto mb-3 p-2"><i class="fa fa-user fa-5x text-secondary" aria-hidden="true"></i></div>
     <div class="text-center mb-2"><?php echo $alu["nome"]; ?> <?php echo $alu["sobrenome"]; ?></div>
     <div class="text-center mb-2"><?php echo (isset($alu["celular"]) && $alu["celular"] ? $alu["celular"] : 'Sem celular'); ?></div>
     <a href="<?= BASE; ?>/aluno-ativar.php?id=<?php echo $alu["id"]; ?>" 
     class="btn btn-success btn-block">Ativo</a> 
    </div>
</div>

</div>
<?php endforeach; ?>  
</main>

<?php require_once('inc/footer.php'); ?>
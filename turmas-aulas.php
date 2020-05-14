<?php require("config.php"); ?>
<?php require_once('inc/header.php'); ?> 
<?php require_once('session.php'); ?>
<?php require('helper/functions.php') ?>
<?php require_once('inc/navbar.php'); ?> 

<main class="container">
<?php 
require('classes/turmas.class.php');          
$turmas = new Turmas();

if(isset($_GET['id']) && !empty($_GET['id'])) {
  $turma = $turmas->getTurma($_GET['id']);
} else {
  header("Location: turmas.php");
}

if(isset($_POST['tema']) && !empty($_POST['tema'])) {
  $tema = addslashes($_POST['tema']);
  $objetivo = addslashes($_POST['objetivo']);
  $estrategias = addslashes($_POST['estrategias']);
  $recursos = addslashes($_POST['recursos']);
  $avaliacao = addslashes($_POST['avaliacao']);
  $referencias = addslashes($_POST['referencias']);
  $turma_id = addslashes($_GET['id']);

  $turmas->insertPlanoAula(
    $tema, $objetivo, $estrategias, $recursos, $avaliacao, $referencias, $turma_id); ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Aula inserida com sucesso             
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?php } ?>
<div class="card">
  <h5 class="card-header">
  <a data-toggle="tooltip" title="Voltar para Turmas" href="<?= BASE; ?>/turmas.php" class="btn btn-primary">
  <i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a> Turma <?php echo $turma['titulo']; ?>
  <button id="flip" class="btn btn-success ml-3">Inserir Planos de Aula</button></h5>
  <div id="panel" class="card-body">
    <div class="card-text">
    <form method="POST">
    <div class="form-group">
            <label class="card-title">Tema</label>
               <input type='text' name="tema" id="tema" class="form-control" />
        </div>
       <div class="form-group">
    <label for="exampleFormControlTextarea1">Objetivo</label>
    <textarea class="form-control" name="objetivo" id="objetivo" rows="3"></textarea>
  </div> 

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Estrategias</label>
    <textarea class="form-control" name="estrategias" id="estrategias" rows="3"></textarea>
  </div> 

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Recursos Didaticos</label>
    <textarea class="form-control" name="recursos" id="recursos" rows="3"></textarea>
  </div> 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Avaliacao</label>
    <textarea class="form-control" name="avaliacao" id="avaliacao" rows="3"></textarea>
  </div> 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Referencias</label>
    <textarea class="form-control" name="referencias" id="referencias" rows="3"></textarea>
  </div> 
      <input type="submit" class="btn btn-success" value="Adicionar" />
      </form>
    </div>

  </div>
</div>
<br />
<?php if(count($turmas->getPlanoAula($_GET['id'])) > 0) { ?>
<table class="table table-bordered bg-white">
  <thead>
    <tr>
      <th class="text-center" scope="col">Tema</th>
      <th scope="col">Objetivo</th>
      <th class="text-center">Ações</th>
    </tr>
  </thead>
  <tbody>
  <?php 
              $listarPlano = $turmas->getPlanoAula($_GET['id']);

              foreach($listarPlano as $plano): ?>
    <tr>
      <th class="text-center" scope="row"><?php echo $plano["tema"]; ?></th>
      <td><?php echo $plano["objetivo"]; ?></td>
      <td class="text-center width-size">
      <a href="<?= BASE; ?>/turmas-aula-detalhe.php?id=<?php echo $plano["id"]; ?>" 
      data-toggle="tooltip" title="Ver mais detalhe de <?php echo $plano["tema"]; ?>" class="btn btn-primary btn-sm">
      <i class="fa fa-eye" aria-hidden="true"></i></a>
      <a href="<?= BASE; ?>/turmas-aula-editar.php?id=<?php echo $plano["id"]; ?>" 
      data-toggle="tooltip" title="Editar <?php echo $plano["tema"]; ?>"
      class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
     <a onclick="return confirmDelete()" href="<?= BASE; ?>/turmas-aula-excluir.php?id=<?php echo $plano["id"]; ?>" data-toggle="tooltip" title="Remover <?php echo $plano["tema"]; ?>"
     class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
     </td>
    </tr> 
    <?php endforeach; ?> 
  </tbody>
</table>
<?php } else { ?>
  <div class="alert alert-primary text-center" role="alert">
  Nenhum plano de aula no momento.
</div>
<?php } ?>
</main>
<!-- Large modal -->



<?php require_once('inc/footer.php'); ?>
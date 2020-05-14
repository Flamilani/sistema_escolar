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
  $dado = $turmas->getTurma($_GET['id']);
} else {
  header("Location: turmas.php");
}

if(isset($_POST['conteudo']) && !empty($_POST['conteudo'])) {
  $conteudo = addslashes($_POST['conteudo']);
  $data = addslashes($_POST['datetimepicker1']);
  $status = addslashes($_POST['status']);
  $turma_id = addslashes($_GET['id']);

    $turmas->insertConteudo($conteudo, $data, $status, $turma_id); ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Conteúdo inserido com sucesso             
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?php } ?>

<div class="card">
  <h5 class="card-header"> 
  <a data-toggle="tooltip" title="Voltar para Turmas" href="<?= BASE; ?>/turmas.php" class="btn btn-primary">
  <i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a> Turma <?php echo $dado['titulo']; ?> - Conteúdos Trabalhados</h5>
  <div class="card-body">
    <div class="card-text">
    <form method="POST">
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Conteúdo</label>
    <textarea class="form-control" name="conteudo" id="conteudo" rows="3"></textarea>
  </div> 
      <div class="row">
      <div class="col">
            <label class="card-title">Data</label>
               <input type='text' name="datetimepicker1" class="form-control" id="datetimepicker1" />
        </div>
        <div class="col">
           <label class="card-title">Situacao</label>
           <select id="status" name="status" class="custom-select">
            <option value="">Selecione</option>
            <option value="1">Concluido</option>
            <option value="2">Atrasado</option>
          </select>
        </div>

      </div>
      <br />
      <input type="submit" class="btn btn-success" value="Adicionar" />
      </form>
    </div>

  </div>
</div>
<br />
<?php if(count($turmas->getConteudos($_GET['id'])) > 0) { ?>
<table class="table table-bordered bg-white">
  <thead>
    <tr>
      <th class="text-center width-size" scope="col">Data</th>
      <th scope="col">Conteúdo Trabalhado</th>
      <th class="text-center width-size" scope="col">Situação</th>
    </tr>
  </thead>
  <tbody>
  <?php 
      $listarConteudo = $turmas->getConteudos($_GET['id']);
      foreach($listarConteudo as $cont): ?>
    <tr>
      <th class="text-center" scope="row"><?php echo $cont["data_cont"]; ?></th>
      <td><?php echo $cont["conteudo"]; ?></td>
      <td class="text-center"><?php echo statusConteudo($cont["status"]); ?></td>
    </tr>   
      <?php endforeach;  ?> 
  </tbody>
</table>
<?php } else { ?>
  <div class="alert alert-primary text-center" role="alert">
  Nenhum conteúdo no momento.
</div>
<?php } ?>
</main>

<?php require_once('inc/footer.php'); ?>
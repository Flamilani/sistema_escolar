<?php require("config.php"); ?>
<?php require_once('inc/header.php'); ?> 
<?php require_once('session.php'); ?>
<?php require('helper/functions.php') ?>
<?php require_once('inc/navbar.php'); ?> 

<main class="container">
<?php 
require('classes/turmas.class.php');           
$turmas = new Turmas();

if(isset($_POST['tema']) && !empty($_POST['tema'])) {
    $tema = addslashes($_POST['tema']);
    $objetivo = addslashes($_POST['objetivo']);
    $estrategias = addslashes($_POST['estrategias']);
    $recursos = addslashes($_POST['recursos']);
    $avaliacao = addslashes($_POST['avaliacao']);
    $referencias = addslashes($_POST['referencias']);
    $id = $_GET['id'];

    $turmas->updatePlanoAula(
        $tema, $objetivo, $estrategias, $recursos, $avaliacao, $referencias, $id); ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Atualizado com sucesso             
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?php } 

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $info = $turmas->getPlanoAulaPorId($_GET['id']);
} else {
    header("Location: turmas-aulas.php");
}

if(isset($info['turma_id']) && !empty($info['turma_id'])) {
    $turma = $turmas->getTurma($info['turma_id']);
  } else {
    header("Location: turmas.php");
  }

?>
<div class="card">
  <h5 class="card-header">
  <a data-toggle="tooltip" title="Voltar para Turma <?php echo $turma['titulo']; ?>" 
  href="<?= BASE; ?>/turmas-aulas.php?id=<?php echo $info['turma_id']; ?>" class="btn btn-primary">
  <i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a> Turma <?php echo $turma['titulo']; ?> - 
 Editar Tema <?php echo $info['tema']; ?> </h5>
  <div class="card-body">
    <div class="card-text">
    <form method="POST">
    <div class="form-group">
            <label class="card-title">Tema</label>
               <input type='text' name="tema" id="tema" class="form-control" value="<?php echo $info['tema']; ?>" />
        </div>
       <div class="form-group">
    <label for="exampleFormControlTextarea1">Objetivo</label>
    <textarea class="form-control" name="objetivo" id="objetivo" rows="3" ><?php echo $info['objetivo']; ?></textarea>
  </div> 

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Estrategias</label>
    <textarea class="form-control" name="estrategias" id="estrategias" rows="3"><?php echo $info['estrategias']; ?></textarea>
  </div> 

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Recursos Didaticos</label>
    <textarea class="form-control" name="recursos" id="recursos" rows="3"><?php echo $info['recursos']; ?></textarea>
  </div> 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Avaliacao</label>
    <textarea class="form-control" name="avaliacao" id="avaliacao" rows="3"><?php echo $info['avaliacao']; ?></textarea>
  </div> 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Referencias</label>
    <textarea class="form-control" name="referencias" id="referencias" rows="3"><?php echo $info['referencias']; ?></textarea>
  </div> 
      <input type="submit" class="btn btn-info" value="Atualizar" />
      </form>
    </div>

  </div>
</div>
</main>

<?php require_once('inc/footer.php'); ?>
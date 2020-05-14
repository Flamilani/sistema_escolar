<?php require("config.php"); ?>
<?php require_once('inc/header.php'); ?> 
<?php require_once('session.php'); ?>
<?php require('helper/functions.php') ?>
<?php require_once('inc/navbar.php'); ?> 

<main class="container">
<?php 

require('classes/turmas.class.php');           
$turma = new Turmas();

if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {
  $titulo = addslashes($_POST['titulo']);
  $id = $_GET['id'];

  $turma->updateTurma($titulo, $id); ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Atualizado com sucesso             
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?php } 

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $info = $turma->getTurma($_GET['id']);
} else {
    header("Location: turmas.php");
}

?>
<div class="card">
  <h5 class="card-header"><a data-toggle="tooltip" title="Voltar para Turmas" href="<?= BASE; ?>/turmas.php" class="btn btn-primary">
  <i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a> Editar Turma <?php echo $info['titulo']; ?></h5>
  <div class="card-body">
    <div class="card-text">
    <form method="POST">
      <div class="row">
        <div class="col-6 col-md-4">
           <label class="card-title">Número da Turma</label>
               <input type='number' class="form-control" name="titulo" value="<?php echo $info['titulo']; ?>" />
        </div>      
      </div>
 
      <br />
    <input type="submit" class="btn btn-info" value="Atualizar" />
      </form>
    </div>

  </div>
</div>
 
</main>

<?php require_once('inc/footer.php'); ?>
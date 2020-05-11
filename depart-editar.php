<?php require("config.php"); ?>
<?php require_once('inc/header.php'); ?> 
<?php require_once('session.php'); ?>
<?php require('helper/functions.php') ?>
<?php require_once('inc/navbar.php'); ?>

<main class="container">
<?php 

require('classes/departamentos.class.php');           
$depart = new Departamentos();

if(isset($_POST['departamento']) && !empty($_POST['departamento'])) {
  $departamento = addslashes($_POST['departamento']);
  $sigla = addslashes($_POST['sigla']);
  $id = $_GET['id'];

  $depart->updateDepartamento($departamento, $sigla, $id); ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Atualizado com sucesso             
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?php } 

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $info = $depart->getDepartamento($_GET['id']);
} else {
    header("Location: departamentos.php");
}

?>
<div class="card">
  <h5 class="card-header"><a data-toggle="tooltip" title="Voltar para Departamentos" href="<?= BASE; ?>/departamentos.php" class="btn btn-primary">
  <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
</a> Editar <?php echo $info['sigla']; ?></h5>
  <div class="card-body">
    <div class="card-text">
    <form method="POST">
      <div class="row">
        <div class="col-6 col-md-6">
           <label class="card-title">Nome do Departamento</label>
               <input type='text' class="form-control" name="departamento" id="departamento" value="<?php echo $info['departamento']; ?>" />
        </div>  
        <div class="col-6 col-md-6">
           <label class="card-title">Sigla</label>
               <input type='text' class="form-control" name="sigla" id="sigla" value="<?php echo $info['sigla']; ?>" />
        </div>      
      </div>
 
      <br />
    <input type="submit" class="btn btn-primary" value="Atualizar" />
      </form>
    </div>

  </div>
</div> 

</main>

<?php require_once('inc/footer.php'); ?>
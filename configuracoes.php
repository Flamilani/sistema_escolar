<?php require("config.php"); ?>
<?php require_once('inc/header.php'); ?> 
<?php require_once('session.php'); ?>
<?php require('helper/functions.php') ?>
<?php require_once('inc/navbar.php'); ?> 


<!-- ADMINISTRADOR -->
<?php 

if(isset($_SESSION['nivel']) && $_SESSION['nivel'] == 1) {

require('classes/home.class.php');           
$home = new Home();
$count_departs = $home->countDepartamentos();
$count_funcionarios = $home->countFuncionarios();
?>

<main class="container">

  <h5>
  <a data-toggle="tooltip" title="Voltar à Inicial" href="<?= BASE; ?>/index.php" class="btn btn-primary btn-sm">
  <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
</a>
  <i class="fa fa-cog" aria-hidden="true"></i> Configurações</h5> <hr />
<div class="row text-center">
  <div class="col-6 col-sm-3">
  <div class="card pt-3 mb-3">
  <i class="fa fa-archive fa-5x text-primary" aria-hidden="true"></i>
  <div class="card-body">

    <a href="<?= BASE; ?>/anos.php" class="btn btn-primary">Serviços 
    <span class="badge badge-light">
    <?php echo $count_departs; ?>
    </span></a>
  </div>
</div>
  </div>
  <div class="col-6 col-sm-3">
  <div class="card pt-3 mb-3">
  <i class="fa fa-id-card-o fa-5x text-success" aria-hidden="true"></i>

  <div class="card-body">
    <a href="<?= BASE; ?>/anos.php" class="btn btn-success">Anos 
    <span class="badge badge-light">
    <?php echo $count_funcionarios; ?>
    </span></a>
  </div>
</div>
  </div>
  <div class="col-6 col-sm-3">
  <div class="card pt-3 mb-3">
  <i class="fa fa-list-alt fa-5x text-warning" aria-hidden="true"></i>
  <div class="card-body">
    <a href="<?= BASE; ?>/series.php" class="btn btn-warning">Séries 
    <span class="badge badge-light">
    
    </span></a>
  </div>
</div>
  </div>
  <div class="col-6 col-sm-3">
  <div class="card pt-3 mb-3">
  <i class="fa fa-book fa-5x text-danger" aria-hidden="true"></i>
  <div class="card-body">
    <a href="<?= BASE; ?>/disciplinas.php" class="btn btn-danger">Disciplinas 
    <span class="badge badge-light">
    
    </span></a>
  </div>
</div>
  </div>
  </div>

</main>
<?php 
} 
?>

<?php require('inc/footer.php'); ?>
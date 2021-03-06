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
<h5><i class="fa fa-th" aria-hidden="true"></i> Painel <?php echo painel($_SESSION['nivel']); ?></h5> <hr />
<div class="row text-center">
  <div class="col-6 col-sm-3">
  <div class="card pt-3 mb-3">
  <i class="fa fa-archive fa-5x text-primary" aria-hidden="true"></i>
  <div class="card-body">

    <a href="<?= BASE; ?>/departamentos.php" class="btn btn-primary">Departamentos 
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
    <a href="<?= BASE; ?>/professores.php" class="btn btn-success">Professores 
    <span class="badge badge-light">
    <?php echo $count_funcionarios; ?>
    </span></a>
  </div>
</div>
  </div>
  <div class="col-6 col-sm-3">
  <div class="card pt-3 mb-3">
  <i class="fa fa-cog fa-5x text-warning" aria-hidden="true"></i>
  <div class="card-body">
    <a href="<?= BASE; ?>/configuracoes.php" class="btn btn-warning">Configurações</a>
  </div>
</div>
  </div>
  <div class="col-6 col-sm-3">
  <div class="card pt-3 mb-3">
  <i class="fa fa-pencil-square-o fa-5x text-danger" aria-hidden="true"></i>
  <div class="card-body">
    <a href="<?= BASE; ?>/frequencias.php" class="btn btn-danger">Frequências</a>
  </div>
</div>
  </div>
  </div>

  

</main>
<?php 
} else if(isset($_SESSION['nivel']) && $_SESSION['nivel'] == 2) {
?>
<!-- PROFESSOR -->
<?php include('professores/home.php'); ?>
<?php 
} 
?>

<?php require('inc/footer.php'); ?>
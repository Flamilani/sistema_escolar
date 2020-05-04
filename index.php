<?php require_once('inc/header.php'); ?> 
<?php require_once('session.php'); ?>
<?php require('helper/functions.php') ?>
<?php require_once('inc/navbar.php'); ?> 


<!-- ADMINISTRADOR -->
<?php 

if(isset($_SESSION['nivel']) && $_SESSION['nivel'] == 1) {

$sql = "SELECT COUNT(*) as count_depart FROM departamentos";
$res = $pdo->prepare($sql);
$res->execute();
$count_depart = $res->fetchColumn();
?>

<main class="container">
<h4>Painel <?php echo painel($_SESSION['nivel']); ?></h4> <hr />
<div class="row text-center">
  <div class="col-6 col-sm-3">
  <div class="card pt-3 mb-3">
  <i class="fa fa-archive fa-5x text-primary" aria-hidden="true"></i>
  <div class="card-body">

    <a href="departamentos.php" class="btn btn-primary">Departamentos 
    <span class="badge badge-light">
    <?php echo $count_depart; ?>
    </span></a>
  </div>
</div>
  </div>
  <div class="col-6 col-sm-3">
  <div class="card pt-3 mb-3">
  <i class="fa fa-id-card-o fa-5x text-success" aria-hidden="true"></i>

  <div class="card-body">

    <a href="<?= BASE; ?>/professores.php" class="btn btn-success">Professores <span class="badge badge-light">0</span></a>
  </div>
</div>
  </div>
  <div class="col-6 col-sm-3">
  <div class="card pt-3 mb-3">
  <i class="fa fa-list-alt fa-5x text-warning" aria-hidden="true"></i>
  <div class="card-body">
    <a href="conteudos.php" class="btn btn-warning">Conteudos <span class="badge badge-light">0</span></a>
  </div>
</div>
  </div>
  <div class="col-6 col-sm-3">
  <div class="card pt-3 mb-3">
  <i class="fa fa-pencil-square-o fa-5x text-danger" aria-hidden="true"></i>
  <div class="card-body">
    <a href="#" class="btn btn-danger">Frequencias <span class="badge badge-light">0</span></a>
  </div>
</div>
  </div>
  </div>
</main>
<?php 
} else if(isset($_SESSION['nivel']) && $_SESSION['nivel'] == 2) {
?>
<!-- PROFESSOR -->
<?php include('painel_professor/home.php'); ?>
<?php 
} else if(isset($_SESSION['nivel']) && $_SESSION['nivel'] == 3) {
?>
<!-- ALUNO -->
<?php include('painel_aluno/home.php'); ?>
<?php 
} 
?>

<?php require('inc/footer.php'); ?>
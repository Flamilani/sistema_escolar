<?php require('config/database.php'); ?>
<?php require_once('inc/header.php'); ?> 
<?php require_once('config/session.php'); ?>
<?php require_once('inc/navbar.php'); ?>

<?php 
$sql = "SELECT COUNT(*) as count_turmas FROM turmas";
$res = $pdo->prepare($sql);
$res->execute();
$count_turmas = $res->fetchColumn();
?>

<main class="container">
<div class="row text-center">
  <div class="col-6 col-sm-3">
  <div class="card pt-3 mb-3">
  <i class="fa fa-users fa-5x text-primary" aria-hidden="true"></i>
  <div class="card-body">

    <a href="turmas/listas.php" class="btn btn-primary">Turmas 
    <span class="badge badge-light">
    <?php echo $count_turmas; ?>
    </span></a>
  </div>
</div>
  </div>
  <div class="col-6 col-sm-3">
  <div class="card pt-3 mb-3">
  <i class="fa fa-book fa-5x text-success" aria-hidden="true"></i>

  <div class="card-body">

    <a href="disciplinas.php" class="btn btn-success">Disciplinas <span class="badge badge-light">0</span></a>
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
  <i class="fa fa-id-card-o fa-5x text-danger" aria-hidden="true"></i>
  <div class="card-body">
    <a href="#" class="btn btn-danger">Frequencias <span class="badge badge-light">0</span></a>
  </div>
</div>
  </div>
  </div>
</main>
<?php require_once('inc/footer.php'); ?>
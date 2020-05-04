<?php 
require('classes/turmas.class.php');
           
$turmas = new Turmas();
$count_turmas = $turmas->countTurmas();

?>
<main class="container">
<h4>Painel <?php echo painel($_SESSION['nivel']); ?></h4> <hr />
<div class="row text-center">
  <div class="col-6 col-sm-3">
  <div class="card pt-3 mb-3">
  <i class="fa fa-users fa-5x text-primary" aria-hidden="true"></i>
  <div class="card-body">

    <a href="<?= BASE; ?>/turmas.php" class="btn btn-primary">Turmas 
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

    <a href="<?php BASE; ?>/disciplinas.php" class="btn btn-success">Disciplinas <span class="badge badge-light">0</span></a>
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

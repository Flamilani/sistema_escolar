<?php require('../config/database.php'); ?>
<?php require_once('../inc/header.php'); ?> 
<?php require_once('../config/session.php'); ?>
<?php require('../helper/functions.php') ?>
<?php require_once('../inc/navbar.php'); ?>

<?php 
      $id = 0;

      if(isset($_SESSION['id']) && empty($_SESSION['id']) == false) {
        $id = addslashes($_SESSION['id']);
 
          $sql = "SELECT * FROM turmas t INNER JOIN aluno_turma a on t.id = a.turma_id WHERE a.aluno_id = '$id'";
          $sql = $pdo->query($sql);
  
          if($sql->rowCount() > 0) {
            $dado = $sql->fetch();
              }
        } else {
          header("Location: index.php");
        }
      ?>
<main class="container">
<div class="row">
  <div class="col-6 col-sm-3">
  <div class="card text-center">

  <div class="card-body">
  <i class="fa fa-user fa-5x text-primary" aria-hidden="true"></i>   
  </div>
</div>
  </div>
  <div class="col-12 col-sm-8">
  <div class="card">
  <div class="card-body">
  <h5 class="card-title"> <?php echo nivel($_SESSION['nivel']); ?>: <?php echo $_SESSION['nome']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted">Turma  <?php echo $dado['titulo']; ?></h6>
    <p class="card-text"></p>



    <a href="disciplinas.php" class="btn btn-success">Disciplinas <span class="badge badge-light">0</span></a>
  </div>
</div>
  </div>

  </div>
</main>
<?php 
      $id = 0;

      if(isset($_SESSION['cLogado']) && empty($_SESSION['cLogado']) == false) {
        $id = addslashes($_SESSION['cLogado']);
 
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
<h4>Painel <?php echo painel($_SESSION['nivel']); ?></h4> <hr />
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
    <h6 class="card-subtitle mb-2 text-muted"> <?php echo (isset($dado['titulo']) && empty($dado['titulo']) == false ? 'Turma ' . $dado['titulo'] : 'Sem Turma') ; ?></h6>
    <p class="card-text"></p>



    <a href="<?= BASE; ?>/disciplinas.php" class="btn btn-success">Disciplinas <span class="badge badge-light">0</span></a>
  </div>
</div>
  </div>

  </div>
</main>

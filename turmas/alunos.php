<?php require_once('config/base.php'); ?>
<?php require('../config/database.php'); ?>
<?php require_once('../inc/header.php'); ?> 
<?php require_once('../config/session.php'); ?>
<?php require('../helper/functions.php') ?>
<?php require_once('../inc/navbar.php'); ?>

<?php 
      $id = 0;

      if(isset($_GET['id']) && empty($_GET['id']) == false) {
        $id = addslashes($_GET['id']);
 
          $sql = "SELECT * FROM turmas WHERE id = '$id'";
          $sql = $pdo->query($sql);
  
          if($sql->rowCount() > 0) {
            $dado = $sql->fetch();
          }
        } else {
          header("Location: ../turmas.php");
        }
      ?>

<main class="container">

<div class="card">
  <h5 class="card-header"><a href="<?= BASE; ?>/listas.php" class="btn btn-primary">
  <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Turma <?php echo $dado['titulo']; ?></a> Alunos</h5>
  <div class="card-body">
    <div class="card-text">
    <form>
      <div class="row">
        <div class="col">
           <label class="card-title">Nome</label>
               <input type='text' class="form-control" />
        </div>      
      </div>
 
      <br />
    <button type="submit" class="btn btn-warning">Adicionar</button>
      </form>
    </div>

  </div>
</div>
<br />
<table class="table table-bordered bg-white">
  <thead>
    <tr>
      <th scope="col">Matrícula</th>
      <th scope="col">Aluno</th>
      <th scope="col">Situação</th>
    </tr>
  </thead>
  <tbody>      
  <?php 
      $id = 0;

      if(isset($_GET['id']) && empty($_GET['id']) == false) {
        $id = addslashes($_GET['id']);
 
          $sql = "SELECT * FROM alunos WHERE turma_id = '$id'";
          $qy = $pdo->query($sql);
  
          if($qy->rowCount() > 0):
              foreach($qy->fetchAll() as $turma): ?>
               <tr>
              <th scope="row"><?php echo $turma["id"]; ?></th>
              <td> <?php echo $turma["nome"]; ?></td>
              <td> <?php echo $turma["status"]; ?></td>
              </tr>  
   <?php endforeach;
          endif;
        } else {
          header("Location: ../listas.php");
        }
  ?>    
  </tbody>
</table>
</main>

<?php require_once('../inc/footer.php'); ?>
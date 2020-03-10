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
          header("Location: listas.php");
        }
      ?>

<?php 
if(isset($_POST['tema']) && empty($_POST['tema']) == false) {
  $tema = addslashes($_POST['tema']);
  $objetivo = addslashes($_POST['objetivo']);
  $estrategias = addslashes($_POST['estrategias']);

  $sql = "INSERT INTO plano_aula SET tema = '$tema', objetivo = '$objetivo', estrategias = '$estrategias'";
  $pdo->query($sql);

  $id = addslashes($_GET['id']);

  header("Location: aulas.php?id=" . $id);
  
}
?>


<main class="container">

<div class="card">
  <h5 class="card-header"> <a href="listas.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Turma <?php echo $dado['titulo']; ?></a> Planos de Aula</h5>
  <div class="card-body">
    <div class="card-text">
    <form method="POST">
    <div class="form-group">
            <label class="card-title">Tema</label>
               <input type='text' name="tema" class="form-control" id="tema" />
        </div>
       <div class="form-group">
    <label for="exampleFormControlTextarea1">Objetivo</label>
    <textarea class="form-control" name="objetivo" rows="3"></textarea>
  </div> 

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Estrategias</label>
    <textarea class="form-control" name="estrategias" rows="3"></textarea>
  </div> 

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Recursos Didaticos</label>
    <textarea class="form-control" name="recursos" rows="3"></textarea>
  </div> 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Avaliacao</label>
    <textarea class="form-control" name="avaliacao" rows="3"></textarea>
  </div> 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Referencias</label>
    <textarea class="form-control" name="referencias" rows="3"></textarea>
  </div> 
      <input type="submit" class="btn btn-success" value="Adicionar" />
      </form>
    </div>

  </div>
</div>
<br />
<table class="table table-bordered bg-white">
  <thead>
    <tr>
      <th class="text-center" scope="col">Tema</th>
      <th scope="col">Objetivo</th>
      <th class="text-center" scope="col">Ver mais</th>
    </tr>
  </thead>
  <tbody>
  <?php 
          $sql = "SELECT * FROM plano_aula";
          $qy = $pdo->query($sql);
  
          if($qy->rowCount() > 0):
              foreach($qy->fetchAll() as $plano): ?>
    <tr>
      <th scope="row"><?php echo $plano["tema"]; ?></th>
      <td><?php echo $plano["objetivo"]; ?></td>
      <td></td>
    </tr>   
    <?php endforeach;
          endif;
  ?> 
  </tbody>
</table>
</main>

<?php require_once('../inc/footer.php'); ?>
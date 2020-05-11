<?php require("config.php"); ?>
<?php require_once('inc/header.php'); ?> 
<?php require_once('session.php'); ?>
<?php require('helper/functions.php') ?>
<?php require_once('inc/navbar.php'); ?> 


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
          header("Location: turmas.php");
        }
      ?>

<main class="container">
<?php
require('classes/turmas.class.php');
$turmas = new Turmas();
if(isset($_POST['tema']) && !empty($_POST['tema'])) {
    $tema = addslashes($_POST['tema']);
    $objetivo = addslashes($_POST['objetivo']);
    $estrategias = addslashes($_POST['estrategias']);
    $recursos = addslashes($_POST['recursos']);
    $avaliacao = addslashes($_POST['avaliacao']);
    $referencias = addslashes($_POST['referencias']);
    $turma_id = addslashes($_GET['id']);

    if(!empty($tema) && !empty($objetivo)) {
        if($turmas->insertPlanoAula(
          $tema, 
          $objetivo, 
          $estrategias, 
          $recursos,
          $avaliacao,
          $referencias,
          $turma_id          
          )) { ?>       
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            Inserido com sucesso             
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
       <?php } else { ?>
        <div class="alert alert-warning">
               Este plano de aula já existe!              
            </div>
      <?php }
    } else { ?>
        <div class="alert alert-warning">
            Preencha todos os campos
        </div>
    <?php }
}
?>
<div class="card">
  <h5 class="card-header">
  <a href="<?= BASE; ?>/turmas.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Turma <?php echo $dado['titulo']; ?></a> 
  <button id="flip" class="btn btn-success">Inserir Planos de Aula</button></h5>
  <div id="panel" class="card-body">
    <div class="card-text">
    <form method="POST">
    <div class="form-group">
            <label class="card-title">Tema</label>
               <input type='text' name="tema" id="tema" class="form-control" />
        </div>
       <div class="form-group">
    <label for="exampleFormControlTextarea1">Objetivo</label>
    <textarea class="form-control" name="objetivo" id="objetivo" rows="3"></textarea>
  </div> 

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Estrategias</label>
    <textarea class="form-control" name="estrategias" id="estrategias" rows="3"></textarea>
  </div> 

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Recursos Didaticos</label>
    <textarea class="form-control" name="recursos" id="recursos" rows="3"></textarea>
  </div> 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Avaliacao</label>
    <textarea class="form-control" name="avaliacao" id="avaliacao" rows="3"></textarea>
  </div> 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Referencias</label>
    <textarea class="form-control" name="referencias" id="referencias" rows="3"></textarea>
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
      <th class="text-center"></th>
    </tr>
  </thead>
  <tbody>
  <?php 
              $listarPlano = $turmas->getPlanoAula();

              foreach($listarPlano as $plano): ?>
    <tr>
      <th scope="row"><?php echo $plano["tema"]; ?></th>
      <td><?php echo $plano["objetivo"]; ?></td>
      <td class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-modal-<?php echo $plano["id"]; ?>">Ver mais</button></td>
    </tr> 
    <div class="modal fade bd-modal-<?php echo $plano["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-larg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Plano de Aula</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">    
      <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 border">.col-md-4</div>    
    </div>
    <div class="row">
      <div class="col-md-4 border">.col-md-4</div>    
    </div>
    </div>
 
      </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>  
    <?php endforeach; ?> 
  </tbody>
</table>
</main>
<!-- Large modal -->



<?php require_once('inc/footer.php'); ?>
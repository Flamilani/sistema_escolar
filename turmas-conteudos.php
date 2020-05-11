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
          header("Location: listas.php");
        }
      ?>

<?php 
if(isset($_POST['conteudo']) && !empty($_POST['conteudo'])) {
  $conteudo = addslashes($_POST['conteudo']);
  $data = addslashes($_POST['datetimepicker1']);
  $status = addslashes($_POST['status']);
  $turma_id = addslashes($_GET['id']);

  if(empty($conteudo) == false) {
    if(!$turmas->insertConteudo(
      $conteudo, 
      $data, 
      $status,      
      $turma_id          
      )) { ?>       
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Inserido com sucesso             
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
  <?php }
} else { ?>
    <div class="alert alert-warning">
        Preencha todos os campos
    </div>
<?php }
  
}
?>


<main class="container">

<div class="card">
  <h5 class="card-header"> <a href="<?= BASE; ?>/turmas.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Turma <?php echo $dado['titulo']; ?></a> Conteúdos</h5>
  <div class="card-body">
    <div class="card-text">
    <form method="POST">
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Conteúdos Trabalhados</label>
    <textarea class="form-control" name="conteudo" rows="3"></textarea>
  </div> 
      <div class="row">
      <div class="col">
            <label class="card-title">Data</label>
               <input type='text' name="datetimepicker1" class="form-control" id="datetimepicker1" />
        </div>
        <div class="col">
           <label class="card-title">Situacao</label>
           <select id="status" name="status" class="custom-select">
            <option value="">Selecione</option>
            <option value="1">Concluido</option>
            <option value="2">Atrasado</option>
          </select>
        </div>

      </div>
      <br />
      <input type="submit" class="btn btn-success" value="Adicionar" />
      </form>
    </div>

  </div>
</div>
<br />
<table class="table table-bordered bg-white">
  <thead>
    <tr>
      <th class="text-center" scope="col">Data</th>
      <th scope="col">Conteúdo Trabalhado</th>
      <th class="text-center" scope="col">Situação</th>
    </tr>
  </thead>
  <tbody>
  <?php 
   $id = addslashes($_GET['id']);
          $sql = "SELECT * FROM conteudos WHERE turma_id = '$id'";
          $qy = $pdo->query($sql);
  
          if($qy->rowCount() > 0):
              foreach($qy->fetchAll() as $conteudos): ?>
    <tr>
      <th class="text-center" scope="row"><?php echo $conteudos["data_cont"]; ?></th>
      <td><?php echo $conteudos["conteudo"]; ?></td>
      <td class="text-center"><?php echo statusConteudo($conteudos["status"]); ?></td>
    </tr>   
    <?php endforeach;
          endif;
  ?> 
  </tbody>
</table>
</main>

<?php require_once('inc/footer.php'); ?>
<?php require_once('config/base.php'); ?>
<?php require('config/database.php'); ?>
<?php require_once('inc/header.php'); ?> 
<?php require_once('config/session.php'); ?>
<?php require('helper/functions.php') ?>
<?php require_once('inc/navbar.php'); ?>

<?php 
if(isset($_POST['departamento']) && empty($_POST['departamento']) == false) {
  $departamento = addslashes($_POST['departamento']);
  $sigla = addslashes($_POST['sigla']);

  $sql = "INSERT INTO departamentos 
                SET departamento = '$departamento',
                    sigla = '$sigla'";
  $pdo->query($sql);

  header("Location: departamentos.php");
  
}
?>

<main class="container">

<div class="card">
  <h5 class="card-header"><a href="<?= BASE; ?>/index.php" class="btn btn-primary">
  <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
</a> Departamentos</h5>
  <div class="card-body">
    <div class="card-text">
    <form method="POST">
      <div class="row">
        <div class="col-6 col-md-4">
           <label class="card-title">Nome do Departamento</label>
               <input type='text' class="form-control" name="departamento" />
        </div>  
        <div class="col-6 col-md-4">
           <label class="card-title">Sigla</label>
               <input type='text' class="form-control" name="sigla" />
        </div>      
      </div>
 
      <br />
    <input type="submit" class="btn btn-success" value="Adicionar" />
      </form>
    </div>

  </div>
</div>
<br />

  <div class="row">
  <?php 
          $sql = "SELECT * FROM departamentos order by id";
          $qy = $pdo->query($sql);
  
          if($qy->rowCount() > 0):
              foreach($qy->fetchAll() as $depart): ?>
  <div class="col-sm-3">
    <div class="card mb-3">
  <h5 class="card-header"><?php echo $depart["sigla"]; ?>  
     <a onclick="return confirmDelete('sigla', <?php echo $depart['sigla']; ?>)" data-toggle="tooltip" title="Deletar <?php  echo $depart["sigla"]; ?>" class="btn btn-danger btn-sm pull-right" href="depart_excluir.php?id=<?php echo $depart["id"]; ?>" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a> 
     <a data-toggle="tooltip" title="Editar <?php  echo $depart["sigla"]; ?>" class="btn btn-info btn-sm pull-right mr-2" href="editar_turma.php?id=<?php echo $depart["id"]; ?>" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
    </h5>
    
     <div class="card-body text-center">
     <a href="<?= BASE; ?>/professores.php?id=<?php echo $depart["id"]; ?>" class="btn btn-primary btn-block">Funcionários <span class="badge badge-light"></span></a> 

  </div>
</div>
</div>

   <?php endforeach;
          endif;
  ?>    
  </div>

</main>

<?php require_once('inc/footer.php'); ?>
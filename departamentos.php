<?php require("config.php"); ?>
<?php require_once('inc/header.php'); ?> 
<?php require_once('session.php'); ?>
<?php require('helper/functions.php') ?>
<?php require_once('inc/navbar.php'); ?>

<main class="container">
<?php 
require('classes/departamentos.class.php');           
$depart = new Departamentos();

if(isset($_POST['departamento']) && !empty($_POST['departamento'])) {
  $departamento = addslashes($_POST['departamento']);
  $sigla = addslashes($_POST['sigla']);

  $depart->insertDepartamento($departamento, $sigla) ?>    
    
<div class="alert alert-success alert-dismissible fade show" role="alert">
        Inserido com sucesso             
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
</div>
<?php } ?>
<div class="card">
  <h5 class="card-header"><a data-toggle="tooltip" title="Voltar à Inicial" href="<?= BASE; ?>/index.php" class="btn btn-primary">
  <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
</a> Departamentos</h5>
  <div class="card-body">
    <div class="card-text">
    <form method="POST">
      <div class="row">
        <div class="col-6 col-md-6">
           <label class="card-title">Nome do Departamento</label>
               <input type='text' class="form-control" name="departamento" id="departamento" />
        </div>  
        <div class="col-6 col-md-6">
           <label class="card-title">Sigla</label>
               <input type='text' class="form-control" name="sigla" id="sigla" />
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
      $listarDepart = $depart->getDepartamentos();
      foreach($listarDepart as $dp): 
      
      $count_funcionarios = $depart->countFuncionarios($dp["id"]);
      ?>    
      
  <div class="col-sm-3">
    <div class="card mb-3">
  <h5 class="card-header"><?php echo $dp["sigla"]; ?>  
     <a onclick="return confirmDelete()" data-toggle="tooltip" title="Remover <?php  echo $dp["sigla"]; ?>" 
     class="btn btn-danger btn-sm pull-right" href="depart-excluir.php?id=<?php echo $dp["id"]; ?>" role="button">
     <i class="fa fa-trash" aria-hidden="true"></i></a> 
     <a data-toggle="tooltip" title="Editar <?php  echo $dp["sigla"]; ?>" 
     class="btn btn-info btn-sm pull-right mr-2" href="depart-editar.php?id=<?php echo $dp["id"]; ?>" role="button">
     <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>    
    </h5>
    
     <div class="card-body text-center">
     <div class="title_depart"><?php echo $dp['departamento']; ?></div> <hr />
     <a href="<?= BASE; ?>/funcionarios.php?id=<?php echo $dp["id"]; ?>" 
     class="btn btn-primary btn-block">Funcionários <span class="badge badge-light"><?php echo $count_funcionarios; ?></span></a> 

  </div>
</div>
</div>
 
   <?php endforeach; ?>    
  </div>

</main>

<?php require_once('inc/footer.php'); ?>
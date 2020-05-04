<?php require_once('inc/header.php'); ?> 
<?php require_once('session.php'); ?>
<?php require('helper/functions.php') ?>
<?php require_once('inc/navbar.php'); ?>


<main class="container">
<?php 

require('classes/departamentos.class.php');           
$departamentos = new Departamentos();

if(isset($_POST['departamento']) && empty($_POST['departamento']) == false) {
  $departamento = addslashes($_POST['departamento']);
  $sigla = addslashes($_POST['sigla']);

  if(empty($departamento) == false) {
    if(!$departamentos->insertDepartamento($departamento, $sigla)) { ?>       
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Inserido com sucesso             
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
   <?php } else { ?>
    <div class="alert alert-warning">
           Este departamento já existe!              
        </div>
  <?php }
} else { ?>
    <div class="alert alert-warning">
        Preencha o campo
    </div>
<?php }
  
}
?>
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
               <input type='text' class="form-control" name="departamento" id="departamento" />
        </div>  
        <div class="col-6 col-md-4">
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
      $listarDepart = $departamentos->getDepartamentos();
      foreach($listarDepart as $depart): ?>    
  <div class="col-sm-3">
    <div class="card mb-3">
  <h5 class="card-header"><?php echo $depart["sigla"]; ?>  
     <a onclick="return confirmDelete('sigla', <?php echo $depart['sigla']; ?>)" data-toggle="tooltip" title="Deletar <?php  echo $depart["sigla"]; ?>" class="btn btn-danger btn-sm pull-right" href="depart_excluir.php?id=<?php echo $depart["id"]; ?>" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a> 
     <button type="button" class="btn btn-info btn-sm pull-right mr-2" data-toggle="modal" data-target=".bd-modal-<?php echo $depart["id"]; ?>">
     <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>    
    </h5>
    
     <div class="card-body text-center">
     <a href="<?= BASE; ?>/professores.php?id=<?php echo $depart["id"]; ?>" class="btn btn-primary btn-block">Funcionários <span class="badge badge-light"></span></a> 

  </div>
</div>
</div>
<div class="modal fade bd-modal-<?php echo $depart["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar <?php echo $depart["sigla"]; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">    
      <form method="POST">
      <div class="row">
        <div class="col-6 col-md-4">
           <label class="card-title">Nome do Departamento</label>
               <input type='text' class="form-control" name="departamento" id="departamento" value="<?php echo $depart["departamento"]; ?>" />
        </div>  
        <div class="col-6 col-md-4">
           <label class="card-title">Sigla</label>
               <input type='text' class="form-control" name="sigla" id="sigla" value="<?php echo $depart["sigla"]; ?>" />
        </div>      
      </div>
 
      <br />
    <input type="submit" class="btn btn-info" value="Atualizar" />
      </form>
 
      </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>  
   <?php endforeach; ?>    
  </div>

</main>

<?php require_once('inc/footer.php'); ?>
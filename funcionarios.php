<?php require("config.php"); ?>
<?php require_once('inc/header.php'); ?> 
<?php require_once('session.php'); ?>
<?php require('helper/functions.php') ?>
<?php require_once('inc/navbar.php'); ?> 

<main class="container">
<?php 
require('classes/departamentos.class.php');           
$dp = new Departamentos();

if(isset($_POST['usuario_id']) && !empty($_POST['usuario_id'])) {
    $depart_id = $_GET['id'];
    $usuario_id = addslashes($_POST['usuario_id']);

    $dp->addFuncionarios($depart_id, $usuario_id); ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Funcionário inserido com sucesso             
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?php } 

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $depart = $dp->getDepartamento($_GET['id']);
} else {
    header("Location: departamentos.php");
}

require('classes/usuarios.class.php');           
$prof = new Usuarios();

?>
<div class="card">
  <h5 class="card-header"><a data-toggle="tooltip" title="Voltar para Departamentos" 
  href="<?= BASE; ?>/departamentos.php" class="btn btn-primary">
  <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
</a> <?php echo $depart['sigla']; ?> - <?php echo $depart['departamento']; ?></h5>
  <div class="card-body">
    <div class="card-text">
    <form method="POST">
      <div class="row">
        <div class="col-6 col-md-4">
        <div class="form-group">
    <label for="exampleFormControlSelect1">Funcionários</label>
    <select class="form-control" id="usuario_id" name="usuario_id">
    <option value="">Selecione</option>
    <?php $selectUsuarios = $prof->getProfessoresPorDepart($_GET['id']);
          foreach($selectUsuarios as $pf): ?>
      <option value="<?php echo $pf['id']; ?>"><?php echo $pf['nome']; ?> <?php echo $pf['sobrenome']; ?></option>
      <?php endforeach; ?>   
    </select>
  </div>
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

      $listarUsuarios = $dp->getFuncionariosPorDepart($_GET['id']);
      foreach($listarUsuarios as $pf): ?>    
  <div class="col-sm-3">
    <div class="card mb-3">
  <h5 class="card-header"><?php echo $pf["nome"]; ?> <?php echo $pf["sobrenome"]; ?>   
     <a onclick="return confirmDelete('professor', <?php echo $pf['nome']; ?>)" 
     data-toggle="tooltip" title="Deletar <?php  echo $pf["nome"]; ?>" class="btn btn-danger btn-sm pull-right" 
     href="prof-excluir.php?id=<?php echo $pf["id"]; ?>" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a> 
     <a data-toggle="tooltip" title="Editar <?php  echo $pf["nome"]; ?>" class="btn btn-info btn-sm pull-right mr-2" 
     href="prof-editar.php?id=<?php echo $pf["id"]; ?>" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
    </h5>
    
     <div class="card-body text-center">
     <div class="border mx-auto mb-3 p-2"><i class="fa fa-user fa-5x text-secondary" aria-hidden="true"></i></div>
     <div class="text-center mb-2"><?php echo $pf["nome"]; ?> <?php echo $pf["sobrenome"]; ?></div>
     <div class="text-center mb-2"><?php echo (isset($pf["celular"]) && $pf["celular"] ? $pf["celular"] : 'Sem celular'); ?></div>
     <div class="text-center mb-2"><?php echo $pf["email"]; ?></div>
     <a href="<?= BASE; ?>/professor-ativar.php?id=<?php echo $pf["id"]; ?>" 
     class="btn btn-success btn-block">Ativo</a> 
    </div>
</div>
</div>

   <?php endforeach; ?>   

  </div>

</main>

<?php require_once('inc/footer.php'); ?>
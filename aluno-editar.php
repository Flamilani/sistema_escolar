<?php require("config.php"); ?>
<?php require_once('inc/header.php'); ?> 
<?php require_once('session.php'); ?>
<?php require('helper/functions.php') ?>
<?php require_once('inc/navbar.php'); ?> 

<main class="container">
<?php 
require('classes/alunos.class.php');           
$aluno = new Alunos();

if(isset($_POST['nome']) && !empty($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $sobrenome = addslashes($_POST['sobrenome']);
    $email = addslashes($_POST['email']);
    $login = addslashes($_POST['login']);
    $cpf = addslashes($_POST['cpf']);
    $celular = addslashes($_POST['celular']);
    $data_nasc = addslashes($_POST['datetimepicker1']);
    $id = $_GET['id'];

    $aluno->updateAluno($nome, $sobrenome, $email, $login, $cpf, $celular, $data_nasc, $id); ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Atualizado com sucesso             
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?php } 

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $info = $aluno->getAluno($_GET['id']);
} else {
    header("Location: alunos.php");
}

?>
<div class="card">
  <h5 class="card-header"><a data-toggle="tooltip" title="Voltar para Alunos" href="<?= BASE; ?>/index.php" class="btn btn-primary">
  <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
</a> Editar <?php echo $info['nome']; ?> <?php echo $info['sobrenome']; ?></h5>
  <div class="card-body">
    <div class="card-text">
    <form method="POST">
      <div class="row">
        <div class="col-6 col-md-4">
        <div class="form-group">
           <label class="card-title">Nome</label>
               <input type='text' class="form-control" name="nome" id="nome" value="<?php echo $info['nome']; ?>" />
               </div>
        </div>  
        <div class="col-6 col-md-4">
        <div class="form-group">
           <label class="card-title">Sobrenome</label>
               <input type='text' class="form-control" name="sobrenome" id="sobrenome" value="<?php echo $info['sobrenome']; ?>" />
               </div>
        </div>   
        <div class="col-6 col-md-4">
        <div class="form-group">
           <label class="card-title">Data Nascimento</label>
           <input type='text' name="datetimepicker1" class="form-control" id="datetimepicker1" value="<?php echo $info['data_nasc']; ?>" />
           </div>
        </div>    
        <div class="col-6 col-md-4">
        <div class="form-group">
           <label class="card-title">Login</label>
               <input type='text' class="form-control" name="login" id="login" value="<?php echo $info['login']; ?>" />
               </div>
        </div>  
        <div class="col-6 col-md-4">
        <div class="form-group">
           <label class="card-title">CPF</label>
               <input type='text' class="form-control" name="cpf" id="cpf" value="<?php echo $info['cpf']; ?>" />
               </div>
        </div>   
 
        <div class="col-6 col-md-4">
           <label class="card-title">Celular</label>
               <input type='text' class="form-control" name="celular" id="celular" value="<?php echo $info['celular']; ?>" />
        </div>  
        <div class="col-6 col-md-4">
           <label class="card-title">E-mail</label>
               <input type='email' class="form-control" name="email" id="email" value="<?php echo $info['email']; ?>" />
        </div>
   
      </div>
      <br />
    <input type="submit" class="btn btn-info" value="Atualizar" />
      </form>
    </div>

  </div>
</div>
</main>

<?php require_once('inc/footer.php'); ?>
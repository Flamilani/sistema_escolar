<?php require("config.php"); ?>
<?php require_once('inc/header.php'); ?> 
<?php require_once('session.php'); ?>
<?php require('helper/functions.php') ?>
<?php require_once('inc/navbar.php'); ?> 

<main class="container">
<?php
require('classes/alunos.class.php');
$alunos = new Alunos();

if(isset($_POST['nome']) && !empty($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $sobrenome = addslashes($_POST['sobrenome']);
    $email = addslashes($_POST['email']);
    $senha = md5($_POST['senha']);
    $login = addslashes($_POST['login']);
    $cpf = addslashes($_POST['cpf']);
    $celular = addslashes($_POST['celular']);
    $data_nasc = addslashes($_POST['datetimepicker1']);

    if(!empty($nome) && !empty($email) && !empty($senha)) {
        if($alunos->insertAluno($nome, $sobrenome, $email, $senha, $login, $cpf, $celular, $data_nasc)) { ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
Cadastrado com sucesso             
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
</div>
       <?php } else { ?>
        <div class="alert alert-warning">
                <strong>Este aluno já existe!</strong>               
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
  <h5 class="card-header"><a data-toggle="tooltip" title="Voltar à Inicial" href="<?= BASE; ?>/index.php" class="btn btn-primary">
  <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
</a> Alunos</h5>
  <div class="card-body">
    <div class="card-text">
    <form method="POST">
      <div class="row">
        <div class="col-6 col-md-4">
        <div class="form-group">
           <label class="card-title">Nome</label>
               <input type='text' class="form-control" name="nome" id="nome" />
               </div>
        </div>  
        <div class="col-6 col-md-4">
        <div class="form-group">
           <label class="card-title">Sobrenome</label>
               <input type='text' class="form-control" name="sobrenome" id="sobrenome" />
               </div>
        </div>   
        <div class="col-6 col-md-4">
        <div class="form-group">
           <label class="card-title">Data Nascimento</label>
           <input type='text' name="datetimepicker1" class="form-control" id="datetimepicker1" />
           </div>
        </div>    
        <div class="col-6 col-md-4">
        <div class="form-group">
           <label class="card-title">Login</label>
               <input type='text' class="form-control" name="login" id="login" />
               </div>
        </div>  
        <div class="col-6 col-md-4">
        <div class="form-group">
           <label class="card-title">CPF</label>
               <input type='text' class="form-control" name="cpf" id="cpf" />
               </div>
        </div>   
 
        <div class="col-6 col-md-4">
           <label class="card-title">Celular</label>
               <input type='text' class="form-control" name="celular" id="celular" />
        </div>  
        <div class="col-6 col-md-4">
           <label class="card-title">E-mail</label>
               <input type='email' class="form-control" name="email" id="email" />
        </div>   
        <div class="col-6 col-md-4">
           <label class="card-title">Senha</label>
           <input type='password' name="senha" class="form-control" id="senha" />
        </div>    
      </div>
      <br />
    <input type="submit" class="btn btn-success" value="Adicionar" />
      </form>
    </div>

  </div>
</div>
<br />

<?php if(count($alunos->getAlunos()) > 0) { ?>
  <div class="row">
   <table class="table table-striped bg-white text-center">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th class="text-left" scope="col">Nome</th>
      <th scope="col">Foto</th>
      <th scope="col">Data Nasc.</th>
      <th scope="col">Login</th>
      <th scope="col">CPF</th>
      <th scope="col">Celular</th>
      <th scope="col">E-mail</th>
      <th scope="col">Senha</th>
      <th scope="col">Status</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
  <?php $listarAlunos = $alunos->getAlunos();
      foreach($listarAlunos as $alu): ?>   
    <tr>
      <th scope="row"><?php echo $alu['id']; ?></th>
      <td class="text-left"><?php echo $alu['nome']; ?> <?php echo $alu['sobrenome']; ?></td>
      <td><div class="border bg-white mx-auto mb-3 p-2"><i class="fa fa-user fa-2x text-secondary" aria-hidden="true"></i></div></td>
      <td><?php echo $alu['data_nasc']; ?></td>
      <td><?php echo $alu['login']; ?></td>
      <td><?php echo $alu['cpf']; ?></td>
      <td><?php echo (isset($alu["celular"]) && $alu["celular"] ? $alu["celular"] : 'Sem celular'); ?></td>
      <td><?php echo $alu['email']; ?></td>
      <td><a href="<?= BASE; ?>/aluno-senha.php?id=<?php echo $alu["id"]; ?>" 
     class="btn btn-info btn-block btn-sm">Alterar Senha</a> </td>
     <td>
     <a href="<?= BASE; ?>/aluno-ativar.php?id=<?php echo $alu["id"]; ?>" 
     data-toggle="tooltip" title="Mudar para <?php echo (isset($alu['status']) && $alu['status'] == 0 ? 'Ativo' : 'Inativo'); ?>"
     class="btn btn-<?php echo (isset($alu['status']) && $alu['status'] == 1 ? 'success' : 'warning'); ?> btn-block btn-sm"><?php echo status($alu["status"]); ?></a>
     </td>
     <td><a href="<?= BASE; ?>/aluno-editar.php?id=<?php echo $alu["id"]; ?>" data-toggle="tooltip" title="Editar <?php echo $alu["nome"]; ?>"
     class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
     <a href="<?= BASE; ?>/aluno-excluir.php?id=<?php echo $alu["id"]; ?>" data-toggle="tooltip" title="Remover <?php echo $alu["nome"]; ?>"
     class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
    </tr>   
    <?php endforeach; ?>    
  </tbody>
</table>
  </div>
  <?php } else { ?>
  <div class="alert alert-primary text-center" role="alert">
  Nenhum aluno no momento.
</div>
<?php } ?>
</main>

<?php require_once('inc/footer.php'); ?>
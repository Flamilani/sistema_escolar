<?php require("config.php"); ?>
<?php require_once('inc/header.php'); ?> 
<?php require_once('session.php'); ?>
<?php require('helper/functions.php') ?>
<?php require_once('inc/navbar.php'); ?> 

<main class="container">
<?php
require('classes/usuarios.class.php');
$prof = new Usuarios();

if(isset($_POST['nome']) && !empty($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $sobrenome = addslashes($_POST['sobrenome']);
    $email = addslashes($_POST['email']);
    $senha = md5($_POST['senha']);
    $celular = addslashes($_POST['celular']);
    $data_nasc = addslashes($_POST['datetimepicker1']);

    if(!empty($nome) && !empty($email) && !empty($senha)) {
        if($prof->insertProfessor($nome, $sobrenome, $email, $senha, $celular, $data_nasc)) { ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
Cadastrado com sucesso             
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
</div>
       <?php } else { ?>
        <div class="alert alert-warning">
                <strong>Este usuário já existe!</strong> 
                <a href="login.php" class="alert-link">Login</a>
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
</a> Professores</h5>
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

  <div class="row">
<!--   <?php 

      $listarProfs = $prof->getProfessores();
      foreach($listarProfs as $pf): ?>    
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

   <?php endforeach; ?>    --> 
   <table class="table table-striped bg-white text-center">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th class="text-left" scope="col">Nome</th>
      <th scope="col">Foto</th>
      <th scope="col">Data Nasc.</th>
      <th scope="col">Celular</th>
      <th scope="col">E-mail</th>
      <th scope="col">Senha</th>
      <th scope="col">Status</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
  <?php $listarProfs = $prof->getProfessores();
      foreach($listarProfs as $pf): ?>   
    <tr>
      <th scope="row"><?php echo $pf['id']; ?></th>
      <td class="text-left"><?php echo $pf['nome']; ?> <?php echo $pf['sobrenome']; ?></td>
      <td><div class="border bg-white mx-auto mb-3 p-2"><i class="fa fa-user fa-2x text-secondary" aria-hidden="true"></i></div></td>
      <td><?php echo $pf['data_nasc']; ?></td>
      <td><?php echo (isset($pf["celular"]) && $pf["celular"] ? $pf["celular"] : 'Sem celular'); ?></td>
      <td><?php echo $pf['email']; ?></td>
      <td><a href="<?= BASE; ?>/prof-senha.php?id=<?php echo $pf["id"]; ?>" 
     class="btn btn-info btn-block btn-sm">Alterar Senha</a> </td>
     <td>
     <a href="<?= BASE; ?>/prof-ativar.php?id=<?php echo $pf["id"]; ?>" 
     data-toggle="tooltip" title="Mudar para <?php echo (isset($pf['status']) && $pf['status'] == 0 ? 'Ativo' : 'Inativo'); ?>"
     class="btn btn-<?php echo (isset($pf['status']) && $pf['status'] == 1 ? 'success' : 'warning'); ?> btn-block btn-sm"><?php echo status($pf["status"]); ?></a>
     </td>
     <td><a href="<?= BASE; ?>/prof-editar.php?id=<?php echo $pf["id"]; ?>" data-toggle="tooltip" title="Editar <?php echo $pf["nome"]; ?>"
     class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
     <a href="<?= BASE; ?>/prof-excluir.php?id=<?php echo $pf["id"]; ?>" data-toggle="tooltip" title="Remover <?php echo $pf["nome"]; ?>"
     class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
    </tr>   
    <?php endforeach; ?>    
  </tbody>
</table>
  </div>

</main>

<?php require_once('inc/footer.php'); ?>
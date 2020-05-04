<?php require('inc/header.php'); ?>
<main class="container form-sign">
<?php
require('classes/usuarios.class.php');
$usuario = new Usuarios();
if(isset($_POST['email']) && !empty($_POST['email'])) {
    $email = addslashes($_POST['email']);
    $senha = md5($_POST['senha']);

    if(!empty($email) && !empty($senha)) {
        if($usuario->logar($email, $senha)) { 
            header("Location: ./");
           // header("Location: index.php");
            } else { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Usuário e/ou senha incorretos!
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
<div class="row text-center">
<form class="form-signin" method="POST">
      <img class="logo-ines-login mb-4" src="<?= BASE;?>/assets/imgs/logo_ines.png" alt="Logo INES">
      <h1 class="h3 mb-3 font-weight-normal">Acesso no sistema</h1>
      <label for="email" class="sr-only">E-mail</label>
      <input type="email" name="email" id="email" class="form-control mb-3" placeholder="E-mail" required autofocus>
      <label for="senha" class="sr-only">Senha</label>
      <input type="password" name="senha" id="senha" class="form-control mb-3" placeholder="Senha" required>
      <input type="submit" value="Acessar" class="btn btn-lg btn-primary btn-block" />
    </form>

    
</div>

</main>
    <?php require_once('inc/footer.php'); ?>
<?php require_once('config/base.php'); ?>
<?php require_once('inc/header.php'); ?>
<?php require('config/database.php'); ?>
<?php 
session_start();

if(isset($_POST['email']) && empty($_POST['email']) == false ) {
  $email = addslashes($_POST['email']);
  $senha = md5(addslashes($_POST['senha']));
  // $nivel = addslashes($_POST['nivel']);

  $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' AND status = 1";
  $sql = $pdo->query($sql);

  if($sql->rowCount() > 0) {

    $dado = $sql->fetch();

    $_SESSION['id'] = $dado['id'];
    $_SESSION['nome'] = $dado['nome'];
    $_SESSION['nivel'] = $dado['nivel'];

    header("Location: index.php");

/*      if(isset($_SESSION['nivel']) && $_SESSION['nivel'] == 1) {
      header("Location: index.php");
    } else if(isset($_SESSION['nivel']) && $_SESSION['nivel'] == 2) {
      header("Location: painel_professor/index.php");
    } else if(isset($_SESSION['nivel']) && $_SESSION['nivel'] == 3) {
      header("Location: painel_aluno/index.php");
    } else {
      header("Location: login.php");
    } */
  } 
  else {
    header("Location: login.php");
  }

} 
?>

<main class="container form-sign">
<div class="row text-center">
<form class="form-signin" method="POST">
      <img class="logo-ines-login mb-4" src="<?= BASE;?>/assets/imgs/logo_ines.png" alt="Logo INES">
      <h1 class="h3 mb-3 font-weight-normal">Acesso no sistema</h1>
      <label for="inputEmail" class="sr-only">E-mail</label>
      <input name="email" type="email" id="inputEmail" class="form-control mb-3" placeholder="E-mail" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input name="senha" type="password" id="inputPassword" class="form-control mb-3" placeholder="Senha" required>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>

    </form>
</div>
</main>
    <?php require_once('inc/footer.php'); ?>
<nav class="navbar navbar-expand-lg navbar-light">
<div class="container">
<?php 

      if(isset($_SESSION['cLogado']) && !empty($_SESSION['cLogado'])) {
        $id = addslashes($_SESSION['cLogado']);
 
          $sql = "SELECT * FROM departamentos dp INNER JOIN usuarios u on dp.id = u.depart_id WHERE u.id = '$id'";
          $sql = $pdo->query($sql);
  
          if($sql->rowCount() > 0) {
            $dado = $sql->fetch();
              }
        }
      ?>
<a class="navbar-brand" href="<?= BASE;?>/index.php">
    <img class="logo-ines" src="<?= BASE;?>/assets/imgs/logo_ines.png" alt="Logo INES" /> 
    <span class="ml-2 text-white">
    <?php echo (isset($dado['sigla']) && empty($dado['sigla']) == false ? 'INES / ' . $dado['sigla'] : '') ; ?> </span>
  </a>



<!--   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> -->
  <div class="my-2 my-sm-0">
  
      <div class="dropdown show">
  <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <img src="<?= BASE;?>/assets/imgs/figura.jpg" class="float-right rounded-circle img-peq" alt="Perfil">
  </a>

  <div class="dropdown-menu drop-image" aria-labelledby="dropdownMenuLink">
    <span class="dropdown-item"><?php echo $_SESSION['nome']; ?> <?php echo $_SESSION['sobrenome']; ?></span>
    <a class="dropdown-item" href="<?= BASE; ?>/perfil.php">Meu Perfil</a>
    <a class="btn btn-danger text-white btn-block btn-sair" href="<?= BASE; ?>/logout.php">Sair</a>
  </div>
</div>
    </div>



  </div>
</nav>

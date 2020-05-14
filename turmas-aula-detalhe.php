<?php require("config.php"); ?>
<?php require_once('inc/header.php'); ?> 
<?php require_once('session.php'); ?>
<?php require('helper/functions.php') ?>
<?php require_once('inc/navbar.php'); ?> 

<main class="container">
<?php 
require('classes/turmas.class.php');           
$turmas = new Turmas();

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $info = $turmas->getPlanoAulaPorId($_GET['id']);
} else {
    header("Location: turmas-aulas.php");
}

if(isset($info['turma_id']) && !empty($info['turma_id'])) {
    $turma = $turmas->getTurma($info['turma_id']);
  } else {
    header("Location: turmas.php");
  }

?>
<div class="card">
  <h5 class="card-header">
  <a data-toggle="tooltip" title="Voltar para Plano de Aula" 
  href="<?= BASE; ?>/turmas-aulas.php?id=<?php echo $info['turma_id']; ?>" class="btn btn-primary">
  <i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a> Turma <?php echo $turma['titulo']; ?> - 
 Editar Tema <?php echo $info['tema']; ?><a data-toggle="tooltip" title="Imprimir Plano de Aula" 
  href="<?= BASE; ?>/turmas-aulas-imprimir.php?id=<?php echo $info['id']; ?>" class="btn btn-secondary pull-right">
  <i class="fa fa-print" aria-hidden="true"></i></a></h5>
  </div>
</div>
<br />
<table class="table table-bordered bg-white">
  <thead>
    <tr>
      <th scope="col">Tema</th>
      <th scope="col">Objetivo</th>
      <th scope="col">Recursos</th>
      <th scope="col">Avaliação</th>
      <th scope="col">Estratégias</th>
      <th scope="col">Referências</th>
    </tr>
  </thead>
  <tbody>
   <tr>
      <th scope="row"><?php echo $info["tema"]; ?></th>
      <td scope="row"><?php echo $info["objetivo"]; ?></td>
      <td scope="row"><?php echo $info["estrategias"]; ?></td>
      <td scope="row"><?php echo $info["recursos"]; ?></td>
      <td scope="row"><?php echo $info["avaliacao"]; ?></td>
      <td scope="row"><?php echo $info["referencias"]; ?></td>
    </tr> 

  </tbody>
</table>

</main>

<?php require_once('inc/footer.php'); ?>
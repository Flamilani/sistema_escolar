<?php require_once('config/base.php'); ?>
<?php require('../config/database.php'); ?>
<?php require_once('../inc/header.php'); ?> 
<?php require_once('../config/session.php'); ?>
<?php require('../helper/functions.php') ?>
<?php require_once('../inc/navbar.php'); ?>

<?php 
if(isset($_POST['titulo']) && empty($_POST['titulo']) == false) {
  $titulo = addslashes($_POST['titulo']);

  $sql = "INSERT INTO turmas SET titulo = '$titulo'";
  $pdo->query($sql);

  header("Location: listas.php");
  
}
?>

<main class="container">

<div class="card">
  <h5 class="card-header"><a href="<?= BASE; ?>/index.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Inicial</a> Turmas</h5>
  <div class="card-body">
    <div class="card-text">
    <form method="POST">
      <div class="row">
        <div class="col-6 col-md-4">
           <label class="card-title">Numero da Turma</label>
               <input type='number' class="form-control" name="titulo" />
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
          $sql = "SELECT * FROM turmas";
          $qy = $pdo->query($sql);
  
          if($qy->rowCount() > 0):
              foreach($qy->fetchAll() as $turma): ?>

              <?php 
              $id = $turma["id"];
                $sql = "SELECT COUNT(*) as count_alunos FROM alunos WHERE turma_id='$id'";
                $res = $pdo->prepare($sql);
                $res->execute();
                $count_alunos = $res->fetchColumn();

                $sqla = "SELECT COUNT(*) as count_aulas FROM plano_aula WHERE turma_id='$id'";
                $resa = $pdo->prepare($sqla);
                $resa->execute();
                $count_aulas = $resa->fetchColumn();

                $sqlc = "SELECT COUNT(*) as count_conteudos FROM conteudos WHERE turma_id='$id'";
                $resc = $pdo->prepare($sqlc);
                $resc->execute();
                $count_conteudos = $resc->fetchColumn();
              ?>
            
  <div class="col-sm-3">
    <div class="card mb-3">
  <h5 class="card-header">Turma <?php echo $turma["titulo"]; ?>  
     <a onclick="return confirmDelete('turma', <?php echo $turma['titulo']; ?>)" data-toggle="tooltip" title="Deletar turma <?php  echo $turma["titulo"]; ?>" class="btn btn-danger btn-sm pull-right" href="turma_excluir.php?id=<?php echo $turma["id"]; ?>" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a> 
     <a data-toggle="tooltip" title="Editar turma <?php  echo $turma["titulo"]; ?>" class="btn btn-info btn-sm pull-right mr-2" href="editar_turma.php?id=<?php echo $turma["id"]; ?>" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
    </h5>
    
     <div class="card-body text-center">
  <a href="<?= BASE; ?>/alunos.php?id=<?php echo $turma["id"]; ?>" class="btn btn-primary btn-block">Alunos <span class="badge badge-light"> <?php echo $count_alunos; ?></span></a> <br />
  <a href="<?= BASE; ?>/aulas.php?id=<?php echo $turma["id"]; ?>" class="btn btn-primary btn-block">Planos de Aulas <span class="badge badge-light"> <?php echo $count_aulas; ?> </span></a>  <br />
  <a href="<?= BASE; ?>/conteudos.php?id=<?php echo $turma["id"]; ?>" class="btn btn-primary btn-block">Conteudos Trabalhados <span class="badge badge-light"> <?php echo $count_conteudos; ?> </span></a>

  </div>
</div>
</div>

   <?php endforeach;
          endif;
  ?>    
  </div>

</main>

<?php require_once('../inc/footer.php'); ?>
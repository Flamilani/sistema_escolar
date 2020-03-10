<?php require('../config/database.php'); ?>
<?php require_once('../inc/header.php'); ?> 
<?php require_once('../config/session.php'); ?>
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
  <h5 class="card-header"><a href="../index.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Inicial</a> Turmas</h5>
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
<table class="table table-bordered bg-white text-center">
  <thead>
    <tr>
      <th scope="col">Turmas</th>
      <th scope="col">Alunos</th>
      <th scope="col">Planos de Aula</th>
      <th scope="col">Conteudos Trabalhados</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
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
               <tr>
              <th scope="row"><?php echo $turma["titulo"]; ?></th>
              <td> <a href="<?php BASE; ?>alunos.php?id=<?php echo $turma["id"]; ?>" class="btn btn-primary">Alunos <span class="badge badge-light"> <?php echo $count_alunos; ?></span></a></td>
              <td> <a href="aulas.php?id=<?php echo $turma["id"]; ?>" class="btn btn-primary">Aulas <span class="badge badge-light"> <?php echo $count_aulas; ?> </span></a></td>
              <td> <a href="conteudos.php?id=<?php echo $turma["id"]; ?>" class="btn btn-primary">Conteudos <span class="badge badge-light"> <?php echo $count_conteudos; ?> </span></a></td>
              <td> <a data-toggle="tooltip" title="Editar turma <?php  echo $turma["titulo"]; ?>" class="btn btn-info" href="editar_turma.php?id=<?php echo $turma["id"]; ?>" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
      <a onclick="return confirmDelete('turma', <?php echo $turma['titulo']; ?>)" data-toggle="tooltip" title="Deletar turma <?php  echo $turma["titulo"]; ?>" class="btn btn-danger" href="turma_excluir.php?id=<?php echo $turma["id"]; ?>" role="button"><i class="fa fa-trash" aria-hidden="true"></i>
</a> </td>
              </tr>  
   <?php endforeach;
          endif;
  ?>    
 </tbody>
</table>
</main>

<?php require_once('../inc/footer.php'); ?>
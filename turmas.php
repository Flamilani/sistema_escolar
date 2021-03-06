<?php require("config.php"); ?>
<?php require_once('inc/header.php'); ?> 
<?php require_once('session.php'); ?>
<?php require('helper/functions.php') ?>
<?php require_once('inc/navbar.php'); ?> 

<main class="container">
<?php 
require('classes/turmas.class.php');           
$turmas = new Turmas();

if(isset($_POST['titulo']) && empty($_POST['titulo']) == false) {
  $titulo = addslashes($_POST['titulo']);
  $disciplina_id = addslashes($_POST['disciplina_id']);
  $servico_id = addslashes($_POST['servico_id']);
  $ano_id = addslashes($_POST['ano_id']);
  $serie_id = addslashes($_POST['serie_id']);

  if(!empty($titulo)) {
    if($turmas->insertTurma($titulo, $disciplina_id, $servico_id, $ano_id, $serie_id)) { ?>       
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Turma criada com sucesso             
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
   <?php } else { ?>
    <div class="alert alert-warning">
           Esta turma já existe!              
        </div>
  <?php }
} else { ?>
    <div class="alert alert-warning">
        Preencha o campo
    </div>
<?php }
  
}
?>
<div class="card">
  <h5 class="card-header"><a data-toggle="tooltip" title="Voltar à Inicial" href="<?= BASE; ?>/index.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a> Turmas</h5>
  <div class="card-body">
    <div class="card-text">
    <form method="POST">
      <div class="row">
        <div class="col-6 col-md-2">
           <label class="card-title">Número da Turma</label>
               <input type='number' class="form-control" name="titulo" />
        </div>  
        <div class="col-6 col-md-2">
           <label class="card-title">Ano</label>
               <input type='number' class="form-control" name="titulo" />
        </div>  
        <div class="col-6 col-md-2">
           <label class="card-title">Serviço</label>
               <input type='number' class="form-control" name="titulo" />
        </div>  
        <div class="col-6 col-md-2">
           <label class="card-title">Série</label>
               <input type='number' class="form-control" name="titulo" />
        </div>      
        <div class="col-6 col-md-2">
           <label class="card-title">Disciplina</label>
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
              $listarTurmas = $turmas->getTurmas();
              foreach($listarTurmas as $turma): 

                $count_alunos = $turmas->countAlunosPorTurma($turma["id"]);
                $count_aulas = $turmas->countPlanosAulas($turma["id"]);
                $count_conteudos = $turmas->countConteudos($turma["id"]);
              ?>
            
  <div class="col-sm-3">
    <div class="card mb-3">
  <h5 class="card-header">Turma <?php echo $turma["titulo"]; ?>  
     <a onclick="return confirmDelete()" 
     data-toggle="tooltip" title="Remover Turma <?php  echo $turma["titulo"]; ?>" class="btn btn-danger btn-sm pull-right" 
     href="turma-excluir.php?id=<?php echo $turma["id"]; ?>" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a> 
     <a data-toggle="tooltip" title="Editar turma <?php  echo $turma["titulo"]; ?>" class="btn btn-info btn-sm pull-right mr-2" 
     href="turma-editar.php?id=<?php echo $turma["id"]; ?>" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
    </h5>
    
     <div class="card-body text-center">
  <a href="<?= BASE; ?>/turmas-alunos.php?id=<?php echo $turma["id"]; ?>" class="btn btn-primary btn-block">
  Alunos <span class="badge badge-light"> <?php echo $count_alunos; ?></span></a> <br />
  <a href="<?= BASE; ?>/turmas-aulas.php?id=<?php echo $turma["id"]; ?>" class="btn btn-primary btn-block">
  Planos de Aulas <span class="badge badge-light"> <?php echo $count_aulas; ?> </span></a>  <br />
  <a href="<?= BASE; ?>/turmas-conteudos.php?id=<?php echo $turma["id"]; ?>" class="btn btn-primary btn-block">
  Conteúdos Trabalhados <span class="badge badge-light"> <?php echo $count_conteudos; ?> </span></a>

  </div>
</div>
</div>

   <?php endforeach; ?>    
  </div>

</main>

<?php require_once('inc/footer.php'); ?>
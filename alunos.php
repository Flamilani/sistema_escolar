<?php require_once('inc/header.php'); ?> 
<?php require_once('inc/navbar.php'); ?>
<main class="container">

<div class="card">
  <h5 class="card-header">Alunos</h5>
  <div class="card-body">
    <div class="card-text">
    <form>
      <div class="row">
        <div class="col">
           <label class="card-title">Nome</label>
               <input type='text' class="form-control" />
        </div>      
      </div>
 
      <br />
    <button type="submit" class="btn btn-warning">Adicionar</button>
      </form>
    </div>

  </div>
</div>
<br />
<table class="table table-bordered bg-white">
  <thead>
    <tr>
      <th scope="col">Matrícula</th>
      <th scope="col">Aluno</th>
      <th scope="col">Situação</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">001</th>
      <td>ALEXSANDRO CAJUEIRO DA CONCEIÇÃO</td>
      <td>Matriculado</td>
    </tr>
   
    <tr>
    <th scope="row">002</th>
      <td>ANA FLAVIA SA ALVES</td>
      <td>Matriculado</td>
    </tr>
       
    <tr>
    <th scope="row">003</th>
      <td>DEBORA SILVA ZANEZ</td>
      <td>Matriculado</td>
    </tr>
       
    <tr>
    <th scope="row">004</th>
      <td>DENISE DA SILVA PINTO</td>
      <td>Matriculado</td>
    </tr>
       
    <tr>
    <th scope="row">005</th>
      <td>DEYLON DELON SANTOS RODRIGUES</td>
      <td>Matriculado</td>
    </tr>
       
    <tr>
    <th scope="row">006</th>
      <td>HELOISA LOPES DA SILVA</td>
      <td>Matriculado</td>
    </tr>
       
    <tr>
    <th scope="row">007</th>
      <td>JOÃO VICTOR DA SILVA MOURA</td>
      <td>Matriculado</td>
    </tr>
       
    <tr>
    <th scope="row">008</th>
      <td>LARRISSA CAVALCANTE ADRIANO</td>
      <td>Matriculado</td>
    </tr>
       
    <tr>
    <th scope="row">009</th>
      <td>MICHEL MARTINS DOS SANTOS</td>
      <td>Matriculado</td>
    </tr>
       
    <tr>
    <th scope="row">010</th>
      <td>NATERCIA IDALINA SANTOS DA SILVA</td>
      <td>Matriculado</td>
    </tr>
       
    <tr>
    <th scope="row">011</th>
      <td>REINALDO DOS SANTOS DUARTE</td>
      <td>Matriculado</td>
    </tr>
  </tbody>
</table>
</main>

<?php require_once('inc/footer.php'); ?>
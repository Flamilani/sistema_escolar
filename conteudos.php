<?php require_once('inc/header.php'); ?> 
<?php require_once('inc/navbar.php'); ?>
<main class="container">

<div class="card">
  <h5 class="card-header">Conteúdos</h5>
  <div class="card-body">
    <div class="card-text">
    <form>
      <div class="row">
        <div class="col">
           <label class="card-title">Tema</label>
               <input type='text' class="form-control" />
        </div>
        <div class="col">
            <label class="card-title">Data</label>
               <input type='text' class="form-control" id="datetimepicker1" />
        </div>
      </div>
      <br />
      <div class="form-group">
    <label for="exampleFormControlTextarea1">Conteúdo</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
      <th scope="col">Data</th>
      <th scope="col">Conteúdo Trabalhado</th>
      <th scope="col">Situação</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">05/08</th>
      <td>Prosódia do interprete, nome completo do INES, Alfabeto manual, vocabulário</td>
      <td>Concluído</td>
    </tr>
   
    <tr>
      <th scope="row">12/08</th>
      <td>Ritmo, Regra, ABC… poema nome dos alunos</td>
      <td>Concluído</td>
    </tr>
       
    <tr>
      <th scope="row">19/08</th>
      <td>Prática com ritmo em Libras + desenho, etc.</td>
      <td>Concluído</td>
    </tr>
       
    <tr>
      <th scope="row">26/08</th>
      <td>Apresentação Ritmo na sala</td>
      <td>Concluído</td>
    </tr>
       
    <tr>
      <th scope="row">02/09</th>
      <td>Apresentação Ritmo na sala</td>
      <td>Concluído</td>
    </tr>
       
    <tr>
      <th scope="row">09/09</th>
      <td>Jogos Verbos</td>
      <td>Concluído</td>
    </tr>
       
    <tr>
      <th scope="row">16/09</th>
      <td>Apresentação verbos em Libras</td>
      <td>Concluído</td>
    </tr>
       
    <tr>
      <th scope="row">23/09</th>
      <td>Explicação sobre Presente, Pretérito Perfeito e Futuro em português</td>
      <td>Concluído</td>
    </tr>
       
    <tr>
      <th scope="row">30/09</th>
      <td>Conversação sobre Presente, Pretérito Perfeito e Futuro em Libras</td>
      <td>Concluído</td>
    </tr>
       
    <tr>
      <th scope="row">07/10</th>
      <td>Explicação sobre Metáfora</td>
      <td>Concluído</td>
    </tr>
       
    <tr>
      <th scope="row">21/10</th>
      <td>Conversação sobre Metáfora em Libras</td>
      <td>Concluído</td>
    </tr>
  </tbody>
</table>
</main>

<?php require_once('inc/footer.php'); ?>
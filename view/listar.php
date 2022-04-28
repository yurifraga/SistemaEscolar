<?php
require_once "../view/pages/topo.php";
require_once "../conexao.php" ;
require_once "../model/alunos_model.php";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title style="margin-top:10px;">Lista de alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body >
  <h1 align="center" style="margin-top: 50px">Lista de Alunos</h1>
  <table class="table">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Matricula</th>
          <th>Idade</th>
          <th>Data de nascimento</th>
          <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <tr>
          <?php
          $listar = new Alunos_model;
          $listar->visualizar($conn);
          ?>
        </tr>
      </tbody>
  </table>
    
</body>
</html>
<?php
require_once "../view/pages/topo.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
    <div>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="nav justify-content-end">
          <a class="navbar-brand justify-content">Portal escolar</a>
          <li class="nav-item">
            <a class="nav-link" href="/project/view/alunos.php">Cadastrar Aluno</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/project/view/professor.php">Cadastror Professor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/project/view/listar.php">Lista de alunos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Sair</a>
          </li>
        </ul>
      </nav>
    </div>
  </body>

<?php
session_start();
require_once "../view/pages/topo.php";
require_once "../conexao.php" ;
require_once "../model/alunos_model.php";
require_once "../verifica_login.php";
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
          <th>Turma</th>
          <th>Idade</th>
          <th>Data de nascimento</th>
          <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <tr>
          <?php
          $listar = new Alunos_model;
          $listarAlunos = $listar->setConn($conn);
          $listarAlunos = $listar->visualizar();
          //listar nome das turmas e não o ID
          foreach($listarAlunos as $turmas) {
            echo "<tr>
              <td>".$turmas['nome']."</td>
              <td>".$turmas['matricula']."</td>
              <td>".$turmas['nome_turma']."</td>
              <td>".$listar->getIdade($turmas['data_nasci'])."</td>
              <td>".$listar->formatarData($turmas['data_nasci'])."</td>
              <td>
                <a class='btn btn-primary btn-sm' href='editar.php?id=".$turmas['id']."'>Editar</a>
                <a class='btn btn-danger btn-sm' href='javascript:goDelete(".$turmas['id'].")'>Excluir</a>
              </td>
            </tr>";
          }
          ?>
        </tr>
      </tbody>
    </table>
  </body>
</html>
<script>
  //Mensagem de alerta para confirmar a exclusão
	function goDelete(id){
		var myUrl = 'deletar.php?id='+id
		
		if(confirm("Deseja realmente apagar esse registro?")){
			window.location.href= myUrl;
		} else {
			alert("Registro não alterado");
			return false;
		}
	}

</script>
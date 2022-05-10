<?php
require_once "../conexao.php";
require_once "../model/alunos_model.php";

$listar = new Alunos_model;
$listarAlunos = $listar->setConn($conn);

$turmas = $_POST['turma'];

$sql = "SELECT alunos.*, turma.turma as nome_turma FROM alunos left join turma on turma.id = alunos.id_turma WHERE alunos.id_turma = $turmas";
$resultado_query = mysqli_query($conn, $sql);
?>
<section class="painel col-lg-9">

    <header class="painel-heading">
        Turma : <?=$turmas;?>
    </header>
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
                <?php
                foreach($resultado_query as $turmaSelecionada){
                ?>
                <tr>
                    <td><?=$turmaSelecionada['nome']?></td>
                    <td><?=$turmaSelecionada['matricula']?></td>
                    <td><?=$turmaSelecionada['nome_turma']?></td>
                    <td><?=$listar->getIdade($turmaSelecionada['data_nasci'])?></td>
                    <td><?=$listar->formatarData($turmaSelecionada['data_nasci'])?></td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='editar.php?id="<?=$turmaSelecionada['id']?>"'>Editar</a>
                        <a class='btn btn-danger btn-sm' href='javascript:goDelete("<?=$turmaSelecionada['id']?>")'>Excluir</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </section>
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
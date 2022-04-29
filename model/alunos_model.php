<?php
session_start();
require_once "../conexao.php";
class Alunos_model {
    public $dados;

    //Adicionar os valores para as variaveis
    public function setDados()
    {
        $dados = array (
            'nome' => $_POST['nome'],
            'matricula' => $_POST['matricula'],
            'dataNasc' => $_POST['dataNasc'],
            'dataAtual' => date('d/m/Y')
        );
        return $dados;
    }
    
    //Metodo para cadastrar o aluno, OBS: tirar o html e deixar so a query do INSERT
    public function cadastrar($conn)
    {
        $extrair = $this->setDados();
        $cadastrar_aluno = "INSERT INTO alunos (nome, matricula, data_nasci) VALUES ('$extrair[nome]', '$extrair[matricula]', '$extrair[dataNasc]')";
        $resultado_cadastro = mysqli_query($conn, $cadastrar_aluno);
        if(mysqli_insert_id($conn)){
            $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Cadastrado com sucesso</div>";
            header("Location: ../view/alunos.php");
        } else {
            $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Erro ao cadastrar</div>";
            header("Location: ../view/alunos.php");
        }
    }

    //Metodo para trazer a idade do aluno realizando um calculo da data atual e a data de nascimento
    public function getIdade($dataNascimento)
    {
        $this->dataAtual = date('d/m/Y');
        list($dia, $mes, $ano) = explode("/", $this->dataAtual);
        if (empty($dataNascimento) || is_null($dataNascimento)) {
            $result = 00;
        }else {
            list($anoNasc, $mesNasc, $diaNasc) = explode("-", $dataNascimento);
            $result = $this->idade = intval($ano) - intval($anoNasc);
        }
        return $result;
    }

    //Usar esse metodo para os selects
    public function getAlunos($conn)
    {
        $alunos_db = "SELECT * FROM alunos";
        $result_alunos = mysqli_query($conn, $alunos_db);
        return $result_alunos;
    }

    //Metodo para formatar a data e trazer para o formato br
    public function formatarData($data)
    {
        return date('d/m/Y', strtotime($data));
    }

    //Metodo para preencher a tabela cada linha da lista de alunos usando o select do metodo getAlunos()
    public function visualizar($conn)
    {
        $alunos = $this->getAlunos($conn);
        return $alunos;
    }
    
    // criar um metodo so para realizar o update e buscar o select pelo getAlunos()
    public function editar($conn) 
    {
        $id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $editar_aluno = "SELECT * FROM alunos WHERE id='$id'";
        $resultado_editar = mysqli_query($conn, $editar_aluno);
        return $resultado_editar;
    }

    public function update($conn)
    {
        $update = $this->setDados();
        $update = $this->editar($conn);
        $update_aluno = "UPDATE alunos SET nome='$update[nome]', matricula='$update[matricula]', data_nasci='$update[dataNasc]', NOW() WHERE id='$this->id')";
        $resultado_update = mysqli_query($conn, $update_aluno);
    }

    //Metodo para deletar o aluno clicando no link "excluir"
    public function deletar($conn)
    {   
        $id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $excluir_aluno = "DELETE FROM alunos WHERE id='$id'";
        $resultado_excluir = mysqli_query($conn, $excluir_aluno);
    }
}
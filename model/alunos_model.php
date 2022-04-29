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

    //METODO DO MODEL PARA BUSCAR OS ALUNOS NO BANCO DE DADOS
    public function getAlunos($conn)
    {
        $alunos_db = "SELECT * FROM alunos";
        $result_alunos = mysqli_query($conn, $alunos_db);
        return $result_alunos;
    }

    //Metodo para formatar a data e trazer para o formato br ESSE METODO VAI PARA O CONTROLLER
    public function formatarData($data)
    {
        return date('d/m/Y', strtotime($data));
    }

    //ESSE METODO VAI PARA O CONTROLLER
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

    public function getDados()
    {
        $dados = array (
            'id' => filter_input(INPUT_GET, 'id'),
            'nome' => filter_input(INPUT_GET, 'nome'),
            'matricula' => filter_input(INPUT_GET, 'matricula'),
            'dataNasc' => filter_input(INPUT_GET, 'dataNasc'),
        );
        return $dados;
    }

    public function update($conn) //verificar a query pois não esta realizando o update no banco de dados
    { 
        $dados = $this->getDados();
        $update_aluno = "UPDATE alunos SET nome='$this->dados[nome]', matricula='$this->dados[matricula]', data_nasci='$this->dados[dataNasc]', NOW() WHERE id='$this->dados['id']')";
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
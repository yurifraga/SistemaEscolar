<?php
require_once "../conexao.php";
class Alunos_model {
    public $conn = '';

    //Adicionar os valores para as variaveis
    public function setDados()
    {
        $dados = array (
            'id' => $_POST['id'],
            'nome' => $_POST['nome'],
            'matricula' => $_POST['matricula'],
            'dataNasc' => $_POST['dataNasc'],
            'dataAtual' => date('d/m/Y'),
            'turma' => $_POST['turma'],
        );
        return $dados;
    }

    public function setConn($conn)
    {
        $this->conn = $conn;
    }

    //Metodo para cadastrar o aluno, OBS: tirar o html e deixar so a query do INSERT
    public function cadastrar()
    {
        $extrair = $this->setDados();
        $cadastrar_aluno = "INSERT INTO alunos (nome, matricula, data_nasci, id_turma) VALUES ('$extrair[nome]', '$extrair[matricula]', '$extrair[dataNasc]', '$extrair[turma]')";
        $resultado_cadastro = mysqli_query($this->conn, $cadastrar_aluno);
        if(mysqli_insert_id($this->conn)){
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
            $this->idade = $ano - $anoNasc;
            if($mes < $mesNasc){
                $this->idade--;
            }
            if($dia < $diaNasc){
                $this->idade--;
            }
            $result = $this->idade;
             
        }
        return $result;
    }

    //METODO DO MODEL PARA BUSCAR OS ALUNOS NO BANCO DE DADOS
    public function getAlunos()
    {
        $alunos_db = "SELECT alunos.*, turma.turma as nome_turma FROM alunos left join turma on turma.id = alunos.id_turma";
        $result_alunos = mysqli_query($this->conn, $alunos_db);
        return $result_alunos;
    }

    //Metodo para formatar a data e trazer para o formato br ESSE METODO VAI PARA O CONTROLLER
    public function formatarData($data)
    {
        return date('d/m/Y', strtotime($data));
    }

    //ESSE METODO VAI PARA O CONTROLLER
    public function visualizar()
    {
        $alunos = $this->getAlunos();
        return $alunos;
    }
    
    // criar um metodo so para realizar o update e buscar o select pelo getAlunos()
    public function editar() 
    {
        $id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $editar_aluno = "SELECT * FROM alunos WHERE id='$id'";
        $resultado_editar = mysqli_query($this->conn, $editar_aluno);
        return $resultado_editar;
    }

    public function update() //verificar a query pois não esta realizando o update no banco de dados
    { 
        $dados = $this->setDados();
        $update_aluno = "UPDATE alunos SET nome='$dados[nome]', matricula='$dados[matricula]', data_nasci='$dados[dataNasc]', id_turma=$dados[turma] WHERE id='$dados[id]'";
        $resultado_update = mysqli_query($this->conn, $update_aluno);
        
    }

    //Metodo para deletar o aluno clicando no link "excluir"
    public function deletar()
    {   
        $id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $excluir_aluno = "DELETE FROM alunos WHERE id='$id'";
        $resultado_excluir = mysqli_query($this->conn, $excluir_aluno);
    }
}
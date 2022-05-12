<?php
require_once "../conexao.php";
class Turma_model {
    public $conn = "";

    public function setDados() {
        $dados = array (
            'turma' => $_POST['turma'],
        );
        return $dados;
    }

    public function setConn($conn)
    {
        $this->conn = $conn;
    }
    
    public function cadastrar(){
        $extrair = $this->setDados();
        $cadastrar_turma = "INSERT INTO turma (turma) VALUES ('$extrair[turma]')";
        $resultado_cadastro = mysqli_query($this->conn, $cadastrar_turma);
        if(mysqli_insert_id($this->conn)){
            $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Cadastrado com sucesso</div>";
            header("Location: ../view/professor.php");
        } else {
            $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Erro ao cadastrar</div>";
            header("Location: ../view/professor.php");
        }
    } 
    
    public function getTurma()
    {
        $sql = "SELECT * FROM turma";
        $result_query = mysqli_query($this->conn, $sql);
        return $result_query;
    }

    public function setOrder($campo)
    {
        $this->order_by = $campo;
        return $this;
    }

    public function orderPadrao()
    {
        return $this->setOrder('nome');
    }

    public function getTurmaByAlunos($turma)
    {
        $sql = "SELECT alunos.*, turma.turma as nome_turma FROM alunos left join turma on turma.id = alunos.id_turma WHERE alunos.id_turma = ".$turma;
        if (isset($this->order_by) && $this->order_by!='') {
            $sql .= ' order by '.$this->order_by.' asc';
        }
        $resultado_query = mysqli_query($this->conn, $sql);
        return $resultado_query;

    }
}
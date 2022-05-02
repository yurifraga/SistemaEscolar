<?php
session_start();
require_once "../conexao.php";
class Professor_model {
    public $conn = "";

    public function setDados() {
        $dados = array (
            'nome' => $_POST['nome'],
            'disciplina' => $_POST['disciplina'],
        );
        return $dados;
    }

    public function setConn($conn)
    {
        $this->conn = $conn;
    }
    
    public function cadastrar(){
        $extrair = $this->setDados();
        $cadastrar_professor = "INSERT INTO professor (nome, disciplina) VALUES ('$extrair[nome]', '$extrair[disciplina]')";
        $resultado_cadastro = mysqli_query($this->conn, $cadastrar_professor);
        if(mysqli_insert_id($this->conn)){
            $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Cadastrado com sucesso</div>";
            header("Location: ../view/professor.php");
        } else {
            $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Erro ao cadastrar</div>";
            header("Location: ../view/professor.php");
        }
    }   
}
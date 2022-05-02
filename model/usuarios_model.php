<?php
session_start();
require_once "../conexao.php";
class Usuarios_model {
    public $conn = "";

    public function setDados()
    {
        $dados = array(
            'nome' => $_POST['nome'],
            'user' => $_POST['user'],
            'senha' => $_POST['senha']
        );
        return $dados;
    }

    public function setConn($conn)
    {
        $this->conn = $conn;
    }

    public function cadastrar()
    {
        $extrair = $this->setDados();
        $cadastrar_usuario = "INSERT INTO usuarios (nome, user, senha) VALUES ('$extrair[nome]', '$extrair[user]','$extrair[senha]')";
        $resultado_cadastro = mysqli_query($this->conn, $cadastrar_usuario);
    }
}
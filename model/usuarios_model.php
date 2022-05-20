<?php
session_start();
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
        
        //Verifica se já existe um user cadastrado
        $query = mysqli_query($this->conn, "SELECT id FROM usuarios where user = '$extrair[user]'");
        $row = mysqli_num_rows($query);

        if($row > 0 ){
            return false; // já esta cadastrado
            exit();
        } else {
            $resultado_cadastro = mysqli_query($this->conn,"INSERT INTO usuarios (nome, user, senha) VALUES ('$extrair[nome]', '$extrair[user]','$extrair[senha]')");
            return $resultado_cadastro;
        }

    }

    public function logar()
    {
        $extrair = $this->setDados();
        if(empty($extrair['nome']) || empty($extrair['senha'])){
            header('Location:/escola/view/home.php');
        }
    
        $result = mysqli_query($this->conn, "SELECT id, user FROM usuarios WHERE user= '$extrair[user]' and senha = '$extrair[senha]'");
        $row = mysqli_num_rows($result);
        
        if($row == 1){
            session_start();
            $_SESSION['user'] = $extrair['user'];
            header('Location:/escola/view/alunos.php');
        } else {
            $_SESSION['nao_autenticado'] = true;
            header('Location:/escola/view/home.php');
        }
    }

}
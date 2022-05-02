<?php
session_start();
require_once "conexao.php";

if(empty($_POST['user']) || empty($_POST['senha'])){
    header('Location:/escola/view/home.php');
}

$usuario = mysqli_real_escape_string($conn, $_POST['user']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

$query = "SELECT id, user FROM usuarios WHERE user= '$usuario' and senha = '$senha'";

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);

if($row == 1){
    $_SESSION['user'] = $usuario;
    header('Location:/escola/view/alunos.php');
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location:/escola/view/home.php');
}
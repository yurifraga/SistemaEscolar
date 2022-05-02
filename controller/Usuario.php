<?php
require_once "../conexao.php";
require_once "../model/usuarios_model.php";
$novoUser = new Usuarios_model;
$novoUser->setConn($conn);
$novoUser->cadastrar();
header('Location:/escola/view/home.php');
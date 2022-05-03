<?php
session_start();
require_once "../conexao.php";
require_once "../model/alunos_model.php";
require_once "../verifica_login.php";
$deletarAluno = new Alunos_model;
$deletarAluno->setConn($conn);
$deletarAluno->deletar();
header("Location: ../view/listar.php");
<?php
require_once "../conexao.php";
require_once "../model/alunos_model.php";
$deletarAluno = new Alunos_model;
$deletarAluno->deletar($conn);
header("Location: ../view/listar.php");
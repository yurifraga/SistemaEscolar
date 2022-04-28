<?php
require_once "../conexao.php";
require_once "../model/alunos_model.php";
$novoAluno = new Alunos_model;
$novoAluno->cadastrar($conn);
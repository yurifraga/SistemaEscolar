<?php
require_once "../conexao.php";
require_once "../model/alunos_model.php";
$update = new Alunos_model;
$update->update($conn);
var_dump($update);
//header("Location: ../view/listar.php");
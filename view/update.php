<?php
require_once "../conexao.php";
require_once "../model/alunos_model.php";
require_once "../verifica_login.php";
$update = new Alunos_model;
$update->update($conn);
header("Location: ../view/listar.php");
<?php
require_once "../conexao.php";
require_once "../model/alunos_model.php";
$update = new Alunos_model;
$update->update($conn);
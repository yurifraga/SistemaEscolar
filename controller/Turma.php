<?php
require_once "../conexao.php";
require_once "../model/turma_model.php";
$novaTurma = new Turma_model;
$novaTurma->setConn($conn);
$novaTurma->cadastrar();
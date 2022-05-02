<?php
require_once "../conexao.php";
require_once "../model/professor_model.php";
$novoProf = new Professor_model;
$novoProf->setConn($conn);
$novoProf->cadastrar();
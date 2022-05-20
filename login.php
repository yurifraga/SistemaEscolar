<?php
require_once "conexao.php";
require_once "./model/usuarios_model.php";
$usuarios_model = new Usuarios_model;
$usuarios_model->setConn($conn);
$usuarios_model->logar();
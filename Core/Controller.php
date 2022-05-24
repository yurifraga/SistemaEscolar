<?php

class Controller {

    public $dados;

    // CHAMADO POR TODOS OS CONTROLLERS
    public function carregarTemplate($nomeView, $dadosModel = array()
    {
        $this->dados = $dadosModel;
        require 'view/home.php';
    }

    
    // CHAMADO NO TEMPLATE
    public function carregarViewNoTemplate($nomeView, $dadosModel = array())
    {
        extract($dadosModel);

        require 'view/'.$nomeView.'.php'; //dinamico
    }
}
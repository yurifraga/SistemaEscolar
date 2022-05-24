<?php

class Core {

    public functuin __construct()
    {
        $this->run();
    }

    public function run()
    {
        if(isset($_GET['pag']))
        {
            $url = $_GET['pag'];
        }
        
        //possui informação após dominio 
        if(!empty($url))
        {
            $url = explode('/', $url);
            $controller  = $url[0].'Controller';
            array_shift($url);

            //if o usuario mandou metodo
            if(isset($url[0]) && !empty($url[0]))
            {
                $metodo = $url[0];
                array_shift($url);
            } else {// enviou somente a classe

                $metodo = 'index';
            }

            if(count($url) > 0 )
            {
                $parametros = $url;
            }
        } else {
            $controller = 'Usuario';
            $metodo = 'index';
        }

        $caminho = 'escola/controller/'.$controller.'.php';

        if(!file_exists($caminho) && !method_exists($controller, $metodo))
        {
            $controller = 'Usuario';
            $metodo = 'index';
        }

        $c = new $controller;
        call_user_func_array(array($c, $metodo), $parametros);

    }
}
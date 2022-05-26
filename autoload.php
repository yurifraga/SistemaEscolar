<?php

spl_autoload_register(function($nome_arquivo)
{
    if(file_exists('controller/'.$nome_arquivo.'.php')){

        require 'controller/'.$nome_arquivo.'.php';

    } elseif (file_exists('Core/'.$nome_arquivo.'.php')){

        require 'Core/'.$nome_arquivo.'.php';

    } elseif(file_exists('model/'.$nome_arquivo.'.php')) {
        
        require 'model/'.$nome_arquivo.'.php';
    }
});

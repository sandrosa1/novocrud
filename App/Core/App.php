<?php

namespace App\Core;


/**
 * Classe para rotas e URLs
 */
class App {

    /**
     * Recebe a classe
     *
     * @var string
     */
    protected $controller  = 'home';

    /**
     * Recebe o método
     *
     * @var string
     */
    protected $method      = 'index';

    /**
     * Recebe os parametros
     *
     * @var array
     */
    protected $params      = [];

    /**
     * Contrutor Responsavel pela criação das rotas e URL amigaveis
     */
    function __construct(){
        
        $url = $this->parseURL();
        //print_r($url);

        /**
         * Se existir o atributo, controler recebe o atributo
         */
        if(file_exists('../App/Controllers/'.$url[1].'.php')){
            $this->controller = $url[1];
            unset($url[1]);

        }elseif(empty($url[1])){
            $this->controller = 'home';

        }else{
            $this->controller = 'erro404';

        }

        require_once '../App/Controllers/'.$this->controller.'.php';

        $this->controller = new $this->controller;

        /**
         *se existe o método dentro do controller, method recebe o método
         */
        if(isset($url[2])){
            if(method_exists($this->controller,$url[2])){
                $this->method = $url[2];
                unset($url[2]);
                unset($url[0]);
            }
        }

        /**
         * Recebe os parametros do indíce 3 em diante
         */
        $this->params = $url ? array_values($url) : [];

        /**
         * Executa um método que está dentro de um controller, recebido pela URL
         */
        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    /**
     * Método responsável por capturar o caminho da url
     *
     * @return array
     */
    public function parseURL(){
        return explode ('/',filter_var($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'],FILTER_SANITIZE_URL));
    }

    public function currentUrl(){
        $url = $this->parseURL();
        if($url[1] == "" AND !isset($url[2])){
            $url[1] = "home";
            $url[2] = "index";
        }
        return  URL_BASE."/".$url[1]."/".$url[2]."/";
    }


}
<?php

namespace App\Http;

class Request{

    /**
     * Método http da requisição
     *
     * @var string
     */
    private $httpMethod;

    /**
     * URI da página
     *
     * @var string
     */
    private $uri;


    /**
     * parametros da URL ($_GET)
     *
     * @var array
     */
    private $queryParams = [];

    /**
     * Variareis recebida no POST da pagina ($_POST)
     *
     * @var array
     */
    private $postVars = [];

    /**
     * Cabeçalho da requisição
     *
     * @var array
     */
    private $headers = [];

    /**
     * Construtor da classe
     */
    function __construct() {
        $this->queryParams  = $_GET ?? [];
        $this->postVars     = $_POST ?? [];
        $this->headers      = getallheaders();
        $this->httpMethod   = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->uri          = $_SERVER['REQUEST_URI'] ?? '';


    }


    /**
     * Método reponsável por retornar o headers da requisição
     *
     * @return  array
     */ 
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Método reponsável por retornar as variaveis do POST da requisição
     *
     * @return  array
     */ 
    public function getPostVars()
    {
        return $this->postVars;
    }

    /**
     * Método reponsável por retornar os parametros da requisição
     *
     * @return  array
     */ 
    public function getQueryParams()
    {
        return $this->queryParams;
    }

    /**
     * Método reponsável por retornar o método http da requisição
     *
     * @return  string
     */ 
    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

    /**
     * Método reponsável por retornar a URI da requisição
     *
     * @return  string
     */ 
    public function getUri()
    {
        return $this->uri;
    }
}
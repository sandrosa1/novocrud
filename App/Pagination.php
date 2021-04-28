<?php

namespace App;

/**
 * Classe responsavel pela paginação
 */
class Pagination extends Core\App{ 

    /**
     * Dados da página
     *
     * @var array
     */    
    public $dados;

    /**
     * Número da página atual
     *
     * @var string
     */   
    public $pagina;

    /**
     * Quantidadde de comentários por página
     *
     * @var string
     */   
    public $quantidade;

    /**
     * Quantidade de páginas
     *
     * @var string
     */   
    public $registrosPagina;

    /**
     * Contador de página
     *
     * @var string
     */   
    public $contar;

    /**
     * Controle 
     *
     * @var string
     */   
    public $resultado;

    /**
     * contrutor da paginação
     *
     * @param array $dados
     * @param string $pagina
     * @param string $quantidade
     */
    public function  __construct( $dados, $pagina , $quantidade ){
        $this->dados      = $dados;
        $this->$pagina     = $pagina;
        $this->quantidade = $quantidade;


    }

    /**
     *Método que divide a pagina
     *
     * @param [type] $var
     * @return 
     */
    public function result($var){

        // Divide um array em pedaço
        $this->registrosPagina = array_chunk($this->dados, $this->quantidade);
        $this->contar          = count($this->registrosPagina); 

        if($this->contar > 0){

            $this->resultado    = $this->registrosPagina[$var - 1]; 
            return $this->resultado;
            
        }else{
            return [];

        }
    }

    /**
     *Método que gera a paginação
     *
     * @param string $var
     * @return void
     */
    public function navigator($var){
        echo "<ul class='pagination'>";
            for($i = 1; $i <= $this->contar ; $i++ ){
                if($i == $var){


                  echo " <li class='active'>  <a href='#'>  "  .$i.  "  </a></li>"; 

                }else{

                  echo " <li'>  <a href='".$this->currentUrl()."?page=".$i."'>  " .$i. "   </a></li>"; 
               
                }
            }
        echo "</ul>";

    }
}
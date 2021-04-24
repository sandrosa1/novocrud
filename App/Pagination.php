<?php

namespace App;

class Pagination extends Core\App{

    public $dados;
    public $pagina;
    public $quantidade;
    public $registrosPagina;
    public $contar;
    public $resultado;

    public function  __construct( $dados, $pagina , $quantidade ){
        $this->dados      = $dados;
        $this->$pagina     = $pagina;
        $this->quantidade = $quantidade;


    }

    public function result($var){

        $this->registrosPagina = array_chunk($this->dados, $this->quantidade);
        $this->contar          = count($this->registrosPagina); 
        if($this->contar > 0){
            $this->resultado    = $this->registrosPagina[$var - 1]; 
            return $this->resultado;
            
        }else{
            return [];
        }
        

    }

    public function navigator($var){
        echo "<ul class='pagination'>";
            for($i = 1; $i <= $this->contar ; $i++ ){
                if($i == $var){


                  echo "<li class='active'><a href='#'> " .$i. " </a></li>"; 

                }else{

                  echo "<li'><a href='".$this->currentUrl()."?page=".$i."'> " .$i. " </a></li>"; 
               
                }
            }
        echo "</ul>";


    }

}
<?php

use App\Core\Controller;
/**
 * Classe responsável pelo controle do erro 404
 */
class Erro404 extends Controller {

   /**
    * Método responsável em chamar a view 404
    *
    * @param string $nome
    * @return void
    */
    public function index(){

       

        $this->view('erros/404');

    }

}
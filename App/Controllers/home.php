<?php

use \App\Core\Controller;
class Home extends Controller {

    /**
     * Método responsável por levar os dados para home/index
     *
     * @param string $nome
     * @return void
     */
    public function index($nome = ''){

        $note = $this->model('Note');
        
        $dados = $note->getAll();

       

        $this->view('home/index',$dados = ['registros' => $dados]);

    }
}
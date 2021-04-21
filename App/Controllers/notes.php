<?php

use \App\Core\Controller;

class Notes extends Controller {

    /**
     * Método responsável por levar os dados para home/index
     *
     * @param string $nome
     * @return void
     */
    public function ver($id = ''){

        $note = $this->model('Note');
        $dados = $note->findId($id);

    
        $this->view('notes/ver',$dados);

    }
}
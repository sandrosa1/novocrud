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

    /**
     * Método responsavel pela capiturar os dados do bloco de anotação
     *
     * @return void
     */
    public function criar(){

        $mensagem = array();
        
        /**
         * Se houver ação envai para view
         */
        if(isset($_POST['cadastrar'])){
            
            $note = $this->model('Note');
            $note->titulo =  $_POST['titulo'];
            $note->texto  =  $_POST['texto'];

            $mensagem[] = $note->save();
        }
        $this->view('notes/criar', $dados = ['mensagem' => $mensagem]);
        
    }

}
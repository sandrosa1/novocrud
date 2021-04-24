<?php

use \App\Core\Controller;
use \App\Auth;

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

        Auth::checkLogin();

        $mensagem = array();
        
        /**
         * Se houver ação envai para view
         */
        if(isset($_POST['cadastrar'])){
            
            if(empty($_POST['titulo'])){
                $mensagem[] = "O campo titulo não pode estar vazio";

            }elseif(empty($_POST['texto'])){
                $mensagem[] = "O campo texto não pode estar vazio";

            }else{
                $note = $this->model('Note');
                $note->titulo =  $_POST['titulo'];
                $note->texto  =  $_POST['texto'];

                $mensagem[] = $note->save();

            }

        }
        $this->view('notes/criar', $dados = ['mensagem' => $mensagem]);
        
    }



    public function editar($id){

        Auth::checkLogin();

        $mensagem = array();
        $note = $this->model('Note');

            
            /**
             * Se houver ação envai para view
             */
        if(isset($_POST['atualizar'])){
            
            if(empty($_POST['titulo'])){
                $mensagem[] = "O campo titulo não pode estar vazio";

            }elseif(empty($_POST['texto'])){
                $mensagem[] = "O campo texto não pode estar vazio";

            }else{
                $note->titulo =  $_POST['titulo'];
                $note->texto  =  $_POST['texto'];

                $mensagem[] = $note->update($id);

            }

        }
        $dados = $note->findId($id);

        $this->view('notes/editar', $dados = ['mensagem' => $mensagem, 'registros' => $dados]);
    }

    /**
     * Método reponsável por excluir
     *
     * @param string $id
     * @return void
     */
    public function excluir($id = ''){

        Auth::checkLogin();

        $mensagem = array();

        $note = $this->model('Note');

        $mensagem[] = $note->delete($id);

        $dados = $note->getAll();

        $this->view('home/index' , $dados = ['registros' => $dados, 'mensagem' => $mensagem]);


    }




}
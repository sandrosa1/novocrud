<?php

use App\Core\Controller;
use App\Auth;

/**
 * Classe responsável pelo controle da home
 */
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
    /**
     * Método responsável pela barra de pesquisa
     *
     * @return void
     */
    public function buscar(){

        $busca = isset($_POST['search']) ? $_POST['search'] : $_SESSION['search'];
        $_SESSION['search'] = $busca;
        $note = $this->model('Note');
        $dados = $note->search($busca);

    
        $this->view('home/index', $dados = ['registros' => $dados]);

    }


    /**
     * Método responsável pelo login
     *
     * @return void
     */
    public function login(){

        $mensagem = array();

        if(isset($_POST['entrar'])){
            ///echo password_hash('123456',PASSWORD_DEFAULT);
            if(empty($_POST['email']) or empty($_POST['senha'])){
                $mensagem[] = "O campo email e senha são obrigatorios";
            }else{
                $email  = $_POST['email'];
                $senha = $_POST['senha'];
                $mensagem[] = Auth::Login($email, $senha);
            }
            
        }
        
        $this->view('home/login',$dados = ['mensagem' => $mensagem ]);

    }

    public function logout(){
        
      return Auth::Logout();
    }
}
<?php

use \App\Core\Controller;
use \App\Auth;

class Users extends Controller
{
    
    public function cadastrar(){
        
        Auth::checkLogin();
        Auth::checkLoginAdmin();

        $mensagem = array();

        if(isset($_POST['cadastrar'])){

            if(empty($_POST['email']) or empty($_POST['senha']) or empty($_POST['nome'])){

                $mensagem[] = "O campo nome, email e senha são obrigatorios";

            }else{

                $nome =$_POST['nome'];
                $email =$_POST['email'];
                $senha =password_hash($_POST['senha'], PASSWORD_DEFAULT);
    
                $user = $this->model('User');
                $user->nome = $nome;
                $user->email = $email;
                $user->senha = $senha;
    
                $mensagem[] = $user->save();
            }
            
        }

        $this->view('users/cadastrar', $dados =['mensagem' => $mensagem]);

    }

}
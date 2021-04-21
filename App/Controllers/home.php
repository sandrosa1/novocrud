<?php

use \App\Core\Controller;
class Home extends Controller {

    public function index($nome = ''){
        $user = $this->model('User');
        $user->nome = $nome;
        //$user->email = $email;

        $this->view('home/index', ['nome' => $user->nome]);

    }
}
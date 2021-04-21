<?php

use \App\Core\Controller;
class Home extends Controller {

    public function index($nome = '', $email = ''){
        $user = $this->model('User');
        $user->nome = $nome;
        $user->email = $email;

        echo $user->nome."<br>".$user->email;

    }
}
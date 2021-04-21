<?php

class Contato{

    public function index(){
        echo 'index de contato';
    }

    public function email($nome = '', $email = ''){
        echo $nome."<br>" .$email."<br>";

    }

    public function telefone(){
        echo '(11)9422-13409';
    }
}
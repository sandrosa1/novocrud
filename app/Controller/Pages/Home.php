<?php

namespace App\Controller\Pages;

use \App\Utils\View;

class home {

    /**
     * Método responsavel por retornar o coteúdo (vieW) da home
     *
     * @return string
     */
    public static function getHome(){
        return View::render('pages/home');
    }
}
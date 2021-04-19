<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class Home extends Page{

    /**
     * Método responsavel por retornar o coteúdo (vieW) da home
     *
     * @return string
     */
    public static function getHome(){
        $obOrganization = new Organization();
       
        //View da home
        $content = View::render('pages/home',[
            'name' => $obOrganization->name,
            'description' =>  $obOrganization->description,
            'site' =>  $obOrganization->site
        ]);
        //Retorna a view da pagina
        return parent::getPage('CRUD-FATEC',$content);
    }
}
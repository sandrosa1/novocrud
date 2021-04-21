<?php
namespace App\Core;
/**
 * Controlher base todos os outros controlhers herdam desse classe
 */
class Controller{

    public function model($model){
        require_once '../App/models/'.$model.'.php';
        return new $model;
    }

    public function view($view, $data = []){
        require_once '../App/views/template.php';
    }

}
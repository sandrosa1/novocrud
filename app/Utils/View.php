<?php

namespace App\Utils;

class View 
{

    /**
   * Método responsável por retonar o conteúdo de uma view
   *
   * @param string $view
   * @return string
   */
  private static function getContentView($view)
  {
      $file = __DIR__.'/../../resources/view/'.$view.'.html';
      return file_exists($file) ? file_get_contents($file) : '';
  }

  /**
   * Método responsável por retonar o conteúdo renderizado de uma view
   *
   * @param string $view
   * @param array $vars (string/numeric)
   * @return string
   */
  public static function render($view, $vars = []) 
  {
    //Conteúdo da view
    $contentView = self::getContentView($view);
   
    //Chaves dos array de variaveis
    $keys = array_keys($vars);
    $keys = array_map(function($item){
        return '{{'.$item.'}}';
    },$keys);

    //Retorna o conteúdo da view
    return str_replace($keys,array_values($vars),$contentView);

  }
}




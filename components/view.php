<?php
    /**
     * Created by PhpStorm.
     * User: mike
     * Date: 27.09.17
     * Time: 18:04
     */
    
namespace App;

class View
{
    public function render($template, array $data = null)
    {
        require_once __DIR__ . "/../views/".$template.'.php';
    }
}


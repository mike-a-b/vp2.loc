<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 30.09.17
 * Time: 2:00
 */
    
namespace App;

class Main
{
    private $view;
    
    public function __construct()
    {
        $this->view = new View();
    }
    
    public function index()
    {
        $this->view->render('index');
    }
}

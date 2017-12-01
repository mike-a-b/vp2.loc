<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 30.09.17
 * Time: 5:11
 */

namespace App;

class Users
{
    private $view;
    private $model;
    private $data;
    
    public function __construct()
    {
        require_once ROOT . '/model/user.php';
        $this->view  = new View();
        $this->model = new User();
        $this->data  =  [];
    }
    
    public function login()
    {
        if (isset($_POST['submit'])) {
            $this->model->auth($_POST['inputLogin'], $_POST['inputPass']);
            if ($this->model->getStatus()) {
                session_start();
                $_SESSION['id'] = $this->model->swap;
                $this->data['msg'] = $this->model->error();
                $this->view->render('info', $this->data);
            } else {
                $this->data['msg'] = $this->model->error();
                $this->view->render('info', $this->data);
            }
        } else {
            $this->view->render('index');
        }
    }
    
    public function register()
    {
        if (isset($_POST['reg_submit'])) {
            $file = empty($_FILES['upload']) ? null : $_FILES['upload'];
            $this->model->registerUser($_POST, $file);
            $this->data['msg'] = $this->model->error();
            $this->view->render('info', $this->data);
        } else {
            $this->view->render('registration');
        }
    }
    
    public function logout()
    {
        session_start();
        $_SESSION = [];
        unset($_COOKIE[session_name()]);
        session_destroy();
        header("Location: /users/login/");
        exit();
    }
}

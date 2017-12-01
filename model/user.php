<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 29.09.17
 * Time: 22:57
 */

namespace App;

use PDO;

class User
{
    private $error;
    private $info;
    public $swap;

    public function checkLogin($login)
    {
        return filter_var($login, FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => "/[A-Za-zА-Яа-я0-9-_]+/uis"]]);
    }

    public function checkLoginExist($login)
    {
        $dbh = Db::getConnection();
        $sql = "SELECT count(*) FROM users WHERE login = ?";
        $sth = $dbh->prepare($sql);
        $sth->execute([$login]);
        $count_logins = $sth->fetch(PDO::FETCH_NUM)[0];
        if ($count_logins !== '0') {
            $this->error("Пользователь с таким логином существует");

            return false;
        } else {
            return true;
        }
    }

    public function error($msg = null)
    {
        if ($msg != false || $msg != null) {
            $this->error = $msg;

            return $this->error;
        } else {
            $this->error = false;
        }
    }

    public function getStatus()
    {
        return $this->info;
    }

    public function setStatus(bool $val = true)
    {
        if (is_bool($val)) {
            $this->info = $val;
        }
    }

    private function checkRegisterForm(&$post, &$file = null)
    {
        if ($this->checkLogin($post['login']) === false) {
            return false;
        }
        $result = (!$this->getStatus()) ? false : $this->checkLoginExist($post['login']);
        if ($result === false) {
            return false;
        }
        if ($post['password'] !== $post['password2']) {
            $this->error('Пароль не совпадает');

            return false;
        }

        return true;
    }

    public function checkImage($file)
    {
        if (!is_null($file)) {
            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            if (! in_array($ext, ['png', 'jpg', 'jpeg', 'bmp', 'gif'])) {
                $this->error('В качестве фото отправлена не картинка');
                return false;
            } elseif ($file['error'] !== UPLOAD_ERR_OK) {
                $this->error('Ошибка загрузки фото');
                return false;
            } elseif ($file['size'] > 4 * 1024 * 2) {
                $this->error('Фото превышает допустимый размер');
                return false;
            }
        } else {
            return false;
        }

        return true;
    }

    public function registerUser(&$post = [], &$file = null)
    {
        if (isset($post)) {
            $this->setStatus($this->checkRegisterForm($post));
        } elseif (isset($post) && isset($file)) {
            $this->setStatus($this->checkRegisterForm($post, $file));
        } else {
            $this->setStatus(false);
        }
        $input_values = [
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING),
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING),
            $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT),
            $desc = htmlspecialchars(strip_tags($post['description']))
        ];
        foreach ($input_values as $index => $inputValue) {
            if ($inputValue[$index] === false) {
                $this->setStatus(false);
            }
        }
        $dbh = Db::getConnection();
        if ($this->getStatus()) {
            $sql = 'INSERT INTO users (login, password, name, age, description)' . 'VALUES(?, ?, ?, ?, ?)';
            $sth = $dbh->prepare($sql);
            $sth->execute($input_values);
        }
        $this->setStatus($this->checkImage($file));
        $lastId    = $dbh->lastInsertId();
        if ($this->getStatus()) {
            $photoName = $lastId.strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $sql = "UPDATE users SET photo='$photoName?v=0' WHERE id=?";
            $sth = $dbh->prepare($sql);
            $sth->execute([$lastId]);
            move_uploaded_file($file['tmp_name'], __DIR__. '/../');
        } else {
            $sql = "UPDATE users SET photo='avatar_cap.jpg' WHERE id=?";
            $sth = $dbh->prepare($sql);
            $sth->execute([$lastId]);
        }
        $this->error("Регистрация завершилась успехом, авторизуйтесь");
        return true;
    }

    public function auth($login, $pass)
    {
        if (! $this->checkLogin($login)) {
            $this->error('логин содержит недопустимые символы, попробуйте снова');
            $this->setStatus(false);
        };
        $dbh = Db::getConnection();
        $sql = "SELECT * FROM users WHERE login = ?";
        $sth = $dbh->prepare($sql);
        $sth->execute([$login]);
        $record = $sth->fetch(PDO::FETCH_ASSOC);
        if ($record > 0) {
            if (password_verify($pass, $record['password'])) {
                $this->setStatus();
                $this->swap = $record['id'];
                $this->error("Доступ открыт");
            } else {
                $this->setStatus(false);
                $this->error('Пароль не совпадает');
            }
        } else {
            $this->setStatus(false);
            $this->error('Логин не существует');
        }
    }
}

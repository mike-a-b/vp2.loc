<?php
namespace  App;

use PDO;
use PDOException;

class Db
{
    
    public static function getConnection()
    {
        //require 'config.php';
        try {
            $dbh = @new PDO(DSN, USERNAME, PASSWORD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            print "Ошибка!: " . $e->getMessage() . "<br/>";
            die("Ошибка при подключении к БД или SQL синтаксиса".$e->getMessage());
        }
        $dbh->exec("set names utf8");
        $dbh->exec("use mvc_lesson");
    
        return $dbh;
    }
}

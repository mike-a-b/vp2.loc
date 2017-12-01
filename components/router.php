<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 29.09.17
 * Time: 23:37
 */
namespace App;

use Exception;

class Router
{
    
    public function __construct()
    {
    }
    
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            $routes = explode('/', $_SERVER['REQUEST_URI']);
    
            //exclude xdebug get params
/*            if (file_exists(__DIR__. '/../debug')) {
                foreach ($routes as &$route) {
                    if (preg_match('~([\?]XDEBUG(.*))$~', $route, $mathces)) {
                        $route = str_replace($mathces[0], '', $route);
                    }
                }
            }*/
            return $routes;
        } else {
            return '';
        }
    }

    public function run()
    {
        $routes= $this->getURI();
        $controllerName = 'Main';
        $actionName = 'index';
        
        if (!empty($routes[1])) {
            $controllerName = ucfirst(strtolower($routes[1]));
        }
        
        if (!empty($routes[2])) {
            $actionName = strtolower($routes[2]);
        }

        if (!empty($routes[3])) {
            $parameters = array_slice($routes, 3);
        }
        
        // Подключить файл класса-контроллера
        $controllerFile = ROOT . '/controllers/' .
                          strtolower($controllerName) . '.php';
        try {
            if (file_exists($controllerFile)) {
                require_once($controllerFile);
            } else {
                throw new Exception('Файл не найден');
            }

            // Создать объект, вызвать метод (т.е. action)
            $controllerName = '\App\\'.$controllerName;
            if (class_exists($controllerName)) {
                $controllerObject = new $controllerName();
            } else {
                throw new Exception('Файл найден но класс '
                                    . $controllerName . ' не найден');
            }
            
            if (method_exists($controllerObject, $actionName)) {
                if (isset($parameters)) {
                    $controllerObject->$actionName(...$parameters);
                } else {
                    $controllerObject->$actionName();
                }
            } else {
                throw new Exception("Метод не найден");
            }
//                    call_user_func_array(array($controllerObject, $actionName), $parameters);
        } catch (Exception $e) {
            require_once ROOT . '/errors/404.php';
        }
    }
}

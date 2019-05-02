<?php

namespace Core;


class Router
{
    //Tablica routingu, zawiera routy i tablice asocjacyjne $params, z wartością kontrolera i akcji
    protected $routes = [];


    //Tablica z nazwą kontrolera i akcji
    protected $params = [];

    //Dodawanie routy i tablicy $params z kontrolerem i akcją
    public function add($route, $params = [])
    {
        $route = preg_replace('/\//', '\\/', $route);

        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        $route = '/^' . $route . '$/i';

        $this -> routes[$route] = $params;
    }

    //Pobieranie tablicy routingu
    public function getRoutes()
    {
        return $this -> routes; 
    }

    //Dopasowanie adresu do routy
    public function match($url)
    {
        foreach($this -> routes as $route => $params)
        {
            if(preg_match($route, $url, $match))
            {
                foreach($match as $key => $value)
                {
                    if(is_string($key))
                    {
                        $this -> params[$key] = $value;
                        
                    }
                }
                
                return true;
            }   
        }

        return false;
    }

    public function getParams()
    {
        return $this -> params;
    }

    //Tworzenie obiektu kontrolera i wywoływanie odpowiedniej akcji na podstawie parametrów z routy
    public function dispatch($url)
    {
       $url = $this -> removeQueryStringVariable($url);

       if($this -> match($url))
       {
            $controller = $this -> params['controller'];

            $controller = $this -> convertToStudlyCaps($controller);

            $controller = "App\Controllers\\$controller";

            if(class_exists($controller))
            {
                $object_controller = new $controller();

                $action = $this -> params['action'];

                $action = $this -> convertToCamelCase($action);

                if(is_callable([$object_controller, $action]))
                {
                    $object_controller -> $action();
                }
                else
                {
                    echo 'Nie można wywołać metody ' . $action . ' w kontrolerze ' .  $controller;
                }
            
            }
            else
            {
                echo 'Błedna nazwa kontrolera ' . $controller;
            }
       }
       else
       {
           echo 'Błędna routa';
       }
       
    }
    //Konwersja wartości parametru kontrolera do formatu StudlyCaps (duża pierwsza litera)
    public function convertToStudlyCaps($name)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    //Konwersja wartości parametru akcji do formatu CamelCase(duże litera na początku każdego słowa)
    public function convertToCamelCase($name)
    {
        return lcfirst($this -> convertToStudlyCaps($name));
    }

    //Oczyszczanie adresu ze zmiennych, zostanie tylko nazwa kontrolera i akcji
    public function removeQueryStringVariable($url)
    {
        if($url != '')
        {
            $parts = explode('&', $url, 2);

            if(strpos($parts[0], '=') === false)
            {
                $url = $parts[0];
            }
            else 
            {
                $url = '';
            }
        }
        
        return $url;
    }
}
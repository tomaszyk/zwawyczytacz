<?php

namespace Core;

use Core\session\Session;

//Kontroler z którego dziedziczą inne kontrolery
abstract class Controller
{
    protected $session;

    public function __construct()
    {
        $this -> session = new Session();
        
    }

    //metoda __call jest wywoływana podczas próby wywołania nieistniejącej metody $name
    //dzięki temu można wykonać funkcję before (sprawdzić czy np. użytkownik jest zalogowany)
    //dopiero potem wywołujemy metodę $name.Action, dzięki funkcj call_user_func_array
    public function __call($name, $args)
    {
        $method = $name . 'Action';

        if(is_callable([$this, $method]))
        {
                if($this -> before() !== false)
                {
                    call_user_func_array([$this, $method], $args);

                    $this -> after();
                }
            
        }
       
    }

    protected function before()
    {

    }

    protected function after()
    {

    }

}
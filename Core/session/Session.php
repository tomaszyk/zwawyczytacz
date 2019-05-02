<?php

namespace Core\session;

//Klasa tworzy sesję
class Session 
{
    
    public function __construct()
    {
        session_start();
    }

    public function destroy()
    {
        session_destroy();
        $_SESSION = [];
    }

    //Funkcję set i get zapisują i pobierają wartości z sesji
    public function setVariable($key, $value)
    {
        $_SESSION[$key] = base64_encode(serialize($value));
    }

    public function getVariable($key)
    {
        return unserialize(base64_decode($_SESSION[$key]));  
    }
}
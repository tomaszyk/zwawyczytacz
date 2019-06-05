<?php

namespace Core;

//Klasa odpowiedzialna za renderowanie plików widoku
class View
{

    public static function render($view, $args = [])
    {
        //Tablica asocjacyjna argumentów jest dzielona na zmienne
        // o takich wartociach jakie miały poszczególne indeksy w tablicy
        extract($args, EXTR_SKIP);

        $file = "../App/Views/$view";

        if (is_readable($file)) {
            require $file;
        } else {
            echo 'file not found';
        }
    }

}

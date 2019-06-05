<?php

namespace Core;

use App\Config;

//Klasa nawiązująca połączenie z bazą
//Klasa Skildatabase dziedziczy to połączenie
class Model
{
    //Połączenie z bazą danych
    public static function dbConnect()
    {
        $db_connect = new \mysqli($db_host = Config::DB_HOST, $db_user = Config::DB_USER, $db_password = Config::DB_PASSWORD, $db_name = Config::DB_NAME);
        $db_connect->set_charset('utf8');

        if ($db_connect->errno) {
            echo 'Błąd połączenia';
        } else {
            return $db_connect;
        }

    }

}

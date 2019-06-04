<?php

namespace App;

//Konfiguracja

class Config
{
    //baza danych
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_NAME = 'uzytkownicy';
    const DB_PASSWORD = '';

    //mailer
    const M_TRANSPORT = 'ssl://smtp.gmail.com';
    const M_HOST = 465;
    const M_USER = 'tomaszmlastek';
    const M_PASSWORD = 'oceanograf127150';
}
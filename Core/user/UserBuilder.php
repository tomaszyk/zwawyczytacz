<?php

namespace Core\user;

//Klasa UserBuilder

class UserBuilder extends User
{
    //Przesłonięcie konstruktora z klasy User
    public function __construct()
    {
        
    }

    //Setery ustalają wartości poszczególnych właściwości obiektu UserBuilder
    public function setLogin($login)
    {
        $this -> login = $login;
        return $this;
    }

    public function setPassword($password)
    {
        $this -> password = $password;
        return $this;
    }

    // public function setSpeed($speed)
    // {
    //     $this -> speed = $speed;
    //     return $this;
    // }

    // public function setUnderstanding($understanding)
    // {
    //     $this -> understanding = $understanding;
    //     return $this;
    // }

    // public function setNumberOfText($numberOfText)
    // {
    //     $this -> numberOfText = $numberOfText;
    //     return $this;
    // }

    //Po nadaniu wartości zmiennym obiektu UserBulider
    //Tworzony jest obiekt User, któremu jako parametr konstruktora przekazany jest UserBulider z odpowiednimi wartościami zmiannych
    //Konstruktor w klasie User pobiera te wartości z obiektu UserBuilder i przypisuje do odpowiednich włąsciwoci User
    public function buildUser()
    {
        return new User($this);
    }
}
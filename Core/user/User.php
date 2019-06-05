<?php

namespace Core\user;

//Klasa user tworzy uzytkownika aplikacji

class User
{
    protected $login = '';
    protected $password = '';
    // protected $speed = 0;
    // protected $understanding = 0;
    // protected $numberOfText = 0;

    //Obiekt User jest tworzony przy użyciu klasy UserBuilder
    //Wartości poszczególnych zmiennych ustalana są na różnych etapach działąnia aplikacji
    public function __construct(UserBuilder $userBuilder)
    {
        $this->login = $userBuilder->getLogin();
        $this->password = $userBuilder->getPassword();
        // $this -> speed = $userBuilder -> getSpeed();
        // $this -> understanding = $userBuilder -> getUnderstanding();
        // $this -> numberOfText = $userBuilder -> getNumberOfText();
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    // public function getSpeed()
    // {
    //     return $this -> speed;
    // }

    // public function getUnderstanding()
    // {
    //     return $this -> understanding;
    // }

    // public function getNumberOfText()
    // {
    //     return $this -> numberOfText;
    // }
}

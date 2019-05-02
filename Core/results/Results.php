<?php

namespace Core\results;

use App\Model\Skildatabase;

//Klasa do prezentacji wyników użytkownikowi
class Results 
{
    private $result;
    private $velocity;
    private $understanding;

    //Obiekt pobiera wyniki z bazy
    public function __construct($login)
    {
        $this -> result = Skildatabase::getResults($login);
    }

    //Wyciągnięcie wartości prędkości i zrozumienia
    public function showResults()
    {
        while($result = mysqli_fetch_array($this -> result))
        {
            $this -> velocity = $result['tempo'];

            $this -> understanding = $result['zrozumienie'];
        }
    }

    //Pobranie wartości prędkosci i zrozumienia z właściwosci obiektu
    public function getVelocity()
    {
        return $this -> velocity;
    }

    public function getUnderstanding()
    {
        return $this -> understanding;
    }
}


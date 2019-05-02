<?php

namespace Core\reader;

//Klasa przetwarza pobrany tekst od użytkownika i grupuje go w jednostki (elementy span) o ustalonej długoci słów
class Reader
{

    private $char = ' ';
    private $word = 0;
    private $whitespace = 0;
    private $text = '';
    private $wholeText;
    private $i = 0;
    private $p;

    
    //Wskaźnik do pliku, otwiera plik w trybie do odczytu 'r'
    public function __construct($file)
    {
        @$this -> p = fopen($file['tmp_name'], 'r');
    }

    public function generateText($numberOfWords)
    {
        //Pętla działą dopóki w pliku są znaki
        while ($this -> char)
        {
            //Pobranie jednego znaku
            $this -> char = fread($this -> p, 1);
    
            //Sprawdzenie czy znak jest spacją 
            if($this -> char == ' ')
            {
                //Zliczmy spacje
                $this -> whitespace += 1;
                //i słowa
                $this -> word++;
        
                //Jeżeli ilość słów podanych w formularzu jest równa ilości słów w zmiennej $tekst
                if($this -> whitespace == $numberOfWords) 
                {
                    //Tworzymy nowe id elementu span
                    $this -> i++;
            
                    //Spacje konkatenujemy do ciągu znaków w zmiennej $tekst
                    $this -> text .= $this -> char;
            
                    //Zawartość zmiennej tekst wstawiamy do elementu span o odpowiednim id
                    if($this -> word / $numberOfWords == 2)
                    {
                        $this -> wholeText .= '<span id = "a' . $this -> i . '">'.$this -> text.'</span><br>';
                        $this -> word = 0;

                    }
                    else
                    {
                        $this -> wholeText .= '<span id = "a' . $this -> i . '">'.$this -> text.'</span>';
                    }
            
            
                    //Czyszczenie zawartoci zmiennych
                    $this -> whitespace = 0;
                    $this -> text = '';
                }       
        
                //Jeżeli ilość spacji jest mniejsza niż ilość słów zadeklarowana w formularzu,
                //Spacja jest konkatenowana do zmiennej $tekst
                $this -> text .= $this -> char; 
            }
            else
            {
                //Jeżeli przeczytany znak to nie spacja
                $this -> text.= $this -> char;
            }	
        }
        return $this;

    }

    //Pobranie tekstu
    public function getWholeText()
    {
        return $this -> wholeText;
    }
               

}
<?php 

namespace Core\text;

use App\Model\Skildatabase;


//Klasa Text służy do pomiaru prędkości czytania i zrozumienia czytaniego tekstu
class Text 
{
    private $text;
    private $article;
    private $questions;
    private $point;

    //Dla odpowiedniego usera pobierany jest z bazy odpowiedni tekst
    //funkcja getText() zwiększa też indeks tekstu, który jest pokazywany użytkownikowi
    //Dlatego użytkownik nie zobaczy dwa razy tego samego tekstu
    public function __construct($user)
    {
        $this -> text = Skildatabase::getText($user);  
            
    }

    //Pokazanie tekstu użytkownikowi oraz zapisanie ilości słów w danym teksie do elementu div o id = 'ileSlow'
    //Wartoc ta jest potzrebna do wyliczenia prędkości czytania
    public function getText()
    {
        $this -> article = mysqli_fetch_array($this -> text);

        echo $this -> article['tekst'];

        echo'<div style = "display: none;" id = "ileSlow">'.$this -> article['ileSlow'].'</div>';
    }

    //Funkcja generuje formularz z pytaniami do tekstu 
    public function getQuestions()
    {
        $this -> questions = Skildatabase::getQuestions();

        $radio = 0;
        //Formularz z pytaniami
        echo'<form action="checkAnswers" method="post">';
        while($question = mysqli_fetch_array($this -> questions))
        { 
            echo '<label>'.$question['pytanie'].'</label><br>';
            echo '<label><input type="radio" name="'.$radio.'" value="'.++$radio.' A'.'">'.$question['odpA'].'</label><br>';
            echo '<label><input type="radio" name="'.--$radio.'" value="'.++$radio.' B'.'">'.$question['odpB'].'</label><br>';
            echo '<label><input type="radio" name="'.--$radio.'" value="'.++$radio.' C'.'">'.$question['odpC'].'</label><br><br>';
        
        }
        
        echo'<div><input type="submit" value="Sprawdź" class="btn btn-primary"></div>';
        echo'</form>';
    }

    //Funkcja pobiera odpowiedzi użytkownika i porównuje z właściwymi
    public function checkAnswers()
    {
        $this -> questions = Skildatabase::getQuestions();
        $this -> point = 0;
        $i = 0;
        while($question = mysqli_fetch_array($this -> questions))
        { 
            if(@$_POST[$i] == $question['poprawna'])
            {
               $this -> point++;
            }
            $i++;
        }

        
    }

    //Pobierania wartości prawidłowych odpowiedzi
    public function getPoints()
    {
        return $this -> point;
    }


    

    

   

}


        
 


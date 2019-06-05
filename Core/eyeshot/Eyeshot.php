<?php

namespace Core\eyeshot;

use App\Model\Skildatabase;

//Klasa pobiera z bazy słowa i prezentuje je użuykownikowi w formie  kwadratowej tablicy
class Eyeshot
{
    protected $size;
    protected $words;
    protected $table;

    public function __construct($size)
    {
        $this->size = $size;
        //Pobranie z bazy odpowiedneij ilości słów
        $this->words = Skildatabase::getWords($size * $size);
    }

    public function getTable()
    {
        return $this->table;
    }

    public function generateTable()
    {
        //Początek tabeli
        $table = "<table align = \"center\"><tr>";

        for ($j = 1; $j <= $this->size; $j++) {

            for ($i = 1; $i <= $this->size; $i++) {
                //Generowanie komórek tabeli
                //Słowa są wstawiane tylko do komórek zewnętrzynych, środek jest pustu
                if ($i == 1 || $j == $this->size || $j == 1 || $i == $this->size) {
                    //Pobieranie jednego rekordu
                    $word = mysqli_fetch_array($this->words);

                    //Konkatenowanie kolejnych komórek do tabeli (komórki ze słowami)
                    $table .= '<td class = "pole-widz-td text-center" id = "' . $j . $i . '">' . $word['slowa'] . '</td>';

                }
                //Gdy komórki nie są zewnętrzne
                else {
                    //Konkatenowane są puste komórki
                    $table .= '<td id="' . $j . $i . '">' . '   ' . '</td>';
                }

            }

            //Zamknięcie wierza tabeli
            $table .= '</tr>';
        }

        //Zamknięcie tabeli
        $table .= '</table>';

        $this->table = $table;
        return $this;
    }

}

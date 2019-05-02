<?php

namespace Core\memory;

use Core\eyeshot\Eyeshot;

//Klasa prezentuje użytkownikowi tablicę słów pobranych z bazy
//Wykorzystuje ten sam konstruktor i przeciąża metodę genetateTable
//Różnica polega na tym, że w tej klasie tablica nie ma pustuch komórek, tak jak w przypadku klasy Eyeshot

class Memory extends Eyeshot
{
    public function generateTable()
    {
         //Początek pierwszego wiersza tabeli
         $table = "<table id = \"tabela\" class = \"text-center\">";

            //Pętla zewnętrzna iteruje po wierszach.
             for($j = 0; $j < $this -> size; $j++) 
            {
                $table .= "<tr>";
                //Pętla wewnętrzna iteruje po komórkach wewnątrz danego wiersza (wypełnia je słowami)
                for($i = 0; $i < $this -> size ; $i++)
                { 
                    //Pobieranie jednego rekordu
                    $word = mysqli_fetch_array($this -> words);

                    //Doklejanie kolejnych komórek wypełnionych słowami
                    $table .='<td class="slowa-pamiec-td text-center" id="a-'.$j.'a-'.$i.'">'.$word['slowa'] . '</td>';
                }

                //Zamknięcie ostatniego wiersza 
                $table .= "</tr>";
            }

            $table .= "</table>";

            $this -> table = $table;
            return $this;
    }
}
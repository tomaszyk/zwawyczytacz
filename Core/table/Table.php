<?php
namespace Core\table;

//Klasa tworzy tablicę odpowiedniego rozmiaru wypełnioną inputami do pobrania wartości od użytkownika
class Table
{
    private $table;

    public function __construct($size)
    {
        $table = "<table>";

        for ($j = 0; $j < $size; $j++) {
            $table .= "<tr>";

            for ($i = 0; $i < $size; $i++) {
                //Zawartośc komórek to pola input
                $table .= '<td><input type="text" id="b-' . $j . 'b-' . $i . '" size="10"></td>';
            }

            $table .= "</tr>";
        }

        $table .= "</table>";

        $this->table = $table;
    }

    public function __destruct()
    {
        $this->table = '';
    }

    public function getTable()
    {
        return $this->table;
    }

}

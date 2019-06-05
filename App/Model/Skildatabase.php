<?php

namespace App\Model;

use Core\Model;

//Klasa dziedziczy połączenie z bazą danych z klasy Model
//Zawiera funkcje, któe pobierają odpowiednie bane z bazy danych lub je zapisują
class Skildatabase extends Model
{
    public static function getAll()
    {
        $db_connect = parent::dbConnect();

        return $slowa = $db_connect->query("SELECT * FROM slowa");
    }

    public static function getWords($number)
    {
        $db_connect = parent::dbConnect();

        //Pobieranie słów z bazy danych w odpowiedniej ilości
        return $slowa = $db_connect->query("SELECT slowa FROM slowa ORDER BY RAND() LIMIT $number");

    }

    public static function getText($login)
    {
        $db_connect = parent::dbConnect();

        $ktoryTekst = $db_connect->query("SELECT ktoryTekst FROM uzytkownicy WHERE login = '$login'");

        $textNumber = mysqli_fetch_array($ktoryTekst);

        $textNumber['ktoryTekst']++;

        $_SESSION['ktoryTekst'] = $textNumber['ktoryTekst'];

        return $text = $db_connect->query("SELECT * FROM teksty WHERE id = '" . $_SESSION['ktoryTekst'] . "'");
    }

    public static function getQuestions()
    {
        $db_connect = parent::dbConnect();

        return $questions = $db_connect->query("SELECT pytanie, odpA, odpB, odpC, poprawna FROM pytania");
    }

    public static function saveResults($velocity, $understanding, $login)
    {
        $db_connect = parent::dbConnect();

        $db_connect->query("UPDATE uzytkownicy SET tempo ='$velocity', zrozumienie = '$understanding', ktoryTekst = '" . $_SESSION['ktoryTekst'] . "' WHERE login = '$login'");
    }

    public static function checkEmail($email)
    {
        $db_connect = parent::dbConnect();

        return $result = $db_connect->query("SELECT email FROM uzytkownicy WHERE email = '$email'");
    }

    public static function insertUser($login, $email, $haslo_md5)
    {
        $db_connect = parent::dbConnect();

        $db_connect->query("INSERT INTO uzytkownicy VALUES (NULL,'$login','$email','$haslo_md5',0,0,0)");
    }

    public static function checkLogin($login)
    {
        $db_connect = parent::dbConnect();

        $login = mysqli_real_escape_string($db_connect, $login);

        return $resultLog = $db_connect->query("SELECT login FROM uzytkownicy WHERE login = '$login'");
    }

    public static function checkLoginAndPassword($login, $password)
    {
        $db_connect = parent::dbConnect();

        $login = mysqli_real_escape_string($db_connect, $login);
        $password = mysqli_real_escape_string($db_connect, $password);

        return $zapytanie = $db_connect->query("SELECT * FROM uzytkownicy WHERE login = '$login' AND haslo = '$password'");
    }

    public static function getResults($login)
    {
        $db_connect = parent::dbConnect();

        $login = mysqli_real_escape_string($db_connect, $login);

        return $results = $db_connect->query("SELECT tempo, zrozumienie FROM uzytkownicy WHERE login = '$login'");
    }

    public static function updatePassword($email, $password)
    {
        $db_connect = parent::dbConnect();

        $db_connect->query("UPDATE uzytkownicy SET haslo='$password' WHERE email='$email'");
    }

}

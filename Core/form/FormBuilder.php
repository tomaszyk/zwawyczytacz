<?php

namespace Core\form;

use App\Model\Skildatabase;
use Core\form\Form;

//Klasa pomaga tworzyć obiekty klasy Form
class FormBuilder extends Form
{
    //przesłonięcie konstruktora z klasy Form
    public function __construct()
    {

    }

    //Testy dla loginu
    public function addLogin($login)
    {
        if (preg_match('/^[a-zA-Z0-9]+$/', $login)) {
            //Sprawdzenie czy podany login istnieje już w bazie
            $resultLog = Skildatabase::checkLogin($login);
        } else {
            $loginNiewlasciewZnaki = 'Login może zawierać tylko duże i małe litery oraz cyfry';

            $this->wszystkoOK = false;
            $this->loginNiewlasciweZnaki = $loginNiewlasciewZnaki;
            return $this;
        }

        if ($resultLog->num_rows > 0) {
            $loginWBazie = 'Podany login istnieje w bazie';

            $this->wszystkoOK = false;
            $this->loginWBazie = $loginWBazie;
            return $this;
        }

        //Sprawdzenie czy login jest odpowiedniej długości
        if ((strlen($login) < 3 || (strlen($login) > 15))) {
            $loginNiewlasciwaDlugosc = 'Login musi posiadać od 3 do 15 znaków';

            $this->wszystkoOK = false;
            $this->loginNiewlasciwaDlugosc = $loginNiewlasciwaDlugosc;
            return $this;
        }

        $this->login = $login;
        return $this;
    }

    public function getLoginWBazie()
    {
        return $this->loginWBazie;
    }

    public function getLoginNiewlasciwaDlugosc()
    {
        return $this->loginNiewlasciwaDlugosc;
    }

    public function addEmail($email)
    {

        //Sprawdzenie czy email istnieje już w bazie
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = Skildatabase::checkEmail($email);

            if ($result->num_rows > 0) {
                $emailWBazie = 'Podany adres istnieje w bazie';

                $this->wszystkoOK = false;
                $this->emailWBazie = $emailWBazie;
                return $this;
            }
        }

        //Sprawdzenie czy email nie zawiera niedozwolonych znaków
        $emailS = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (filter_var($emailS, FILTER_VALIDATE_EMAIL) == false || ($email != $emailS)) {
            $emailZNiewlasciwymiZnakami = 'Podaj poprawny email';

            $this->wszystkoOK = false;
            $this->emailZNiewlasciwymiZnakami = $emailZNiewlasciwymiZnakami;
            return $this;
        }

        $this->email = $email;
        return $this;

    }

    public function addLoginAndPassword($login, $password)
    {
        // Pobieranie z bazy rekordu o zadanym loginie i zaszyfrowanym haśle
        $zapytanie = Skildatabase::checkLoginAndPassword(htmlspecialchars($login), md5(htmlspecialchars($password)));

        //Sprawdzenie czy w bazie był tylko jeden rekord, tzn jeden użytkownik o zadanym loginie i haśle
        if ($zapytanie->num_rows == 1) {
            $this->wszystkoOK = true;
            return $this;
        } else {
            $bledneDaneLogowania = 'Błędne dane logowania';
            $this->bledneDaneLogowania = $bledneDaneLogowania;
            $this->wszystkoOK = false;
            return $this;
        }
    }

    public function getBledneDaneLogowania()
    {
        return $this->bledneDaneLogowania;
    }

    public function addPassword($password)
    {
        if (!preg_match('/^[a-zA-Z0-9]+$/', $password)) {
            $hasloNiewlasciweZnaki = 'Hasło może zawierać tylko małe i duże litery oraz cyfry';

            $this->wszystkoOK = false;
            $this->hasloNiewlasciweZnaki = $hasloNiewlasciweZnaki;
            return $this;
        }
        //Sprawdzenie czy haslo jest odpowiedniej długości
        if (strlen($password) < 8 || strlen($password) > 20) {
            $hasloNiewlasciwaDlugosc = 'Hasło musi posiadać od 8 do 20 znaków';

            $this->wszystkoOK = false;
            $this->hasloNiewlasciwaDlugosc = $hasloNiewlasciwaDlugosc;
            return $this;
        }

        $this->password = $password;
        return $this;
    }

    //Sprawdzenie cz hasła w obu polach są jednakowe
    public function addReapetedPassword($reapetedPassword)
    {

        if ($this->password != $reapetedPassword) {
            $hasloInneWDrugimPolu = 'Hasła w obu polach muszą być identyczne';

            $this->wszystkoOK = false;
            $this->hasloInneWDrugimPolu = $hasloInneWDrugimPolu;
            return $this;
        }

        //Szyfrowanie hasła
        $haslo_md5 = md5($this->password);
        $this->password = $haslo_md5;
        return $this;
    }

    //Sprawdzenie czy użytkownik zapoznał się z regulaminem
    public function addRegulations($regulations)
    {

        if (!$regulations) {
            $regulaminBrakAkceptacji = 'Zaakceptuj regulamin';

            $this->wszystkoOK = false;
            $this->regulaminBrakAkceptacji = $regulaminBrakAkceptacji;
            return $this;
        }

        $this->regulations = $regulations;
        return $this;
    }

    public function getRegulaminBrakAkceptacji()
    {
        return $this->regulaminBrakAkceptacji;
    }

    public function addSizeOfTable($sizeOfTable)
    {
        $this->sizeOfTable = $sizeOfTable;
        return $this;
    }

    //Testy dla pliku
    public function addFile($key)
    {
        //Sprawdzenie czy wszystko przebiegło prawidłowo
        if ($_FILES[$key]['error'] != 0) {
            $this->error = "Prześlij plik na serwer";
            return $this;
        }

        //Sprawdzenie czy plik ma rozszerzenie txt
        elseif ($_FILES[$key]['type'] !== "text/plain") {
            $this->error = "Plik musi mieć rozszerzenie.txt";
            return $this;
        }

        $this->file = $_FILES[$key];
        return $this;
    }

    public function addSizeOfEyeshot($sizeOfEyeshot)
    {
        $this->sizeOfEyeshot = $sizeOfEyeshot;
        return $this;
    }

    public function addTimeOfRead($timeOfRead)
    {
        $this->timeOfRead = $timeOfRead;
        return $this;
    }

    //Tworzenie obiektu Form i przekazanie w parametrze obiektu FormBulider z ustalonymi wartościami
    //Konstruktor w klasie Form pobiera odpowiednie wartości i przypisuje do obiektu Form
    public function buildForm()
    {
        return new Form($this);
    }
}

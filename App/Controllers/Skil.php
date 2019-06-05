<?php

namespace App\Controllers;

use App\Model\Skildatabase;
use Core\Controller;
use Core\eyeshot\Eyeshot;
use Core\form\FormBuilder;
use Core\memory\Memory;
use Core\reader\Reader;
use Core\results\Results;
use Core\table\Table;
use Core\text\Text;
use Core\View;

//Kontroler prezentuje użytkownikowi zestaw ćwiczeń, które umożliwią szybsze czytanie
class Skil extends Controller
{
    //Sprawdzenie czy użytkownik jest zalogowany
    public function before()
    {
        //Jezeli użytkownik jest niezalogowany, przeglądarka nie wczyta strony.
        //Uzytkownik zostanie przekierowany do formularza logowania

        if (!@$this -> session->getVariable('userObject')) {
            header('Location:http://' . $_SERVER['HTTP_HOST'] . '/welcome/login');
            return false;
        }
    }

    //Akcja od rozgrzewki
    public function mathGenAction() {

        //Wczytanie pliku widoku
        View::render('Skils/mathGenview.php');

    }

    //Akcja od pola widzenia. Służy do powiększenia pola widzenia
    //Generuje tablicę o określonym rozmiarze $size z zewnętrznymi komórkami wypełnionymi słowami
    public function eyeshotAction()
    {
        if (isset($_POST['wartosc'])) {
            //Pobranie rozmiaru od użytkownika
            $form = (new FormBuilder())
                ->addsizeOfEyeshot($_POST['wartosc'])
                ->buildForm();
            //Obiekt generuje odpowiednią tablicę
            $eyeshot = new Eyeshot($form->getSizeOfEyeshot());
            $eyeshot->generateTable();

            //Wczytanie pliku widoku z tablicą słów
            View::render('Skils/eyeshotview.php', ['table' => @$eyeshot->getTable()]);
            return true;
        }

        //Wczytanie pliku widoku
        View::render('Skils/eyeshotview.php');

    }

    // Akcja od ćwiczeń pamięci. Służy do rozwoju pamięci krótkotrwałej
    //Generuje tablicę o okreslonym rozmiarze $_POST['wartosc'] wypełnioną słowami
    public function memoryAction()
    {
        if (isset($_POST['wartosc'])) {
            //Pobranie rozmiaru od użytkownika
            $form = (new FormBuilder())
                ->addSizeOfTable($_POST['wartosc'])
                ->buildForm();
            //Przypisanie go do sesji
            @$this->session->setVariable('size', $_POST['wartosc']);

            //Wygenerowanie tablicy
            $memory = new Memory($form->getSizeOfTable());
            $memory->generateTable();

            //Wczytanie pliku widoku z tablicą słów
            View::render('Skils/memoryview.php', ['table' => $memory->getTable(), 'size' => $form->getSizeOfTable()]);
            return true;
        }

        //Wczytanie pliku widoku
        View::render('Skils/memoryview.php');

    }

    //Akcja generująca odpowiedz na żądanie ajax
    //Do pliku widoku wysyłana jest tablica z polami tekstowymi o takich samych rozmiarach
    //jak tablica ze słowami w akcji memoryAction
    //Użytkownik uzupełnia pola i sprawdza ile zapamiętał
    public function changeAction()
    {
        $table = new Table(@$this->session->getVariable('size'));
        echo $table->getTable();
        unset($table);
    }

    //Akcja od przyspieszania czytania
    public function readerAction()
    {
        //Skrypt otwiera plik przesłany przez użytkownika i czyta po jednym znaku. Następnie dokleja go do zmiennej $tekst
        //Jeżeli przeczytanym znakiem będzie spacja (koniec słowa), następuje sprawdzenie czy ilość słów podanych w formularzu
        //przez użytkownika odpowiada ilości spacji (ilości słów) w zmiennej $tekst(jedna spacja to jedno słowo, dwie spacje to dwa słowa itd.)
        //Jeżeli równość jest prawdziwa tworzony jest nowy element span z zawartością zmiennej $tekst

        if (isset($_POST['zatwierdz'])) {
            //Pobranie pliku, ilości słów oraz czasu potrzebnego na odczytanie
            $form = (new FormBuilder())
                ->addFile('plik')
                ->addSizeOfEyeshot($_POST['ileSlow'])
                ->addTimeOfRead($_POST['ileCzasu'])
                ->buildForm();

            //Obiek przetwarza plik
            $reader = new Reader($form->getFile());
            $reader->generateText($form->getsizeOfEyeshot());
        }

        if (isset($reader)) {
            //Przekazanie do pliku widoku całego tekstu podzielonego na elementy span
            //z określoną ilością słów
            View::render('Skils/readerview.php', ['calyTekst' => @$reader->getWholeText(), 'error' => $form->getError()]);
        } else {
            View::render('Skils/readerview.php');
        }
    }

    //Akcja od pomiaru prędkości i zrozumienia czytanego tekstu
    public function testAction()
    {
        View::render('Skils/testview.php');
    }

    //Akcja pobiera z bazy tekst i liczbę słów i przekazuje je do widoku (żądanie ajax)
    public function textAction()
    {
        $text = new Text($this->session->getVariable('userObject')->getLogin());
        $text->getText();
        $this->session->setVariable('text', $text);
    }

    //Akcja podmienia tekst z textAction na pytania do tekstu (żądanie ajax)
    //i zapisuje prędkość do zmiennej sesyjnej
    public function questionsAction()
    {
        $this->session->setVariable('velocity', $_GET['predkosc']);
        $this->session->getVariable('text')->getQuestions();
    }

    //Akcja sprawdza czy odpowiedzi na pytania udzielone przez użytkownika są poprawne
    public function checkAnswersAction()
    {
        $velocity = $this->session->getVariable('velocity');
        $text = $this->session->getVariable('text');
        $text->checkAnswers();

        //Zapis prędkości czytania i zrozumienia do bazy
        Skildatabase::saveResults($velocity, $text->getPoints(), $this->session->getVariable('userObject')->getLogin());

        //Prezentacja prędkości i zrozumienia użytkownikowi
        View::render('Skils/answersview.php', ['punkt' => $text->getPoints(), 'predkosc' => $velocity]);

    }

    //Akcja od pokazywania użytkownikowi jego ostatniego wyniku
    public function resultsAction()
    {
        //Obiekt pobiera dane z bazy i prezentuje użytkownikowi
        $result = new Results($this->session->getVariable('userObject')->getLogin());
        $result->showResults();

        //Plik widoku z wartością prędkości i zrozumienia
        View::render('Skils/resultsview.php', ['velocity' => @$result->getVelocity(), 'understanding' => @$result->getUnderstanding()]);
    }
}

<?php

namespace Core\form;

use Core\form\FormBuilder;

//Klasa Form towrzy formularze używane w kilku miejscach w aplikacji
//Wykorzystuje  klasę FormBuilder, poszczególne włąściwości obiektu ustalane są w różnych miejscach aplikacji
class Form 
{
    protected $login = '';
    protected $email = '';
    protected $password = '';
    protected $regulations = NULL;
    protected $sizeOfTable = '';
    protected $file = '';
    protected $sizeOfEyeshot = '';
    protected $timeOfRead = '';
    protected $wszystkoOK = true;
    //Błędy
    protected $loginWBazie = '';
    protected $loginNiewlasciwaDlugosc = '';
    protected $loginNiewlasciweZnaki = '';
    protected $loginZPolskimiZnakami = '';
    protected $emailWBazie = '';
    protected $emailZNiewlasciwymiZnakami = '';
    protected $hasloNiewlasciwaDlugosc = '';
    protected $hasloNiewlasciweZnaki = '';
    protected $hasloInneWDrugimPolu = '';
    protected $regulaminBrakAkceptacji = '';
    protected $bledneDaneLogowania = '';
    protected $error = '';

    //Konstruktor pobiera obiekt klasy FormBuilder i wartości jego włąsciwości są przypisane własciwościom obiektu Form
    public function __construct(FormBuilder $formBuilder)
    {
        $this -> login = $formBuilder -> getLogin();
        $this -> email = $formBuilder -> getEmail();
        $this -> password = $formBuilder -> getPassword();
        $this -> regulations = $formBuilder -> getRegulations();
        $this -> sizeOfTable = $formBuilder -> getSizeOfTable();
        $this -> file = $formBuilder -> getFile();
        $this -> sizeOfEyeshot = $formBuilder -> getSizeOfEyeshot();
        $this -> timeOfRead = $formBuilder -> getTimeOfRead();
        $this -> wszystkoOK = $formBuilder -> getWszystkoOK();
        //Błędy
        $this -> loginWBazie = $formBuilder -> getLoginWBazie();
        $this -> loginNiewlasciwaDlugosc = $formBuilder -> getLoginNiewlasciwaDlugosc();
        $this -> loginNiewlasciweZnaki = $formBuilder -> getLoginNiewlasciweZnaki();
        $this -> emailWBazie = $formBuilder -> getEmailWBazie();
        $this -> emailZNiewlasciwymiZnakami = $formBuilder -> getEmailZNiewlasciwymiZnakami();
        $this -> hasloNiewlasciwaDlugosc = $formBuilder -> getHasloNiewlasciwaDlugosc();
        $this -> hasloNiewlasciweZnaki = $formBuilder -> getHasloNiewlasciweZnaki();
        $this -> hasloInneWDrugimPolu = $formBuilder -> getHasloInneWDrugimPolu();
        $this -> regulaminBrakAkceptacji = $formBuilder -> getRegulaminBrakAkceptacji();
        $this -> bledneDaneLogowania = $formBuilder -> getBledneDaneLogowania();
        $this -> error = $formBuilder -> getError();
    }

    //Getery do poszczególnych właściwości
    public function getLogin()
    {
        return $this -> login;
    }

    public function getLoginWBazie()
    {
        return $this -> loginWBazie;
    }

    public function getLoginNiewlasciwaDlugosc()
    {
        return $this -> loginNiewlasciwaDlugosc;
    }

    public function getLoginNiewlasciweZnaki()
    {
        return $this -> loginNiewlasciweZnaki;
    }

    public function getEmail()
    {
        return $this -> email;
    }

    public function getEmailWBazie()
    {
        return $this -> emailWBazie;
    }

    public function getEmailZNiewlasciwymiZnakami()
    {
        return $this -> emailZNiewlasciwymiZnakami;
    }

    public function getPassword()
    {
        return $this -> password;
    }

    public function getHasloNiewlasciwaDlugosc()
    {
        return $this -> hasloNiewlasciwaDlugosc;
    }

    public function getHasloNiewlasciweZnaki()
    {
        return $this -> hasloNiewlasciweZnaki;
    }
    
    public function getHasloInneWDrugimPolu()
    {
        return $this -> hasloInneWDrugimPolu;
    }

    public function getBledneDaneLogowania()
    {
        return $this -> bledneDaneLogowania;
    }
  
    public function getRegulations()
    {
        return $this -> regulations;
    }

    public function getRegulaminBrakAkceptacji()
    {
        return $this -> regulaminBrakAkceptacji;
    }

    public function getSizeOfTable()
    {
        return $this -> sizeOfTable;
    }

    public function getFile()
    {
        return $this -> file;
    }

    public function getsizeOfEyeshot()
    {
        return $this -> sizeOfEyeshot;
    }

    public function getTimeOfRead()
    {
        return $this -> timeOfRead;
    }

    public function getWszystkoOk()
    {
        return $this -> wszystkoOK;
    }

    public function getError()
    {
        return $this -> error;
    }

}



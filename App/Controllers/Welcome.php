<?php

namespace App\Controllers;

use Core\Controller;
use App\Model\Skildatabase;
use Core\View;
use Core\form\FormBuilder;
use Core\user\UserBuilder;
use App\Config;


//Kontroler, który odpowiada za obługę użytkowników niezalogowanych
class Welcome extends Controller
{
    //Akcja sprawdza czy użytkownik jest zalogowany
    //jezeli jest pokazuje się menu z ćwiczeniami do wyboru
    //jeżeli nie pokazuje się menu z opcją logowania i rejestracji
    public function welcomeAction()
    {
        if(@$this -> session -> getVariable('userObject'))
        {
            View::render('Welcome/welcomeview.php', ['menu' => '../App/Views/Skils/base/menu.php']);
        }
        else
        {
            View::render('Welcome/welcomeview.php', ['menu' => '../App/Views/Welcome/base/menu.php']);
        }
        
    }

    //Akcja od rejestracji nowego użytkownika
    public function registrationAction()
    {
        if(isset($_POST['rejestruje']))
        {
            //Formularz
            $form = (new FormBuilder())
                    -> addLogin($_POST['login'])
                    -> addEmail($_POST['email'])
                    -> addPassword($_POST['haslo'])
                    -> addReapetedPassword($_POST['hasloPowtorzone'])
                    -> addRegulations($_POST['regulamin'])
                    -> buildForm();
            //Jeżeli wszystkie testy wypadły pomyślnie (klasa FormBulider), użytkownik zostaje zapisany do bazy 
            //oraz przekierowany na stronę powitalną
            if(@$form -> getWszystkoOK() == true)
            { 
                Skildatabase::insertUser($form -> getLogin(), $form -> getEmail(), $form -> getPassword());

                View::render('Welcome/mainview.php', ['login' => @$form -> getLogin()]);
                return false;
            }
            else
            {
                //Jeżeli testy sie nie powiodły, użytkownik pozostaje na stronie z formularzem rejestracji oraz
                //informacją o błedach
                View::render('Welcome/registrationview.php',
                 ['loginWBazie' => @$form -> getLoginWBazie(),
                  'loginNiewlasciwaDlugosc' => @$form -> getLoginNiewlasciwaDlugosc(),
                  'loginNiewlasciweZnaki' => @$form -> getLoginNiewlasciweZnaki(),
                  'emailWBazie' => @$form -> getEmailWBazie(),
                   'emailZNiewlasciwymiZnakami' => @$form -> getEmailZNiewlasciwymiZnakami(),
                    'hasloNiewlasciwaDlugosc' => @$form -> getHasloNiewlasciwaDlugosc(),
                    'hasloNiewlasciweZnaki' => @$form -> getHasloNiewlasciweZnaki(),
                     'hasloInneWDrugimPolu' => @$form -> getHasloInneWDrugimPolu(),
                      'regulaminBrakAkceptacji' => @$form -> getRegulaminBrakAkceptacji()
                      ]);
                return false;

            }
        }
        //Gdy użytkownik jeszcze nie wysłał formularza
        View::render('Welcome/registrationview.php');
    
    }

    //Akcja logowania
    public function loginAction()
    {
        //Jeżeli formularz został przesłany
        if(isset($_POST['zaloguj']))
        {
            //Formularz
            $form = (new FormBuilder())
                    -> addLoginAndPassword($_POST['login'], $_POST['haslo'])
                    -> buildForm();
            //Jeżeli dane są poprawne
            if(@$form -> getWszystkoOK() == true)
            {
                //Tworzony jest użytkownik
                $user = (new UserBuilder())
                        -> setLogin($_POST['login'])
                        -> setPassword(md5($_POST['haslo']))
                        -> buildUser();

                //Przypisanie użytkownika do sesji
                //W kontrolerze Skil z ćwiczeniami funkcja before() sprawdza czy użykownik jest zaloowany
                //Jeżeli nie pokaże się strona logowania zamiast strona z ćwiczeniem
                $this -> session -> setVariable('userObject', $user);
                
                //Jeżeli dane logowania są poprawne
	            View::render('Skils/insideview.php', ['login' => $this -> session -> getVariable('userObject') -> getLogin()]);
            }
            else 
            {
                //Jeżeli są błędne
	            View::render('Welcome/loginview.php', ['komunikat' => @$form -> getBledneDaneLogowania()]);
            }

        }
        else
        {
            //Sprawdzenie czy użytkownik się nie wylogował
            if((isset($_GET['akcja'])) && ($_GET['akcja']=='wyloguj'))
            {
                $this -> session -> destroy();
            
                View::render('Welcome/loginview.php');
                
            }
            else
            {
                View::render('Welcome/loginview.php');
            }
            
        }
     
    }

    //Akcja ustala nowe hasło
    public function forgotAction()
    {
        if(isset($_POST['forgot']))
        {
            $transport = (new \Swift_SmtpTransport(Config::M_TRANSPORT, Config::M_HOST))
                ->setUsername(Config::M_USER)
                ->setPassword(Config::M_PASSWORD);

            
            $mailer = new \Swift_Mailer($transport);

            //Uzytkownik dostaje maila z linkiem do ustalenia nowego hasła
            $message = (new \Swift_Message('Zmiana hasła'))
                ->setFrom([Config::M_USER . '@gmail.com' => 'Żwawy Czytacz'])
                ->setTo($_POST['email'])
                ->addPart('<p>Aby zmienić hasło, kliknij w link poniżej. <a href = "http://'. $_SERVER['HTTP_HOST'].'/welcome/changePassword?email=' . $_POST['email'] . '">Link</a></p>', 'text/html');
            
            $result = $mailer->send($message);

            View::render('Welcome/infoview.php');
            return true;
        }

        View::render('Welcome/forgotview.php');
    }

    //Akcja zmiany hasłą
    public function changePasswordAction()
    {
        if(isset($_POST['zmiana']))
        {
            //Pobranie dwukrotne hasła
            $form = (new FormBuilder())
                    -> addPassword($_POST['haslo'])
                    -> addReapetedPassword($_POST['hasloPowtorzone'])
                    -> buildForm();
            //Jeżeli hasło ma odpowiednią długość i oba hasła są identyczne
            if($form -> getWszystkoOK() == true)
            {
                //Zostają zapisane do bazy
                Skildatabase::updatePassword($_POST['email'], md5($_POST['haslo']));

                View::render('Welcome/loginview.php');
                return true;
            }
            else
            {
                //Jeżeli nie, pojawia się komunikat
                View::render('Welcome/changePasswordview.php', ['hasloInneWDrugimPolu' => @$form -> getHasloInneWDrugimPolu(), 'hasloNiewlasciwaDlugosc' => @$form -> getHasloNiewlasciwaDlugosc()] );
                return true;
            }
        
        }
        View::render('Welcome/changePasswordview.php', ['email' => $_GET['email']]);
    }
}
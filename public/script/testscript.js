
//Funkcja wysyła żądanie ajax do akcji text kontrolera i pobiera tekst, który prezentuje użytkownikowi 
//w elemencie div o id = tekst w pliku testview.php
function pokazTekst()
    {
        var zapytanie = "";

        zapytanie = new XMLHttpRequest();

        zapytanie.onreadystatechange=function()
            {
                if (zapytanie.readyState == 4 && zapytanie.status == 200) 
                {
                document.getElementById("tekst").innerHTML = zapytanie.responseText;
                }
            }

        zapytanie.open("GET", "text", true);

        zapytanie.send();
	
	
    }

//Funkcja przelicza datę początku czytania tekstu przez użytkownika na sekundy i zapisuje wartość do div o id = startCzas
function startCzas()
    {
            start = new Date();

            godzinaS = start.getHours();

            minutaS = start.getMinutes();

            sekundaS = start.getSeconds();
        
            document.getElementById("startCzas").innerHTML = godzinaS * 3600 + minutaS * 60 + sekundaS;

    }


//Funkcja, która wywołuje pokazanie tekstu użytkownikowi i zapisuje czas 
function uruchomZegar()
    {
        pokazTekst();

        startCzas();
    }

   

//Funkcja, która po zakończonym czytaniu tekstu pokaże użytkownikowi pytania w divie 0 id = pytania
// oraz przesyła do akcji questions podaną w argumencie wartość 
function pokazPytania(variable)
    {
        var zapytanie = "";

        zapytanie = new XMLHttpRequest();

        zapytanie.onreadystatechange=function()
        {
            if (zapytanie.readyState == 4 && zapytanie.status == 200)
            {
                document.getElementById("pytania").innerHTML = zapytanie.responseText;
            }
        } 
        zapytanie.open("GET", "questions?predkosc=" + variable, true);

        zapytanie.send();
        
    }
    
//Funkcja, która przelicza datę zakończenia czytania na sekundy i zapisuje wartośc do div o id = koniecCzas
function koniecCzas()
    {
        var koniec = new Date();

        godzinaK = koniec.getHours();

        minutaK = koniec.getMinutes();

        sekundaK = koniec.getSeconds();
    
        document.getElementById("koniecCzas").innerHTML = godzinaK * 3600 + minutaK * 60 + sekundaK;
    }

//Funkcja oblicza prędkość czytania 
//(dzieli ilość słów w teksie przez czas czytania wyrażony w sekundach i mnoży porzez 60, prędkość w słowach na minutę)
//Wartość prędkości jest przesyłana do akcji questions metodą get   
function liczPredkosc()
    {    
        var a = parseInt(document.getElementById("startCzas").innerHTML);

        var b = parseInt(document.getElementById("koniecCzas").innerHTML);

        var c = b - a;

        var ileSlow = parseInt(document.getElementById("ileSlow").innerHTML);

        var v = parseInt((ileSlow / c) * 60);

        return v; 
    }
    
//Funkcja pokazuje pytania do tekstu i ukrywa tekst oraz oblcza prędkość czytania
function zatrzymajZegar()
    {
        koniecCzas();

        var predkosc = liczPredkosc();

        pokazPytania(predkosc);
    }
  
//Zdarzeniami onclick na odpowiednich przyciskach użytkownik uruchamia odpowiednie funkcje
window.onload = function()
    {
        document.getElementById('start').onclick = uruchomZegar;

        document.getElementById('stop').onclick = zatrzymajZegar;

    }
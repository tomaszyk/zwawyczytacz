var ileSlow = document.getElementById('ileSlow').innerHTML;


//Skrypt, który obsługuje zdarzenie onclick na przycisku o id = 'zamiana', tj. ukrywanie tabeli ze słowami (id = 'tabela')
//Oraz wypełnienie kontenera <div id=\"kwadrat\"></div>
$(document).ready(function()
                    {
                        setTimeout(function()
                        { 
                            $("#tabela").hide(); 
                            zamiana(); 
                        }, 2000);
                        
                        // $("#zamiana").click(function()
                        //                         { 
                        //                             $("#tabela").hide(); 
                        //                             zamiana(); 
                        //                         }
                        //                     );
                    });



    //Funkcja pobiera wartości z tablicy słów (id = 'tablica'). 
    //Słowa, które zostały pobrane z bazy danych i zapisuje je do tablica1
    function czytaj1()
    { 
      var tablica1 = new Array(ileSlow);
        
       for(var i = 0; i < ileSlow; i++)
       {
            tablica1[i] = new Array(ileSlow);
            
               for(var j = 0; j < ileSlow; j++)
               {
                    tablica1[i][j] = document.getElementById("a-" + i + "a-" + j).innerHTML;
               }
        } 
        
        return tablica1; 
    }
    
    //Funkcja pobiera wartości z tablicy (id = 'kwadrat').
    //Słowa, które wpisał użytkownik i zapisuje je do tablica2
    function czytaj2()
    {
       var tablica2 = new Array(ileSlow);
        
        for(var i=0; i< ileSlow; i++)
        {
             tablica2[i] = new Array(ileSlow);
            
                for(var j = 0; j < ileSlow; j++)
                {
                    tablica2[i][j] = document.getElementById("b-" + i + "b-" + j).value;
                } 
           
        } 
           return tablica2;
    }
            
    //Funkcja porównuje wartości w dwóch tablicach.
    //Otwiera nowe okno z wygenerowaną tablicą słów.
    //Kolorem zielonym (#006D6D) informuje, które słowa były poprawne, a czerwonym (#FF1F26), które nie
    function sprawdz(a1, a2)
    {
		 var newWindow = window.open("", "MsgWindow", "width=300, height=300");
         newWindow.document.write("<center><h3>Spisałeś się następująco:</h3><table>");
          
         for(var i = 0; i < ileSlow; i++)
         {
            newWindow.document.write("<tr>");
        
            for(var j = 0; j < ileSlow; j++)
            {
                if(a1[i][j] == a2[i][j])
                {
                    newWindow.document.write('<td align = "center" style = "width: 100px; height: 24px; border: 1px solid #F2F2F2; color: #006D6D; font-weight: bold; font-family: Helvetica, Arial, sans-serif; font-size: 15px;"><p>' + a1[i][j] + '</p></td>');
                }
                else
                {
                    newWindow.document.write('<td align = "center" style = "width: 100px; height: 24px; border: 1px solid #F2F2F2; color: #FF1F26; font-weight: bold; font-family: Helvetica, Arial, sans-serif; font-size: 15px;"><p>' + a1[i][j] + '</p></td>');
                }
            }
                newWindow.document.write("</tr>");
        }
        newWindow.document.write("</table>");
        
        newWindow.document.write('<br><input type="button" style="padding: 15px 30px; font-family: Helvetica, Arial, sans-serif; border-radius: 300px; font-weight: bold; text-transform: uppercase; color: #ffffff; background-color: #006D6D; border: 1px solid #006D6D !important; display: inline-block; font-size: 14px;" onclick="self.close()" value="Wróć"></center>');
    }

//Zdarzenie onclick wywołuje funkcje sprawdz(), której argumentami są dwie tablice.
//Elementami pierwszej tablicy są słowa pobrane z bazy danych, które użytkownik miał zapamiętać
//Elementami drugiej tablicy są słowa, które użytkownik wpisał
//Funkcja sprawdz() pokaże użytkownikowi ile słów wpisał poprawnie (kolor zielony)
window.onload = function()
                    {
                        document.getElementById("sprawdz").onclick = function()
                        {
                            sprawdz(czytaj1(), czytaj2());
                        }
                    }

    function zamiana()
    {
        var zapytanie = "";
        zapytanie = new XMLHttpRequest();
        zapytanie.onreadystatechange=function()
        {
            if (zapytanie.readyState == 4 && zapytanie.status == 200)
            {
                document.getElementById("kwadrat").innerHTML=zapytanie.responseText;
            }
        }
        zapytanie.open("GET", "change", true);
        zapytanie.send();
    }
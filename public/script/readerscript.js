


 var ileCzasu = document.getElementById('ileCzasu').innerHTML;

 //Funkcja, która dwóm sąsiednim elementom span (id = 'tekst') ustala kolor tła, pierwszemu na biały (#FFFFFF), drugiemu na zółty (#FCFC00)
 function podswietl()
 { 							
     $i = $("#i").text();
     $("#a" + $i).css("background-color", "#FFFFFF");
     $i++;
     $("#a" + $i).css("background-color", "#FCFC00");    
     $("#i").text($i)
 } 
 
 //Funkcja, która uruchamia poruszanie się zółtego podświetlenia dla kolejnych elementów span
 //Wymusza to odpowiednie tempo czytania
 function uruchom()
 {
     var myVar = setInterval(podswietl, ileCzasu);
 
     document.getElementById("myVar").innerHTML = myVar;
 
     isRunning = document.getElementById("isRunning").innerHTML;
 
     var isRunning = 1;
 
     document.getElementById("isRunning").innerHTML = isRunning;
 
 }
 
 //Funkcja, która wstrzymuje zółte podświetlenie
 function zatrzymaj()
 {
     var myVar = document.getElementById("myVar").innerHTML;
 
     clearInterval(myVar);
 
     isRunning = document.getElementById("isRunning").innerHTML;
 
     isRunning = 0;
 
     document.getElementById("isRunning").innerHTML = isRunning;
     
 }
 
 
 //Funkcja, która pozwala kliknięciem w kontener div o id = 'tekst' zatrzmać lub wznowić ruch żółtego podświetlenia
 //Zależnie od stanu poprzedniego 
 window.onload = function()
 {
     document.getElementById("start").onclick = uruchom;
 
     document.getElementById("tekst").onclick = function()
     {
         if(document.getElementById("isRunning").innerHTML == 1)
         {
             zatrzymaj();
         }
         else
         {
             uruchom();
         }
     }
 }	
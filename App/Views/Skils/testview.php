<?php include 'base/menu.php'; ?>


<div class = "row">
	<div class = "col-2"></div>
	<div class = "col-8 text-center">
                <hr>
				
		<div class="card bg-dark text-white">
		<img src="../image/bg-test.jpg" class="img-fluid">
		<div class="card-img-overlay">
			<h2 class="card-title">Test prędkości i&nbsp;zrozumienia</h2>
			<p>Po zakończonej serii ćwiczeń w tym dziale możesz sprawdzić swoje aktualne tempo czytania i poziom zrozumienia czytanego tekstu. </p>
			<a href="#task" class="badge badge-primary">PRZEJDŹ DO ZADANIA</a>
		</div>
		</div>

	</div>
	<div class = "col-2"></div>	
</div>

<div class = "row">
        <div class = "col-2"></div>
        <div class = "col-8">
                <div id="start">
                        <br><br>
                        <p id = "task">Po kliknięciu przycisku "Start" Twoim oczom ukaże się krótki tekst. Przeczytaj go ze zrozumieniem, ale staraj się to zrobić jak najszybciej. Gdy skończysz, kliknij przycisk "Stop". Następnie odpowiedz na pytania. Powodzenia!</p>
                                                        
                        <div id = "wynik"></div>	
                        <div id = "pytania">
                                <div id = "tekst"></div>
                        </div>           
                        <br><br>
                        
                        <button id = "start" class="btn btn-primary">Start</button>
                        <button id = "stop" class="btn btn-primary">Stop</button>
                        
                
                                
                        <div id = "startCzas" style = "display: none;"></div>
                        <div id = "koniecCzas" style = "display: none;"></div>                     
                </div>
        <div class = "col-2"></div>
        </div>
</div> 
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>    
<script src = "/script/testscript.js"></script>

<?php include 'base/footer.php'; ?>
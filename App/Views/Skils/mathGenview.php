<?php include 'base/menu.php'; ?>

<div class = "row">
	<div class = "col-2"></div>
	<div class = "col-8 text-center">
    	
    	<hr>
		
		<div class="card bg-dark text-white">
		<img src = "../image/bg-generator.jpg" class="img-fluid">
			<div class="card-img-overlay">
				<h2 class="card-title">Rozgrzewka</h2>
				<p class="card-text">Nasz mózg, jak każdy mięsień, przed przystapieniem do treningu powinien się rozgrzać. Poniższe ćwiczenie pobudzi Twoje szare komórki do efektywnego wykonywania dalszych zadań.</p>
				<a href="#task" class="badge badge-primary">PRZEJDŹ DO ZADANIA</a>
			</div>
			</div>

		<br><br>
		<p>Po kliknięciu przycisku "Start" Twoim oczom ukaże się proste działanie matematyczne. Oblicz, wpisz wynik i zatwierdź przyciskiem "Sprawdź". To doskonała rozgrzewka dla Twojego umysłu. Powodzenia!</p>
		
		<!-- Button wywołuje funkcję losuj() w pliku mathGenscript.js -->
		<button id = "start" class="btn btn-primary">Start</button>
		
	</div>
	<div class = "col-2"></div>	
</div>	

<br><br>


<div class = "row">
	<div class = "col-4"></div>
	<div class = "col-4 text-center">

		<!-- W tym polu pojawia się działanie do wykonania i pole do wpisania wyniku -->
		<p id="oblicz"></p>
	</div>
	<div class = "col-4"></div>
</div>

<div class = "text-center">
	<input type="submit" value="Sprawdź" id="przycisk" class="btn btn-primary">
</div>
	<br><br>

	<div id = "task" class = "text-center">

		<!-- W tym polu pojawia się liczba punktów -->
		<p id="punkt"></p>
	</div>
	<br><br><br><br><br><br><br><br><br><br>

<script src = "/script/mathGenscript.js"></script>

<?php include 'base/footer.php'; ?>    
</body>
</html>
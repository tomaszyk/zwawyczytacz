<?php include 'base/menu.php'; ?>

<div class = "row">
	<div class = "col-2"></div>
	<div class = "col-8 text-center">
		<hr>		
		<div class="card bg-dark text-white">
		<img src="../image/bg-pole.jpg" class="img-fluid">
		<div class="card-img-overlay">
			<h2 class="card-title">Pole widzenia</h2>
			<p>Nauka czytania w szkole poskutkowała tym, że czytając tekst, nasze oczy skupiają się na pojedynczych słowach i w danej chwili rejestrujemy tylko jedno słowo. Tymczasem nasze oczy są w stanie zobaczyć znacznie więcej! Poniższe ćwiczenie pomoże Ci poszerzyć pole widzenia.    </p>
			<a href="#task" class="badge badge-primary">PRZEJDŹ DO ZADANIA</a>
		</div>
		</div>

	</div>
	<div class = "col-2"></div>	
</div>
<div id = "task">
	<br>
	<br>
	<br>
</div>	

<div class = "row">
<p>Wybierz rozmiar tablicy. Obserwuj czerwony krzyżyk w środku i, nie odrywając od niego oczu, staraj się rozpoznać słowa, które pojawią się dookoła. Zwiększaj stopień trudności i poszerzaj swoje pole widzenia. Powodzenia!</p>
	<div class = "col-4"></div>
	<div class = "col-4">	
	<!-- Fromularz 			    -->
		<form action="eyeshot#task" method="post">
			<div class="form-group text-center">
			<label for="exampleFormControlSelect1">Wybierz rozmiar tablicy:</label>
			<select id="wartosc" name="wartosc" min="1" max="5">
				<option value="2">2x2</option>
				<option value="3">3x3</option>
				<option value="4">4x4</option>
				<option value="5">5x5</option>
				<option value="6">6x6</option>
				<option value="7">7x7</option>
    		</select>
			</div> 

			<script>
    			//Rozmiar tablicy zostaje zapamiętany w polu id = "wartosc"
				document.getElementById('wartosc').value = <?php echo $_POST['wartosc']; ?>;												
			</script>
			<!-- Ponowne przesłąnie danych z formularza i wygenerowanie nowej tabeli -->

		
			<div class = "text-center">
				<input type="submit" value="Zatwierdź" class="btn btn-primary">
				<input type="submit" value="Jeszcze raz" class="btn btn-primary">
			</div>
		</form>	
	</div>
	<div class = "col-4"></div>
</div>



<!-- div, w którym pojawia się tablica ze słowami -->
<div id = "kwadrat"></div>

<!-- Położenie czerwonego krzyżyka na stronie jest dostosowane do rozmiaru tablicy słów -->
<div class = "text-center">    
	<span id = "punkt" style= "color: #FF1F26; font-size: 20px; position: relative; top:<?php echo ($_POST['wartosc'] * 13) + 10; ?>px;">+</span>		
</div>	
 	<?php echo @$table; ?>
	 
	<br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include 'base/footer.php'; ?>


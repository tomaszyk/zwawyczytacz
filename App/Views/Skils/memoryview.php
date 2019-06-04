<?php include 'base/menu.php'; ?>

<div class = "row">
	<div class = "col-2"></div>
	<div class = "col-8 text-center">
        <hr>
				
		<div class="card bg-dark text-white">
		<img src="../image/bg-pamiec.jpg" class="img-fluid">
		<div class="card-img-overlay">
			<h2 class="card-title">Trening pamięci krótkotrwałej</h2>
			<p>Umiejętność szybkiego czytania na niewiele się zda, jeżeli za szybkością nie pójdzie dobre zrozumienie czytanego tekstu. To ćwiczenie pomoże Ci rozwinąć pamięć krótkotrwałą. Dzięki temu oglądane podczas czytania słowa utrzymają się w pamięci dostatecznie długo, aby umysł zdążył te słowa zrozumieć.</p>
			<a href="#task" class="badge badge-primary">PRZEJDŹ DO ZADANIA</a>
		</div>
		</div>

	</div>
	<div class = "col-2"></div>	
</div>
    
    
    <br>
    <br>
    <br>

<p id = "task" class = "text-center">Wybierz rozmiar tablicy i zatwierdź przyciskiem. Postaraj się zapamiętać wszystkie słowa. WAŻNE! Oglądane prze Ciebie słowa po chwili znikną.<br>
  Postaraj się uzupełnij puste pola odpowiednimi wyrazami w prawidłowej kolejności. Stopniowo podnoś sobie poprzeczkę, wybierając coraz większą tablicę. Powodzenia!</p>



<div class = "row">
	<div class = "col-4"></div>
	<div class = "col-4">

        <!-- Formularz -->
        <form action="memory#task" method="post">
			<div class="form-group">
            <label for="exampleFormControlSelect1">Wybierz rozmiar tablicy:</label>
            <select id="wartosc" name="wartosc">
                <option value="2">2x2</option>
                <option value="3">3x3</option>
                <option value="4">4x4</option>
                <option value="5">5x5</option>
                <option value="6">6x6</option>
                <option value="7">7x7</option>
            </select>
            </div> 


            <script>
    			//Rozmiar tablicy i zostaje zapamiętany w polu id = "wartosc"
                document.getElementById('wartosc').value = <?php echo @$size; ?>;
                
                												
			</script>
            <!-- Ponowne przesłanie danych z formularza i wygenerowanie nowej tabeli -->
            
            <div class = "text-center">
                <input id="input-zatwierdz" type="submit" value="Zatwierdź" class="btn btn-primary">
            </div>					
		</form>
    </div>
	<div class = "col-4"></div>
</div>	

    <!-- Pole przechowuje wartość, która zostanie wykorzystana w pliku memoryscript.js do wygenerowania tablic, 
    które przechowają dane wprowadzone przez użytkownika i słowa pobrane z bazy danych -->
 <div id = "ileSlow" style = "display:none"><?php echo @$size; ?></div> 
 
 
    <hr>

<!-- Tablica ze słowami z bzay danych -->
<center> 
    <div id = "tabela">
        
        <?php  echo @$table; ?>
    </div>
    
</center>
<center>

    <!-- Pole, w którym pojawi się tablica z inputami, użytkownik wypełnia je słowami, które zapamiętał -->
    <div id="kwadrat"></div>
    <br>						

    <!-- <input type="submit" value="Pamiętam" id="zamiana" class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp; -->
    <input type="submit" value="Sprawdź" id="sprawdz" class="btn btn-primary">
</center>
<br><br><br><br><br><br><br><br>


<script src = "/script/memoryscript.js"></script>
    

<?php include 'base/footer.php'; ?>
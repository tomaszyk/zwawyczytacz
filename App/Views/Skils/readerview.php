<?php include 'base/menu.php'; ?>

<div class = "row">
	<div class = "col-lg-1 col-xl-2"></div>
	<div class = "col-lg-10 col-xl-8 text-center">
		<hr>
			<div class="card bg-dark text-white">
				<img src="../image/bg-reader.jpg" class="img-fluid">
				<div class="card-img-overlay">
					<h2 class="card-title">Żwawy Czytacz</h2>
					<p>Nauka czytania w szkole poskutkowała tym, że czytając tekst, nasze oczy skupiają się na pojedynczych słowach i w danej chwili rejestrujemy tylko jedno słowo. Tymczasem nasze oczy są w stanie zobaczyć znacznie więcej! Poniższe ćwiczenie pomoże Ci poszerzyć pole widzenia.</p>
					<a href="#task" class="badge badge-primary">PRZEJDŹ DO ZADANIA</a>
				</div> 
			</div>
		</div>
		<div class = "col-lg-1 col-xl-2"></div>
</div>
			
		</div>
		</div>

	</div>
	<div class = "col-sm-2 col-md-2 col-lg-2 col-xl-2"></div>	
</div>

<div id = "task">
<br><br><br><br>
</div>
<div class = "row">
	<div class = "col-4"></div>
	<div class = "col-4 ">
		
					<form action="reader#task1" method="post" enctype="multipart/form-data">
						<center>
							
						<label id = "task">Wybierz plik w formacie .txt: </label>
						<input type = "file" name = "plik" id = "file" class = "btn btn-primary">
						<p class = "error"><?php echo @$error; ?></p>
						<div class="form-group">
							<label for="exampleFormControlSelect1">Jakie jest Twoje pole widzenia (w słowach)</label> <select class="form-control" id="exampleFormControlSelect1" id="wartosc"  name = "ileSlow">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select> 
						</div>
						<div class="form-group">
							<label for="exampleFormControlSelect1">Ile czasu potrzebujesz na zapamiętanie słów (w milisekundach)</label><select class="form-control" id="exampleFormControlSelect1" id="wartosc" name="ileCzasu">
								<option value="500">500</option>
								<option value="400">400</option>
								<option value="300">300</option>
								<option value="200">200</option>
								<option value="100">100</option>
							</select>
						</div> 
						<input type="submit" value="Zatwierdź" name = "zatwierdz" class="btn btn-primary">
						</center>
					</form>

</div>
<div class = "col-4"></div>	
</div>
		
	<hr>							
	<div id = "task1">
		<br>
		<br>
		<br>
	</div>

	<div class = "row">
	<div class = "col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
	<div class = "col-sm-10 col-md-10 col-lg-10 col-xl-10">
		
		<br>
		<div style = "background-color:lightgray; text-align:center;">Po kliknięciu przycisku "Start" podążaj za zółtym polem poruszającym się po tekscie. W każdej chwili możesz przerwać czytanie klikając na tekst. Gdy klikniesz powtórnie, wznowisz czytanie.</div>
	</div>
	<div class = "col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
</div> 
	<br>
	
		<div class = "text-center">
			<button id="start" class="btn btn-primary">Start</button>
		</div>
	
	
	<span style="display: none;" id="i">0</span>
	<div style="display: none;" id = "myVar"></div>
	<div style="display: none;" id = "isRunning"></div>
	<div style="display: none;" id = "ileCzasu"><?php echo $_POST['ileCzasu']; ?></div>
       
	<br>
<div class = "row">
	<div class = "col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
	<div id = "tekst" class = "col-sm-10 col-md-10 col-lg-10 col-xl-10">
		
		<br>
		<div class = "text-center"><?php echo @$calyTekst; ?></div>
	</div>
	<div class = "col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
</div>
<br><br><br><br> <br><br><br><br> <br><br><br><br> 
	<script src = "/script/readerscript.js"></script>							
	<?php include 'base/footer.php'; ?>
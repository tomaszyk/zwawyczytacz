      <?php include 'base/menu.php'; ?>

            <div class = "text-center">
       
                <h1>O krok od żwawego czytania</h1>
                <hr>
                <p>Załóż bezpłatne konto i rozpocznij naukę szybkiego czytania.</p>
                
				<p>Jeżeli masz już konto <a href="login" class="badge badge-primary">ZALOGUJ SIĘ</a></p>
        
            </div>
<div class = "row">
      <div class = "col-2"></div>
      <div class = "col-8">
    <form action="registration" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Login</label>
	        <input type="text" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder = "Podaj login">
    </div> 
	    <div class = "error"><?php echo @$loginWBazie; ?></div>
        <div class = "error"><?php echo @$loginNiewlasciwaDlugosc; ?></div>
        <div class = "error"><?php echo @$loginNiewlasciweZnaki; ?></div>	
        <br>

         <div class="form-group">
            <label for="exampleInputEmail1">E-mail</label>
	            <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder = "Podaj email">
        </div>

        <div class = "error"><?php echo @$emailWBazie; ?></div>
        <div class = "error"><?php echo @$emailZNiewlasciwymiZnakami; ?></div>
        <br>  

        <div class="form-group">
            <label for="exampleInputEmail1">Haslo</label>
	            <input type="password" name="haslo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder = "Podaj haslo">
        </div>

        <div class = "error"><?php echo @$hasloNiewlasciwaDlugosc; ?></div>
        <div class = "error"><?php echo @$hasloNiewlasciweZnaki; ?></div>
		<br>

        

        <div class="form-group">
            <label for="exampleInputEmail1">Powtórz hasło</label>
	            <input type="password" name="hasloPowtorzone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder = "Powtórz hasło">
        </div>

        <div class = "error"><?php echo @$hasloInneWDrugimPolu; ?></div>
		<br>

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="regulamin">
                <label class="form-check-label" for="exampleCheck1">Akceptuję <a href="#"  class="badge badge-primary">regulamin</a></label>
        </div>
        <div class = "error"><?php echo @$regulaminBrakAkceptacji; ?></div>
		<br>

			
		<input type="submit" value="Zarejestruj się" name="rejestruje" class="btn btn-primary">
		<input type="reset" value="Wyczyść dane" name="wyczysc" class="btn btn-primary">
        </form>
        <br>
        </div>
        <div class = "col-2"></div>
        </div>
	<?php include 'base/footer.php'; ?>
  
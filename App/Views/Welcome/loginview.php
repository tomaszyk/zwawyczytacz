<?php include 'base/menu.php'; ?>

<h2 class = "text-center">Zaloguj się</h2>
				<hr>
    <div class = "row">
			<div class = "col-2"></div>
				<div class = "col-8">
					<form action="loginAction" method="post"> 
						<br>
						<div class = "error"><?php echo @$komunikat; ?></div>
						<div class="form-group">
    						<label for="exampleInputEmail1">Login</label>
    						<input type="text" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Podaj login">
    					</div>

						

						<div class="form-group">
    						<label for="exampleInputEmail1">Hasło</label>
    						<input type="password" name="haslo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Podaj haslo">
    					</div>

						


						<input type="submit" value="Zaloguj się" name="zaloguj" class="btn btn-primary">
						<input type="reset" value="Wyczyść dane" name="wyczysc" class="btn btn-primary">
					</form>

					<a href = "forgot">Zapomniałem hasła</a>
				</div>
			<div class = "col-2"></div>
	</div>
<?php include 'base/footer.php'; ?>
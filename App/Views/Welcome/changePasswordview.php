<?php include 'base/menu.php';?>

				
    <div class = "row">
			<div class = "col-2"></div>
				<div class = "col-8">
                    <form action = "changePassword" method = "post">
                        <div class="form-group">
    						<label for="exampleInputEmail1">Podaj hasło</label>
    						<input type="password" name="haslo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Podaj haslo">
                        </div>
                        
                        <div class="form-group">
    						<label for="exampleInputEmail1">Powtórz hasło</label>
    						<input type="password" name="hasloPowtorzone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Podaj haslo">
                        </div>
                            <input type = "hidden" value = "<?php echo @$email;?>" name = "email">
                        <p><?php echo @$hasloNiewlasciwaDlugosc; ?></p>
                        <p><?php echo @$hasloInneWDrugimPolu; ?></p>
                        <input type="submit" value="Zatwierdz zmianę" name="zmiana" class="btn btn-primary">
                    </form>
				    <!-- <p><?php echo @$email; ?></p> -->
				</div>
			<div class = "col-2"></div>
	</div>

<?php include 'base/footer.php';?>
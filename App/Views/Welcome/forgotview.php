<?php include 'base/menu.php'; ?>

<h2 class = "text-center">Zmiana hasła</h2>
                <hr>
                
<div class = "row">
      <div class = "col-2"></div>
      <div class = "col-8">
            <form action = "forgot" method = "post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Podaj E-mail</label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder = "Podaj email">
                </div>
                <input type="submit" value="Zapomniałem" name="forgot" class="btn btn-primary">
            </form>
      </div>
      <div class = "col-2"></div>
</div>      

<?php include 'base/menu.php'; ?>
<?php include 'base/menu.php'; ?>

<div class = "row">
    <div class = "col-3"></div>
    <div class = "col-6">
        <div class="alert alert-success" role="alert">
        <center>
            <h4 class="alert-heading">Oto Twoje wyniki</h4>
            
                <p>Prędkość czytania w słowach na minutę to:</p> 
                <p><?php echo $predkosc; ?> </p>
            <hr>
                <p>Zrozumienie czytanego tekstu wynosi:</p> 
                <p><?php echo $punkt * 10; ?> %</p>
        </center>  
        </div>
    </div>    
    <div class = "col-3"></div>
</div>
<?php include 'base/footer.php'; ?>
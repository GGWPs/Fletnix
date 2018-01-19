<?php
if (isset($_SESSION['voornaam'])){
    echo '<h2>Menu</h2>
            <img src="../afbeeldingen/nav.png" width="50px" height="50px" class="navigatie">
                <a href="../php/filmoverzicht.php">Home</a> 
                <a href="filmoverzicht.php"> Genre</a> 
                <a href="../html/overons.html"> Over ons</a>  
                <a href="../php/voorwaarden.php"> Algemene voorwaarden</a>
            ';
} else {
    echo '<h2>Menu</h2>
            <img src="../afbeeldingen/nav.png" width="50px" height="50px" class="navigatie">
                <a href="../php/index.php">Home</a> 
                <a href="filmoverzicht.php"> Genre</a> 
                <a href="../html/overons.html"> Over ons</a>  
                <a href="../php/voorwaarden.php"> Algemene voorwaarden</a>
            ';
}

?>
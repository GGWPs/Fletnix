<!--/*-->
<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene en Ivan-->
<!-- * Versie: 2-->
<!-- * Datum: 10 januari 2019-->
<!---->
<!-- * Aangepast:-->
<!-- *samenvoeging twee footers bestanden
<!- *
<!-*/-->

<?php

echo '<div class="footer"><div class="footer1">';
if (isset($_SESSION['voornaam'])){
    echo    '<h2>Menu</h2>
            <img src="../afbeeldingen/nav.png" width="50px" height="50px" class="navigatie">
                <a href="../php/filmoverzicht.php?page_id=1">Home</a> 
                <a href="filmoverzicht.php"> Genre</a> 
                <a href="overons.php"> Over ons</a>  
                <a href="../php/voorwaarden.php"> Algemene voorwaarden</a>
            ';
} else {
    echo    '<h2>Menu</h2>
            <img src="../afbeeldingen/nav.png" width="50px" height="50px" class="navigatie">
                <a href="../php/index.php">Home</a> 
                <a href="filmoverzicht.php"> Genre</a> 
                <a href="overons.php"> Over ons</a>  
                <a href="../php/voorwaarden.php"> Algemene voorwaarden</a>
            ';
}
echo '</div>';

echo    '<div class="footer2"><h2>Contact</h2>
    <img src="../afbeeldingen/informatie.png" width="50px" height="50px" class="informatie">
    <p>[T] 0612345678<br>[E] I.Miladinovic@live.nl<br>Fletnix BV<br>Technovium<br>Nijmegen, Nederland</p>
</div></div>';

echo '<div class="bottom">';
echo "<p>&copy;", date("Y"), "- Ivan Miladinovic - Kaene Peters - FLETNIX</p>";
echo '</div>';

?>
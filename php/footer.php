<!--
    Team: Kaene Peters en Ivan Miladinovic
    Auteur: Kaene en Ivan
    Versie: 1
 *  Datum: 10/01/2019

     Aangepast:
    samenvoeging twee footers bestanden, link aangepast
 *
-->

<div class="footer">
    <div class="footer1">
        <h2>Menu</h2>
        <?php
        if (isset($_SESSION['voornaam'])) {
            echo '     <img src="../afbeeldingen/nav.png" width="50" height="50" class="navigatie">
                <a href="../php/filmoverzicht.php?page_id=1">Home</a> 
                <a href="filmoverzicht.php"> Genre</a> 
                <a href="overons.php"> Over ons</a>  
                <a href="../php/voorwaarden.php"> Algemene voorwaarden</a>';
        } else {
            echo '  <img src="../afbeeldingen/nav.png" width="50" height="50" class="navigatie">
                <a href="../php/index.php">Home</a> 
                <a href="filmoverzicht.php"> Genre</a> 
                <a href="overons.php"> Over ons</a>  
                <a href="../php/voorwaarden.php"> Algemene voorwaarden</a>';
        }
        ?>
    </div>
    <div class="footer2"><h2> Contact</h2>
        <img src="../afbeeldingen/informatie.png" alt="informatie.png" width="50" height="50" class="informatie">
        <p> [T] 0612345678 <br>[E] I . Miladinovic@live . nl <br>Fletnix BV <br>Technovium <br>Nijmegen,
            Nederland </p>
    </div>
</div>
<div class="bottom">';
    <p>&copy;", <?php echo 'date("Y"),' ?> "- Ivan Miladinovic - Kaene Peters - FLETNIX</p>";
</div>;

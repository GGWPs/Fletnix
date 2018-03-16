<!--/*-->
<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene-->
<!-- * Versie: 1-->
<!-- * Datum: 14 maart 2018-->
<!---->
<!-- * Aangepast:-->
<!-- Geen aanpassingen
<!-- *
<!--*/-->

<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 12-3-2018
 * Time: 16:14
 */

session_start();
if (isset($_SESSION['voornaam'])){
    echo ' <div class="logoheader"> <a href="filmoverzicht.php"> <img src="../afbeeldingen/klein/fletnix-logo-klein.png" width="200" height="50" alt="Fletnix logo"></a> </div>';
} else {
    echo ' <div class="logoheader"> <a href="index.php"> <img src="../afbeeldingen/klein/fletnix-logo-klein.png" width="200" height="50"
                                  alt="Fletnix logo"></a> </div>';
}

?>
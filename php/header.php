<!--/*-->
<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene-->
<!-- * Versie: 1-->
<!-- * Datum: 14 maart 2018-->
<!---->
<!-- * Aangepast:-->
<!-- Geen aanpassingen
<!- *
<!-*/-->

<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 12-3-2018
 * Time: 16:14
 */

session_start();
if (isset($_SESSION['voornaam'])){
    echo ' <div class="logoheader"> <a href="filmoverzicht.php?page_id=1"> <img src="../afbeeldingen/klein/fletnix-logo-klein.png" width="200" height="50" alt="Fletnix logo"></a> </div>';
} else {
    echo ' <div class="logoheader"> <a href="index.php"> <img src="../afbeeldingen/klein/fletnix-logo-klein.png" width="200" height="50"
                                  alt="Fletnix logo"></a> </div>';
}


if (isset($_SESSION['voornaam'])){
    echo " <div class=\"headerbuttons\"> <button class=\"header-button\" type=\"button\" onclick=\"window.location.href='gastboek.php'\">Gastboek
        </button>   
        <div class=\"dropdown\">
        <button class=\"dropbtn\" type=\"button\" onclick='Filmoverzicht.php?page_id=1'>Genres</button>
        <div class=\"dropdown-content\">
            <a href=\"filmoverzicht.php?page_id=1\">Alles</a>
            <a href=\"filmoverzicht.php?page_id=2\">Actie</a>
            <a href=\"filmoverzicht.php?page_id=3\">Comedy</a>
            <a href=\"filmoverzicht.php?page_id=4\">Drama</a>
        </div>
    </div>";
    print_r($_SESSION['voornaam']); echo " "; print_r($_SESSION['achternaam']);
    echo "  op ";
    setlocale(LC_ALL, 'nl_NL') or setlocale(LC_ALL, 'nld_NLD');
    echo strftime('%A %e %B', time());
    echo ", ingelogd sinds ";
    print_r($_SESSION['logintijd']);
    echo "  <button class=\"header-button\" type=\"button\" onclick=\"window.location.href='loguit.php'\">Loguit
        </button> </div>";
}
else {
    echo " <div class=\"headerbuttons\"> <button class=\"header-button\" type=\"button\" onclick=\"window.location.href='gastboek.php'\">Gastboek
        </button><button class=\"header-button\" type=\"button\" onclick=\"window.location.href='aanmeldpagina.php'\">Login
        </button><button class=\"header-button\" type=\"button\" onclick=\"window.location.href='registreren.php'\">Maak een account
        </button> </div>";
}

?>
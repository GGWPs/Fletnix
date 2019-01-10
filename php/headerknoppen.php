<!--/*-->
<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene-->
<!-- * Versie: 1-->
<!-- * Datum: 14 maart 2018-->
<!---->
<!-- * Aangepast:-->
<!-- *geen aanpassingen
<!- *
<!-*/-->

<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 12-3-2018
 * Time: 16:18
 */

if (isset($_SESSION['voornaam'])){
//    echo $_POST['firstname'] ;
    echo " <div class=\"headerbuttons\"> <button class=\"header-button\" type=\"button\" onclick=\"window.location.href='gastboek.php'\">Gastboek
        </button>";
    echo "  <div class=\"dropdown\">
        <button class=\"dropbtn\" type=\"button\" onclick='Filmoverzicht.php'>Genres</button>
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
        </button>";
    echo " <button class=\"header-button\" type=\"button\" onclick=\"window.location.href='aanmeldpagina.php'\">Login
        </button>";
    echo "  <button class=\"header-button\" type=\"button\" onclick=\"window.location.href='abonnement.php'\">Maak een account
        </button> </div>";
}

?>
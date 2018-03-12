<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 12-3-2018
 * Time: 16:18
 */

if (isset($_SESSION['voornaam'])){
//    echo $_POST['firstname'] ;
    echo "  <div class=\"dropdown\">
        <button class=\"dropbtn\">Films</button>
        <div class=\"dropdown-content\">
            <a href=\"#\">Actie</a>
            <a href=\"#\">Comedy</a>
            <a href=\"filmoverzicht.php\">Drama</a>
        </div>
    </div>";
    print_r($_SESSION['voornaam']);
    echo " ";
    print_r($_SESSION['achternaam']);
    echo "  op ";
    setlocale(LC_ALL, 'nl_NL') or setlocale(LC_ALL, 'nld_NLD');
    echo strftime('%A %e %B', time());
    echo ", ingelogd sinds ";
    print_r($_SESSION['logintijd']);
    echo "  <button class=\"header-button\" type=\"button\" onclick=\"window.location.href='loguit.php'\">Loguit
        </button>";
}
else {
    echo "  <button class=\"header-button\" type=\"button\" onclick=\"window.location.href='aanmeldpagina.php'\">Login
        </button>";
    echo "  <button class=\"header-button\" type=\"button\" onclick=\"window.location.href='abonnement.php'\">Maak een account
        </button>";
}

?>
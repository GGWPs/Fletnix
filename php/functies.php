<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 12-3-2018
 * Time: 15:40
 */

function printHeaderLogo(){
session_start();
if (isset($_SESSION['voornaam'])){
    echo '<a href="filmoverzicht.php"> <img src="../afbeeldingen/klein/fletnix-logo-klein.png" width="200" height="50" alt="Fletnix logo"></a>';
} else {
    echo '<a href="index.php"> <img src="../afbeeldingen/klein/fletnix-logo-klein.png" width="200" height="50"
                                  alt="Fletnix logo"></a>';
}
}

function printHeaderKnoppen(){
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
}

function printFooter1(){
    if (isset($_SESSION['voornaam'])){
        echo '<h2>Menu</h2>
            <img src="../afbeeldingen/nav.png" width="50px" height="50px" class="navigatie">
                <a href="../php/filmoverzicht.php">Home</a> 
                <a href="filmoverzicht.php"> Genre</a> 
                <a href="overons.php"> Over ons</a>  
                <a href="../php/voorwaarden.php"> Algemene voorwaarden</a>
            ';
    } else {
        echo '<h2>Menu</h2>
            <img src="../afbeeldingen/nav.png" width="50px" height="50px" class="navigatie">
                <a href="../php/index.php">Home</a> 
                <a href="filmoverzicht.php"> Genre</a> 
                <a href="overons.php"> Over ons</a>  
                <a href="../php/voorwaarden.php"> Algemene voorwaarden</a>
            ';
    }
}

function printFooter2(){
    echo '<h2>Contact</h2>
            <img src="../afbeeldingen/informatie.png" width="50px" height="50px" class="informatie">
            <p>[T] 0612345678<br>[E] I.Miladinovic@live.nl<br>Fletnix BV<br>Technovium<br>Nijmegen, Nederland</p>';
}

function printCopyright(){
    echo "<p>&copy;", date("Y"), "- Ivan Miladinovic - Kaene Peters - FLETNIX</p>";
}
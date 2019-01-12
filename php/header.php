<!-- * Team: Kaene Peters en Ivan Miladinovic
    * Auteur: Kaene en Ivan
     * Versie: 2
    * Datum: 16/01/2019
    * Code veel verbeterd vooral veel echo's verminderd
-->
<div class="logoheader">
    <?php
    session_start();
    if (isset($_SESSION['voornaam'])) {
        setlocale(LC_ALL, 'nl_NL') or setlocale(LC_ALL, 'nld_NLD');
        echo '<a href="filmoverzicht.php?page_id=1"><img src="../afbeeldingen/klein/fletnix-logo-klein.png" width="200" height="50" alt="Fletnix logo"></a>
        </div>
        <div class="headerbuttons"> <button class="header-button" type="button" onclick=window.location.href="gastboek.php">Gastboek</button>   
        <div class="dropdown">
        <button class="dropbtn" type="button" onclick="Filmoverzicht.php?page_id=1">Genres</button>
        <div class="dropdown-content">
            <a href="filmoverzicht.php?page_id=1">Alles</a>
            <a href="filmoverzicht.php?page_id=2">Actie</a>
            <a href="filmoverzicht.php?page_id=3">Comedy</a>
            <a href="filmoverzicht.php?page_id=4">Drama</a>
        </div>
    </div>' .
            $_SESSION["voornaam"] . " " . $_SESSION["achternaam"] . "  op " . strftime('%A %e %B', time()) . ", ingelogd sinds " . $_SESSION["logintijd"] .
            '<button class="header-button" type="button" onclick=window.location.href="loguit.php">Loguit';
    } else {
        echo '<a href="index.php"><img src="../afbeeldingen/klein/fletnix-logo-klein.png" width="200" height="50" alt="Fletnix logo"></a>
        </div>
        <div class="headerbuttons"> <button class="header-button" type="button" onclick=window.location.href="gastboek.php">Gastboek</button>
        <button class="header-button" type="button" onclick=window.location.href="aanmeldpagina.php">Login</button>
        <button class="header-button" type="button" onclick=window.location.href="registreren.php">Maak een account';
    }
    ?>
    </button>
</div>
</div>

<!--
 * Team: Kaene Peters en Ivan Miladinovic
 * Auteur: Kaene en Ivan
 * Versie: 2
 * Datum: 10/01/2019


  Aangepast:
 * - php code beter gescheiden, location link aangepast.
-->
<?php
include 'functies.php';
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Fletnix</title>
    <link rel="stylesheet" href="../css/basisstijlen.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/knoppen.css">
    <link rel="stylesheet" href="../css/inlogenregis.css">
    <link rel="icon" href="../afbeeldingen/favicon.ico"/>
</head>
    <?php printHeader();
    if (isset($_SESSION['voornaam'])) {
        header("Location: filmoverzicht.php?page_id=1.php");
    }
    ?>
<main>
    <div class="cover">
        <div class="background">
        <div class="login">
            <h1>Inloggen</h1>
            <img src="../afbeeldingen/slot.png" width="80" height="80" alt="login">
            <?php
            if (isset($_GET["msg"]) && $_GET["msg"] == "fout") {
                echo '<div class="meldingTekst">Uw gegevens worden niet herkent!</div>';
            }
            ?>
            <br>
            <form method="POST" action="login.php">
                <input type="text" placeholder="Gebruikersnaam" name="gebruikersnaam">
                <input type="password" placeholder="Wachtwoord" name="wachtwoord">
                <input type="submit" class="submit-button" value="Log in">
            </form>
            <a href="registreren.php"><h4>Nog geen account? klik dan hier</h4></a>
        </div>
        </div>
</main>
<?php printFooter(); ?>

</html>
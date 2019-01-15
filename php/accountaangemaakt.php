<!--
    Team: Kaene Peters en Ivan Miladinovic
    Auteur: Kaene en Ivan
    Versie: 2
 *  Datum: 10/01/2019

     Aangepast:
    *kleine verplaatsing voor beter overzicht, CSS verandert
 *
-->

<?php
include 'functies.php';
header("refresh:5;url=filmoverzicht.php?page_id=1");
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
    <?php printHeader(); ?>
<main>
    <div class="cover">
        <div class="background">
    <div class="login">
        <a href="filmoverzicht.php?page_id=1"> <img src="../afbeeldingen/loading.gif" alt="Loading"></a>
        <h3>Uw registratie is gelukt! Klik</h3> <a href="../php/aanmeldpagina.php">hier</a>
        <h3>om aan te melden!</h3>
    </div>
        </div>
    </div>
</main>
<?php printFooter(); ?>
</html>

<!--/*-->
<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene en Ivan-->
<!-- * Versie: 1-->
<!-- * Datum: 7 maart 2018-->
<!---->
<!-- * Aangepast:-->
<!-- *
<!-- *
<!--*/-->
<?php
include 'functies.php';

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/basisstijlen.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/knoppen.css">

    <link rel="icon" href="../afbeeldingen/favicon.ico"/>
    <title>Fletnix</title>

</head>
<body>
<header>
    <div class="logoheader">
        <?php printHeaderLogo(); ?>
    </div>
    <div class="headerbuttons">
        <?php printHeaderKnoppen(); ?>
    </div>
</header>
<main>
<div class="cover">
        <div class="invoerveld">
            <?php if (isset($_SESSION['voornaam'])){
             echo '<h1> hallo gastboek jwz</h1>';
                echo '<form method = "post" action = "" >';
            } else {
            echo '<h1> gelieve eerst in te loggen</h1>';
            }
                ?>


    </div>
        </div>
</main>
<footer>
    <div class="footer">
        <div class="footer1">
            <?php printFooter1();?>
        </div>
        <div class="footer2">
            <?php printFooter2();?>
        </div>
    </div>
    <div class="bottom">
        <?php printCopyright();?>
    </div>
</footer>
</body>



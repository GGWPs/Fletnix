<?php
include 'functies.php';

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
    <link rel="icon" href="../afbeeldingen/favicon.ico"/>
    <title>Over ons</title>
    <link rel="stylesheet" href="../css/basisstijlen.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/knoppen.css">
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
    <div class="overons">
        <h1>Over ons</h1>
        <img src="../afbeeldingen/ons.PNG" width="300" height="300" alt="Ons">
        <h2>Wie zijn wij?</h2>
        <p>
            Wij zijn twee studenten van Hogeschool Arnhem en Nijmegen die Fletnix BV hebben opgericht.
        </p>
        <h2>Wat doen wij?</h2>
        <p>
            Fletnix BV is een bedrijf die films/series streamt zodat U deze kan kijken. Dit doen we tegen een lage prijs en zo kunnen we de gebruiker blij maken. Elke week worden nieuwe films en series toegevoegd aan het assortiment.
        </p>
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
</html>
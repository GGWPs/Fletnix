<!--/*-->
<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene en Ivan-->
<!-- * Versie: 2-->
<!-- * Datum: 16 februari 2018-->
<!---->
<!-- * Aangepast:-->
<!-- * - Required bij html invoervelden toegevoegd-->
<!-- * - Zoek query aangepast
<!--*/-->
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
    <link rel="icon" href="../afbeeldingen/favicon.ico" />
</head>
<body>
<header>
    <?php printHeaderLogo(); ?>
    <?php  printHeaderKnoppen(); ?>
</header>
<main>
    <h1>Zoekresultaten</h1>
    <div class="zoekresultaten">
    <?php
    zoekFilm();
    ?>
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

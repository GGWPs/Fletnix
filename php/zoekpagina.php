<!--/*-->
<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene en Ivan-->
<!-- * Versie: 2-->
<!-- * Datum: 16 februari 2018-->
<!---->
<!-- * Aangepast:-->
<!-- * - Required bij html invoervelden toegevoegd-->
<!-- * - Zoek query aangepast
<!-*/-->
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
<body>
<header>
    <?php printHeader(); ?>
</header>
<main>
    <h1>Zoekresultaten</h1>
    <div class="zoekresultaten">
        <?php
        zoekFilm();
        ?>
    </div>
</main>
</main>
<?php printFooter(); ?>
</body>
</html>

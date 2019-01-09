<!--/*-->
<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene en Ivan-->
<!-- * Versie: 1-->
<!-- * Datum: 16 maart 2018-->
<!---->
<!-- * Aangepast:-->
<!--
< * functie gemaakt overal. Oproep via generieke functie
genre
<*/-->

<?php
include 'functies.php';
require_once '../php/databaseconnection.php';
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
    <link rel="icon" href="../afbeeldingen/favicon.ico"/>
    <title>Filmoverzicht</title>
    <link rel="stylesheet" href="../css/basisstijlen.css">
    <link rel="stylesheet" href="../css/filmoverzicht.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/knoppen.css">
</head>
<body>
<main>
    <header>
        <?php printHeader(); ?>
    </header>
    <div class="index-container">
        <h1>Actie filmoverzicht</h1>
        <div class="index-item">
            <?php
            $select = "SELECT movie_id,cover_image, title FROM actie_films";
            $query = verbindDatabase()->prepare($select);
            $query->execute();
            $i = $query->fetchAll();
            tekenFilms($i);
            ?>


            </div>


</main>
<footer>
    <div class="footer">
        <div class="footer1">
            <?php printFooter();?>
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


<?php

switch($_GET['page_id'])
{
    case 1:
        include("php/filmoverzicht.php");
        break;
}
?>
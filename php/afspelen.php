<!--/*-->
<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Ivan-->
<!-- * Versie: 2-->
<!-- * Datum: 16 januari 2019-->
<!---->
<!-- * Aangepast:-->
<!-- * fatsoenlijke CSS, genres bijgevoegd
<!- *
<!-*/-->

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
    <link rel="stylesheet" href="../css/basisstijlen.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/afspelen.css">
    <title>Afspelen</title>
</head>
    <?php printHeader(); ?>
<main>
    <div class=afspelen>
        <?php
        $movieid = $_GET['movieid'];


        $beschrijving = "SELECT title, duration, description, publication_year, price, cover_image, URL FROM Movie WHERE movie_id=?";
        $query = verbindDatabase()->prepare($beschrijving);
        $query->execute([$movieid]);
        $gegevens = $query->fetchAll();
        $afbeeldingnaam = $gegevens [0]['cover_image'];
        $afbeeldinglocatie = "../afbeeldingen/films/" . $afbeeldingnaam;

        $regisseur = "SELECT firstname+ ' ' +lastname AS Name FROM Movie_Director INNER JOIN Person ON Movie_Director.person_id=Person.person_id WHERE movie_id=?";
        $query = verbindDatabase()->prepare($regisseur);
        $query->execute([$movieid]);
        $gegevensregisseur = $query->fetchAll();

        $genres = "select * from Movie_Genre where movie_id =?";
        $query = verbindDatabase()->prepare($genres);
        $query->execute([$movieid]);
        $gegevensgenres = $query->fetchAll();

        echo '<div class="titelPoster"><h1>' . $gegevens[0]['title'] . '</h1>
          <img src="' . $afbeeldinglocatie . '" width="400" height="300">
          <p>Speeltijd: ' . $gegevens[0]['duration'] . ' minuten</p>
          <p>Beschrijving: ' . $gegevens[0]['description'] . '</p>
          <p>Jaar van publicatie: ' . $gegevens[0]['publication_year'] . '</p>
          <p>Genres: ';
        for ($i = 0; $i < count($gegevensgenres); $i++) {
            if ($i == 0) {
                echo ' ' . $gegevensgenres[$i]['genre_name'];
            }
            echo ', ' . $gegevensgenres[$i]['genre_name'];
        }
        echo '</p><br></div>';
        tekenCast($movieid);
        echo '<div class="resp-container"><iframe class="resp-iframe" src="' . $gegevens[0]['URL'] . '" allowfullscreen></iframe></div>';
        ?>
    </div>

</main>
<?php printFooter(); ?>
</html>
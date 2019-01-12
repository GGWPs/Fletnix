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
<body>
<header>
    <?php printHeader(); ?>
</header>
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
        $cast = "SELECT firstname+ ' ' +lastname AS Name, role FROM Movie_Cast INNER JOIN Person ON Movie_Cast.person_id=Person.person_id WHERE movie_id=?";
        $query = verbindDatabase()->prepare($cast);
        $query->execute([$movieid]);
        $gegevenscast = $query->fetchAll();
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
        echo '</p><br></div> 
          <div class="resp-container"><iframe class="resp-iframe" src="' . $gegevens[0]['URL'] . '" allowfullscreen></iframe></div>
          <div class="cast">';
        echo '<h2>Cast</h2>';
        $casttabel = '';
        $casttabel .= '<table> <tr><th>Naam</th><th>Rol</th></tr>';
        if (!empty($gegevenscast)) {
            for ($i = 0; $i < count($gegevenscast); $i++) {
                $casttabel .= "<tr>";
                $casttabel .= "<th>" . $gegevenscast[$i][0] . "</th>";
                $casttabel .= "<td>" . $gegevenscast[$i][1] . "</td>";
                $casttabel .= "</tr>";
            }
        }
        if (!empty($gegevensregisseur)) {
            $casttabel .= "<tr>";
            $casttabel .= "<th>" . $gegevensregisseur [0][0] . "</th>";
            $casttabel .= "<td>Regisseur</td>";
            $casttabel .= "</tr>";
        }
        $casttabel .= '</table></div>';
        echo $casttabel;
        ?>
    </div>

</main>
<?php printFooter(); ?>
</body>
</html>
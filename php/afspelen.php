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
    <link rel="stylesheet" href="../css/filmoverzicht.css">

    <title>Afspelen</title>
</head>
<body>
<header>
    <?php printHeaderLogo(); ?>
    <?php  printHeaderKnoppen(); ?>
</header>
<main>
<div class = afspelen>
    <?php

    $movieid= $_GET['movieid'];
    $beschrijving = "SELECT title, duration, description, publication_year, price, cover_image, URL FROM Movie WHERE movie_id=?";
    $query = $dbh->prepare($beschrijving);
    $query->execute([$movieid]);
    $gegevens = $query->fetchAll();
    $afbeeldingnaam = $gegevens [0]['cover_image'];
    $afbeeldinglocatie = "../afbeeldingen/films/".$afbeeldingnaam;
    $cast= "SELECT firstname+ ' ' +lastname AS Name, role FROM Movie_Cast INNER JOIN Person ON Movie_Cast.person_id=Person.person_id WHERE movie_id=?";
    $query=$dbh->prepare($cast);
    $query->execute([$movieid]);
    $gegevenscast=$query->fetchAll();
    $regisseur= "SELECT firstname+ ' ' +lastname AS Name FROM Movie_Director INNER JOIN Person ON Movie_Director.person_id=Person.person_id WHERE movie_id=?";
    $query=$dbh->prepare($regisseur);
    $query->execute([$movieid]);
    $gegevensregisseur=$query->fetchAll();
    echo $gegevens[0]['title'].'</h1>';
    echo '<img src="'.$afbeeldinglocatie.'" width="400" height="300"';
    echo '<p>Speeltijd: '.$gegevens[0]['duration'].'</p>';
    echo '<p>Beschrijving: '.$gegevens[0]['description'].'</p>';
    echo '<p>Jaar van publicatie: '.$gegevens[0]['publication_year'].'</p><br>';
    echo '<iframe width="600" height="400" src="'. $gegevens[0]['URL'].'" allowfullscreen></iframe>';
    echo '<h2>Cast</h2>';
    $casttabel = '';
    $casttabel .= '<table> <tr><th>Naam</th><th>Role</th></tr>';
    if(!empty($gegevenscast)){
        for ($i = 0; $i < count($gegevenscast); $i++) {
            $casttabel .= "<tr>";
            $casttabel .= "<th>" . $gegevenscast[$i][0] . "</th>";
            $casttabel .= "<td>" . $gegevenscast[$i][1] . "</td>";
            $casttabel .= "</tr>";
        }
    }
    if(!empty($gegevensregisseur)){
        $casttabel .= "<tr>";
        $casttabel .= "<th>". $gegevensregisseur [0][0]. "</th>";
        $casttabel .= "<td>Regisseur</td>";
        $casttabel .= "</tr>";
    }
    $casttabel .= '</table>';
    echo $casttabel;
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
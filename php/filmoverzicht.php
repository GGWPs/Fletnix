<!--
    Team: Kaene Peters en Ivan Miladinovic
    Auteur: Kaene en Ivan
    Versie: 1
 *  Datum: 10/01/2019

     Aangepast:
        Html en php code beter gescheiden
        Switch toegevoegd, zoekopties verbeterd en de pagina ziet er beter uit kwa css en structuur.
 *
-->

<?php
include "functies.php";
require_once 'databaseconnection.php';
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=yes">
    <link rel="icon" href="../afbeeldingen/favicon.ico"/>
    <title>Filmoverzicht</title>
    <link rel="stylesheet" href="../css/basisstijlen.css">
    <link rel="stylesheet" href="../css/filmoverzicht.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/knoppen.css">
</head>
    <?php printHeader();
    $select = "SELECT movie_id,cover_image, title FROM totale_films";
    $overzicht = "Filmoverzicht";
    if (isset($_GET['page_id'])) {
        switch ($_GET['page_id']) {
            case 1:
                $select = "SELECT movie_id,cover_image, title FROM totale_films";
                $overzicht = "Filmoverzicht";
                break;
            case 2:
                $select = "SELECT movie_id,cover_image, title FROM actie_films";
                $overzicht = "Actie Filmoverzicht";
                break;
            case 3:
                $select = "SELECT movie_id,cover_image, title FROM comedy_films";
                $overzicht = "Comedy Filmoverzicht";
                break;
            case 4:
                $select = "SELECT movie_id,cover_image, title FROM drama_films";
                $overzicht = "Drama Filmoverzicht";
                break;
            default:
                $select = "SELECT movie_id,cover_image, title FROM totale_films";
                $overzicht = "Filmoverzicht";
                break;
        }
    }
    ?>
<main>
    <div class="cover">
        <div class="background">
            <div class="index-container">
                <h1> <?= $overzicht ?></h1>
                <form action="filmoverzicht.php" method="post">
                    <label for='titel'>Zoeken op: </label>
                    <?php
                    if (isset($_GET['titel']) && !empty($_GET['titel'])) {
                        $titel = $_GET['titel'];
                        echo "<input type='text' id='titel' name='filmtitel' value='$titel'>";
                    } else {
                        echo "<input type='text' id='titel' name='filmtitel' placeholder='Titel'>";
                    }
                    if (isset($_GET['regisseur']) && !empty($_GET['regisseur'])) {
                        $regisseur = $_GET['regisseur'];
                        echo "<input type='text' id='regisseur' name='filmregisseur' value='$regisseur'>";
                    } else {
                        echo "<input type='text' id='regisseur' name='filmregisseur' placeholder='Regisseur'>";
                    }
                    if (isset($_GET['publicatiejaar']) && !empty($_GET['publicatiejaar'])) {
                        $publicatiejaar = $_GET ['publicatiejaar'];
                        echo "<input type='number' id='publicatiejaar' name='publicatiejaar' value='$publicatiejaar.' min='1900' max='2030'>";
                    } else {
                        echo "<input type='number' id='publicatiejaar' name='publicatiejaar' placeholder='Jaar' min='1900' max='2030'>";
                    }
                    ?>
                    <input type="submit" id="zoeken" value="Zoeken" name="verzending">
                </form>
                <div class="index-item">
                    <?php
                    if (isset ($_SESSION['voornaam'])) {
                        if (!isset($_POST['verzending']) && !isset($_GET['zoek'])) {
                            $query = verbindDatabase()->prepare($select);
                            $query->execute();
                            $filmSelectie = $query->fetchAll();
                            tekenFilms($filmSelectie);
                        }
                        if (isset($_POST['verzending'])) {
                            $filmtitel = "%" . $_POST['filmtitel'] . "%";
                            $filmregisseur = "%" . $_POST['filmregisseur'] . "%";
                            $publicatiejaar = "%" . $_POST['publicatiejaar'] . "%";
                            $statement = "SELECT distinct totale_films.movie_id, cover_image, totale_films.publication_year, totale_films.title
                                            FROM totale_films
                                            INNER JOIN Movie_Director md on totale_films.movie_id=md.movie_id 
                                            INNER JOIN Person p on p.person_id=md.person_id 
                                            WHERE  p.firstname + ' ' + p.lastname LIKE ? AND totale_films.title LIKE ? AND totale_films.publication_year LIKE ? ORDER BY totale_films.publication_year desc , totale_films.title asc";
                            $query = verbindDatabase()->prepare($statement);
                            $query->execute([$filmregisseur, $filmtitel, $publicatiejaar]);
                            $filmSelectie = $query->fetchAll();
                            $_SESSION['movies'] = $filmSelectie;
                            $_SESSION['zoektitelinfo'] = $_POST['filmtitel'];
                            $_SESSION['zoekregisseurinfo'] = $_POST['filmregisseur'];
                            $_SESSION['zoekjaarinfo'] = $_POST['publicatiejaar'];
                            header('Location:filmoverzicht.php?zoek=result&titel=' . $_POST["filmtitel"] . '&regisseur=' . $_POST["filmregisseur"] . '&publicatiejaar=' . $_POST["publicatiejaar"] . '');
                        }
                        if (isset ($_GET['zoek']) && $_GET['zoek'] == 'result') {
                            if ($_SESSION['zoektitelinfo'] == null) {
                                $stuk1 = "";
                            } else {
                                $stuk1 = 'U heeft gezocht op titel: ' . $_SESSION['zoektitelinfo'];
                            }
                            if ($_SESSION['zoekregisseurinfo'] == null) {
                                $stuk2 = " ";
                            } else {
                                $stuk2 = ', regisseur: ' . $_SESSION['zoekregisseurinfo'];
                            }
                            if ($_SESSION['zoekjaarinfo'] == null) {
                                $stuk3 = " ";
                            } else {
                                $stuk3 = ' en publicatiejaar:  ' . $_SESSION['zoekjaarinfo'];
                            }
                            $filmSelectie = $_SESSION['movies'];
                            echo '<p>' . $stuk1 . $stuk2 . $stuk3 . ' </p><div class="index-item">' . '
                            tekenFilms($filmSelectie).
                            </div>';
                        }
                    } else {
                        header('Location:aanmeldpagina.php');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php printFooter(); ?>
</html>
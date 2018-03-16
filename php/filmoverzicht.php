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
        <?php printHeaderLogo(); ?>
        <?php  printHeaderKnoppen(); ?>
    </header>
    <div class="index-container">
    <h1>Filmoverzicht</h1>
    <div class="index-item">
        <form action="filmoverzicht.php" method="post">
            <?php
            if(isset($_GET['titel'])&& !empty($_GET['titel'])){
                $titel= $_GET['titel'];
                echo"<label for='titel'>Zoeken op titel: </label>";
                echo "<input type='text' id='titel' name='filmtitel' value='$titel'>";
            } else{
                echo "<label for='titel'>Zoeken op titel: </label>";
                echo "<input type='text' id='titel' name='filmtitel'>";
            }
            if(isset($_GET['regisseur'])&& !empty($_GET['regisseur'])){
                $regisseur=$_GET['regisseur'];
                echo "<label for='regisseur'>Zoeken op regisseur: </label>";
                echo "<input type='text' id='regisseur' name='filmregisseur' value='$regisseur'>";
            }  else{
                echo "<label for='regisseur'>Zoeken op regisseur: </label>";
                echo "<input type='text' id='regisseur' name='filmregisseur'>";
            }
            if(isset($_GET['publicatiejaar'])&& !empty($_GET['publicatiejaar'])){
                $publicatiejaar = $_GET ['publicatiejaar'];
                echo "<label for='publicatiejaar'>Zoeken op publicatiejaar: </label>";
                echo "<input type='number' id='publicatiejaar' name='publicatiejaar' value='$publicatiejaar' min='1900' max='2050'>";
            } else{
                echo "<label for='publicatiejaar'>Zoeken op publicatiejaar: </label>";
                echo "<input type='number' id=publicatiejaar' name='publicatiejaar' min='1900' max='2050'>";
            }
            ?>
            <input type="submit" id="zoeken" value="Zoeken" name="verzending">
        </form>
    </div>

    <?php
    if (isset ($_SESSION['voornaam'])) {
        if (!isset($_POST['verzending']) && !isset($_GET['zoek'])) {
            $statement = "SELECT movie_id,cover_image, title FROM totale_films";
            $query = $dbh->prepare($statement);
            $query->execute();
            $i = $query->fetchAll();
            tekenFilms($i);

        }
        if (isset($_POST['verzending'])) {
            $filmtitel = "%" . $_POST['filmtitel'] . "%";
            $filmregisseur = "%" . $_POST['filmregisseur'] . "%";
            $publicatiejaar = "%" . $_POST['publicatiejaar'] . "%";
            $statement = "SELECT totale_films.movie_id, cover_image
                                            FROM totale_films
                                            INNER JOIN Movie_Director md on totale_films.movie_id=md.movie_id 
                                            INNER JOIN Person p on p.person_id=md.person_id 
                                            WHERE  p.firstname + ' ' + p.lastname LIKE ? AND totale_films.title LIKE ? AND totale_films.publication_year LIKE ? ORDER BY totale_films.publication_year DESC";
            $query = $dbh->prepare($statement);
            $query->execute([$filmregisseur, $filmtitel, $publicatiejaar]);
            $i = $query->fetchAll();
            $_SESSION['movies'] = $i;
            $_SESSION['zoektitelinfo'] = $_POST['filmtitel'];
            $_SESSION['zoekregisseurinfo'] = $_POST['filmregisseur'];
            $_SESSION['zoekjaarinfo'] = $_POST['publicatiejaar'];
            header('Location:filmoverzicht.php?zoek=result&titel='.$_POST["filmtitel"].'&regisseur='.$_POST["filmregisseur"].'&publicatiejaar='.$_POST["publicatiejaar"].'');
        }
        if (isset ($_GET['zoek']) && $_GET['zoek'] == 'result') {
            $i = $_SESSION['movies'];
            echo '<div><p> U heeft gezocht op film: '.$_SESSION['zoektitelinfo'].' - regisseur: '.$_SESSION['zoekregisseurinfo'].' - en publicatiejaar: '.$_SESSION['zoekjaarinfo'].' </p><div class="index-item">';
            tekenFilms($i);
            echo '</div></div>';
        }
    } else {
        header('Location:aanmeldpagina.php');
    }
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
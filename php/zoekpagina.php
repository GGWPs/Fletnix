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
    <div class="logoheader">
        <?php include '../php/headerlogo.php';?>
    </div>
    <div class="headerbuttons">
        <?php include '../php/headerknop.php';?>
    </div>
</header>
<main>
    <h1>Zoekresultaten</h1>
    <div class="zoekresultaten">
    <?php
    require_once '../php/databaseconnection.php';

$zoek = $_POST["zoekFunctie"];
    $sql = "select * from Movie where title like '%$zoek%' and movie_id in (select movie_id from Movie where movie_id = 300231 or movie_id = 300230 or movie_id = 300232 or movie_id = 412321
or movie_id = 311506 or movie_id = 412323 or movie_id = 412322 or movie_id = 146822 or movie_id = 112290 or movie_id = 267038 or movie_id = 412324 
or movie_id = 176711 or movie_id = 207992 )
";
    echo "<h2>U zocht op $zoek".'</h2>'.'<br>';
    foreach ($dbh ->query($sql) as $row) {
        print $row['title'] . "\t";
        print $row['description'] . "\t";
        echo "</br>";
    }

    ?>
    </div>
</main>


<footer>
    <div class="footer">
        <div class="footer1">
            <?php include '../php/footer1.php';?>
        </div>
        <div class="footer2">
            <?php include '../php/footer2.php';?>
        </div>
    </div>
    <div class="bottom">
        <?php include '../php/copyright.php';?>
    </div>
</footer>
</body>
</html>

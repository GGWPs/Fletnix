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
<header>
    <?php printHeaderLogo(); ?>
    <?php  printHeaderKnoppen(); ?>
</header>
<main>
    <h2>Alle films</h2> <br> <br>
    <div class="filmposters">

    <?php
    $data = $dbh->query("select * from totale_films ");

    $overzicht = "";
    while ($row = $data->fetch()) {
//        "<img src='Image/".$row['cover_image']."' />
//        $overzicht .= "{$row['cover_image']}
//    <p>{$row['title']}</p>";}
        $titel = $row['title'];
        $afbeeldingnaam = $row['cover_image'];
        $afbeeldinglocatie = "../afbeeldingen/films/".$afbeeldingnaam;
//        echo "<img src=""../afbeeldingen/films/" . $titel . ".png"" >";
        echo '<div class=filmposter><img src="'.$afbeeldinglocatie.'" width="200" height="150" alt="'.$titel.'"><p>'.$titel . '</p></div>';
    }

    ?>
        <p> "Actie!" </p>
        <?php
        $data = $dbh->query("select top 6 * from actie_films  ");

        $overzicht = "";
        while ($row = $data->fetch()) {
//        "<img src='Image/".$row['cover_image']."' />
//        $overzicht .= "{$row['cover_image']}
//    <p>{$row['title']}</p>";}
            $titel = $row['title'];
            $afbeeldingnaam = $row['cover_image'];
            $afbeeldinglocatie = "../afbeeldingen/films/".$afbeeldingnaam;
            echo '<div class=filmposter><img src="'.$afbeeldinglocatie.'" width="200" height="150" alt="'.$titel.'"><p>'.$titel . '</p></div>';
        }

        ?>
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
<!--/*-->
<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene en Ivan-->
<!-- * Versie: 1-->
<!-- * Datum: 16 maart 2018-->
<!---->
<!-- * Aangepast:-->
<!-- *hele pagina is nieuw"
<!- *
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
    <link rel="icon" href="../afbeeldingen/favicon.ico" />
</head>
<body>
<header>
    <?php printHeader(); ?>
</header>
<main>
        <div class="login">
            <a href="filmoverzicht.php?page_id=1" img src="../afbeeldingen/loading.gif" alt="Loading">
            <h3>Uw registratie is gelukt! Klik</h3> <a href="../php/aanmeldpagina.php">hier</a>  <h3>om aan te melden!</h3>
            <?php header( "refresh:5;url=filmoverzicht.php?page_id=1" ); ?>
        </div>
    </div>
</main>
<footer>
            <?php printFooter();?>
</footer>
</body>
</html>

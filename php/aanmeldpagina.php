<!--/*-->
<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene en Ivan-->
<!-- * Versie: 2-->
<!-- * Datum: 16 februari 2018-->
<!---->
<!-- * Aangepast:-->
<!-- * - headers aangepast zodat ze via functies gaan en include.
<!--*/-->
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
    <?php printHeaderLogo(); ?>
    <?php  printHeaderKnoppen(); ?>
</header>
<main>

    <?php
    if (isset($_SESSION['voornaam'])){
        header("Location: filmoverzicht.php");
    } else {
        echo '
    <div class="cover">
    <div class="login">
        <h1>Inloggen</h1>
        <img src="../afbeeldingen/slot.png" width="80" height="80" alt="login">';
        if (isset($_GET["msg"]) && $_GET["msg"] == "fout") {
            echo '<div class="meldingTekst">Uw gegevens worden niet herkent!</div>';
        }
        echo '</br>
        <form method="POST" action="testlogin.php" >
            <input type="text" placeholder="Gebruikersnaam" name="gebruikersnaam">
            <input type="password" placeholder="Wachtwoord" name="wachtwoord">
            <input type="submit" class="submit-button" value="Log in">
        </form>
        <a href="abonnement.php"><h4>Nog geen account? klik dan hier</h4></a>
    </div>
    </div>
    ';
    }
    ?>

</main>
<footer>
    <div class="footer">
            <?php printFooter();?>
    </div>
    <div class="bottom">
        <?php printCopyright();?>
    </div>
</footer>
</body>
</html>
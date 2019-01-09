<!--/*-->
<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene en Ivan-->
<!-- * Versie: 2-->
<!-- * Datum: 16 februari 2018-->
<!---->
<!-- * Aangepast:-->
<!-- * - Required bij html invoervelden toegevoegd-->
<!-- * - Query toegevoegd aan land, landen roept ie op via functie
<!-*/-->
<?php
include 'functies.php';

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
    <link rel="icon" href="../afbeeldingen/favicon.ico"/>
    <title>Kies uw abonnement</title>
    <link rel="stylesheet" href="../css/basisstijlen.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/inlogenregis.css">
    <link rel="stylesheet" href="../css/knoppen.css">
</head>
<body>
<header>
    <?php printHeader(); ?>
</header>
<main>
    <div class="cover">


        <div class="invoerveld">
            <h1>Kies uw abbonement</h1>


            <form method="post" action="nieuwaccount.php">
                <select name="abonnement">
                    <option value="Basic">Basis €4.99</option>
                    <option value="Pro">Pro €7.99</option>
                    <option value="Premium">Elite €11.99</option>
                </select>
                <input type="email" required name="email" required placeholder="Email">
<?php
//                if ($_SESSION['case'] == 'email') {
//                    echo "<h3 class = 'error'>Uw email is al in gebruik! Wachtwoord vergeten?</h3>";
//                }
?>
                <input type="text" name="voornaam" required placeholder="Voornaam">
                <input type="text" name="achternaam" required placeholder="Achternaam">
                <select name="land" required>
                <?php
                laadLanden();
                ?>
                </select>
                <input type="date" name="geboortejaar" required placeholder="Geboortejaar">
                <select name="betaalMethode" required>
                    <option value="Mastercard">Mastercard</option>
                    <option value="Visa">Visa</option>
                    <option value="Amex">Amex</option>
                </select>
                <input type="text" name="rekeningnummer" required placeholder="Rekeningnummer">
                <input type="password" name="wachtwoord" required placeholder="Wachtwoord">
                <input type="password" name="wachtwoord2" required placeholder="Wachtwoord herhalen">
<!--                --><?php
//                if ($_SESSION['case'] == 'wachtwoordFout') {
//                    echo "<h3 class = 'error'>Uw wachtwoorden komen niet overeen!</h3>";
//                }
//                ?>

                <input type="submit" class="button2" value="Registreer">
<!--                --><?php
//                if ($_SESSION['case'] == 'data') {
//                    echo "<h3 class = 'error'>De velden zijn niet goed ingevuld</h3>";
//                } else if ($_SESSION['case'] == 'velden') {
//                    echo "<h3 class = 'error'>Niet alle benodigde velden zijn ingevuld</h3>";
//                }
//                ?>
            </form>
        </div>


        <!--voornaam, achternaam, land, geboortejaar,-->
        <!--rekeningnummer, gebruikersnaam en 2x wachtwoord ingevuld en een abonnement-->
        <!--gekozen worden-->
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

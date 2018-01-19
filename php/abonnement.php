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
    <div class="logoheader">
        <?php include '../php/headerlogo.php';?>
    </div>
    <div class="headerbuttons">
        <?php include '../php/headerknop.php';?>
    </div>
</header>
<main>
    <div class="cover">


        <div class="invoerveld">
            <h1>Kies uw abbonement</h1>


            <form method="post" action="nieuwaccount.php">
                <select name="abonnement">
                    <option value="'Basic'">Basis €4.99</option>
                    <option value="'Pro'">Pro €7.99</option>
                    <option value="'Premium'">Elite €11.99</option>
                </select>
                <input type="email" name="email" placeholder="Email">
                <input type="text" name="voornaam" placeholder="Voornaam">
                <input type="text" name="achternaam" placeholder="Achternaam">
                <input type="text" name="land" placeholder="Land">
                <input type="date" name="geboortejaar" placeholder="Geboortejaar">
                <select name="betaalMethode">
                    <option value="'Ideal'">Ideal</option>
                    <option value="'Mastercard'">Mastercard</option>
                    <option value="'Visa'">Visa</option>
                    <option value="'Amex'">Amex</option>
                </select>
                <input type="text" name="rekeningnummer" placeholder="Rekeningnummer">
                <input type="text" name="gebruikersnaam" placeholder="Gebruikersnaam">
                <input type="password" name="wachtwoord" placeholder="Wachtwoord">
                <input type="password" name="wachtwoord2" placeholder="Wachtwoord herhalen">
                <input type="submit" class="button2" value="Registreer">
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
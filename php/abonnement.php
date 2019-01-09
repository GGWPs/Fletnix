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
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
    <link rel="icon" href="../afbeeldingen/favicon.ico"/>
    <title>Vul uw gegevens in en kies een abonnement</title>
    <link rel="stylesheet" href="../css/basisstijlen.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/inlogenregis.css">
    <link rel="stylesheet" href="../css/knoppen.css">
</head>
<body>
<header>
    <?php
    include 'functies.php';
    printHeader();
    if (isset($_SESSION['voornaam'])) {
        header("Location: filmoverzicht.php");
    }
    $emailError = "";
    $gebruikersnaamError = "";
    $wachtwoordError = "";
    $vergetenInTeVullen = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once 'databaseconnection.php';
        if (isset($_POST["abonnement"]) AND $_POST["abonnement"] != '' AND isset($_POST["email"]) AND $_POST["email"] != ''
            AND isset($_POST["gebruikersnaam"]) AND stripInvoer($_POST["gebruikersnaam"]) == $_POST["gebruikersnaam"] AND $_POST["gebruikersnaam"] != ''
            AND isset($_POST["voornaam"]) AND $_POST["voornaam"] != '' AND isset($_POST["achternaam"]) AND $_POST["achternaam"] != ''
            AND isset($_POST["land"]) AND $_POST["land"] != '' AND isset($_POST["rekeningnummer"]) AND $_POST["rekeningnummer"] != ''
            AND isset($_POST["wachtwoord"]) AND $_POST["wachtwoord"] != '' AND isset($_POST["wachtwoord2"]) AND $_POST["wachtwoord2"] != ''
            AND stripInvoer($_POST["wachtwoord"]) == $_POST["wachtwoord2"]) {
            $invoerCorrect = true;
        } else {
            $invoerCorrect = false;
        }
        $abonnement = $_POST["abonnement"];
        $email = $_POST["email"];
        $voornaam = $_POST["voornaam"];
        $achternaam = $_POST["achternaam"];
        $land = $_POST["land"];
        $geboortejaar = date("Y-m-d");
        $betaalMethode = $_POST["betaalMethode"];
        $rekeningnummer = $_POST["rekeningnummer"];
        $gebruikersnaam = $_POST["gebruikersnaam"];
        $wachtwoord = $_POST["wachtwoord"];
        $wachtwoord2 = $_POST["wachtwoord2"];
        $subscription_start = date("Y-m-d");
        $land = "Netherlands";


        if ($invoerCorrect && checkUniekEmail($email) && checkUniekGebruikersnaam($gebruikersnaam) && $wachtwoord == $wachtwoord2) {
            $sql = "insert into Customer (customer_mail_address,firstname,lastname,payment_method,payment_card_number,contract_type,subscription_start,subscription_end,user_name,password, country_name, gender)
         values (:email,:voornaam,:achternaam,:betaalmethode,:rekeningnummer,:abonnement,:datumregistratie,null,:gebruikersnaam,:wachtwoord, :land, null)";
            try {
                $sql = verbindDatabase()->query("insert into Customer (customer_mail_address,firstname,lastname,payment_method,payment_card_number,contract_type,subscription_start,subscription_end,user_name,password, country_name, gender)
         values ('$email','$voornaam','$achternaam','$betaalMethode','$rekeningnummer','$abonnement','$subscription_start',null,'$gebruikersnaam','$wachtwoord', '$land', null)");


                header("Location: ../php/accountaangemaakt.php");
                exit;
            } catch (PDOException $e) {
                echo 'Er bestaat al een account met deze gegevens. Klik <a href="../php/abonnement.php">Hier</a>  om terug te gaan\'';
            }
        } else {
            if (!checkUniekEmail($email)) {
                global $emailError;
                $emailError = "Deze Email is al in gebruik.";
            }
            if (!checkUniekGebruikersnaam($email)) {
                global $gebruikersnaamError;
                $gebruikersnaamError = "Deze Gebruikersnaam is al in gebruik.";
            }
            if ($wachtwoord != $wachtwoord2) {
                global $wachtwoordError;
                $wachtwoordError = "Wachtwoorden komen niet overeen.";
            } else {
                global $vergetenInTeVullen;
                $vergetenInTeVullen = "U bent vergeten iets in te vullen.";
            }
        }
    }
    ?>
</header>
<main>
    <div class="cover">

        <div class="invoerveld">
            <h1>Kies uw abbonement</h1>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <select name="abonnement">
                    <option value="Basic">Basis €4.99</option>
                    <option value="Pro">Pro €7.99</option>
                    <option value="Premium">Elite €11.99</option>
                </select>
                <span class="meldingTekst"><?php echo $emailError; ?></span>
                <input type="email" required name="email" required placeholder="Email">
                <span class="meldingTekst"><?php echo $gebruikersnaamError; ?></span>
                <input type="text" name="gebruikersnaam" required placeholder="Gebruikersnaam -> Hiermee logt u in">
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
                <span class="meldingTekst"><?php echo $wachtwoordError; ?></span>
                <input type="password" name="wachtwoord" required placeholder="Wachtwoord">
                <input type="password" name="wachtwoord2" required placeholder="Wachtwoord herhalen">
                <span class="meldingTekst"><?php echo $vergetenInTeVullen; ?></span>
                <input type="submit" class="button2" value="Registreer">

            </form>
        </div>
    </div>
</main>
<footer>
    <div class="footer">
        <div class="footer1">
            <?php printFooter1(); ?>
        </div>
        <div class="footer2">
            <?php printFooter2(); ?>
        </div>
    </div>
    <div class="bottom">
        <?php printCopyright(); ?>
    </div>
</footer>
</body>
</html>

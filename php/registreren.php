<!--
    * Team: Kaene Peters en Ivan Miladinovic
    * Auteur: Kaene en Ivan-
     Versie: 2
    * Datum: 16 februari 2018

    * Aangepast:
    * - Required bij html invoervelden toegevoegd
    * - Query toegevoegd aan land, landen roept ie op via functie
    * maxJaar, checkt nu op minimale leeftijd van 12 jaar.
    Data invoer aangepast met een functie dataMagInsertedWorden, hashing toegevoegd, toegevoegd dat gebruikers niet de limieten van database kolommen breken
-->

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
    <?php
    include 'functies.php';
    printHeader();
    if (isset($_SESSION['voornaam'])) {
        header("Location: filmoverzicht.php?page_id=1");
    }
    $emailQuery = "select * from Customer where customer_mail_address =?";
    $gebruikersnaamQuery = "select * from Customer where user_name =?";

    $emailError = "";
    $gebruikersnaamError = "";
    $wachtwoordError = "";
    $vergetenInTeVullen = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once 'databaseconnection.php';
        if (isset($_POST["abonnement"]) AND $_POST["abonnement"] != '' AND isset($_POST["email"]) AND $_POST["email"] != ''
            AND isset($_POST["gebruikersnaam"]) AND $_POST["gebruikersnaam"] != ''
            AND isset($_POST["voornaam"]) AND $_POST["voornaam"] != '' AND isset($_POST["achternaam"]) AND $_POST["achternaam"] != ''
            AND isset($_POST["land"]) AND $_POST["land"] != '' AND isset($_POST["rekeningnummer"]) AND $_POST["rekeningnummer"] != ''
            AND isset($_POST["wachtwoord"]) AND $_POST["wachtwoord"] != '' AND isset($_POST["wachtwoord2"]) AND $_POST["wachtwoord2"] != ''
            AND stripInvoer($_POST["wachtwoord"]) == $_POST["wachtwoord2"] AND stripInvoer($_POST["gebruikersnaam"]) == $_POST["gebruikersnaam"]) {
            $invoerCorrect = true;
        } else {
            $invoerCorrect = false;
        }
        $abonnement = $_POST["abonnement"];
        $email = $_POST["email"];
        $voornaam = $_POST["voornaam"];
        $achternaam = $_POST["achternaam"];
        $land = $_POST["land"];
        $date = strtotime($_POST["geboortejaar"]);
        $date = date('Y-m-d', $date);
        $geboortejaar = $date;
        $betaalMethode = $_POST["betaalMethode"];
        $rekeningnummer = $_POST["rekeningnummer"];
        $gebruikersnaam = $_POST["gebruikersnaam"];
        $wachtwoord = $_POST["wachtwoord"];
        $wachtwoord2 = $_POST["wachtwoord2"];
        $subscription_start = date("Y-m-d");

    if (dataMagInsertedWorden($invoerCorrect, $email, $emailQuery, $gebruikersnaam,$gebruikersnaamQuery, $wachtwoord, $wachtwoord2)) {
        try {
            $hash = password_hash($wachtwoord, PASSWORD_DEFAULT);
            $data = verbindDatabase()->prepare("insert into Customer (customer_mail_address,firstname,lastname,payment_method,payment_card_number,contract_type,subscription_start,subscription_end,user_name,password, country_name, gender, birth_date)
         Values (?,?,?,?,?,?,?,?,?,?,?,?,?)");

            $data->execute(array($email, $voornaam, $achternaam, $betaalMethode, $rekeningnummer, $abonnement, $subscription_start, null, $gebruikersnaam, $hash, $land, null, $geboortejaar));
            header("Location: ../php/accountaangemaakt.php");
            exit;
        } catch (PDOException $e) {
            echo $e;
        }
    } else {
        if (!checkUniek($emailQuery, $email)) {
            global $emailError;
            $emailError = "Deze email is al in gebruik.";
        }
        if (!checkUniek($gebruikersnaamQuery, $gebruikersnaam)) {
            global $gebruikersnaamError;
            $gebruikersnaamError = "Deze gebruikersnaam is al in gebruik.";
        }
        if (stripInvoer($wachtwoord)) {
            global $wachtwoordError;
            $wachtwoordError = "Dit is geen juist wachtwoord, u mag geen vreemde tekens zoals @ gebruiken of spaties.";

        } elseif ($wachtwoord != $wachtwoord2) {
            global $wachtwoordError;
            $wachtwoordError = "Wachtwoorden komen niet overeen.";
        }

    }

}
/* Dit haalt het huidige jaar op en haalt er twaalf jaar eraf zodat alleen ouder dan 12 jaar oud kunnen registeren */
$time = new DateTime('now');
$maxJaar = $time->modify('-12 year')->format('Y-m-d');


$land_options = null;
$land_options = laadLanden($land_options);
?>
<main>
    <div class="cover">
        <div class="invoerveld">
            <h1>Kies uw abbonement</h1>
            <form method="post" action="
            <?= $_SERVER['PHP_SELF'] ?>">
                <select name="abonnement">
                    <option value="Basic">Basis €4.99</option>
                    <option value="Pro">Pro €7.99</option>
                    <option value="Premium">Elite €11.99</option>
                </select>
                <span class="meldingTekst">
                    <?= $emailError ?></span>
                <input type="email" required name="email" required placeholder="Email" maxlength="255">
                <input type="text" name="voornaam" required placeholder="Voornaam" maxlength="50">
                <input type="text" name="achternaam" required placeholder="Achternaam" maxlength="50">
                <select name="land" required>
                    <?= $land_options ?>
                </select>
                <input type="date" name="geboortejaar" min="1900-01-01"
                       max="<?= $maxJaar ?>">
                <select name="betaalMethode">
                    <option value="Mastercard">Mastercard</option>
                    <option value="Visa">Visa</option>
                    <option value="Amex">Amex</option>
                </select>
                <input type="text" name="rekeningnummer" required placeholder="Rekeningnummer">
                <span class="meldingTekst"><?= $gebruikersnaamError ?></span>
                <input type="text" name="gebruikersnaam" required placeholder="Gebruikersnaam -> Hiermee logt u in" maxlength="50">
                <span class="meldingTekst"><?= $wachtwoordError ?></span>
                <input type="password" name="wachtwoord" required placeholder="Wachtwoord" maxlength="255">
                <input type="password" name="wachtwoord2" required placeholder="Wachtwoord herhalen" maxlength="255">
                <span class="meldingTekst"><?= $vergetenInTeVullen ?></span>
                <input type="submit" class="button2" value="Registreer">
            </form>
        </div>
    </div>
</main>
<?php printFooter(); ?>
</html>

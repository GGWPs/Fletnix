<!--/*-->
<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene en Ivan-->
<!-- * Versie: 2-->
<!-- * Datum: 16 februari 2018-->
<!---->
<!-- * Aangepast:-->
<!-- * - aangepast-->
<!-- * - wachtwoord check verbeterd
<!--*/-->

<?php
session_start();
require_once '../php/databaseconnection.php';

if (isset($_POST["abonnement"]) AND $_POST["abonnement"] != '' AND isset($_POST["email"]) AND $_POST["email"] != ''
    AND isset($_POST["voornaam"]) AND $_POST["voornaam"] != '' AND isset($_POST["achternaam"])  AND $_POST["achternaam"] != ''
    AND isset($_POST["land"]) AND $_POST["land"] != '' AND isset($_POST["rekeningnummer"]) AND $_POST["rekeningnummer"] != ''
    AND isset($_POST["wachtwoord"]) AND $_POST["wachtwoord"] != '' AND isset($_POST["wachtwoord2"]) AND $_POST["wachtwoord2"] != '') {
    $invoer = true;
} else {
    $invoer = false;
}

$abonnement = $_POST["abonnement"];
$email = $_POST["email"];
$voornaam = $_POST["voornaam"];
$achternaam = $_POST["achternaam"];
$land = $_POST["land"];
$geboortejaar = date("Y-m-d");
$betaalMethode = $_POST["betaalMethode"];
$rekeningnummer = $_POST["rekeningnummer"];
$gebruikersnaam = $email;
$wachtwoord = $_POST["wachtwoord"];
$wachtwoord2 = $_POST["wachtwoord2"];
$subscription_start = date("Y-m-d") ;
$land = "Netherlands";



//if ($wachtwoord != $wachtwoord2) {
//    $_POST["Uw wachtwoorden komen niet overheen!"];
//    header("Location: ../php/abonnement.php");
//    exit;
//} else {

//date("Y-m-d") ;
//new DateTime($_POST["geboortejaar"]);

//$sql = "insert into Customer (customer_mail_address,firstname,lastname,payment_method,payment_card_number,contract_type,subscription_start,subscription_end,user_name,password, country_name, gender)
//         values (:email,:voornaam,:achternaam,:betaalmethode,:rekeningnummer,:abonnement,:datumregistratie,null,:gebruikersnaam,:wachtwoord, :land, null)";
    try {
//        $sql = $dbh->query("insert into Customer (customer_mail_address,firstname,lastname,payment_method,payment_card_number,contract_type,subscription_start,subscription_end,user_name,password, country_name, gender)
//         values ('$email','$voornaam','$achternaam','$betaalMethode','$rekeningnummer','$abonnement','$subscription_start',null,'$gebruikersnaam','$wachtwoord', '$land', null)");



        header("Location: ../php/accountaangemaakt.php");
        exit;
    } catch (PDOException $e) {
        echo 'Er bestaat al een account met deze gegevens. Klik <a href="../php/abonnement.php">Hier</a>  om terug te gaan\'';
//. $e->getMessage()
    }

//$result = $dbh->insertQuery($sql);
//if(!empty($result)) {
//    $error_message = "";
//    $success_message = "You have registered successfully!";
//    unset($_POST);
//} else {
//    $error_message = "Problem in registration. Try Again!";
//}
//print_r($sql);
//$query->execute(
//    array( ':email' => $email, 	':voornaam' => $voornaam, ':achternaam' => $achternaam, ':betaalmethode' => $betaalMethode, ':rekeningnummer' => $rekeningnummer, ':abonnement' => $abonnement, ':datumregistratie' => $subscription_start, ':gebruikersnaam' => $gebruikersnaam, ':wachtwoord' => $wachtwoord, ':land' => $land));
//



//$zetnieuwaccountindb = "insert into Customer (customer_mail_address,firstname,lastname,payment_method,payment_card_number,contract_type,subscription_start,subscription_end,user_name,password,country_name)
//                        values ('a@b.nl','asdf','fdasfa','Mastercard',12312312412312,'basic',getdate(),null,'johnanana123','Pass123','Netherlands')";
?>
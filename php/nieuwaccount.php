<?php
/**
 * Created by PhpStorm.
 * User: Kaene-laptop
 * Date: 12/01/2018
 * Time: 11:44
 */




include '../php/databaseconnection.php';

print_r($_POST);

$sql = "insert into Customer (customer_mail_address,firstname,lastname,payment_method,payment_card_number,contract_type,subscription_start,subscription_end,user_name,password,country_name)
         values (:email,:voornaam,:achternaam,null,:rekeningnummer,'basic',getdate(),null,'johnanana123','Pass123','Netherlands')";

$query = $dbh->prepare($sql);
$query->execute(
    array( ':cijfer' => $cijfer, 	':vak' => $vak	));

//$email = $_POST("email");
//$voornaam = $_POST("voornaam");
//$achternaam = $_POST("achternaam");
//$land = $_POST("land");
//$geboortejaar = $_POST("geboortejaar");
//$rekeningnummer = $_POST("rekeningnummer");
//$gebruikersnaam = $_POST("gebruikersnaam");
//$wachtwoord = $_POST("wachtwoord");
//$wachtwoord2 = $_POST("wachtwoord2");
//


$zetnieuwaccountindb = "insert into Customer (customer_mail_address,firstname,lastname,payment_method,payment_card_number,contract_type,subscription_start,subscription_end,user_name,password,country_name)
                        values ('a@b.nl','asdf','fdasfa','Mastercard',12312312412312,'basic',getdate(),null,'johnanana123','Pass123','Netherlands')";
?>
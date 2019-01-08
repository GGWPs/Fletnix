<!--/*-->
<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene en Ivan-->
<!-- * Versie: 2-->
<!-- * Datum: 16 februari 2018-->
<!---->
<!-- * Aangepast:-->
<!-- * - aangepast-->
<!-- * - header toegevoegd die terug gaat en gebruiker laat weten dat gegevens onjuist zijn
</-->

<?php
session_start();

require_once 'databaseconnection.php';

$stmt = verbindDatabase()->prepare("SELECT * FROM Customer WHERE user_name = :value1 AND password = :value2");


$stmt->execute(array(":value1" => $_POST["gebruikersnaam"], ":value2" => $_POST["password"]));

$result = $stmt->fetch();
if(!empty($result)){

    $_SESSION['voornaam'] = $result["firstname"];
    $_SESSION['achternaam'] = $result["lastname"];
    setlocale(LC_ALL, 'nl_NL') or setlocale(LC_ALL, 'nld_NLD');
    $_SESSION['logintijd'] = date("H:i") ;
    header("Location: ../php/filmoverzicht.php");
    die();
}
else
{
    header("location:aanmeldpagina.php?msg=fout");
}
?>
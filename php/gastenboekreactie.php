<!-- * Team: Kaene Peters en Ivan Miladinovic
    * Auteur: Kaene en Ivan
     * Versie: 2
    * Datum: 16/01/2019
    * geen aanpassingen
-->
<?php
session_start();

require_once '../php/databaseconnection.php';
$naam = $_SESSION['voornaam'] . " " . $_SESSION['achternaam'];
$today = date("Y-m-d H:s");
$bericht = $_POST["comment"];
try {
    $stmt = verbindDatabase()->prepare("insert into Gastenboek (naam,datum,bericht) 
                                VALUES (?,?,?)");
    $stmt->execute(array($naam, $today,$bericht));

    header("Location: ../php/gastboek.php");
    exit;
} catch (PDOException $e) {
    echo "Er is iets mis gegaan. ";
    header("Location: ../php/gastboek.php");
    exit;
}

?>
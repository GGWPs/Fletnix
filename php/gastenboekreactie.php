<!--/*-->
<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene-->
<!-- * Versie: 1-->
<!-- * Datum: 14 maart 2018-->
<!---->
<!-- * Aangepast:-->
<!-- *Gastenboek is alleen voor de herkansing dus deze hele pagina is "nieuw"
<!- *
<!-*/-->
<?php
session_start();

require_once '../php/databaseconnection.php';
$naam = $_SESSION['voornaam'] . " " . $_SESSION['achternaam'];
$today = date("Y-m-d H:s");
$bericht = $_POST["comment"];
try {
    $dbh = verbindDatabase();

    $stmt = $dbh->prepare("insert into Gastenboek (naam,datum,bericht) 
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
<!--/*-->
<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene-->
<!-- * Versie: 1-->
<!-- * Datum: 14 maart 2018-->
<!---->
<!-- * Aangepast:-->
<!-- *Gastenboek is alleen voor de herkansing dus deze hele pagina is "nieuw"
<!-- *
<!--*/-->
<?php
session_start();

require_once '../php/databaseconnection.php';
$naam = $_SESSION['voornaam']." ".$_SESSION['achternaam'];
$stmt = $dbh->prepare("insert into Gastenboek (naam,datum,bericht) 
                                VALUES ('".$naam."',getdate()),':value1')");
$stmt->execute("value1");$_POST["comment"];





?>
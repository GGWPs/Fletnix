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

$stmt = $dbh->prepare("insert into Gastenboek (id,naam,datum,bericht) 
                                VALUES ('".$_SESSION['voornaam']." ".$_SESSION['achternaam'].",getdate()),:value1)");
$stmt->execute(array("value1" =>$_POST["comment"] ));





?>
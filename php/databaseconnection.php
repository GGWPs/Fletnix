<!--
    Team: Kaene Peters en Ivan Miladinovic
    Auteur: Kaene en Ivan
    Versie: 1
 *  Datum: 10/01/2019

    Aangepast:
  * Kleine aanpassing en in functie gezet.
 *
-->
<?php

//preconditie: -
//postconditie: Deze functie geeft een databasehandler terug
function verbindDatabase()
{
    $hostname = "localhost";
    $dbname = "FLETNIX_DOCENT";
    $username = "sa";
    $password = "fojmBNHfMyYjHB6boNcZ";

    try {
        $dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$password");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Er ging iets mis met de database.<br>";
        echo "De melding is {$e->getMessage()}<br><br>";
    }
    return $dbh;
}
?>

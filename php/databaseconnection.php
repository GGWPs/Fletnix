<!--/*-->
<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene en Ivan-->
<!-- * Versie: 2-->
<!-- * 08/01/2019-->
<!---->
<!-- * Aangepast:-->
<!-- * - Functie toegevoegd. -->
<!--*/-->
<?php
//preconditie: -
//postconditie: Deze functie geeft een databasehandler terug
function verbindDatabase()
{
    $hostname = "localhost";
//    $password = "Hacker11";
    $dbname = "FLETNIX_DOCENT";
    $password = "fojmBNHfMyYjHB6boNcZ";
    $username = "sa";
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

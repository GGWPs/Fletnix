<?php

$hostname = "localhost";
//$dbname = "FLETNIX_DOCENT2";
$dbname = "FLETNIX_DOCENT";
$username = "sa";
$password = "fojmBNHfMyYjHB6boNcZ";
//$password = "Hacker11";

try {
    $dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$password");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Er ging iets mis met de database.<br>";   echo "De melding is {$e->getMessage()}<br><br>";
}


?>
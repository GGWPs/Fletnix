<?php

$hostname = "localhost";
//$dbname = "FLETNIX_DOCENT2";
//$password = "Hacker11";
$dbname = "FLETNIX_DOCENT";
$password = "fojmBNHfMyYjHB6boNcZ";
$username = "sa";

try {
    $dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$password");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Er ging iets mis met de database.<br>";   echo "De melding is {$e->getMessage()}<br><br>";
}


?>
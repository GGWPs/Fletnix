<?php

$hostname = "localhost";
$dbname = "FLETNIX_DOCENT";
$username = "sa";
$password = "fojmBNHfMyYjHB6boNcZ"; /* Kaene's wachtwoord Swieber niet stelen  !PAS DIT AAN ALS JE HET WILT TESTEN!
 (overigens ook de andere waardes hierboven als die anders zijn bij jou*/

try {
    $dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$password");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Er ging iets mis met de database.<br>";   echo "De melding is {$e->getMessage()}<br><br>";
}
//@@@@Voorbeelden@@@@@
//$data = $dbh->query('SELECT TOP 20 * FROM Customer');
//
//while ($row = $data->fetch()){
//    echo "$row[lastname] $row[firstname]</br>";
//}

//$dbh->query("insert into Person (person_id, lastname, firstname, gender)
//values (945466, 'Kaene', 'Peters', 'M')");


?>
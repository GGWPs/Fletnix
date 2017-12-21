<?php
// $hostname = "(local)";
//$dbname = "FLETNIX_DOCENT";
//$username = "sa";
//$pw = "fojmBNHfMyYjHB6boNcZ";
//$dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$pw");
//$data = $dbh->query("select top 2000 customer_mail_address
//from Customer");
//while ($row = $data->fetch()) {
//    echo "$row firstname $row lastname</br>";
//}



echo '<pre>';
print_r(PDO::getAvailableDrivers());
echo '</pre>';

phpinfo();

?>

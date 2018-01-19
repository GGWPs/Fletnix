<?php

include '../php/databaseconnection.php';

$stmt = $dbh->prepare("SELECT * FROM account WHERE customer_mail_address = :value1 AND password = :value2");

$stmt->execute(array(":value1" => $_POST["email"], ":value2" => $_POST["password"]));

$result = $stmt->fetchAll();
print_r();
if(!empty($result))
{
    echo "Success!.";
}
else
{
    echo "Uw gegevens worden niet herkent!";
}
?>
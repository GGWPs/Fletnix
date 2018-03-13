<?php
session_start();

require_once '../php/databaseconnection.php';
$stmt = $dbh->prepare("SELECT * FROM Customer WHERE user_name = :value1 AND password = :value2");


$stmt->execute(array(":value1" => $_POST["gebruikersnaam"], ":value2" => $_POST["password"]));

$result = $stmt->fetch();
if(!empty($result)){
//while($row = sqlsrv_fetch_array($result)){
//    $_SESSION['naam'] = $row['firstname'];
//    $_SESSION['email'] = $row['email'];
//    $_SESSION['password'] = $row['password'];
//}
//    $row = mysqli_fetch_assoc($result);
//    echo "Result: " . $row[firstname];
//

    $_SESSION['voornaam'] = $result["firstname"];
    $_SESSION['achternaam'] = $result["lastname"];
    setlocale(LC_ALL, 'nl_NL') or setlocale(LC_ALL, 'nld_NLD');
    $_SESSION['logintijd'] = date("H:i") ;
//    print_r($_SESSION);
//    print_r($_SESSION['voornaam']);
    header("Location: ../php/filmoverzicht.php");
    die();
}
else
{
    header("location:aanmeldpagina.php?msg=fout");
}
?>
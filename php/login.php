<!--/*-->
<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene en Ivan-->
<!-- * Versie: 2-->
<!-- * Datum: 11 januari 2019-->
<!---->
<!-- * Aangepast:-->
<!-- * - aangepast-->
<!-- * - header toegevoegd die terug gaat en gebruiker laat weten dat gegevens onjuist zijn, password hash toegevoegd
</-->

<?php
session_start();
require_once 'databaseconnection.php';
try {
    $stmt = verbindDatabase()->prepare("SELECT * FROM Customer WHERE user_name = :value1");
    $stmt->execute(array(":value1" => $_POST["gebruikersnaam"]));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $password_from_db = $result["password"];
    if(!isset($password_from_db)){
        echo "password from db";
    } else if(!password_verify($_POST["wachtwoord"],$password_from_db)){ //If the result is empty then there are no users with the submitted username+password
        echo "wwww";
    } else {
        $_SESSION['voornaam'] = $result["firstname"];
        $_SESSION['achternaam'] = $result["lastname"];
        setlocale(LC_ALL, 'nl_NL') or setlocale(LC_ALL, 'nld_NLD');
        $_SESSION['logintijd'] = date("H:i") ;
        header("Location: ../php/filmoverzicht.php?page_id=1");
        die();
    }
} catch(PDOException $e){
    header("location:aanmeldpagina.php?msg=fout");
}
?>
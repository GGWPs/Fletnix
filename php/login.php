<!--/*-->
<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene en Ivan-->
<!-- * Team: Kaene Peters en Ivan Miladinovic
    * Auteur: Kaene en Ivan
     * Versie: 3
    * Datum: 16/01/2019
         header toegevoegd die terug gaat en gebruiker laat weten dat de gegevens onjuist zijn, password hash toegevoegd,
         toegevoegd dat als de gebruiker met een niet gehashte ww inlogt, automatisch verandert naar hash
-->

<?php
session_start();
require_once 'databaseconnection.php';
try {
    $stmt = verbindDatabase()->prepare("SELECT * FROM Customer WHERE user_name = :value1");
    $stmt->execute(array(":value1" => $_POST["gebruikersnaam"]));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $password_from_db = $result["password"];
    if (!isset($password_from_db)) {
        header("location:aanmeldpagina.php?msg=fout");
    } else if (!password_verify($_POST["wachtwoord"], $password_from_db)) { //If the result is empty then there are no users with the submitted username+password
        if ($_POST["wachtwoord"] == $password_from_db) {
            $hash = password_hash($password_from_db, PASSWORD_DEFAULT);
            $stmt = verbindDatabase()->prepare("UPDATE Customer SET password = :value1 WHERE user_name = :value2");
            $stmt->execute(array(":value1" => $hash, ":value2" => $_POST["gebruikersnaam"]));

            $_SESSION['voornaam'] = $result["firstname"];
            $_SESSION['achternaam'] = $result["lastname"];
            setlocale(LC_ALL, 'nl_NL') or setlocale(LC_ALL, 'nld_NLD');
            $_SESSION['logintijd'] = date("H:i");
            header("Location: ../php/filmoverzicht.php?page_id=1");
            die();
        }
        header("location:aanmeldpagina.php?msg=fout");
    } else {
        $_SESSION['voornaam'] = $result["firstname"];
        $_SESSION['achternaam'] = $result["lastname"];
        setlocale(LC_ALL, 'nl_NL') or setlocale(LC_ALL, 'nld_NLD');
        $_SESSION['logintijd'] = date("H:i");
        header("Location: ../php/filmoverzicht.php?page_id=1");
        die();
    }
} catch (PDOException $e) {
    header("location:aanmeldpagina.php?msg=fout");
}
?>
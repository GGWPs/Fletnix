<!-- * Team: Kaene Peters en Ivan Miladinovic
    * Auteur: Kaene en Ivan
     * Versie: 2
    * Datum: 16/01/2019
    * Aangepast: checkUnieks , dataMagInsertedWorden toegevoegd
    Stripinvoer ,laadLanden functie aangepast, voerQuery functie toegevoegd
-->


<?php
require_once '../php/databaseconnection.php';

/* checkt of de email uniek is*/
function checkUniekEmail($email)
{
    $query = "select customer_mail_address from Customer where customer_mail_address = :customer_mail_address";
    $sql = verbindDatabase()->prepare($query);
    $sql->execute(array(
        ":customer_mail_address" => $email));
    $row = $sql->rowCount();
    if ($row == 0) {
        return true;
    } else {
        return false;
    }
}

/* checkt of de gebruikersnaam uniek is*/
function checkUniekGebruikersnaam($gebruikersnaam)
{
    $query = "select user_name from customer where user_name = :user_name";
    $sql = verbindDatabase()->prepare($query);
    $sql->execute(array(
        ":user_name" => $gebruikersnaam));
    $row = $sql->rowCount();
    if ($row == 0) {
        return true;
    } else {
        return false;
    }
}

/* print de header uit */
function printHeader()
{
    include '../php/header.php';
}

/* print de footer uit */
function printFooter()
{
    include '../php/footer.php';
}

function gastenBoekInvoer()
{
    echo '<form method = "post" action = "gastenboekreactie.php">
          <textarea name="comment" cols="30" rows="10" maxlength="200" required placeholder="Maximaal 255 karakters"></textarea>
          <input type="submit" class="button2" value="Plaatsen">
          </form>';
}

function roepComments()
{
    $query = verbindDatabase()->query('SELECT top 20 naam,datum,bericht FROM gastenboek order by datum desc');
    while ($r = $query->fetch()) {
        echo "<div class='commenttext'>" . $r["naam"] . " plaatste om" . '<br>' . $r["datum"] . '<br>' . $r["bericht"], '<br>' . '</div>';
    }
}

/*
 *
 *laad landen in voor bij registratie van gebruiker.
 */
function laadLanden($land_options)
{
    try {
        $data2 = verbindDatabase()->prepare("select country_name FROM Country");
        $data2->execute();
    } catch (PDOException $e) {
        $error = $e;
    }
    while ($country = $data2->fetch()) {
        $land_options .= '<option value="land1"> ' . $country["country_name"] . '</option>';
    }
    return $land_options;
}

/* Tekent de covers op de filmoverzicht pagina*/
function tekenFilms($filmSelectie)
{
    $resultaat = "";
    foreach ($filmSelectie as $film) {
        $fotoloc = $film['cover_image'];
        $filmid = $film['movie_id'];
        $resultaat .= '<a href="../php/afspelen.php?movieid=' . $filmid . '">
        <img src="../afbeeldingen/films/' . $fotoloc . '" width="150" height="100">
        </a>';
    }
    echo $resultaat;
}

function stripInvoer($invoer)
{
    $invoer1 = $invoer;
    $invoer = trim($invoer);
    $invoer = stripslashes($invoer);
    $invoer = htmlspecialchars($invoer);

    if ($invoer1 == $invoer) {
        return true;
    }
}


/* Een functie die alle booleans samenvat en een boolean returned */
function dataMagInsertedWorden($invoerCorrect, $email, $gebruikersnaam, $ww1, $ww2)
{
    if ($invoerCorrect && checkUniekEmail($email) && checkUniekGebruikersnaam($gebruikersnaam) && $ww1 == $ww2) {
        return true;
    }
}

/* voert een query uit en geeft de gegevens van de query terug */
function voerQueryUit($query, $movieid){
    $data = verbindDatabase()->prepare($query);
    $data->execute([$movieid]);
    $gegevens = $data->fetchAll();
    return $gegevens;
}
?>
<!-- * Team: Kaene Peters en Ivan Miladinovic
    * Auteur: Kaene en Ivan
     * Versie: 2
    * Datum: 16/01/2019
    * Aangepast: checkUnieks , dataMagInsertedWorden toegevoegd
    Stripinvoer ,laadLanden functie aangepast, voerQuery functie toegevoegd
-->


<?php
require_once '../php/databaseconnection.php';

function checkUniek($query, $variabel)
{
    $sql = verbindDatabase()->prepare($query);
    $sql->execute([$variabel]);
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


/* Dit roept de comments op voor de gasten pagina */
function roepComments()
{
    $query = verbindDatabase()->query('SELECT top 20 naam,datum,bericht FROM gastenboek order by datum desc');
    while ($r = $query->fetch()) {
        echo "<div class='comment'>" . $r["naam"] . " plaatste om" . '<br>' . date('d-m-Y H:i',strtotime($r["datum"])) . '<br>' . $r["bericht"], '<br>' . '</div>';
    }
}
/*
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
        $land_options .= '<option name="land"> ' . $country["country_name"] . '</option>';
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
function dataMagInsertedWorden($invoerCorrect, $email, $emailQuery, $gebruikersnaam,$gebruikersnaamQuery, $ww1, $ww2)
{
    if ($invoerCorrect && checkUniek($emailQuery, $email) && checkUniek($gebruikersnaamQuery,$gebruikersnaam) && $ww1 == $ww2) {
        return true;
    }
}

/* voert een meegegeven query uit en geeft de gegevens van de query terug */
function voerQueryUit($query, $gegeven){
    $data = verbindDatabase()->prepare($query);
    $data->execute([$gegeven]);
    $gegevens = $data->fetchAll();
    return $gegevens;
}
?>
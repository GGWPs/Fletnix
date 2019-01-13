<!-- * Team: Kaene Peters en Ivan Miladinovic
    * Auteur: Kaene en Ivan
     * Versie: 2
    * Datum: 16/01/2019
    * Aangepast: checkUnieks , dataMagInsertedWorden toegevoegd
    Stripinvoer ,laadLanden functie aangepast
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

function printHeader()
{
    include '../php/header.php';
}

function printFooter()
{
    include '../php/footer.php';
}

function gastenBoekInvoer()
{
    echo '<form method = "post" action = "gastenboekreactie.php">';
    echo '<textarea name="comment" cols="30" rows="10" maxlength="200" required placeholder="Maximaal 255 karakters"></textarea>';
    echo '<input type="submit" class="button2" value="Plaatsen">';
    echo '</form>';
}

function roepComments()
{
    $query = verbindDatabase()->query('SELECT top 7 naam,datum,bericht FROM gastenboek order by datum desc');
    while ($r = $query->fetch()) {
        echo "<div class='commenttext'>" . $r["naam"] . " plaatste om" . '<br>' . $r["datum"] . '<br>' . $r["bericht"], '<br>' . '</div>';
    }

}


/*
 *
 *laad landen in voor bij abbonement keuze
 */
function laadLanden($land_options)
{
    try {
        $data2 = verbindDatabase()->prepare("select country_name FROM Country");
        $data2->execute();
    } catch (PDOException $e) {
        $error = $e;
    }
    while($country = $data2->fetch()){
        $land_options .= '<option value="land1"> '.$country["country_name"].'</option>';
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

function tekenCast($movieid){
    $cast = "SELECT firstname+ ' ' +lastname AS Name, role FROM Movie_Cast INNER JOIN Person ON Movie_Cast.person_id=Person.person_id WHERE movie_id=?";
    $query = verbindDatabase()->prepare($cast);
    $query->execute([$movieid]);
    $gegevenscast = $query->fetchAll();

    $casttabel = '<div class="cast"><h2>Cast</h2><table>
                  <tr><th>Naam</th><th>Rol</th></tr>';
    if (!empty($gegevenscast)) {
        for ($i = 0; $i < count($gegevenscast); $i++) {
            $casttabel .= "<tr>";
            $casttabel .= "<th>" . $gegevenscast[$i][0] . "</th>";
            $casttabel .= "<td>" . $gegevenscast[$i][1] . "</td>";
            $casttabel .= "</tr>";
        }
    }
    if (!empty($gegevensregisseur)) {
        $casttabel .= "<tr>";
        $casttabel .= "<th>" . $gegevensregisseur [0][0] . "</th>";
        $casttabel .= "<td>Regisseur</td>";
        $casttabel .= "</tr>";
    }
    $casttabel .= '</table></div>';
    echo $casttabel;
}

?>
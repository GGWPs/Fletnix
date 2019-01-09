<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene en Ivan-->
<!-- * Versie: 2-->
<!-- * Datum: 09/01/2019-->
<!---->
<!-- * Aangepast: checkUnieks toegevoegd-->
<!---->


<?php
require_once '../php/databaseconnection.php';

function checkUniekEmail($email){
    $query = "select customer_mail_address from Customer where customer_mail_address = :customer_mail_address";
    $sql = verbindDatabase()->prepare($query);
    $sql->execute(array(
        ":customer_mail_address" => $email));
    $row = $sql->rowCount();
    if ($row == 0){
        return true;
    }
    else{
        return false;
    }
}
function checkUniekGebruikersnaam($gebruikersnaam){
    $query = "select user_name from customer where user_name = :user_name";
    $sql = verbindDatabase()->prepare($query);
    $sql->execute(array(
        ":user_name" => $gebruikersnaam));
    $row = $sql->rowCount();
    if ($row == 0){
        return true;
    }
    else{
        return false;
    }
}

function printHeader()
{
    include '../php/headerlogo.php';
    include '../php/headerknoppen.php';
}

function printFooter()
{
    include '../php/footer.php';
}


function printCopyright()
{
    include '../php/copyright.php';
}

function gastenBoekInvoer(){

    echo '<form method = "post" action = "gastenboekreactie.php">';
    echo '<textarea name="comment" id="" cols="30" rows="10" maxlength="200" required placeholder="Maximaal 255 karakters"></textarea>';
    echo '<input type="submit" class="button2" value="Plaatsen">';
    echo '</form>';
}

function roepComments(){
    $dbh = verbindDatabase();

    $query = $dbh->query('SELECT top 7 naam,datum,bericht FROM gastenboek order by datum desc');
    while ($r = $query->fetch()) {
        echo "<div class='commenttext'>" . $r["naam"] ." plaatste om". '<br>' . $r["datum"] . '<br>' . $r["bericht"], '<br>' . '</div>';
    }

}


/*
 *
 *laad landen in voor bij abbonement keuze
 */
function laadLanden(){
    $dbh = verbindDatabase();

                foreach ($dbh ->query( $sql = "select country_name FROM Country") as $row) {
                    echo "<option value=\"land1\">" . $row['country_name'] . "\t" . "</option>";
                }

}

function tekenFilms ($i)
{
    $resultaat="";
    foreach ($i as $film) {
        $fotoloc = $film['cover_image'];
        $filmid = $film['movie_id'];
        $resultaat.= '<a href="../php/afspelen.php?movieid='. $filmid . '">
        <img src="../afbeeldingen/films/'.$fotoloc.'" width="150" height="100"
        </a>';
    }
    echo $resultaat;
}

function stripInvoer($invoer)
{
    $invoer = trim($invoer);
    $invoer = stripslashes($invoer);
    $invoer = htmlspecialchars($invoer);
    return $invoer;
}

function stripInvoerCorrect ($invoer)
{
    if(stripInvoer($invoer) == $invoer)
        return true;

}

?>
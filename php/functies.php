<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene en Ivan-->
<!-- * Versie: 1-->
<!-- * Datum: 16 maart 2018-->
<!---->
<!-- * Aangepast: alles is nieuw.-->
<!---->


<?php
require_once '../php/databaseconnection.php';




function printHeaderLogo()
{
    include '../php/headerlogo.php';
}

function printHeaderKnoppen()
{
    include '../php/headerknoppen.php';
}

function printFooter1()
{
    include '../php/footer1.php';
}

function printFooter2()
{
    include '../php/footer2.php';
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
        <img src="../afbeeldingen/films/'.$fotoloc.'" width="200" height="150"
        </a>';
    }
    echo $resultaat;
}

?>
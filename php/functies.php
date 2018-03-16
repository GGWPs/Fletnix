<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene en Ivan-->
<!-- * Versie: 1-->
<!-- * Datum: 16 maart 2018-->
<!---->
<!-- * Aangepast: alles is nieuw.-->
<!---->


<?php
require_once '../php/databaseconnection.php';
function connectDB(){
    $dbh = connectData();
//    try {
//        $dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$password");
//        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    } catch(PDOException $e) {
//        echo "Er ging iets mis met de database.<br>";   echo "De melding is {$e->getMessage()}<br><br>";
//    }
}

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
    $dbh = connectData();

    $query = $dbh->query('SELECT top 7 naam,datum,bericht FROM gastenboek order by datum desc');
    while ($r = $query->fetch()) {
        echo "<div class='commenttext'>" . $r["naam"] ." plaatste om". '<br>' . $r["datum"] . '<br>' . $r["bericht"], '<br>' . '</div>';
    }

}

function zoekFilm()
{

    require_once '../php/databaseconnection.php';
    $zoek = $_POST["zoekFunctie"];
    $sql = "select top 30 * from Movie where title like '%.$zoek.%' and movie_id in (select movie_id from Movie where movie_id = 300231 or movie_id = 300230 or movie_id = 300232 or movie_id = 412321
    or movie_id = 311506 or movie_id = 412323 or movie_id = 412322 or movie_id = 146822 or movie_id = 112290 or movie_id = 267038 or movie_id = 412324 
    or movie_id = 176711 or movie_id = 207992 ) ";
    echo "<h2>U zocht op $zoek" . '</h2>' . '<br>';
    foreach ($dbh->query($sql) as $row) {
        print $row['title'] . "\t";
        print $row['description'] . "\t";
        echo "</br>";
    }


}

/*
 *
 *laad landen in voor bij abbonement keuze
 */
function laadLanden(){

        $dbh = connectData();

                foreach ($dbh ->query( $sql = "select country_name FROM Country") as $row) {
                    echo "<option value=\"land1\">" . $row['country_name'] . "\t" . "</option>";
                }


}

function tekenFilms ($i)
{
    $resultaat="";
    foreach ($i as $film) {
        $foto = $film['cover_image'];
        $films = $film['movie_id'];
        $titel = $film['title'];
        $resultaat.= '<a href="../php/afspelen.php?movieid='. $films . '">
        <img src="../afbeeldingen/films/'.$foto.'" width="200" height="150" alt="'.$titel.'"><p>'.$titel . '</p>
        </a>';
    }
    echo $resultaat;
}

?>
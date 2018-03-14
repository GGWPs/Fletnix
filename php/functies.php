<?php
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

function gastenBoekInvoer()
{

    echo '<form method = "post" action = "gastenboekreactie.php">';
    echo '<textarea name="comment" id="" cols="30" rows="10" required placeholder="Laat hier uw reactie achter"></textarea>';
    echo '<input type="submit" class="button2" value="Plaatsen">';
    echo '</form>';
}

function roepComments()
{

    require_once '../php/databaseconnection.php';

    echo '<h2 > Laatste berichten </h2 >';

    $query = $dbh->query('SELECT top 10 * FROM gastenboek ');
    while ($r = $query->fetch()) {
        echo "<div>" . $r["naam"] . '<br>' . $r["datum"] . '<br>' . $r["bericht"], '<br>' . '</div>' . '<hr/>';
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


?>
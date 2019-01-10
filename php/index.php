<!--/*-->
<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene en Ivan-->
<!-- * Versie: 2-->
<!-- * Datum: 16 februari 2018-->
<!---->
<!-- * Aangepast:-->
<!-- * - aangepast-->
<!-- * - header opgeroepen via functie
<!-*/-->
<?php
include 'functies.php';
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/basisstijlen.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/knoppen.css">

    <link rel="icon" href="../afbeeldingen/favicon.ico"/>
    <title>Fletnix</title>

</head>
<body>
<!--Een wervende homepage die duidelijk maakt wat er op deze website te halen valt en-->
<!--wie de doelgroep is. Je kan de doelgroep ook benoemen (bijvoorbeeld in de-->
<!--ondertitel), extra welkom heten, met leuke statements binnenhalen. Ook de naam van-->
<!--de website/videodienst mogen jullie aanpassen.-->
<header>
    <?php printHeader(); ?>
</header>
<main>
    <div class="cover">
            <div class="tekst">
                <h1>Welkom bij Fletnix. Voor iedereen die van films houdt!</h1>
                <button class="button2" type="button" onclick="window.location.href='abonnement.php'">Abonneer nu!
                </button>
            </div>
            <div class="prijsLijst">
                <img src="../afbeeldingen/prijs.png" width="150" height="150" alt="Fletnix logo">
                <h1>Prijzen</h1>
                <table>
                    <tr>
                        <th>Abonnement:</th>
                        <th>Basis</th>
                        <th>Pro</th>
                        <th>Elite</th>
                    </tr>
                    <tr>
                        <td>Prijzen</td>
                        <td>€4.99</td>
                        <td>€7.99</td>
                        <td>€11.99</td>
                    </tr>
                    <tr>
                        <td>Films downloaden</td>
                        <td>ja</td>
                        <td>ja</td>
                        <td>ja</td>
                    </tr>
                    <tr>
                        <td>Aantal schermen</td>
                        <td>1</td>
                        <td>3</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>Altijd opzegbaar</td>
                        <td>ja</td>
                        <td>ja</td>
                        <td>ja</td>
                    </tr>
                    <tr>
                        <td>Max uren per week</td>
                        <td>20</td>
                        <td>onbeperkt</td>
                        <td>onbeperkt</td>
                    </tr>
                    <tr>
                        <td>Kwaliteit</td>
                        <td>720p</td>
                        <td>1080p</td>
                        <td>4k</td>
                    </tr>
                    <tr>
                        <td>Premiéres</td>
                        <td>nee</td>
                        <td>nee</td>
                        <td>ja</td>
                    </tr>
                    <tr>
                        <td>Originele series</td>
                        <td>nee</td>
                        <td>ja</td>
                        <td>ja</td>
                    </tr>
                </table>
                <br>
                <button class="button2" type="button" onclick="window.location.href='abonnement.php'">Koop nu!</button>
            </div>
        </div>


        <!--Een wervende homepage die duidelijk maakt wat er op deze website te halen valt en-->
        <!--wie de doelgroep is. Je kan de doelgroep ook benoemen (bijvoorbeeld in de-->
        <!--ondertitel), extra welkom heten, met leuke statements binnenhalen. Ook de naam van-->
        <!--de website/videodienst mogen jullie aanpassen.-->
</main>
<footer>
        <?php printFooter(); ?>
</footer>
</body>
</html>
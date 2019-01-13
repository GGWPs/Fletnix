<!-- * Team: Kaene Peters en Ivan Miladinovic
    * Auteur: Kaene en Ivan
     * Versie: 2
    * Datum: 11/01/2019
    * Divs weggehaald en code iets efficiënter gemaakt
-->

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
    <link rel="stylesheet" href="../css/gastboek.css">
    <link rel="icon" href="../afbeeldingen/favicon.ico">
    <title>Fletnix</title>

</head>
<body>

<main>
    <?php printHeader(); ?>
    <div class="gastenboek">
        <div class="titel"><h1> Welkom bij ons gastenboek hier kunt u een reactie op onze website achterlaten</h1>
            </div>
        <?php
        if (isset($_SESSION['voornaam'])) {
            echo '<div class="invoerveld"> Beste abonnee, laat hier een reactie achter om te laten weten wat je van deze site vind.'
                . "<br>" . date("Y-m-d H:i:s") . "<br>" . $_SESSION['voornaam'] . " " . $_SESSION['achternaam'];
            gastenBoekInvoer();
            echo '</div><div class="commentswel"><h2> Laatste berichten </h2>';
        } else {
            echo '<div class="titel"><h1>Gelieve eerst in te loggen</h1></div><div class="commentsniet"><h2> Laatste berichten </h2>';
        }
        roepComments();
        ?>
    </div>
    </div>
</main>
<?php printFooter(); ?>
</body>
</html>



<!--/*-->
<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene en Ivan-->
<!-- * Versie: 1-->
<!-- * Datum: 7 maart 2018-->
<!---->
<!-- * Aangepast:-->
<!-- *Gastenboek is alleen voor de herkansing dus deze hele pagina is "nieuw"
<!-- *
<!--*/-->
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
<header>
    <div class="logoheader">
        <?php printHeaderLogo(); ?>
    </div>
    <div class="headerbuttons">
        <?php printHeaderKnoppen(); ?>
    </div>
</header>
<main>
    <div class="cover">
        <div class="invoerveld">
            <?php if (isset($_SESSION['voornaam'])) {

                echo '<h1> Welkom bij ons gastenboek hier kunt u een reactie op onze website achterlaten</h1>';
                echo '<form method = "post" action = "" >';
                print_r($_SESSION['voornaam']);
                echo " ";
                print_r($_SESSION['achternaam']);
                echo '        plaats uw reactie om:    '."<br>".date("Y/m/d") . " " . date("H:i:sa") . "<br>";
                echo '<textarea name="comment" id="" cols="30" rows="10" required placeholder="Laat hier uw reactie achter"></textarea>>';
            } else {
                echo '<h1> gelieve eerst in te loggen</h1>';
            }

            ?>
        </div>
        <div class="comments">
            <?php
            require_once '../php/databaseconnection.php';

            $stmt = $dbh->prepare("SELECT * FROM Gastenboek WHERE naam = :value1 AND datum = :value2 AND bericht = :value3");
            //$stmt = $dbh->prepare("SELECT * FROM Gastenboek ");


            $stmt->execute(array(":value1" => $_POST["naam"], ":value2" => $_POST["datum"], "value3" =>$_POST["bericht"] ));

            $result = $stmt->fetch();
            if(!empty($result)) {
                echo $result["naam"] . $result["datum"] . $result["bericht"];
            }
            ?>
        </div>
    </div>
</main>
<footer>
    <div class="footer">
        <div class="footer1">
            <?php printFooter1(); ?>
        </div>
        <div class="footer2">
            <?php printFooter2(); ?>
        </div>
    </div>
    <div class="bottom">
        <?php printCopyright(); ?>
    </div>
</footer>
</body>



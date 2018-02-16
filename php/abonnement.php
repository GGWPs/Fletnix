<!--/*-->
<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene en Ivan-->
<!-- * Versie: 2-->
<!-- * Datum: 16 februari 2018-->
<!---->
<!-- * Aangepast:-->
<!-- * - Required bij html invoervelden toegevoegd-->
<!-- *-->
<!--*/-->


<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
    <link rel="icon" href="../afbeeldingen/favicon.ico"/>
    <title>Kies uw abonnement</title>
    <link rel="stylesheet" href="../css/basisstijlen.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/inlogenregis.css">
    <link rel="stylesheet" href="../css/knoppen.css">
</head>
<body>
<header>
    <div class="logoheader">
        <?php include '../php/headerlogo.php';?>
    </div>
    <div class="headerbuttons">
        <?php include '../php/headerknop.php';?>
    </div>
</header>
<main>
    <div class="cover">


        <div class="invoerveld">
            <h1>Kies uw abbonement</h1>


            <form method="post" action="nieuwaccount.php">
                <select name="abonnement">
                    <option value="Basic">Basis €4.99</option>
                    <option value="Pro">Pro €7.99</option>
                    <option value="Premium">Elite €11.99</option>
                </select>
                <input type="email" required name="email" required placeholder="Email">
                <input type="text" name="voornaam" required placeholder="Voornaam">
                <input type="text" name="achternaam" required placeholder="Achternaam">
                <select name="land" required>
                <?php
                require_once '../php/databaseconnection.php';

                //$sql = mysqli_query($connection, "SELECT username FROM users");
//                $sql = "select country_name FROM Country";
                foreach ($dbh ->query( $sql = "select country_name FROM Country") as $row) {
                    print $row['country_name'] . "\t";
                    echo "<option value=\"land1\">" . $row['country_name'] . "\t" . "</option>";
//                    echo '<option value="land">'.$row.'</option>';
                }
//                while ($row = $sql->fetch_assoc()) {
//                    echo "<option value=\"land1\">" . $row['country_name'] . "</option>";
//                }
                ?>
                </select>
                <input type="date" name="geboortejaar" required placeholder="Geboortejaar">
                <select name="betaalMethode" required>
                    <option value="Mastercard">Mastercard</option>
                    <option value="Visa">Visa</option>
                    <option value="Amex">Amex</option>
                </select>
                <input type="text" name="rekeningnummer" required placeholder="Rekeningnummer">
                <input type="password" name="wachtwoord" required placeholder="Wachtwoord">
                <input type="password" name="wachtwoord2" required placeholder="Wachtwoord herhalen">
                <input type="submit" class="button2" value="Registreer">
            </form>
        </div>


        <!--voornaam, achternaam, land, geboortejaar,-->
        <!--rekeningnummer, gebruikersnaam en 2x wachtwoord ingevuld en een abonnement-->
        <!--gekozen worden-->
    </div>
</main>
<footer>
    <div class="footer">
        <div class="footer1">
            <?php include '../php/footer1.php';?>
        </div>
        <div class="footer2">
            <?php include '../php/footer2.php';?>
        </div>
    </div>
    <div class="bottom">
        <?php include '../php/copyright.php';?>
    </div>
</footer>
</body>

</html>
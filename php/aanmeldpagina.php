<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Fletnix</title>
    <link rel="stylesheet" href="../css/basisstijlen.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/knoppen.css">
    <link rel="stylesheet" href="../css/inlogenregis.css">
    <link rel="icon" href="../afbeeldingen/favicon.ico" />
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
    <div class="login">
        <h1>Inloggen</h1>
        <img src="../afbeeldingen/slot.png" width="100" height="100" alt="login">
        <form method="POST" action="testlogin.php">
            <input type="text" placeholder="Email" name="gebruikersnaam">
            <input type="password" placeholder="Wachtwoord" name="password">
            <input type="submit" class="submit-button" value="Log in">
        </form>
        <a href="abonnement.php"><h4>Nog geen account? klik dan hier</h4></a>
    </div>
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
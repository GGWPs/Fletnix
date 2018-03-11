<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
    <link rel="icon" href="../afbeeldingen/favicon.ico"/>
    <link rel="stylesheet" href="../css/basisstijlen.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/filmoverzicht.css">

    <title>Afspelen</title>
</head>
<body>
<header>
    <div class="logoheader">
        <?php include '../php/headerlogo.php'; ?>
    </div>
    <div class="headerbuttons">
        <?php include '../php/headerknop.php'; ?>
    </div>
</header>
<main>
    <div class="trailer_video">
        <video controls>
            <source src="../videos/trailer_avengers_infinity_war.mp4" type="video/mp4">
        </video>
    </div>
</main>
<footer>
    <div class="footer">
        <div class="footer1">
            <?php include '../php/footer1.php'; ?>
        </div>
        <div class="footer2">
            <?php include '../php/footer2.php'; ?>
        </div>
    </div>
    <div class="bottom">
        <?php include '../php/copyright.php'; ?>
    </div>
</footer>
</body>
</html>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">

    <link rel="icon" href="../afbeeldingen/favicon.ico"/>
    <title>Filmoverzicht</title>
    <link rel="stylesheet" href="../css/basisstijlen.css">
    <link rel="stylesheet" href="../css/filmoverzicht.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/header.css">
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
    <div class="filmoverzicht">
        <div class="populaire_film">
            <h1>Populaire opkomende film:</h1>
            <div>
                <a href="film.html">
                    <img src="../afbeeldingen/filmoverzicht/avengers-infinity-war.jpg" alt="Avengers Afinity war"
                         class="populair_afbeelding_filmoverzicht"/>
                </a>
            </div>
            <h1>Avengers Infinity War (2018)</h1>
            <p>Terwijl de Avengers en hun bondgenoten de wereld blijven beschermen tegen bedreigingen die te groot zijn
                voor
                een
                enkele held om het hoofd te bieden, komt er een nieuwe dreiging op uit de kosmische schaduwen. Een
                despoot
                die
                intergalactisch berucht is, met als doel om alle zes de Infinity Stones, artefacten van onmetelijke
                kracht,
                te
                verzamelen, en hen te gebruiken om zijn gestoorde wil aan de hele realiteit op te leggen. Alles waar de
                Avengers
                voor gevochten hebben, leidt naar dit moment. Het lot van de Aarde en het bestaan zelf zijn nog nooit zo
                onzeker
                geweest.</p>
            <button class="trailer_button" type="button" onclick="window.location.href='../html/avengers_infinity_war.html'">
                Bekijk de
                detailpagina
            </button>
        </div>
        <div class="afbeelding_filmoverzicht_blok">
            <p>Avengers Infinity War</p>
            <a href="../html/avengers_infinity_war.html"> <img src="../afbeeldingen/filmoverzicht/avengers-infinity-war.jpg"
                                                               alt="Avengers Infinity War"
                                                               title="Avengers Afinity war (2018)"
                                                               class="afbeeldingen_filmoverzicht"/></a>
        </div>
        <div class="afbeelding_filmoverzicht_blok">
            <p>Shrek</p>
            <img src="../afbeeldingen/filmoverzicht/shrek.jpg" alt="Shrek"
                 title="Shrek (2001)" class="afbeeldingen_filmoverzicht"/>
        </div>
        <div class="afbeelding_filmoverzicht_blok">
            <p>Shrek 2</p>
            <img src="../afbeeldingen/filmoverzicht/shrek2.jpg" alt="Shrek 2"
                 title="Shrek 2 (2004)" class="afbeeldingen_filmoverzicht"/>
        </div>
        <div class="afbeelding_filmoverzicht_blok">
            <p>IT</p>
            <img src="../afbeeldingen/filmoverzicht/it2017.jpg" alt="IT"
                 title="It (2017)" class="afbeeldingen_filmoverzicht"/>
        </div>
        <div class="afbeelding_filmoverzicht_blok">
            <p>Split</p>
            <img src="../afbeeldingen/filmoverzicht/split.jpg" alt="Split"
                 title="Split (2016)" class="afbeeldingen_filmoverzicht"/>
        </div>
        <div class="afbeelding_filmoverzicht_blok">
            <p>Shrek 3</p>
            <img src="../afbeeldingen/filmoverzicht/shrek3.jpg" alt="Shrek 3"
                 title="Shrek 3 (2007)" class="afbeeldingen_filmoverzicht"/>
        </div>
        <div class="afbeelding_filmoverzicht_blok">
            <p>Deadpool</p>
            <img src="../afbeeldingen/filmoverzicht/deadpool.jpg" alt="Deadpool"
                 title="Deadpool (2016)" class="afbeeldingen_filmoverzicht"/>
        </div>
        <div class="afbeelding_filmoverzicht_blok">
            <p>Guardians of the Galaxy </p>
            <img src="../afbeeldingen/filmoverzicht/guardians2014.jpg" alt="Guardians of the Galaxy "
                 title="Guardians of the Galaxy (2014)" class="afbeeldingen_filmoverzicht"/>
        </div>
        <div class="afbeelding_filmoverzicht_blok">
            <p>The Hitchhiker's Guide to the Galaxy</p>
            <img src="../afbeeldingen/filmoverzicht/hitchhiker.jpg" alt="The Hitchhiker's Guide to the Galaxy"
                 title="The Hitchhiker's Guide to the Galaxy (2005)" class="afbeeldingen_filmoverzicht"/>
        </div>
        <div class="afbeelding_filmoverzicht_blok">
            <p>Fight Club</p>
            <img src="../afbeeldingen/filmoverzicht/fightclub.jpg" alt="Fight Club"
                 title="Fight Club (1999)" class="afbeeldingen_filmoverzicht"/>
        </div>

        <div class="afbeelding_filmoverzicht_blok">
            <p>Pulp Fiction</p>
            <img src="../afbeeldingen/filmoverzicht/pulp.jpg" alt="Pulp Fiction"
                 title="Pulp Fiction (1994)" class="afbeeldingen_filmoverzicht"/>
        </div>

        <div class="afbeelding_filmoverzicht_blok">
            <p>Inglourious Basterds</p>
            <img src="../afbeeldingen/filmoverzicht/inglorious.jpg" alt="Inglourious Basterds"
                 title="Inglourious Basterds (2009)" class="afbeeldingen_filmoverzicht"/>
        </div>

        <div class="afbeelding_filmoverzicht_blok">
            <p>Kill Bill: Vol. 1</p>
            <img src="../afbeeldingen/filmoverzicht/killbill.jpg" alt="Kill Bill: Vol. 1 "
                 title="Kill Bill: Vol. 1 (2003))" class="afbeeldingen_filmoverzicht"/>
        </div>

        <div class="afbeelding_filmoverzicht_blok">
            <p>The Matrix</p>
            <img src="../afbeeldingen/filmoverzicht/matrix.jpg" alt="The Matrix"
                 title="The Matrix (1999)" class="afbeeldingen_filmoverzicht"/>
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
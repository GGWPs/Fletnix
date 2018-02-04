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
    <h1>Zoekresultaten</h1>
    <div class="zoekresultaten">
    <?php
    include '../php/databaseconnection.php';

$zoek = $_POST["zoekFunctie"];
    $sql = "select top 30 * from Movie WHERE title like '%$zoek%'";
    foreach ($dbh ->query($sql) as $row) {
        print $row['title'] . "\t";
        print $row['description'] . "\t";
        echo "</br>";
    }

//    $search_query=mssql_query($sql);

//    if(mssql_num_rows($search_query)!=0) {
//        $search_rs = mssql_fetch_assoc($search_query);
//    }
//    print_r($search_query);
    ?>
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

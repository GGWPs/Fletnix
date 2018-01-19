<?php

include '../php/databaseconnection.php';
    echo 'start';
    $sql = 'select top 10 title, description, movie_id
from Movie';
    foreach ($dbh->query($sql) as $row) {
        print $row['title'] . "\t";
        print $row['description'] . "\t";
        print $row['movie_id'] . "\n";
    }

?>
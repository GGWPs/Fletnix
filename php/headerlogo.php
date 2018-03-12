<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 12-3-2018
 * Time: 16:14
 */

session_start();
if (isset($_SESSION['voornaam'])){
    echo '<a href="filmoverzicht.php"> <img src="../afbeeldingen/klein/fletnix-logo-klein.png" width="200" height="50" alt="Fletnix logo"></a>';
} else {
    echo '<a href="index.php"> <img src="../afbeeldingen/klein/fletnix-logo-klein.png" width="200" height="50"
                                  alt="Fletnix logo"></a>';
}

?>
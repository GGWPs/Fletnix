<?php
echo "        <button class=\"header-button\" type=\"button\" onclick=\"window.location.href='aanmeldpagina.html'\">Meld u aan
        </button>
        <button class=\"header-button\" type=\"button\" onclick=\"window.location.href='abonnement.html'\">Maak een account
        </button>";


if (isset($_SESSION['user'])){
    echo 'Hallo' . $_POST['user'];
}
?>
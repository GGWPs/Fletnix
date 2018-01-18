<?php
setlocale(LC_ALL,'nl_NL') or setlocale(LC_ALL,'nld_NLD');
echo strftime('%e %B',time());

if (isset($_SESSION['user'])){
    echo  $_POST['user'], 'op' ;
}


echo "        <button class=\"header-button\" type=\"button\" onclick=\"window.location.href='aanmeldpagina.html'\">Meld u aan
        </button>
        <button class=\"header-button\" type=\"button\" onclick=\"window.location.href='abonnement.html'\">Maak een account
        </button>";

?>
<!--/*-->
<!-- * Team: Kaene Peters en Ivan Miladinovic-->
<!-- * Auteur: Kaene-->
<!-- * Versie: 1-->
<!-- * Datum: 14 maart 2018-->
<!---->
<!-- * Aangepast:-->
<!-- *Ggeen aanpassingen
<!- *
<!-*/-->

<?php
session_start();
session_destroy();
header("Location: ../php/index.php");
exit();
?>
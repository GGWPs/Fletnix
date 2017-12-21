<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 19-12-2017
 * Time: 14:02
 */

print_r($_POST);
if (isset($_POST['user'])) {
    echo 'Hello' . $_POST{'user'};
}
if (isset($_POST['password'])) {
    echo 'PW is' . $_POST{'password'};
}
?>

</body>
</html>

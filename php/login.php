<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<?php
session_start();

print_r($_POST);
if (isset($_POST['user'])) {
    echo 'Hello' . $_POST{'user'};
}
if (isset($_POST['password'])) {
    echo 'PW is' . $_POST{'password'};
}

//strip_tags($input, '<br>');

?>

</body>
</html>


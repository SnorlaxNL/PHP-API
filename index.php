<?php
    include_once('classes/user.class.php');

    if (isset($_POST['loginuser'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $loginUser = new User();
        $loginUser->loginUser($email, $password);
    }

    if (isset($_POST['createuser'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $ip = $_SERVER['REMOTE_ADDR'];

        $createUser = new User();
        $createUser->createUser($email, $password, $ip);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Login</title>
    </head>
    <body>
        <form action="" method="post">
            <input type="email" name="email" autocomplete="off" autofocus="on">
            <input type="password" name="password" autocomplete="off">
            <button type="submit" name="loginuser">Inloggen</button>
        </form>
        <br>
        <form action="" method="post">
            <input type="email" name="email">
            <input type="password" name="password">
            <button type="submit" name="createuser">Registreren</button>
        </form>
    </body>
</html>

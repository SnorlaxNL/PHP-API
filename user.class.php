<?php

include_once('database.php');

/**
 * @package Chat
 */
class User extends Database
{

    function __construct()
    {
        parent::__construct();
    }

    function loginUser($email, $password)
    {
        $password = password_verify($password, PASSWORD_DEFAULT);

        $db = $this->dbh->prepare('SELECT email, password FROM users WHERE email = :email LIMIT 1');
        $db->bindParam(':email', $email);
        $db->bindParam(':password', $password);
        $db->execute();

        $rand = mt_rand(1,9999999999) . date('c');
        $session_key = md5($rand);
        $db1 = $this->dbh->prepare('UPDATE users SET session_key = :session_key');
        $db1->bindParam(':session_key', $session_key);
        $db1->execute();
    }

    function logoutUser()
    {
        session_start();
        session_destroy();
        header('Location: index.php');
    }

    function createUser($email, $password, $ip)
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $rand = mt_rand(1,9999999999) . date('c');
        $session_key = md5($rand);

        $db = $this->dbh->prepare('INSERT INTO users (email, password, ip, session_key) VALUES (:email, :hash, :ip, :session_key)');
        $db->bindParam(':email', $email);
        $db->bindParam(':hash', $hash);
        $db->bindParam(':ip', $ip);
        $db->bindParam(':session_key', $session_key);
        $db->execute();
    }
}

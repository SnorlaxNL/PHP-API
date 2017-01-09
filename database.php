<?php

/**
 * @package Chat
 */
class Database
{

    protected $dbh;

    function __construct()
    {
        $dbname = "chat";
        $servername = "localhost";
        $username = "root";
        $password = "";

        $this->dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    }
}

<?php

/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = '';

try {
    $bdd = new PDO("mysql:host=$hostname;dbname=modules4;charset=utf8", $username, $password);
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }

?>
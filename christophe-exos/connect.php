<?php

function pdo_connect_mysql() {
    $username = "root";
    $password = "";

    try {
        $conn = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', $username, $password);
        return $conn;

    } catch (PDOException $e) {
        return false;
    }
}

?>
<?php

define("BASE", "http://localhost:8081");

    $dsn = "mysql:dbname=base_pdo;host=localhost";
    $dbuser = "root";
    $dbpass = "";

    try {
        $pdo = new PDO($dsn, $dbuser, $dbpass);

      } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
?>
<?php

    $dsn = "mysql:dbname=base_pdo;host=localhost";
    $dbuser = "root";
    $dbpass = "";
    $charset = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

 /*    define("BASE", "http://milanidesigner.com.br/ines");

    $dsn = "mysql:dbname=u772271550_escolar;host=localhost";
    $dbuser = "u772271550_admin";
    $dbpass = "ines1857"; */

    try {
        $pdo = new PDO($dsn, $dbuser, $dbpass);

      } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
?>
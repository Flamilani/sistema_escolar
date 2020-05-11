<?php
define("BASE", "http://localhost/sistema_escolar");

session_start();

    $dsn = "mysql:dbname=base_escolar;host=localhost";
    $dbuser = "root";
    $dbpass = "123123";
    $charset = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

 /*    define("BASE", "http://milanidesigner.com.br/ines");

    $dsn = "mysql:dbname=u772271550_escolar;host=localhost";
    $dbuser = "u772271550_admin";
    $dbpass = "ines1857"; */
    global $pdo;

    try {
        $pdo = new PDO($dsn, $dbuser, $dbpass, $charset);

      } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
        exit;
    }
?>
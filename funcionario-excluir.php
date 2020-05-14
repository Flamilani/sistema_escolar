<?php
require('config.php');
require_once('session.php');

require('classes/departamentos.class.php');
$func = new Departamentos();

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $dado = $func->getFuncionarioDepart($_GET['id']);
    $func->deleteFuncionario($_GET['id']);
}

header("Location: funcionarios.php?id=" . $dado['depart_id']);
?>
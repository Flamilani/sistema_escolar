<?php 
require('../config/database.php');

if(isset($_GET['id']) && empty($_GET['id']) == false) {
  $id = addslashes($_GET['id']);

  $sql = "DELETE FROM turmas WHERE id = '$id'";
  $pdo->query($sql);

  header("Location: ../turmas.php");

} else {    
  header("Location: ../turmas.php");
}
?>

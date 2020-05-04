<?php
class Professores {

    public function getProfessores() {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT * FROM professores WHERE prof_id = :prof_id");
        $sql->bindValue(":prof_id", $_SESSION['cLogado']);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

}
?>
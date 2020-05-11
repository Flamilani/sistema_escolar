<?php
class Home {

    public function countDepartamentos() {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT COUNT(*) as count_departamentos FROM departamentos");
        $sql->execute();       

        if($sql->rowCount() > 0) {
            $array = $sql->fetchColumn();
        }

        return $array;
    }

    public function countFuncionarios() {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT COUNT(*) as count_funcionarios FROM usuarios WHERE nivel = :nivel");
        $sql->bindValue(":nivel", 2);
        $sql->execute();       

        if($sql->rowCount() > 0) {
            $array = $sql->fetchColumn();
        }

        return $array;
    }

}
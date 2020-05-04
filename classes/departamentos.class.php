<?php
class Departamentos {

    public function getDepartamentos() {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT * FROM departamentos");
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function insertDepartamento($departamento, $sigla) {

        global $pdo;
            
        $sql = $pdo->prepare("INSERT INTO departamentos SET departamento = :departamento, sigla = :sigla");
        $sql->bindValue(":departamento", $departamento);
        $sql->bindValue(":sigla", $sigla);
        $sql->execute();

    }

    public function updateDepartamento($id, $departamento, $sigla) {

        global $pdo;
            
        $sql = $pdo->prepare("INSERT INTO departamentos SET departamento = :departamento, sigla = :sigla");
        $sql->bindValue(":departamento", $departamento);
        $sql->bindValue(":sigla", $sigla);
        $sql->execute();

    }

    public function deleteDepartamento($id) {

        global $pdo;
            
        $sql = $pdo->prepare("DELETE FROM departamentos WHERE id = :id");
        $sql->bindValue(":id", $id);  
        $sql->execute();

    }

}
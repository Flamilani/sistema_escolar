<?php
class Departamentos {

    public function countFuncionarios($depart_id) {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT COUNT(*) as count_funcionarios FROM usuarios WHERE depart_id = :depart_id");
        $sql->bindValue(":depart_id", $depart_id);
        $sql->execute();       

        if($sql->rowCount() > 0) {
            $array = $sql->fetchColumn();
        }

        return $array;
    }

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

    public function getDepartamento($id) {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT * FROM departamentos WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
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

    public function updateDepartamento($departamento, $sigla, $id) {

        global $pdo;
            
        $sql = $pdo->prepare("UPDATE departamentos SET departamento = :departamento, sigla = :sigla
        WHERE id = :id");
        $sql->bindValue(":departamento", $departamento);
        $sql->bindValue(":sigla", $sigla);
        $sql->bindValue(":id", $id);
        $sql->execute();

    }

    public function deleteDepartamento($id) {

        global $pdo;
            
        $sql = $pdo->prepare("DELETE FROM departamentos WHERE id = :id");
        $sql->bindValue(":id", $id);  
        $sql->execute();

    }

    
    /* ADICIONAR FUNCIONÁRIOS NOS DEPARTAMENTOS  */

    public function addFuncionarios($depart_id, $id) {

        global $pdo;
            
        $sql = $pdo->prepare("UPDATE usuarios SET depart_id = :depart_id
        WHERE id = :id");
        $sql->bindValue(":depart_id", $depart_id);
        $sql->bindValue(":id", $id);
        $sql->execute();

    }

    public function getFuncionariosPorDepart($depart_id) {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE nivel = :nivel AND depart_id = :depart_id");
        $sql->bindValue(":nivel", 2);
        $sql->bindValue(":depart_id", $depart_id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getFuncionarioDepart($id) {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE nivel = :nivel AND id = :id");
        $sql->bindValue(":nivel", 2);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function deleteFuncionario($id) {

        global $pdo;
            
        $sql = $pdo->prepare("UPDATE usuarios SET depart_id = :depart_id WHERE id = :id");
        $sql->bindValue(":depart_id", 0);
        $sql->bindValue(":id", $id);
        $sql->execute();

    }


}
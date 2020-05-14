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

    /*  DISCIPLINAS  */

    public function insertDisciplina(
        $conteudo, 
        $data_cont, 
        $status, 
        $turma_id
        ) {

        global $pdo;

            $sql = $pdo->prepare("INSERT INTO disciplinas SET 
            conteudo = :conteudo,
            data_cont = :data_cont,
            status = :status,
            turma_id = :turma_id,
            prof_id = :prof_id");
            $sql->bindValue(":conteudo", $conteudo);
            $sql->bindValue(":data_cont", $data_cont);
            $sql->bindValue(":status", $status);
            $sql->bindValue(":turma_id", $turma_id);
            $sql->bindValue(":prof_id", $_SESSION['cLogado']);
            $sql->execute();

    }



}
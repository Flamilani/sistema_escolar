<?php
class Turmas {

    public function countTurmas() {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT COUNT(*) as count_turmas FROM turmas WHERE prof_id = :prof_id");
        $sql->bindValue(":prof_id", $_SESSION['cLogado']);
        $sql->execute();       

        if($sql->rowCount() > 0) {
            $array = $sql->fetchColumn();
        }

        return $array;
    }

    public function countAlunosPorTurma($id) {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT COUNT(*) as count_alunos FROM alunos WHERE turma_id = :id AND prof_id = :prof_id");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":prof_id", $_SESSION['cLogado']);
        $sql->execute();       

        if($sql->rowCount() > 0) {
            $array = $sql->fetchColumn();
        }

        return $array;
    }

    public function getTurmas() {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT * FROM turmas WHERE prof_id = :prof_id");
        $sql->bindValue(":prof_id", $_SESSION['cLogado']);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function insertTurma($titulo) {

        global $pdo;
            
        $sql = $pdo->prepare("INSERT INTO turmas SET titulo = :titulo, prof_id = :prof_id");
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":prof_id", $_SESSION['cLogado']);
        $sql->execute();

    }

    public function getPlanoAula() {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT * FROM plano_aula WHERE prof_id = :prof_id");
        $sql->bindValue(":prof_id", $_SESSION['cLogado']);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function insertPlanoAula(
        $tema, 
        $objetivo, 
        $estrategias, 
        $recursos,
        $avaliacao,
        $referencias,
        $turma_id
        ) {

        global $pdo;

                $sql = $pdo->prepare("INSERT INTO plano_aula SET 
                tema = :tema,
                objetivo = :objetivo,
                estrategias = :estrategias,
                recursos = :recursos,
                avaliacao = :avaliacao,
                referencias = :referencias,
                turma_id = :turma_id,
                prof_id = :prof_id");
            $sql->bindValue(":tema", $tema);
            $sql->bindValue(":objetivo", $objetivo);
            $sql->bindValue(":estrategias", $estrategias);
            $sql->bindValue(":recursos", $recursos);
            $sql->bindValue(":avaliacao", $avaliacao);
            $sql->bindValue(":referencias", $referencias);
            $sql->bindValue(":turma_id", $turma_id);
            $sql->bindValue(":prof_id", $_SESSION['cLogado']);
            $sql->execute();


    }

    public function insertConteudo(
        $conteudo, 
        $data_cont, 
        $status, 
        $turma_id
        ) {

        global $pdo;

                $sql = $pdo->prepare("INSERT INTO conteudos SET 
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
?>
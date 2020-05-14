<?php
class Turmas {

    /*  TURMAS  */

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
        $sql = $pdo->prepare("SELECT COUNT(*) as count_alunos FROM alunos a 
        INNER JOIN aluno_turma t on a.id = t.aluno_id
        WHERE t.prof_id = :prof_id AND t.turma_id = :turma_id");
        $sql->bindValue(":prof_id", $_SESSION['cLogado']);
        $sql->bindValue(":turma_id", $id);
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

    public function getTurma($id) {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT * FROM turmas WHERE prof_id = :prof_id AND id = :id");
        $sql->bindValue(":prof_id", $_SESSION['cLogado']);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }


    public function insertTurma(
        $titulo,
        $disciplina_id,
        $servico_id,
        $ano_id,
        $serie_id
        ) {

        global $pdo;

        $sql = $pdo->prepare("SELECT id FROM turmas WHERE titulo = :titulo AND prof_id = :prof_id");
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":prof_id", $_SESSION['cLogado']);
        $sql->execute();
                    
        if($sql->rowCount() == 0) {
        $sql = $pdo->prepare("INSERT INTO turmas SET 
        titulo = :titulo, 
        disciplina_id = :disciplina_id,
        servico_id = :servico_id,
        ano_id = :ano_id,
        serie_id = :serie_id,
        prof_id = :prof_id");
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":disciplina_id", $disciplina_id);
        $sql->bindValue(":servico_id", $servico_id);
        $sql->bindValue(":ano_id", $ano_id);
        $sql->bindValue(":serie_id", $serie_id);
        $sql->bindValue(":prof_id", $_SESSION['cLogado']);
        $sql->execute();

        return true;
    } else {
        return false;
    }

    }

    
    public function updateTurma($titulo, $id) {

        global $pdo;
            
        $sql = $pdo->prepare("UPDATE turmas SET titulo = :titulo
        WHERE id = :id");
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":id", $id);
        $sql->execute();

    }

    /*  PLANOS DE AULA  */

    public function countPlanosAulas($id) {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT COUNT(*) as count_aulas FROM plano_aula WHERE prof_id = :prof_id AND turma_id = :turma_id");
        $sql->bindValue(":prof_id", $_SESSION['cLogado']);
        $sql->bindValue(":turma_id", $id);
        $sql->execute();       

        if($sql->rowCount() > 0) {
            $array = $sql->fetchColumn();
        }
        return $array;
    }

    public function getPlanoAula($id) {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT * FROM plano_aula WHERE prof_id = :prof_id AND turma_id = :turma_id");
        $sql->bindValue(":prof_id", $_SESSION['cLogado']);
        $sql->bindValue(":turma_id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getPlanoAulaPorId($id) {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT * FROM plano_aula WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
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

    public function updatePlanoAula(
        $tema, 
        $objetivo, 
        $estrategias, 
        $recursos,
        $avaliacao,
        $referencias,
        $id) {

        global $pdo;
            
        $sql = $pdo->prepare("UPDATE plano_aula SET 
            tema = :tema,
            objetivo = :objetivo,
            estrategias = :estrategias,
            recursos = :recursos,
            avaliacao = :avaliacao,
            referencias = :referencias
            WHERE id = :id");
        $sql->bindValue(":tema", $tema);
        $sql->bindValue(":objetivo", $objetivo);
        $sql->bindValue(":estrategias", $estrategias);
        $sql->bindValue(":recursos", $recursos);
        $sql->bindValue(":avaliacao", $avaliacao);
        $sql->bindValue(":referencias", $referencias);
        $sql->bindValue(":id", $id);
        $sql->execute();

    }

    public function deleteAula($id) {

        global $pdo;
            
        $sql = $pdo->prepare("DELETE FROM plano_aula WHERE id = :id");
        $sql->bindValue(":id", $id);  
        $sql->execute();

    }

    /*  CONTEÚDOS TRABALHADOS  */

    public function countConteudos($id) {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT COUNT(*) as count_conteudos FROM conteudos WHERE prof_id = :prof_id AND turma_id = :turma_id");
        $sql->bindValue(":prof_id", $_SESSION['cLogado']);
        $sql->bindValue(":turma_id", $id);
        $sql->execute();       

        if($sql->rowCount() > 0) {
            $array = $sql->fetchColumn();
        }

        return $array;
    }    
    
    public function getConteudos($id) {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT * FROM conteudos WHERE turma_id = :turma_id AND prof_id = :prof_id");
        $sql->bindValue(":turma_id", $id);
        $sql->bindValue(":prof_id", $_SESSION['cLogado']);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
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

    /*  DISCIPLINAS  */



    /*  SERVIÇOS  */


}
?>
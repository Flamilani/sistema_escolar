<?php
class Alunos {

    public function countAlunos() {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT COUNT(*) as count_alunos FROM alunos WHERE prof_id = :prof_id");
        $sql->bindValue(":prof_id", $_SESSION['cLogado']);
        $sql->execute();       

        if($sql->rowCount() > 0) {
            $array = $sql->fetchColumn();
        }

        return $array;
    }


    public function insertAluno (
        $nome, 
        $sobrenome, 
        $email, 
        $senha, 
        $login, 
        $cpf, 
        $celular, 
        $data_nasc
        ) {

        global $pdo;
        $sql = $pdo->prepare("SELECT id FROM alunos WHERE cpf = :cpf");
          $sql->bindValue(":cpf", $cpf);
        $sql->execute();

        if($sql->rowCount() == 0) {
        $sql = $pdo->prepare("INSERT INTO alunos SET 
            nome = :nome,
            sobrenome = :sobrenome,
            email = :email,
            senha = :senha,
            login = :login,
            cpf = :cpf,
            celular = :celular,
            data_nasc = :data_nasc,
            status = :status,
            nivel = :nivel,
            prof_id = :prof_id
        ");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":sobrenome", $sobrenome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", md5($senha));
            $sql->bindValue(":login", $login);
            $sql->bindValue(":cpf", $cpf);
            $sql->bindValue(":celular", $celular);
            $sql->bindValue(":data_nasc", $data_nasc);
            $sql->bindValue(":status", 1);
            $sql->bindValue(":nivel", 3);
            $sql->bindValue(":prof_id", $_SESSION['cLogado']);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    public function logar($login, $senha) {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM alunos WHERE login = :login AND senha = :senha");
        $sql->bindValue(":login", $login);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['cLogado'] = $dado['id'];
            $_SESSION['nome'] = $dado['nome'];
            $_SESSION['sobrenome'] = $dado['sobrenome'];
            $_SESSION['nivel'] = $dado['nivel'];
            return true;
        } else {
            return false;
        }
    }

    public function getAlunos() {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT * FROM alunos WHERE nivel = :nivel AND prof_id = :prof_id
        ");
        $sql->bindValue(":nivel", 3);
        $sql->bindValue(":prof_id", $_SESSION['cLogado']);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getAluno($id) {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT * FROM alunos WHERE nivel = :nivel AND prof_id = :prof_id AND id = :id");
        $sql->bindValue(":nivel", 3);
        $sql->bindValue(":prof_id", $_SESSION['cLogado']);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function getAlunoTurma($id) {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT turma_id FROM aluno_turma WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    
    public function getAlunosPorTurma($id) {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT alunos.*, aluno_turma.id AS aluno_turma_id FROM alunos 
        INNER JOIN aluno_turma ON alunos.id = aluno_turma.aluno_id 
        WHERE aluno_turma.turma_id = :turma_id 
        AND aluno_turma.prof_id = :prof_id");
        $sql->bindValue(":turma_id", $id);
        $sql->bindValue(":prof_id", $_SESSION['cLogado']);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getAlunosSelecionados() {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT DISTINCT id, nome, sobrenome, prof_id FROM alunos 
        WHERE NOT EXISTS (SELECT * FROM aluno_turma 
        WHERE alunos.id = aluno_turma.aluno_id) AND prof_id = :prof_id");
        $sql->bindValue(":prof_id", $_SESSION['cLogado']);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }


        /* ADICIONAR ALUNOS NAS TURMAS  */

        public function addAlunoTurma($aluno_id, $turma_id) {

            global $pdo;
                
            $sql = $pdo->prepare("INSERT INTO aluno_turma SET 
            aluno_id = :aluno_id, 
            turma_id = :turma_id,
            prof_id = :prof_id");
            $sql->bindValue(":aluno_id", $aluno_id);
            $sql->bindValue(":turma_id", $turma_id);
            $sql->bindValue(":prof_id", $_SESSION['cLogado']);
            $sql->execute();
    
        }

        public function updateAluno(
            $nome, 
            $sobrenome, 
            $email,
            $login,
            $cpf,
            $celular, 
            $data_nasc,
            $id
            ) {
    
            global $pdo;
                
            $sql = $pdo->prepare("UPDATE alunos SET 
                    nome = :nome,
                    sobrenome = :sobrenome,
                    email = :email,
                    login = :login,
                    cpf = :cpf,
                    celular = :celular,
                    data_nasc = :data_nasc
                    WHERE id = :id");
                    $sql->bindValue(":nome", $nome);
                    $sql->bindValue(":sobrenome", $sobrenome);
                    $sql->bindValue(":email", $email);
                    $sql->bindValue(":login", $login);
                    $sql->bindValue(":cpf", $cpf);
                    $sql->bindValue(":celular", $celular);
                    $sql->bindValue(":data_nasc", $data_nasc);
            $sql->bindValue(":id", $id);
            $sql->execute();
    
        }

        public function deleteTurmaAluno($id) {

            global $pdo;
                
            $sql = $pdo->prepare("DELETE FROM aluno_turma WHERE id = :id");
            $sql->bindValue(":id", $id);  
            $sql->execute();

        }

        public function activeAluno($status, $id) {

            global $pdo;
                
            $sql = $pdo->prepare("UPDATE alunos SET status = :status WHERE id = :id");
            $sql->bindValue(":status", $status);
            $sql->bindValue(":id", $id);
            $sql->execute();
    
        }
    

}
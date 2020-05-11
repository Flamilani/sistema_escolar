<?php
class Usuarios {

    /*  LOGIN  */
    public function cadastrar($nome, $email, $senha, $celular) {
        global $pdo;
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() == 0) {
                $sql = $pdo->prepare("INSERT INTO usuarios SET 
                nome = :nome,
                email = :email,
                senha = :senha,
                celular = :celular");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", md5($senha));
            $sql->bindValue(":celular", $celular);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    public function logar($email, $senha) {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
        $sql->bindValue(":email", $email);
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

    /*  PERFIL  */
    public function getPerfil($id) {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function updatePerfil(
        $nome, 
        $sobrenome, 
        $email,
        $celular, 
        $data_nasc,
        $id
        ) {

        global $pdo;
            
        $sql = $pdo->prepare("UPDATE usuarios SET 
                nome = :nome,
                sobrenome = :sobrenome,
                email = :email,               
                celular = :celular,
                data_nasc = :data_nasc
                WHERE id = :id");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":sobrenome", $sobrenome);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":celular", $celular);
        $sql->bindValue(":data_nasc", $data_nasc);
        $sql->bindValue(":id", $id);
        $sql->execute();

    }

    /*  ADMINISTRADORES  */


    /*  PROFESSORES  */
    public function insertProfessor(
        $nome, 
        $sobrenome, 
        $email, 
        $senha, 
        $celular, 
        $data_nasc
        ) {

        global $pdo;
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() == 0) {
                $sql = $pdo->prepare("INSERT INTO usuarios SET 
                nome = :nome,
                sobrenome = :sobrenome,
                email = :email,
                senha = :senha,
                celular = :celular,
                data_nasc = :data_nasc,
                status = :status,
                nivel = :nivel
                ");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":sobrenome", $sobrenome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", md5($senha));
            $sql->bindValue(":celular", $celular);
            $sql->bindValue(":data_nasc", $data_nasc);
            $sql->bindValue(":status", 1);
            $sql->bindValue(":nivel", 2);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    public function getProfessores() {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE nivel = :nivel");
        $sql->bindValue(":nivel", 2);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
    
    public function getProfessor($id) {
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
    
    public function getProfessoresPorDepart($depart_id) {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE nivel = :nivel AND depart_id != :depart_id");
        $sql->bindValue(":nivel", 2);
        $sql->bindValue(":depart_id", $depart_id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function updateProfessor(
        $nome, 
        $sobrenome, 
        $email,
        $celular, 
        $data_nasc,
        $id
        ) {

        global $pdo;
            
        $sql = $pdo->prepare("UPDATE usuarios SET 
                nome = :nome,
                sobrenome = :sobrenome,
                email = :email,               
                celular = :celular,
                data_nasc = :data_nasc
                WHERE id = :id");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":sobrenome", $sobrenome);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":celular", $celular);
        $sql->bindValue(":data_nasc", $data_nasc);
        $sql->bindValue(":id", $id);
        $sql->execute();

    }

    public function deleteProfessor($id) {

        global $pdo;
            
        $sql = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindValue(":id", $id);  
        $sql->execute();

    }

    public function activeUsuario($status, $id) {

        global $pdo;
            
        $sql = $pdo->prepare("UPDATE usuarios SET status = :status WHERE id = :id");
        $sql->bindValue(":status", $status);
        $sql->bindValue(":id", $id);
        $sql->execute();

    }

    /*  ALUNOS  */

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
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email AND cpf = :cpf");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":cpf", $cpf);
        $sql->execute();

        if($sql->rowCount() == 0) {
        $sql = $pdo->prepare("INSERT INTO usuarios SET 
            nome = :nome,
            sobrenome = :sobrenome,
            email = :email,
            senha = :senha,
            login = :login,
            cpf = :cpf,
            celular = :celular,
            data_nasc = :data_nasc,
            status = :status,
            nivel = :nivel
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
            $sql->execute();

 
        $sql = $pdo->prepare("INSERT INTO aluno_vinculado SET 
                aluno_cpf = :aluno_cpf,
                prof_id = :prof_id
            ");
            $sql->bindValue(":aluno_cpf", $cpf);
            $sql->bindValue(":prof_id", $_SESSION['cLogado']);
            $sql->execute();


            return true;
        } else {
            return false;
        }
    }
}
?>
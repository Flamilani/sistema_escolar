<?php
class Usuarios {

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
            $_SESSION['nivel'] = $dado['nivel'];
            return true;
        } else {
            return false;
        }
    }
}
?>
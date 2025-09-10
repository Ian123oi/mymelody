<?php

    include_once "usuario.class.php";
    
    class usuarioDAO {
        private $conexao;
        public function __construct() {
            $this->conexao = new PDO("mysql:host=localhost; dbname=mymelody", "root", "");
        }
        public function listar() {
             $sql = $this->conexao->prepare("select * from usuario");
             $sql->execute();
             return $sql->fetchAll();
        
        }
        public function excluir($temp) {
            $sql = $this->conexao->prepare("delete from usuario where id=:id");
            $sql->bindValue(":id", $temp);
            $sql->execute();
        }
        public function inserir(usuario $obj) {
            $sql = $this->conexao->prepare("select * from usuario where email = :email");
            $sql->bindValue(":email", $obj->get("email"));
            $sql->execute();
            if ($sql->rowCount()==0) {
            $sql = $this->conexao->prepare("INSERT into usuario(nome, cpf, email, senha, numero) values (:nome, :cpf, :email, :senha, :num)");
            $sql->bindValue(":nome", $obj->get("nome"));
            $sql->bindValue(":cpf", $obj->get("cpf"));
            $sql->bindValue(":email", $obj->get("email"));
            $sql->bindValue(":senha", $obj->get("senha"));
            $sql->bindValue(":num", $obj->get("numero"));
            return  $sql->execute();
            } else if ($sql->rowCount()>0) {
                return 2;
            }
    }
        public function retornarUM($id) {
            $sql = $this->conexao->prepare(query: "select * from usuario where id=:id");
            $sql->bindValue(":id", $id);
            $sql->execute();
            return $sql->fetch();
        }
        public function editar(usuario $usuario) {
            $sql = $this->conexao->prepare(query: "update usuario set nome = :nome, email = :email, cpf = :cpf, senha = :senha, numero = :numero where id = :id");
            $sql->bindValue(":id", $usuario->get("id"));
            $sql->bindValue(":email", $usuario->get("email"));
            $sql->bindValue(":cpf", $usuario->get("cpf"));
            $sql->bindValue("senha", $usuario->get("senha"));
            $sql->bindValue("nome", $usuario->get("nome"));
            $sql->bindValue("numero", $usuario->get("numero"));

            return $sql->execute();
            

        }

        public function login(usuario $usuario) {
            $sql = $this->conexao->prepare ("select * from usuario where email = :email");
            $sql->bindValue(":email", $usuario->get("email"));
            $sql->execute();
            if($sql->rowCount()>0) {
                while($retorno = $sql->fetch()) {
                    if($retorno["senha"] == $usuario->getSenha()) {
                        return $retorno;
                    }
                }
                return 1;
            }
            else {
                return 2;
            }
        }
}

?>
<?php

    include_once "venda.class.php";
    
    class vendaDAO {
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
            $sql = $this->conexao->prepare("delete from usuario where id='$temp'");
            $sql->execute();
        }
        public function inserir(venda $obj) {
            $sql = $this->conexao->prepare("INSERT into venda(idProduto, IdUsuario, data, formapagamento, endereco, valor) values (:nome, :cpf, :email, :senha, :num, :valor)");
            $sql->bindValue(":nome", $obj->get("idProduto"));
            $sql->bindValue(":cpf", $obj->get("idUsuario"));
            $sql->bindValue(":email", $obj->get("data"));
            $sql->bindValue(":senha", $obj->get("formapagamento"));
            $sql->bindValue(":num", $obj->get("endereco"));
            $sql->bindValue(":valor", $obj->get("valor"));
            $sql->execute();
            return $this->conexao->lastInsertId();
    }
        public function retornarUM($id) {
            $sql = $this->conexao->prepare(query: "select * from usuario where id='$id'");
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
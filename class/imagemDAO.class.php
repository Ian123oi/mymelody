<?php

include_once "imagem.class.php";
    include_once "produto.class.php";
    
    class imagemDAO {
        private $conexao;
        public function __construct() {
            $this->conexao = new PDO("mysql:host=localhost; dbname=mymelody", "root", "");
        }
        public function listar() {
             $sql = $this->conexao->prepare("select * from imagem");
             $sql->execute();
             return $sql->fetchAll();
        
        }
        public function excluir($temp) {
            $sql = $this->conexao->prepare("delete from imagem where id=:id");
            $sql->bindValue(":id", $temp);
            $sql->execute();
        }
        public function inserir(imagem $obj) {
            $sql = $this->conexao->prepare("INSERT into imagem (nomeImagem, id_produto) values (:nome, :prod)");
            $sql->bindValue(":nome", $obj->get("name"));
            $sql->bindValue(":prod", $obj->get("id_produto"));
            return  $sql->execute();
    }
        public function retornarUM($id) {
            $sql = $this->conexao->prepare(query: "select * from imagem where id_produto=:id LIMIT 1");
            $sql->bindValue(":id", $id);
            $sql->execute();
            return $sql->fetch();
        }
        public function editar(produto $obj) {
            $sql = $this->conexao->prepare(query: "update produto set nome = :nome, preco = :preco, descricao = :descricao where id = :id");
            $sql->bindValue(":id", $obj->get("id"));
            $sql->bindValue(":preco", $obj->get("preco"));
            $sql->bindValue(":descricao", $obj->get("descricao"));
            return $sql->execute();
        
        }
}

?>
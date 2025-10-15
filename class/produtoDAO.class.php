<?php

    include_once "produto.class.php";
    
    class produtoDAO {
        private $conexao;
        public function __construct() {
            $this->conexao = new PDO("mysql:host=localhost; dbname=mymelody", "root", "");
        }
        public function listar($temp = "") {
             $sql = $this->conexao->prepare("select produto.*, categoria.nomeCat  from produto inner join categoria on produto.idCat = categoria.idCat ".$temp);
             $sql->execute();
             return $sql->fetchAll();
        
        }
        public function excluir($temp) {
            $sql = $this->conexao->prepare("delete from produto where id='$temp'"); 
            $sql->execute();
        }
        public function inserir(produto $obj) {
            $sql = $this->conexao->prepare("INSERT into produto(nome, preco, descricao, IdCat) values (:nome, :preco, :descricao, :idcat)");
            $sql->bindValue(":nome", htmlspecialchars($obj->get("nome")));
            $sql->bindValue(":preco", htmlspecialchars($obj->get("preco")));
            $sql->bindValue(":descricao", htmlspecialchars($obj->get("descricao")));
            $sql->bindValue(":idcat", htmlspecialchars($obj->get("IdCat")));
            $sql->execute();
            return $this->conexao->lastInsertId();
    }
        public function retornarUM($id) {
            $sql = $this->conexao->prepare(query: "select * from produto where id='$id'");
            $sql->execute();
            return $sql->fetch();
        }
        public function editar(produto $obj) {
            $sql = $this->conexao->prepare(query: "update produto set nome = :nome, preco = :preco, descricao = :descricao, IdCat = :idcat where id = :id");
            $sql->bindValue(":id", htmlspecialchars($obj->get("id")));
            $sql->bindValue(":nome", htmlspecialchars($obj->get("nome")));

            $sql->bindValue(":preco", htmlspecialchars($obj->get("preco")));
            $sql->bindValue(":descricao", htmlspecialchars($obj->get("descricao")));
            $sql->bindValue(":idcat", htmlspecialchars($obj->get("IdCat")));

            return $sql->execute();
            
        } public function oferta (produto $obj) {
            $sql = $this->conexao->prepare(query: "update produto set oferta = :oferta where id=:id");
            $sql->bindValue(":id", htmlspecialchars($obj->get("id")));
            $sql->bindValue(":oferta", htmlspecialchars($obj->get("oferta")));
            return $sql->execute();

        }
      
        
}

?>
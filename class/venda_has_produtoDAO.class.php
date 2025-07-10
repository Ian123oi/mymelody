<?php

    include_once "venda.class.php";
    
    class venda_has_produtoDAO {
        private $conexao;
        public function __construct() {
            $this->conexao = new PDO("mysql:host=localhost; dbname=mymelody", "root", "");
        }
        public function listar($temp = "") {
             $sql = $this->conexao->prepare("select * from venda_has_produto $temp");
             $sql->execute();
             return $sql->fetchAll();
        
        }
        public function excluir($temp) {
            $sql = $this->conexao->prepare("delete from produto where id='$temp'"); 
            $sql->execute();
        }
        public function inserir(venda_has_produto $obj) {
            $sql = $this->conexao->prepare("INSERT into venda_has_produto(idVenda, idProduto, preco, quantidade) values (:idVenda, :Produto, :preco, :quantidade)");
            $sql->bindValue(":idVenda", $obj->get("idVenda"));
            $sql->bindValue(":Produto", $obj->get("idProduto"));
            $sql->bindValue(":preco", $obj->get("preco"));
            $sql->bindValue(":quantidade", $obj->get("quantidade"));
            $sql->execute();
            return $this->conexao->lastInsertId();
    }
        public function retornarUM($id) {
            $sql = $this->conexao->prepare(query: "select * from produto where id='$id'");
            $sql->execute();
            return $sql->fetch();
        }
        public function editar(venda_has_produto $obj) {
            $sql = $this->conexao->prepare(query: "update produto set nome = :nome, preco = :preco, descricao = :descricao, IdCat = :idcat where id = :id");
            $sql->bindValue(":id", $obj->get("id"));
            $sql->bindValue(":nome", $obj->get("nome"));

            $sql->bindValue(":preco", $obj->get("preco"));
            $sql->bindValue(":descricao", $obj->get("descricao"));
            $sql->bindValue(":idcat", $obj->get("IdCat"));

            return $sql->execute();
            
        } public function oferta (venda_has_produto $obj) {
            $sql = $this->conexao->prepare(query: "update produto set oferta = :oferta where id=:id");
            $sql->bindValue(":id", $obj->get("id"));
            $sql->bindValue(":oferta", $obj->get("oferta"));
            return $sql->execute();

        }
      
        
}

?>
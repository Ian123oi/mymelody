<?php

    include_once "venda.class.php";
    
    class venda_has_produtoDAO {
        private $conexao;
        public function __construct() {
            $this->conexao = new PDO("mysql:host=localhost; dbname=mymelody", "root", "");
        }
        public function listar($temp = "") {
             $sql = $this->conexao->prepare("select venda_has_produto.*, produto.nome from venda_has_produto inner join produto on venda_has_produto.idProduto = produto.id $temp");
             $sql->execute();
             return $sql->fetchAll();
        
        }
        public function excluir($temp) {
            $sql = $this->conexao->prepare("delete from produto where id='$temp'"); 
            $sql->execute();
        }
        public function inserir(venda_has_produto $obj) {
            $sql = $this->conexao->prepare("INSERT into venda_has_produto(idVenda, idProduto, preco, quantidade) values (:idVenda, :Produto, :preco, :quantidade)");
            $sql->bindValue(":idVenda", htmlspecialchars($obj->get("idVenda")));
            $sql->bindValue(":Produto", htmlspecialchars($obj->get("idProduto")));
            $sql->bindValue(":preco", htmlspecialchars($obj->get("preco")));
            $sql->bindValue(":quantidade", htmlspecialchars($obj->get("quantidade")));
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
            $sql->bindValue(":id", htmlspecialchars($obj->get("id")));
            $sql->bindValue(":nome", htmlspecialchars($obj->get("nome")));

            $sql->bindValue(":preco", htmlspecialchars($obj->get("preco")));
            $sql->bindValue(":descricao", htmlspecialchars($obj->get("descricao")));
            $sql->bindValue(":idcat", htmlspecialchars($obj->get("IdCat")));

            return $sql->execute();
            
        } public function oferta (venda_has_produto $obj) {
            $sql = $this->conexao->prepare(query: "update produto set oferta = :oferta where id=:id");
            $sql->bindValue(":id", htmlspecialchars($obj->get("id")));
            $sql->bindValue(":oferta", htmlspecialchars($obj->get("oferta")));
            return $sql->execute();

        }
      
        
}

?>
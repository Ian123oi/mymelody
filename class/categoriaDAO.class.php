<?php
    include_once "categoria.class.php";
    class categoriaDAO{
        private $conexao;
        public function __construct(){
            $this->conexao = new PDO(
                "mysql:host=localhost; dbname=Mymelody",
                "root", "");
        }
        public function listar() {
            $sql = $this->conexao->prepare("select * from categoria");
            $sql->execute();
            return $sql->fetchAll();
       
       }
       
        public function inserir(categoria $obj){
            $sql = $this->conexao->prepare(
                "INSERT INTO categoria
                (nomeCat)
                VALUES
                (:nome)"
            );
            
            $sql->bindValue(":nome", htmlspecialchars($obj->get("nomeCat")));
            
            $sql->execute();
            return $this->conexao->lastInsertId();
        }

        public function excluir($temp) {
            $sql = $this->conexao->prepare("delete from categoria where idcat=:id");
            $sql->bindValue(":id", $temp);
            $sql->execute();
        }

        public function retornarUM($id) {
            $sql = $this->conexao->prepare(query: "select * from categoria where idcat=:id");
            $sql->bindValue(":id", $id);
            $sql->execute();
            return $sql->fetch();
        }
      
        public function editar(categoria $obj) {
            $sql = $this->conexao->prepare(query: "update categoria set nomeCat = :nome where idcat = :id");
            $sql->bindValue(":id", htmlspecialchars($obj->get("idCat")));
            $sql->bindValue(":nome", $obj->get("nomeCat"));
          
            return $sql->execute();
            
        }
    
    }
?>
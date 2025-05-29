<?php

   include_once "../class/produto.class.php";
   include_once "../class/produtoDAO.class.php";

    $obj = new produto();
    $obj->set("id", temp: $_POST["id"]);
   $obj->set("nome", $_POST["nome"]);
   $obj->set("preco", $_POST["preco"]);
   $obj->set("descricao", $_POST["descricao"]);
   $obj->set("IdCat", $_POST["selecionador"]);
    $objDAO = new produtoDAO();
    
     $retorno = $objDAO->editar($obj);
    if ($retorno) {

        echo "adicionado no banco eba";
        header("location: listar.php");
    } else {
        echo "deu erro";
    }
?>

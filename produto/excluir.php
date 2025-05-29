<?php

include_once "../class/produto.class.php";
include_once "../class/produtoDAO.class.php";

    $id = $_GET["id"];
    $objProdutoDAO = new produtoDAO();
    $objProdutoDAO->excluir($id);
    header ("location:listar.php");

?>
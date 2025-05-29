<?php

   include_once "../class/produto.class.php";
   include_once "../class/produtoDAO.class.php";

    $obj = new produto();
    $id = $_POST["id"];

    $obj->set("id", $id);
   $obj->set("oferta", $_POST["oferta"]);
   $objDAO = new produtoDAO();


    
     $retorno = $objDAO->oferta($obj);
     
    if ($retorno) { 

        echo "adicionado no banco eba";
        header("location: listar.php");
    } else {
        echo "deu erro";
    }
?>

<?php

    include_once "../class/venda.class.php";
    include_once "../class/vendaDAO.class.php";

    $obj = new venda();
    $objdao = new vendaDAO();
    $tipo = $_POST["tipo"];
    $id = $_POST["id"];

    
    if ($objdao->editar($tipo, $id)) {
        header("Location: adm.php");
    }

?>
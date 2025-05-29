<?php

include_once "../class/usuario.class.php";
include_once "../class/usuarioDAO.class.php";

    $id = $_GET["id"];
    $objusuarioDAO = new usuarioDAO();
    $objusuarioDAO->excluir($id);
    header ("location:listar.php");

?>
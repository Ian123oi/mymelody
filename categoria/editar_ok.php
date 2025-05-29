<?php
//echo "<pre>";
//print_r($_POST);
include_once "../class/categoria.class.php";
include_once "../class/categoriaDAO.class.php";

$obj = new categoria();
$obj->set("idCat", $_POST["idcat"]);
$obj->set("nomeCat", $_POST["nome"]);
$objDAO = new categoriaDAO();
$retorno = $objDAO->editar($obj);
if($retorno)
    header("Location:listar.php");
else
    header("Location:listar.php");
?>
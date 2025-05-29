<?php
//echo "<pre>";
//print_r($_POST);
include_once "../class/categoria.class.php";
include_once "../class/categoriaDAO.class.php";

$obj = new categoria();
$obj->set("nomeCat", $_POST["nome"]);
$objDAO = new categoriaDAO();
$retorno = $objDAO->inserir($obj);
if($retorno) {
    echo "Adicionado com sucesso";
    header ("Location:listar.php?temp=Adicionado com sucesso!"); }
else {
    echo "Erro! Por favor, consulte um adm";
    header ("Location:listar.php?temp=Erro, tente novamente"); }
?>
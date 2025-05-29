<?php

include_once "../class/usuario.class.php";
include_once "../class/usuarioDAO.class.php";

$obj = new usuario();
$obj->set("email", $_POST["email"]);
$obj->set("senha", $_POST["senha"]);
$objDAO = new usuarioDAO();
$retorno = $objDAO->login($obj);
if ($retorno == 2)
    echo "email não cadastrado";
    else if ($retorno == 1)
    echo "senha incorreta";
else {
    session_start();
    $_SESSION["id"] = $retorno["id"];
    $_SESSION["login"] = true;
    header("Location:index.php?loginOk");
}
?>
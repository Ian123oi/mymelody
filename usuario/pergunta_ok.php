<?php

include_once "../class/usuario.class.php";
include_once "../class/usuarioDAO.class.php";

$obj = new usuario();
$obj->set("id",$_POST["id"]);
$obj->set("email",$_POST["email"]);
$obj->set("senha",$_POST["senha"]);
$obj->set("resposta_seguranca",$_POST["resposta"]);

    $objDAO = new usuarioDAO();
    $retorno = $objDAO->alterarSenha($obj);
    if ($retorno == 2) {
        echo "email não cadastrado";
    } else if ($retorno == 1) {
        echo "resposta incorreta";
    } else {
        echo "senha alterada com sucesso!";
    }
?>
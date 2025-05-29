<?php

   include_once "../class/usuario.class.php";
   include_once "../class/usuarioDAO.class.php";

   $obj = new usuario();
   $obj->set("nome", $_POST["nome"]);
   $obj->set("email", $_POST["email"]);
   $obj->set("cpf" , $_POST["cpf"]);
   $obj->set("senha", $_POST["senha"]);
   $obj->set("numero", $_POST["numero"]);
    $objDAO = new usuarioDAO();
    $retorno = $objDAO->inserir($obj);
    if ($retorno) {

        echo "adicionado no banco eba";
        header("location: listar.php");
    } else {
        echo "deu erro";
    }
?>
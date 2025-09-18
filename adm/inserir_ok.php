<?php

   include_once "../class/usuario.class.php";
   include_once "../class/usuarioDAO.class.php";

   $obj = new usuario();
   $obj->set("nome", $_POST["nome"]);
   $obj->set("email", $_POST["email"]);
   $obj->set("cpf" , $_POST["cpf"]);
   $obj->set("senha", $_POST["senha"]);
   $obj->set("numero", $_POST["numero"]);
   $obj->set("tipo", "adm");
    $objDAO = new usuarioDAO();
    $retorno = $objDAO->inserir($obj);
    if ($retorno) {
        if ($retorno !== 2) {

        header("location: listar.php");
        unset($_GET["msg"]);
         } 
        else if ($retorno == 2) {
            header("Location: inserir.php?msg=Email ja cadastrado");
        }
    } else {
        echo "deu erro";
    }
?>
<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header ("Location:../site/login.php");
    }
    include_once "../class/usuario.class.php";
    include_once "../class/usuarioDAO.class.php";

    $objusuarioDAO = new usuarioDAO();
    $retorno = $objusuarioDAO->listar();

    /*
    echo "<pre>";
    print_r($retorno); */

    echo "<a href='inserir.php'>Inserir </a> <br> <br> <br>";

    foreach($retorno as $linha) {
        echo "Nome: ".$linha["nome"];
        echo " <br>CPF: ".$linha["cpf"];
        echo  "<br>Email ".$linha["email"];
        echo  "<br>Numero ".$linha["numero"]; ?>
        
        <?php
        echo "<br> <a href='editar.php?id=".$linha["id"]."'>Editar</a>     ";
        echo "<a href='excluir.php?id=".$linha["id"]."'>Excluir</a>";
        echo "<br> <br>";
        
    }   
?>
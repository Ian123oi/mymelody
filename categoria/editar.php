<?php
    include_once "../class/categoria.class.php";
    include_once "../class/categoriaDAO.class.php";
    $id = $_GET["id"];
    $objDAO = new categoriaDAO();
    $retorno = $objDAO->retornarUm($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <form action="editar_ok.php" method="POST">
        <input type="hidden" name="idcat" value="<?=$retorno["idcat"]?>"/>
        Nome:
        <input type="text" name="nome" value="<?=$retorno["nomeCat"]?>"/>
        <br>
        
        <button type="submit">Enviar</button>
    </form>
</body>
</html>

<?php

    
include_once "../class/produto.class.php";
include_once "../class/produtoDAO.class.php";

    


    $id = $_GET["id"];
    $objprodutoDAO = new produtoDAO();
    $retorno = $objprodutoDAO->retornarUM($id);
    
?> <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>oferta</title>
</head>
<body>

  <form action="oferta_ok.php" method="POST">
<input type="hidden" name="id" value="<?=$retorno["id"]?>">
    <label> Oferta atual em porcentagem: </label>
    <input type="number" name="oferta" value="<?=$retorno["oferta"]?>"> <br>
    <br>
   
    

     <br>
        

     
    <input type="submit" name="enviar">
</form>


</body>
</html>


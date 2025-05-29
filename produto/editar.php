

<?php
    

    include_once "../class/produto.class.php";
    include_once "../class/produtoDAO.class.php";
    include_once "../class/categoria.class.php";
    include_once "../class/categoriaDAO.class.php";
        $id = $_GET["id"];
        $objProd = new produto();
        $objprodutoDAO = new produtoDAO();
        $retornoProd = $objprodutoDAO->retornarUM($id);
        
    
?>  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar</title>
</head>
<body>

      <form action="editar_ok.php" method="POST">
    <input type="hidden" name="id" value="<?=$retornoProd["id"]?>">
        <label> Nome: </label>
        <input type="text" name="nome" value="<?=$retornoProd["nome"]?>"> <br>
        <br>
        <label> preco: </label>
        <input type="number" name="preco" value="<?=$retornoProd["preco"]?>"> <br>
        <br>
        <label> descricao: </label>
        <input type="text" name="descricao" value="<?=$retornoProd["descricao"]?>"> <br>
        <br>

         <br>
         <label> id Categoria </label>

         <select name="selecionador">
         <?php
              $obj = new categoria();
           $objcategoriaDAO = new categoriaDAO();
           $retorno = $objcategoriaDAO->listar();
          
          
           $i = 0;
           foreach($retorno as $linha) {

            if ($linha["idcat"] == $retornoProd["IdCat"]) {

            echo ("<option value=". $linha["idcat"]. " selected>".$linha["nomeCat"]."</option>");
            } else {

                echo ("<option value=". $linha["idcat"]. ">".$linha["nomeCat"]."</option>");

           }
        }
           ?>
    
         <br>
            

         
        <input type="submit" name="enviar">
    </form>

    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include_once "../class/produto.class.php";
        include_once "../class/produtoDAO.class.php";
        include_once "../class/categoria.class.php";
        include_once "../class/categoriaDAO.class.php";
        $objCategoria = new categoriaDAO();
        $categorias = $objCategoria->listar();
   
    ?>
    <title>Inserir</title>
</head>
<body>
    
    
    <form action="inserir_ok.php" method="post" enctype="multipart/form-data">
        <label> Nome: </label>
        <input type="text" name="nome" required/>
        <br>
        <label> preco: </label>
        <input type="number" name="preco" required>
        <br>
        <label> descricao: </label>
        <input type="text" name="descricao"> <br> 
        <br>
         <label> Imagem: </label> <br>
         <input type="file" name="imagem[]" accept="image/pgn, image/jpeg"/> <br>
         <br>
         <label> Id categoria </label> <br>
         <select name="selecionador">
           
           <?php
              $obj = new categoria();
           $objcategoriaDAO = new categoriaDAO();
           $retorno = $objcategoriaDAO->listar();
           $i = 0;
           foreach($retorno as $linha) {

            echo ("<option value=". $linha["idcat"]. ">".$linha["nomeCat"]."</option>");

           }
           ?>


         </select>
        <input type="submit" name="enviar">
    </form>

   

</body>
</html>
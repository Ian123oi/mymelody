<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=x, initial-scale=1.0">
    <title>Home</title>
    <?php
        include_once "../class/categoria.class.php";
        include_once "../class/categoriaDAO.class.php";
        include_once "../class/produtoDAO.class.php";
        include_once "../class/produto.class.php";
        include_once "../class/imagemDAO.class.php";
        include_once "../class/imagem.class.php";

        $objCategoriaDAO = new categoriaDAO();
        $categorias = $objCategoriaDAO->listar();
        $objProdutoDAO = new produtoDAO();
        $objImagemDao = new imagemDAO();
        
    
    ?>
</head>
<body>
    
    
        <?php
            foreach($categorias as $linha) {
                echo "<li><a href='listar.php'".$linha["nomeCat"]."</li>".$linha["idcat"].":".$linha["nomeCat"]."</a></li>";
            }
                echo "<br> <br>";
            

           foreach($objProdutoDAO->listar("where oferta>0 limit 2 q") as $linha) {
        echo ("<div>");echo "<ul>";
        if ($linha["oferta"] == 0) {
        $preco = $linha["preco"];
    } else {
    echo (" OFERTA LIMITADA!! -> <s> R$". $linha["preco"]."</s> <b> R$".$preco = $linha["oferta"]/100 * $linha["preco"]. "</b> ");
    }
        
        echo "<h3>Nome: ".$linha["nome"]."</h3>";
        echo " <h4> preco: ".$preco."</h4>";
        echo  "<h5> descricao: ".$linha["descricao"]."</h5>";
        
        $retornoImg = $objImagemDao->retornarUm($linha["id"]); 
        if ($retornoImg>0) {
        
        echo "<img src='../img/". $retornoImg["nomeImagem"]."'/>";
        echo "<br>";}
       
        
        
        

        echo "<br> <br>";
        echo "</ul>";
echo ("</div>");
    }
    

        ?>
    </ul>

</body>
</html>
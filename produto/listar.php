<style>

    img {
        height: 300px;
        width: 300px;
    }

</style>

<?php
    include_once "../class/produto.class.php";
    include_once "../class/produtoDAO.class.php";
    include_once "../class/imagem.class.php";
    include_once "../class/imagemDAO.class.php";

    $objprodutoDAO = new produtoDAO();
    $objImagemDao = new imagemDAO();
    $retorno = $objprodutoDAO->listar();

    
    /*
    echo "<pre>";
    print_r($retorno); */

    echo "<a href='inserir.php'>Inserir </a> <br> <br> <br>";

    foreach($retorno as $linha) {
        echo ("<div>");
        if ($linha["oferta"] == 0) {
        $preco = $linha["preco"];
    } else {
    echo (" OFERTA LIMITADA!! -> <s> R$". $linha["preco"]."</s> <b> R$".$preco = $linha["oferta"]/100 * $linha["preco"]. "</b> ");
    }
        echo "<br>Nome: ".$linha["nome"];
        echo " <br> preco: ".$preco;
        echo  "<br> descricao: ".$linha["descricao"];
        
        $retornoImg = $objImagemDao->retornarUm($linha["id"]); 
        if ($retornoImg>0) {
        
        echo "<img src='../img/". $retornoImg["nomeImagem"]."'/>";
        echo "<br>";}
        echo "<br> categoria: ".$linha["nomeCat"];
        
        
        echo "<br> <a href='editar.php?id=".$linha["id"]."'>Editar</a>     ";

        echo "<a href='excluir.php?id=".$linha["id"]."'>Excluir</a>"; 
        echo "<br> <a href='oferta.php?id=".$linha["id"]."'>oferta!!!!!</a>";

        echo "<br> <br>";
        
    }  
?>
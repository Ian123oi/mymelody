<?php
    session_start();
    include_once "../class/venda.class.php";
    include_once "../class/vendaDAO.class.php";
    include_once "../class/venda_has_produto.class.php";
    include_once "../class/venda_has_produtoDAO.class.php";
    include_once "../class/produtoDAO.class.php";
    include_once "../class/produto.class.php";
    $objVenda = new Venda();
    $objVenda->set("idUsuario", $_SESSION["id"]);
    $objVenda->set("data", date("Y-m-d"));
    $objVenda->set("formapagamento", $_POST["pagamento"]);
    $objVenda->set("endereco", $_POST["endereco"]);
    $objVenda->set("status", "Processando");
    $objDAO = new vendaDAO();
    $acum = 0;
    $retorno = $objDAO->inserir($objVenda);
    if ($retorno>0) {
        echo "Venda inserida";
        $objVP = new venda_has_produto();
        $objProdutoDAO = new produtoDAO();
        $objVPDAO = new venda_has_produtoDAO();
        $listinha = $objVPDAO->listar("where idVenda = ". $retorno  );
        $objVP->set("idVenda", $retorno);
        foreach($_SESSION["carrinho"] as $linha) {
            $objVP->set("idProduto", $linha);
            $objProduto = $objProdutoDAO->retornarUM($linha);
            $objVP->set("preco", $objProduto["preco"]);
            $objVP->set("quantidade", $_POST["quantidade$linha"]);
            $objVPDAO->inserir($objVP);
        
         }   echo ("Resumo da compra <br> Produtos comprados: <br>"); foreach($_SESSION["carrinho"] as $linha) {
            echo ("<br>".$objProduto["nome"]. " ". $objProduto["preco"] . " X ". $listinha["quantidade"]. " Preço final: ". $objProduto["preco"] * $listinha["quantidade"]);
            $acum+= $objProduto["preco"] * $listinha["quantidade"];
        }   echo ("<br> <br> Preço total: ". $acum);
        
    } else {

    } 
    
?>

    <a href="index.php?oi=alo">Voltar para o menu</a>
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
        ?> 
        <table border>
                <thead>
                    <th> Nome </th> 
                    <th> Preço </th>
                    <th> Quantidade </th>
                    <th> Total </th>
                </thead>
                <tbody><?php
        echo "Venda inserida ";
        $objVP = new venda_has_produto();
        $objProdutoDAO = new produtoDAO();
        $objVPDAO = new venda_has_produtoDAO();
        $objVP->set("idVenda", $retorno);
        foreach($_SESSION["carrinho"] as $linha) {
            $objVP->set("idProduto", $linha);
            $objProduto = $objProdutoDAO->retornarUM($linha);
            $objVP->set("preco", $objProduto["preco"]);
            $objVP->set("quantidade", $_POST["quantidade".$linha]);
            
            
            $objVPDAO->inserir($objVP);
        
         }  
         $listinha = $objVPDAO->listar("where idVenda = ". $retorno  );


         echo ("Resumo da compra <br> Produtos comprados: <br>"); foreach($listinha as $linha) {
            echo ("<tr> <td>".$linha["nome"]. "</td> <td>". $linha["preco"] . "</td> <td>". $linha["quantidade"]. "</td> <td>". $linha["preco"] * $linha["quantidade"]. "</td> </tr>");
            $acum+= $linha["preco"] * $linha["quantidade"];
        }         echo ("</tbody> </table>");
   
        echo (" <br> Preço total: <b>". $acum."</b>");
        echo ("<br> Endereço: <b>".$_POST["endereco"]. "</b>");
        echo ("<br> Metodo Pagamento: <b>". $_POST["pagamento"]. "</b>");
        
    } else {

    } 
    
?>

    <a href="index.php?oi=alo">Voltar para o menu</a>
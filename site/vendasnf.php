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
    $objVPDAO = new venda_has_produtoDAO();
    $objVP = new venda_has_produto();
    $objDAO = new vendaDAO();
    $acum = 0;
    
    $listinha = $objVPDAO.listar();
    echo ("Resumo da compra <br> Produtos comprados: <br>"); foreach($listinha as $linha) {
            echo ("<tr> <td>".$linha["nome"]. "</td> <td>". $linha["preco"] . "</td> <td>". $linha["quantidade"]. "</td> <td>". $linha["preco"] * $linha["quantidade"]. "</td> </tr>");
            $acum+= $linha["preco"] * $linha["quantidade"];
        }         echo ("</tbody> </table>");
   
        echo (" <br> Preço total: <b>". $acum."</b>");
        echo ("<br> Endereço: <b>".$_POST["endereco"]. "</b>");
        echo ("<br> Metodo Pagamento: <b>". $_POST["pagamento"]. "</b>");
        
    
    
?>

    <a href="index.php?oi=alo">Voltar para o menu</a>
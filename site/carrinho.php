<?php
include_once "menu.php";
    if (!isset($_SESSION["carrinho"])) {
        echo "<h2> Carrinho vazio! Vá as compras! </h2>";
    }
    else {
        
        ?>
        <div>
            <form action="carrinho_ok.php" method="POST">
            <table border>
                <thead>
                    <th> Nome </th> 
                    <th> Preço </th>
                    <th> Quantidade </th>
                </thead>
                <tbody> 
                    <?php
                    include_once("../class/produto.class.php");
                    include_once("../class/produtoDAO.class.php");
                    $objProdutoDAO = new produtoDAO();

                    foreach($_SESSION["carrinho"] as $id) {
                        $retorno = $objProdutoDAO->retornarUm($id);
                    
                    ?>
                        <tr>
                            <td>
                                <?=$retorno["nome"];?>  </td><td>
                                <?=$retorno["preco"];?> </td><td>
                                <input type="number" name="quantidade<?=$id;?>" id="">
                            </td>
                        </tr>
                    <?php
                    }     
                    ?>
                </tbody>
            </table>
            
            <label> Forma de pagamento </label> </br>
            <input type="text" name="pagamento"/> <br>
            <label> Endereço de entrega: </label> <br>
            <input type="text" name="endereco"> <br>
            <button type="submit" name="enviar">Finalizar compra</button>
            </form>
        <?php
    }

?>
</div>
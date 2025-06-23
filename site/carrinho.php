<?php

session_start();
if(!isset($_SESSION["login"]))
    header("location:login.php");

    if (!isset($_SESSION["carrinho"])) {
        echo "<h2> Carrinho vazio! Vá as compras! </h2>";
    }
    else {
        ?>
            <table>
                <thead>
                    <th> Nome </th>
                    <th> Preço </th>
                    <th> Quantidade </th>
                </thead>
                <tbody>
                    <?php
                    include_once("../class/produto.class.php");
                    include_once("../class/produtoDAO.class.php");
                    $objProduto = new produtoDAO();

                    foreach($_SESSION["carrinho"] as $id) {
                        $retorno = $objprodutoDAO->retornarUm($id);    
                    }
                    ?>
                        <tr>
                            <td>
                                <?=$retorno["nome"];?>  </td><td>
                                <?=$retorno["preco"];?> </td><td>
                                <input type="number" name="" id="">
                            </td>
                        </tr>
                    <?php
                        
                    ?>
                </tbody>
            </table>
        <?php
    }

?>
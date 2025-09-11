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
   $listavenda = $objDAO->listar("WHERE status like '%finalizado%'");

$acum = 0;

foreach ($listavenda as $venda) {
    // Agora você acessa corretamente o idvenda
    $idVenda = $venda["idvenda"];
    
    // Busca os produtos da venda específica
    $listinha = $objVPDAO->listar("WHERE idVenda = $idVenda");
    

    echo "Resumo da compra <br> Produtos comprados: <br>";
    echo "<table><tbody>";

    foreach ($listinha as $linha) {
        echo "<tr>
                <td>".$linha["nome"]."</td>
                <td>".$linha["preco"]."</td>
                <td>".$linha["quantidade"]."</td>
                <td>".($linha["preco"] * $linha["quantidade"])."</td>
              </tr>";
        $acum += $linha["preco"] * $linha["quantidade"];
    }

    echo "</tbody></table>";
    echo "<br> Preço total: <b>$acum</b>";
    echo "<br> Endereço: <b>".$venda["endereco"]."</b>";
    echo "<br> Metodo Pagamento: <b>".$venda["formapagamento"]."</b>";
 

    ?> <form action="vendasAtualiza.php" method="POST"> 
        <input type="id" hidden name="id" value= "<?php echo $idVenda;?>"> </input> <?php 
    echo "<br> <select name='tipo'> <option value='Processando'> Processando </option>";
    echo " <option value='finalizado' selected> Finalizado </option>"; 
    echo "</select> <br> <br> <input type='submit' name='submit'> </input>";
    ?> </form> <hr> <?php
} ?>
    


    <a href="index.php?oi=alo">Voltar para o menu</a>
<?php
include_once "menu.php";
?>
    
    
    
<?php
if ($_SESSION["tipo"] == "adm") {
    ?> <h1> <a href="adm.php"> PAGINA DO ADMNINASTRO </a> </h1> <?php
}
$objDAO = new produtoDAO(); 
if (isset($_GET["idCat"])) {
$retorno = $objDAO->listar(" where produto.idCat= ".$_GET["idCat"]. " ORDER BY id DESC LIMIT 3"  ); }
else if (isset($_GET["pesquisa"])) {
    $retorno = $objDAO->listar("where produto.nome LIKE '%".$_GET["pesquisa"]. "%' or produto.descricao like '%".$_GET["pesquisa"]. "%' ORDER BY id DESC LIMIT 3 ");}

else { $retorno = $objDAO->listar("ORDER BY data DESC LIMIT 3");}
$objImagemDAO = new imagemDAO();
echo "<h1> LANÇAMENTOS!!!!! </h1>";
$cont = 0;
echo "<div class='container-fluid'>";
echo "<div class='row'>";
foreach($retorno as $linha){

    if($cont==3) {
        echo "</div> <div class='row'>";
        $cont = 0;
    }

    ?>
    
    
    <div class="col-sm">

        <h3><?=$linha["nome"]?></h3>
        <h4><?=$linha["preco"]?></h4>
        <h5><?=$linha["nomeCat"]?></h5>
        <h5>Descrição: <?=$linha["descricao"]?></h5>

        <?php
        $retornoImg =  $objImagemDAO->retornarUm($linha["id"]);
        if($retornoImg>0)
            echo "<img style='height:250px; width: 250px' src='../img/".$retornoImg["nomeImagem"]."'/>";
        ?>
        <a href="?id=<?=$linha['id'];?>&carrinho"> Adicionar ao Carrinho  </a>   &nbsp;
        <a href="?remover=<?=$linha['id'];?>"> Remover do carrinho </a>
        </div>
    
    
<?php $cont++;} ?>
</div>
</div>
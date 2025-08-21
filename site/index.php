<?php
session_start();
if(isset($_GET["carrinho"])) {
    if(!isset($_SESSION["carrinho"])) {
    $_SESSION["carrinho"] = []; }

 if (!in_array($_GET["id"], $_SESSION["carrinho"])) {
    array_push($_SESSION["carrinho"], $_GET["id"]);
    echo "<h2> adicionado ao carrinho </h2>"; 
    print_r($_SESSION["carrinho"]);
 }
 else {
    echo "O produto ja ta no carrinho";
}
}

if (isset($_GET["oi"])) {
    unset($_SESSION["carrinho"]);
}
    include_once "../class/categoria.class.php";
    include_once "../class/CategoriaDAO.class.php";
    include_once "../class/produto.class.php";
    include_once "../class/produtoDAO.class.php";
    include_once "../class/imagem.class.php";
    include_once "../class/imagemDAO.class.php";

    $objCategoriaDAO= new categoriaDAO();
    $categorias = $objCategoriaDAO->listar();
?>
<ul>
    <?php
    foreach($categorias as $linha){
        echo "<li><a href='index.php?idCat=".
        $linha["idcat"]."'>".$linha["nomeCat"]."</a></li>";
    }
    ?>
    
    <li> <a href="carrinho.php"> Carrinho de compras </a></li>
</ul> <br> <br>
    <form action="index.php?nome=".pesquisa>
    <input type="text" name="pesquisa"> </input>
    <input type="submit" name="enviar"> </input></form>
<?php
$objDAO = new produtoDAO(); 
if (isset($_GET["idCat"])) {
$retorno = $objDAO->listar(" where produto.idCat= ".$_GET["idCat"]. " ORDER BY id DESC LIMIT 3"  ); }
else if (isset($_GET["pesquisa"])) {
    $retorno = $objDAO->listar("where produto.nome LIKE '%".$_GET["pesquisa"]. "%' or produto.descricao like '%".$_GET["pesquisa"]. "%' ORDER BY id DESC LIMIT 3 ");}

else { $retorno = $objDAO->listar("ORDER BY id DESC LIMIT 3");}
$objImagemDAO = new imagemDAO();
foreach($retorno as $linha){
    ?>
    <div>
        <h3><?=$linha["nome"]?></h3>
        <h4><?=$linha["preco"]?></h4>
        <h5><?=$linha["nomeCat"]?></h5>
        <h5><?=$linha["descricao"]?></h5>

        <?php
        $retornoImg =  $objImagemDAO->retornarUm($linha["id"]);
        if($retornoImg>0)
            echo "<img src='../img/".$retornoImg["nomeImagem"]."'/>";
        ?>
        <a href="?id=<?=$linha['id'];?>&carrinho"> Adicionar ao Carrinho  </a>
        <a href="?oi=oi"> aa </a>
    </div>
<?php } ?>
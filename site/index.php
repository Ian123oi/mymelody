<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>




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
} if(!isset($_SESSION["login"])) {
    header("location:login.php");
} if ($_SESSION["tipo"] == "adm") {
    ?> <h1> <a href="adm.php"> PAGINA DO ADMNINASTRO </a> </h1> <?php
}

if (isset($_GET["oi"])) {
    unset($_SESSION["carrinho"]);
} if (isset($_GET["logout"])) {
    session_destroy();
} if ($_SESSION["id"])
    include_once "../class/categoria.class.php";
    include_once "../class/CategoriaDAO.class.php";
    include_once "../class/produto.class.php";
    include_once "../class/produtoDAO.class.php";
    include_once "../class/imagem.class.php";
    include_once "../class/imagemDAO.class.php";
    
    
    
    $objCategoriaDAO= new categoriaDAO();
    $categorias = $objCategoriaDAO->listar();
?>

    <div class="container"> <!-- Estilização vai ser tipo colocar um hide/show de javascript num menu categoria, ai quando tu clica ele mostra todas as categorias clicaveis, além de colocar o botão de 
        logout pro canto direito da página -->

    <div class="row border border-rounded">
    <?php
   /* foreach($categorias as $linha){
        ?> <div class="col-sm"> <?php
        echo "<li><a href='index.php?idCat=".
        $linha["idcat"]."'>".$linha["nomeCat"]."</a></li>";?> </div> <?php
    }  */

      ?>
        <div class="col-sm border border-dark">
      <button id="butone"> Categorias </button>
        </div>

     <div class="col-sm border border-dark">   <a href="carrinho.php"> Carrinho de compras </a> </div>
     <div class="col-sm border border-dark">   <a href="vendasnf.php"> Vendas não finalizadas </a></div>
     <div class="col-sm border border-dark">   <a href="vendasf.php"> vendas finalizadas </a> </div>
     <div class="col-sm border border-dark">   <a href="?logout=logout"> Logout/sair </a> </div>
        </div>
        <div class="row">
            <div class="col-sm">
      <?php
        foreach($categorias as $linha){
        ?> <div id=$linha  class="row"> <?php
        echo "<a href='index.php?idCat=".
        $linha["idcat"]."'>".$linha["nomeCat"]."</a>";?> </div> <?php
    }  

      ?>      
</div>
      <script>
        $().ready(function() {
        $("#butone").click(function() {
            <?php foreach($categorias as $linha) {?>
            $($linha).toggle(); <?php } ?>
           
        });
    });
      </script>

      
    </div>
    
    
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

else { $retorno = $objDAO->listar("ORDER BY date DESC LIMIT 3");}
$objImagemDAO = new imagemDAO();
foreach($retorno as $linha){
    ?>
    
    <div>
        <h1> LANÇAMENTOS!!!!! </h1>
        <h3><?=$linha["nome"]?></h3>
        <h4><?=$linha["preco"]?></h4>
        <h5><?=$linha["nomeCat"]?></h5>
        <h5>Descrição: <?=$linha["descricao"]?></h5>

        <?php
        $retornoImg =  $objImagemDAO->retornarUm($linha["id"]);
        if($retornoImg>0)
            echo "<img src='../img/".$retornoImg["nomeImagem"]."'/>";
        ?>
        <a href="?id=<?=$linha['id'];?>&carrinho"> Adicionar ao Carrinho  </a>   &nbsp;
        <a href="?oi=oi"> Remover do carrinho </a>
    </div>
    
<?php } ?>
</div>


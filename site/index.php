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
    ?> <script> alert ("Adicionado ao carrinho!"); </script> <?php
 }
 else {
    ?> <script> alert ("Produto já esta no carrinho!"); </script> <?php
}
} if(!isset($_SESSION["login"])) {
    header("location:login.php");
} 


if (isset($_GET["remover"])) {
    $idremove = $_GET["remover"];

    if (($key = array_search($idremove, $_SESSION["carrinho"])) !== false) {
        // Produto encontrado no carrinho, removendo-o
        unset($_SESSION["carrinho"][$key]);
        // Reindexando o array para corrigir os índices
        $_SESSION["carrinho"] = array_values($_SESSION["carrinho"]);
        
    }
}
if (isset($_GET["logout"])) {
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

    <div class="container-fluid position-fixed">
  
    
    <div class="row" style="background-color: #654321">

    <form class="form-inline" action="index.php?nome=".pesquisa>
    
    <div class="col-md-6 mx-auto" >
    <input type="text" name="pesquisa" class="form-control" placeholder="pesquisar algum produto"> </input> 
    </div></form>

    </div>

    <div class="row" style="background-color: #654321">
    <?php
      ?>
      
        <div class="col-sm">
      <button class="btn btn-warning btn-lg" style="width:100%" id="butone" > Categorias </button>
        </div>

        <div class="col-sm ">    <button class="btn btn-warning btn-lg" style="width:100%" id="carrinho"> Carrinho </button> </div>
        <div class="col-sm ">    <button class="btn btn-warning btn-lg" style="width:100%" id="vendasnf"> Vendas Pendentes </button> </div>
        <div class="col-sm ">    <button class="btn btn-warning btn-lg" style="width:100%" id="vendaf"> Vendas Concluída </button> </div>
        <div class="col-sm ">    <button class="btn btn-warning btn-lg" style="width:100%" id="sair"> Logout/sair </button> </div>
        </div>
        <div class="row" style="background-color: #654321; height: 20px"></div>
        <div class="row">
            <div class="col-sm">
      <?php
        foreach($categorias as $linha){
        ?> <div id=$linha  class="row">
            <div class="col-md-1" style="background-color: #C4A484"> <?php
        echo "<a href='index.php?idCat=".
        $linha["idcat"]."'>".$linha["nomeCat"]."</a>";?> </div> </div> <?php
    }  

      ?>
      </div>      
</div>
      <script>

        

        $().ready(function() {

            <?php foreach($categorias as $linha) {?>
                $($linha).hide(); <?php } ?>
        
            $("#carrinho").click(function() {
                window.location.href = 'carrinho.php';
            });
            $("#vendasnf").click(function() {
                window.location.href = 'vendasnf.php';
            });
            $("#vendaf").click(function() {
                window.location.href='vendasf.php';
            });
            $("#sair").click(function() {
                window.location.href='?logout=logout.php';
            });
        $("#butone").click(function() {
            <?php foreach($categorias as $linha) {?>
            $($linha).toggle(); <?php } ?>
           
        });
    });
      </script>

      
    </div>
    
    
</ul> <br> <br> <br> <br> <br>
    
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
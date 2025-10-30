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

<div class="container-fluid position-fixed" style="top: 0; z-index: 1000; background-color:#654321;">
  <div class="row align-items-center p-2">
    <!-- Logo -->
    <div class="col-md-3 d-flex align-items-center">
      <a href="index.php">
        <img src="https://png.pngtree.com/png-clipart/20231007/original/pngtree-cool-emoticon-cut-out-picture-image_13100993.png"
             class="img-fluid" style="width: 80px;">
      </a>
    </div>

    <!-- Barra de pesquisa -->
    <div class="col-md-6">
      <form class="d-flex" action="index.php" method="get">
        <input type="text" name="pesquisa" class="form-control" placeholder="Pesquisar algum produto">
        <button type="submit" class="btn btn-warning ms-2">Buscar</button>
      </form>
    </div>
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

    <div style="padding-top:50px;">


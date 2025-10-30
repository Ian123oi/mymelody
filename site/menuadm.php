<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location:login.php");
}
if (isset($_GET["logout"])) {
    session_destroy();
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

<body>



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
      
        
        <div class="col-sm ">    <button class="btn btn-warning btn-lg" style="width:100%" id="categorias"> Categorias </button> </div>
        <div class="col-sm ">    <button class="btn btn-warning btn-lg" style="width:100%" id="produtos"> produtos </button> </div>
        <div class="col-sm ">    <button class="btn btn-warning btn-lg" style="width:100%" id="usuario"> usuarios </button> </div>
        <div class="col-sm ">    <button class="btn btn-warning btn-lg" style="width:100%" id="vendaf"> Vendas Concluída </button> </div>
        <div class="col-sm ">    <button class="btn btn-warning btn-lg" style="width:100%" id="sair"> Logout/sair </button> </div>
        </div>
        <div class="row" style="background-color: #654321; height: 20px"></div>
        <div class="row">
           
      </div>      

</div>
      <script>

        

        $().ready(function() {

            
        
            $("#categorias").click(function() {
                window.location.href = '../categoria/listar.php';
            });
            $("#produtos").click(function() {
                window.location.href = '../produto/listar.php';
            });
            $("#usuario").click(function() {
                window.location.href = '../usuario/listar.php';
            });
            $("#vendaf").click(function() {
                window.location.href='vendasf.php';
            });
            $("#sair").click(function() {
                window.location.href='?logout=logout.php';
            });
       
    });
      </script>

      
    </div>
    <div style="padding-top:50px;">

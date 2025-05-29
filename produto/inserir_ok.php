<?php

   include_once "../class/produto.class.php";
   include_once "../class/produtoDAO.class.php";
   include_once "../class/imagem.class.php";
   include_once "../class/imagemDAO.class.php";

   $obj = new produto();
   $obj->set("nome", $_POST["nome"]);
   $obj->set("preco", $_POST["preco"]);
   $obj->set("descricao" , $_POST["descricao"]);
   $obj->set("IdCat", $_POST["selecionador"]);
   echo ($_POST["selecionador"]);
    $objDAO = new produtoDAO();
    $retorno = $objDAO->inserir($obj);

    $objimg = new imagem();
    $objimgDAO = new imagemDAO();
 $objimg->set("id_produto", $retorno);
    for ($i=0; $i<count($_FILES["imagem"]["name"]); $i++) {
        $nome = $_FILES["imagem"]["name"][$i];
        $nomeTmp = $_FILES["imagem"]["tmp_name"][$i];
        $diretorio = "../img/".$nome;
        if (move_uploaded_file($nomeTmp, $diretorio)) {
            $objimg->set("name", $nome);
           
            $objimgDAO->inserir($objimg);
    } 
    if ($retorno) {
        echo "adicionado no banco eba";
        header("Location:listar.php");
        
    } else {
        echo "deu erro";
    } }
?>
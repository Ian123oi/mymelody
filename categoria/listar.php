<?php
    include_once "../class/categoria.class.php";
    include_once "../class/categoriaDAO.class.php";

    $objusuarioDAO = new categoriaDAO();
    $retorno = $objusuarioDAO->listar();

    /*
    echo "<pre>";
    print_r($retorno);
*/
if(isset($_POST["editarOk"]))
    echo "<h2>Editado com sucesso!</h2>";
if(isset($_POST["editarErro"]))
    echo "<h2>Erro ao editar!</h2>";

echo "<a href='inserir.php'>Inserir</a><br />";
foreach($retorno as $linha){
    echo "Nome: ".$linha["nomeCat"];
    echo "<br />
        <a href='editar.php?id=".$linha["idcat"]."'>
         Editar</a>  
         <a href='excluir.php?id=".$linha["idcat"]."'>
         Excluir</a>
         <br /><br />";
}
?>
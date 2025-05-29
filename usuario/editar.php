

<?php
    

    include_once "../class/usuario.class.php";
    include_once "../class/usuarioDAO.class.php";
    
        $id = $_GET["id"];
        $objusuarioDAO = new usuarioDAO();
        $retorno = $objusuarioDAO->retornarUM($id);
    
    
?>  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar</title>
</head>
<body>

    <form action="editar_ok.php" method="POST">
        <input type="hidden" name="id" value="<?=$retorno["id"]?>">
        <label> Nome </label>
        <input type="text" name="nome" value="<?=$retorno["nome"]?>"> <br>
        <label> cpf </label>
        <input oninput="mascara(this)" type="text" name="cpf" value="<?=$retorno["cpf"]?>"> <br> 
        <label> email </label>
        <input type="email" name="email" value="<?=$retorno["email"]?>"> <br>
        <label> senha </label>
        <input type="password" name="senha" value="<?=$retorno["senha"]?>"> <br>
        <label> numero </label>
        <input oninput="mascaranum(this)" type="text" name="numero"id="numero" value="<?=$retorno["numero"]?>"> <br> 
        <input type="submit" name="submit" value="enviar"> <br>
        <br>
    </form>

    <script> function mascara(i){
   
   var v = i.value;
   
   if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
      i.value = v.substring(0, v.length-1);
      return;
   }
   
   i.setAttribute("maxlength", "14");
   if (v.length == 3 || v.length == 7) i.value += ".";
   if (v.length == 11) i.value += "-";

}   function mascaranum(i){
   
   var v = i.value;
   
   if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
      i.value = v.substring(0, v.length-1);
      return;
   }
   
   i.setAttribute("maxlength", "13");
   if (v.length == 2) i.value += " ";
   if (v.length == 8) i.value += "-";

}
    </script>
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir</title>
</head>
<body>
    
    
    <form action="inserir_ok.php" method="post" enctype="multipart/form-data">
        <label> Nome: </label>
        <input type="text" name="nome" placeholder required/>
        <br>
        <label> Email: </label>
        <input type="email" name="email" required>
        <br>
        <label> CPF: </label>
        <input oninput="mascara(this)" type="text" name="cpf" required> <br> 
        <label> Numero: </label>
        <input oninput="mascaranum(this)" type="text" name="numero"id="numero" required> <br> 
         <br>
         <label> Pergunta para recuperação de senha: </label>
         <input type="text" name="pergunta"> <br>
         <label> Resposta da pergunta: </label>
         <input type="text" name="resposta"> <br>
        <label> Senha </label>
        <input type="password" name="senha" required>
         <br>
        <input type="submit" name="enviar">
        
    </form>

    <?php
      
         if (isset($_GET["msg"])) {
            echo "<br> <h1><b>". $_GET["msg"]. "</b> </h1>"; 
            
         }


    ?>

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
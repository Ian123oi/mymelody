<?php

    include_once "../class/usuario.class.php";
    include_once "../class/usuarioDAO.class.php";

    $obj = new usuario();
    $obj->set("email", $_POST["email"]);
    $objDAO = new usuarioDAO();
    $retorno = $objDAO->retornarUmPorEmail($_POST["email"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperação de senha</title>
</head>
<body>
    
    <form action="pergunta_ok.php" method="POST">

    <label> Pergunta de segurança do usuário: <?php echo $_POST["email"]?> </label> <br>
    <h3> <?php echo $retorno["pergunta_seguranca"]?> </h3>
    <label> Sua resposta: </label> 
    <input type="text" name="resposta">
    <br>
    <label> Sua nova Senha: </label>
    <input type="password" name="senha">
    <br>
    <input type="hidden" name="id" value="<?php echo $retorno["id"]?>">
    <input type="hidden" name="email" value="<?php echo $retorno["email"]?>">
    <button type="submit"> Enviar Resposta </button>

    </form>

</body>
</html>
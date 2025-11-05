<!DOCTYPE html>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="login_ok.php" method="POST">
        <label> Email: </label>
        <input type="email" name="email">
        <br>
        <label> Senha: </label>
        <input type="password" name="senha">

        <div class="g-recaptcha" data-sitekey="6LdZsesrAAAAAKE54H3gGtGe23NKL0dGMiJ5ZeVu">  </div>
                   <input type="submit">

    </form>
        <a href="../usuario/recuperar.php"> Esqueceu a senha? </a> <br>
    <?php
    if (isset($_GET["msg"])) {
        echo ("<h1> RESPONDA O CAPTCHA!! </h1");
    }
    ?>

</body>
</html>
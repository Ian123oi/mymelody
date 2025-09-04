<?php
session_start();
if(!isset($_SESSION["login"])) {
    header("location:login.php");
} 
if (isset($_GET["logout"])) {
    session_destroy();
}
?>

<body>


<h1> Olá admininastro <?php echo $_SESSION["nome"]?></h1>

<a href="?logout=logout"> Sair </a>
<br>

<a href="vendasnfAdm.php"> Verificar compras não finalizadas </a>
<br> <br>
<a href="vendasfAdm.php"> Verificar compras finalizadas </a>
</body>
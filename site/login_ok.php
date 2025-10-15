
<?php


include_once "../class/usuario.class.php";
include_once "../class/usuarioDAO.class.php";

$ip = $_SERVER["REMOTE_ADDR"];
$captcha = $_POST["g-recaptcha-response"];
$chaveSecreta = "6LdZsesrAAAAALBci5nbMU_BqrHJHe6JNPcQCvss";
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$chaveSecreta&response=$captcha&remoteip=$ip");
$atributos = json_decode($response, TRUE);

$obj = new usuario();
$obj->set("email", $_POST["email"]);
$obj->set("senha", $_POST["senha"]);
$objDAO = new usuarioDAO();
$retorno = $objDAO->login($obj);

if ($atributos["success"]) {



if ($retorno == 2)
    echo "email não cadastrado";
    else if ($retorno == 1)
    echo "senha incorreta";
else {
    session_start();
    $_SESSION["id"] = $retorno["id"];
    $_SESSION["nome"] = $retorno["nome"];
    $_SESSION["tipo"] = $retorno["tipo"];
    $_SESSION["login"] = true;
    header("Location:index.php?loginOk");
}
} else {
    header("Location:login.php?msg=Faça O captcha!");
}
?>
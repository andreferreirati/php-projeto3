<?php

function validarRotas()
{
    $rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $path = str_replace("/","",$rota['path']);

    $rotasvalidas = array("contato","empresa","produtos","servicos");

    $filename = 'includes/'.$path.'.php';
    //echo $filename;die;

    if(in_array($path,$rotasvalidas) and file_exists($filename)){

        return require_once("includes/".$path.".php");
    }
    elseif ($path == ""){
        return require_once("includes/home.php");
    }
    else{
        return require_once("includes/404.php");
    }

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>PHP - Projeto 1 </title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/justified-nav.css" rel="stylesheet">
</head>
<body>

<!-- menu -->
<?php require_once("menu.php"); ?>

<!-- Conteudo da pagina -->
<?php validarRotas(); ?>

<!-- rodape -->
<?php require_once("rodape.php"); ?>

</body>
</html>

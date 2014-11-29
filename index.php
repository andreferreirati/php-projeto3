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
<?php

if(isset($_GET['pagina'])) {
    include_once("includes/". $_GET["pagina"]);
}else{
    include_once("includes/home.php");
}
?>

<!-- rodape -->
<?php require_once("rodape.php"); ?>

</body>
</html>

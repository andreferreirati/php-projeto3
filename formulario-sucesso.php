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
<?php require_once("menu.php"); ?>

<!-- Jumbotron -->
<div class="jumbotron">
    <h3>Dados enviados com sucesso, abaixo seguem os dados que você enviou</h3>
    <p>Nome: <?php echo $_POST["nome"]; ?></p>
    <p>Email: <?php echo $_POST["email"]; ?></p>
    <p>Assunto: <?php echo $_POST["assunto"]; ?></p>
    <p>Mensagem: <?php echo $_POST["mensagem"]; ?></p>
</div>


<!--
<div>
    <?php //require_once($_GET["arquivo"]); ?>
</div>
-->
<?php require_once("rodape.php"); ?>
</body>
</html>

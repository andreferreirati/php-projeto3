<?php

//Função conectar banco

function conectarDB(){

    $config = include "includes/config.php";

    $dsn      = 'mysql:host=localhost;dbname=pdo';
    $user     = 'root';
    $pass     = 'root';
    $options   = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];

    try{
        $pdo = new PDO($config['db']['dsn'], $config['db']['user'],$config['db']['pass'],$config['db']['options']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e){
        die("Error: Codigo: {$e->getCode()} | Mensagem: {$e->getMessage()} | Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
    return $pdo;
}

//Função inclusão na tabela

function incluirTB($tabela, $dadosInclusao){
    $pdo    = conectarDB();
    $campos = count($dadosInclusao);

    try{
        $cadastrar = $pdo->prepare("insert into {$tabela} (pagina, pagina_titulo, pagina_subtitulo, pagina_conteudo) values (?, ?, ?, ?)");
        for ($i = 0; $i < $campos; $i ++):
            $cadastrar->bindValue($i+1, $dadosInclusao[$i]);
        endfor;
        $cadastrar->execute();
    } catch (PDOException $e){
        die("Error: Codigo: {$e->getCode()} | Mensagem: {$e->getMessage()} | Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
}

//Função Consultar tabela

function consultarTB($tabela){
    $pdo = conectarDB();

    try{
        $consultar = $pdo->prepare("select * from $tabela");
        $consultar->execute();
        $dados = $consultar->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e){
        echo $exc->getTraceAsString();
        die("Error: Codigo: {$e->getCode()} | Mensagem: {$e->getMessage()} | Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
    return $dados;
}

//Função consultar pelo ID

function consultarIdTB($tabela, $id){
    $pdo = conectarDB();

    try{
        $consultarId = $pdo->prepare("select * from {$tabela} where id = :id");
        $consultarId->bindValue(":id", $id);
        $consultarId->execute();
        $dados = $consultarId->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e){
        echo $exc->getTraceAsString();
        die("Error: Codigo: {$e->getCode()} | Mensagem: {$e->getMessage()} | Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
    return $dados;
}

function listarPaginas($tabela, $pagina){
    $pdo = conectarDB();

    try{
        $listar = $pdo->prepare("select * from {$tabela} where pagina = :pagina");
        $listar->bindvalue(":pagina", $pagina);
        $listar->execute();
        $dados = $listar->fetch(PDO::FETCH_ASSOC);
    } catch (PODException $e) {
        echo $exc->getTraceAsString();
        die("Error: Codigo: {$e->getCode()} | Mensagem: {$e->getMessage()} | Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
    return $dados;
}

function busca()
{
    $pdo = conectarDb();
    $palavra = addslashes(trim($_POST['buscar']));
    try{
        $query = $pdo->prepare("SELECT * FROM paginas WHERE pagina_conteudo LIKE :busca");
        $query->bindValue(":busca","%{$palavra}%");
        $query->execute();
    } catch (PDOException $e) {
        echo "Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}";
    }
    if ($query->rowCount() >= 1) {
        echo '<h3>A palavra <strong>'.$palavra.'</strong> retornou: '.$query->rowCount().' resultados </h3>';
        $listar = $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($listar as $value):
            echo "<h4><a href=\"{$value["pagina"]}\">".strip_tags($value["pagina_titulo"])."</a></h4>";
        endforeach;
    } else {
        echo 'Nenhum resultado encontrado com a palavra <strong>'.$palavra.'</strong>';
    }
    return $query;

}
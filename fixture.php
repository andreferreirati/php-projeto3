<?php
/**
 * Created by PhpStorm.
 * User: andreferreira
 * Date: 09/12/14
 * Time: 22:16
 */

require_once "functions/functionsDB.php";

echo "#### Executando Fixture ####\n";

$conn = conectarDB();

echo "Removendo tabela";
$conn->query("DROP TABLE IF EXISTS paginas;");

echo " - OK\n";

echo "Criando tabela";
$conn->query("CREATE TABLE PAGINAS (
    id INT(10) AUTO_INCREMENT PRIMARY KEY  NOT NULL,
    pagina VARCHAR(150) CHARACTER SET 'utf8' NULL,
    pagina_titulo VARCHAR(200) CHARACTER SET 'utf8' NULL,
    pagina_subtitulo VARCHAR(250) CHARACTER SET 'utf8' NULL ,
    pagina_conteudo varchar(250) CHARACTER SET 'utf8' NULL)");
echo " - OK\n";

echo "Inserindo dados";
$cadastrarDados = array('home','Pagina inicial','subtitulo Pagina inicial','Descricao conteudo pagina inicial');
incluirTB('paginas',$cadastrarDados);

$cadastrarDados = array('empresa','Pagina empresa','subtitulo Pagina empresa','Descricao conteudo pagina empresa');
incluirTB('paginas',$cadastrarDados);

$cadastrarDados = array('produtos','Pagina produtos','subtitulo Pagina produtos','Descricao conteudo pagina produtos');
incluirTB('paginas',$cadastrarDados);

$cadastrarDados = array('servicos','Pagina Servicos','subtitulo Pagina servicos','Descricao conteudo pagina servicos');
incluirTB('paginas',$cadastrarDados);

$cadastrarDados = array('404','Pagina 404','subtitulo Pagina 404','Descricao conteudo pagina 404');
incluirTB('paginas',$cadastrarDados);

echo " - OK\n";

echo "#### Concluido ####\n";

?>
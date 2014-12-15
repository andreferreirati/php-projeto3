<?php
/**
 * Created by PhpStorm.
 * User: andreferreira
 * Date: 14/12/14
 * Time: 22:26
 */

function validarRotas()
{
    $rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $path = $rota['path'];
    $path = explode('/', $path);
    $pagina = $path[1];
    $rotasvalidas = array("home","empresa","produtos","servicos", "contato", "404", "busca");


    if(empty($pagina)){

        return $dados = listarPaginas('paginas','home');
    }
    elseif(isset($pagina) && in_array($pagina,$rotasvalidas)!= $rotasvalidas){
        return $dados = listarPaginas('paginas','404');
    }
    elseif($pagina == 'busca'){
        return require_once("includes/busca.php");
    }
    elseif($pagina == 'contato'){
        return require_once("includes/contato.php");
    }
    else{
        return $dados = listarPaginas('paginas',$pagina);
    }

}
?>
<?php
/**
 * Created by PhpStorm.
 * User: andreferreira
 * Date: 14/12/14
 * Time: 22:07
 */

$pagina = validarRotas();
?>

<div class="row">
    <div class="col-lg-4">
        <h1><?php echo $pagina['pagina_titulo'];?></h1>
        <h2><?php echo $pagina['pagina_subtitulo'];?></h2>
        <p class="text-danger"><?php echo $pagina['pagina_conteudo'];?></p>
    </div>
</div>
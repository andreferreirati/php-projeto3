<?php

$nome = "Andre";

$exibe = function ($x) use($nome) {
    echo $nome."<br>";
};

$array = [1, 2, 3, 5, 6, 8, 90];

array_walk($array, $exibe);

//function somar($x, $y)
//{
//    echo "inicio a execucao da funcao";
//    return $x+$y;
//    echo "terminou";
//}
//
//$valor = somar(10, 20);
//echo $valor;




?>
<?php
require "../config.php";
require_once "../classes/Armarios.php";
$texto = $_GET['palavra'];
$a = new Armarios();

$retorno = $a->pesquisar($texto);

echo json_encode($retorno);
?>
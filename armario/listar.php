<?php
require "../config.php";
require_once "../classes/Armarios.php";

$a = new Armarios();

$armarios = $a->listar_todos();

echo json_encode($armarios);
?>
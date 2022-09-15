<?php
require '../config.php';
require_once "../classes/Armarios.php";

$a = new Armarios();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $a->desativar($id);
}
?>
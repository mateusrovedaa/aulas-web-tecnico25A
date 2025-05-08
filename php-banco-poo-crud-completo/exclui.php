<?php
include 'ControlaUsuario.php';

if (!isset($_GET['id'])) {
    die('ID não fornecido para exclusão.');
}

$id = $_GET['id'];
$controlaUsuario = new ControlaUsuario();
$controlaUsuario->excluir($id);

header("Location: index.php");
exit;

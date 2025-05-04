<?php
include 'Usuario.php';
include 'ControlaUsuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];

    $usuario = new Usuario($nome, $email, $idade);
    $usuario->setId($id);
    $controlaUsuario = new ControlaUsuario();

    $controlaUsuario->atualizar($usuario);

    header("Location: index.php");
    exit;
} 

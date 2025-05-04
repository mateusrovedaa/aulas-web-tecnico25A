<?php
include 'Usuario.php';
include 'ControlaUsuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];

    $usuario = new Usuario($nome, $email, $idade);
    $controlaUsuario = new ControlaUsuario();

    $controlaUsuario->salvar($usuario);

    header("Location: cadastra.html");
}

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];
    $usuario = $_POST['usuario'];

    echo "<h2>Cadastro realizado com sucesso!</h2>";
    echo "<p>Nome: $nome</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Idade: $idade</p>";
    echo "<p>Usuário: $usuario</p>";

    echo "<script>alert('Cadastro realizado com sucesso!');</script>";
}

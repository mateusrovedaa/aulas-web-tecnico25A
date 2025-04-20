<?php
$host = 'localhost';
$dbname = 'teste';
$username = 'postgres';
$password = 'postgres';
$port = '5432';

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];

    $sql = "INSERT INTO nomes (nome) VALUES (?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome]);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Salvar Nome</title>
</head>

<body>
    <h2>Cadastro Simples</h2>
    <form method="post" action="">
        <label for="nome">Digite seu nome:</label>
        <input type="text" name="nome" id="nome" required>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>